<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function consume(Project $project)
    {
        if ($this->consumed_at !== null) {
            throw new \Exception('Order has already been consumed.');
        }

        if ($this->payment_status !== 'paid') {
            throw new \Exception('Cannot consume an unpaid order.');
        }

        $this->consumed_at = now();
        $this->project()->associate($project);
        $this->save();

        return $this;
    }

    protected $fillable = [
        'payment_status',
        'is_completed',
    ];

    protected $casts = [
        'consumed_at' => 'datetime',
    ];
}
