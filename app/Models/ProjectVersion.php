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

    public function cloneToDraftVersion() {
        $cloneProject = new ProjectVersion([
            'block_editor_data' => $this->block_editor_data,
            'color_theme' => $this->color_theme,
            'published' => 0,
        ]);
        $cloneProject->project_id = $this->project_id;
        $cloneProject->save();

        return $cloneProject;
    }

    public function publish()
    {
        DB::transaction(function () {
            $project = $this->project()->first();
            $project->versions()->where('id', '!=', $this->id)->update(['published' => 0]);
            $this->update(['published' => 1]);
            $project->update(['published_version_id' => $this->id]);
            $this->cloneToDraftVersion();
        });
    }

    protected $fillable = ['block_editor_data', 'color_theme', 'published'];
}
