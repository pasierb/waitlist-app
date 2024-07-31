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
            $project->versions()->where('id', '!=', $this->id)->update(['published' => 0]);
            $this->update(['published' => 1]);
            $project->update(['published_version_id' => $this->id]);
            ProjectVersion::factory()->fromAnotherVersion($this)->create();
        });
    }

    protected $fillable = ['block_editor_data', 'success_editor_data', 'color_theme', 'published'];
}
