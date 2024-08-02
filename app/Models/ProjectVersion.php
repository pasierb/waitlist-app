<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class ProjectVersion extends Model
{
    use HasFactory;

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function publish()
    {
        DB::transaction(function () {
            $project = $this->project()->first();

            ProjectVersion::withoutTimestamps(fn() => $project->versions()->where('published', 1)->update(['published' => 0]));
            $project->update(['published_version_id' => $this->id]);
            $this->update(['published' => 1]);

            // Create new draft version
            $project->versions()->create([
                'name' => 'v' . ($project->versions()->count() + 1),
                'published' => 0,
                'color_theme' => $this->color_theme,
                'block_editor_data' => $this->block_editor_data,
                'success_editor_data' => $this->success_editor_data,
            ]);
        });
    }

    protected $fillable = [
        'block_editor_data',
        'success_editor_data',
        'color_theme',
        'published',
        'name',
    ];
}
