<?php

namespace App\Models;

use App\Events\ProjectCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Url\Url;

class Project extends Model
{
    use HasFactory;

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }

    public function versions()
    {
        return $this->hasMany(ProjectVersion::class);
    }

    public function publishedVersion()
    {
        return $this->hasOne(ProjectVersion::class, 'id', 'published_version_id');
    }

    public function latestDraftVersion()
    {
        return $this->versions()
            ->where('published', 0)
            ->orderBy('updated_at', 'desc')
            ->first();
    }

    public function url(): string
    {
        $host = $this->slug . '.' . Url::fromString(config('app.url'))->getHost();

        return Url::fromString(config('app.url'))
            ->withHost($host);
    }

    protected $fillable = ['name', 'slug', 'published_version_id', 'redirect_to_after_submission', 'redirect_after_submission',];

    /**
     * The event map for the model.
     *
     * @var array<string, string>
     */
    protected $dispatchesEvents = [
        'created' => ProjectCreated::class,
    ];
}
