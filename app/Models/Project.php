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
        return $this->versions()->where('published', 0)->latest()->first();
    }

    public function maybeCreateDraftVersion()
    {
        $version = $this->latestDraftVersion();
        if ($version) {
            return $version;
        }

        $publishedVersion = $this->publishedVersion()->first();
        if ($publishedVersion) {
            return $this->versions()->create([
                'block_editor_data' => $publishedVersion->block_editor_data,
                'color_theme' => $publishedVersion->color_theme,
            ]);
        }

        return $this->versions()->create([
            'block_editor_data' => json_encode(
                ['blocks' => [
                    ['type' => 'header', 'data' => ['text' => $this->name, 'level' => 1]],
                    ['type' => 'paragraph', 'data' => ['text' => 'This is a new project.']],
                    ['type' => 'email-input', 'data' => ['button' => 'Sign up!', 'placeholder' => 'Enter your email']],
                ]]),
            'color_theme' => 'lofi',
        ]);
    }

    protected $fillable = ['name', 'slug', 'published_version_id'];
}
