<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }

    protected $fillable = ['name', 'block_editor_data', 'color_theme', 'slug'];
}
