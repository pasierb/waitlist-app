<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Events\UserCreated;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;
use Laravel\Pennant\Concerns\HasFeatures;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Billable, HasFeatures;

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function isPremium(): bool
    {
        return $this->orders()->where('is_completed', 1)->exists();
    }

    public function isGod(): bool
    {
        return $this->is_god;
    }

    public function aiPromptsLastThirtyDays(): int
    {
        $thirtyDaysAgo = Carbon::now()->subDays(30);
        return ProjectVersion::whereNotNull('prompt')
            ->whereIn('project_id', $this->projects()->pluck('id')->toArray())
            ->where('created_at', '>=', $thirtyDaysAgo)
            ->count();
    }

    public function hasExhausedAiCredits(): int
    {
        return $this->aiPromptsLastThirtyDays() > config('app.ai_prompts_per_month');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * The event map for the model.
     *
     * @var array<string, string>
     */
    protected $dispatchesEvents = [
        'created' => UserCreated::class,
    ];
}
