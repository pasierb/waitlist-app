<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProjectVersion extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->fillBlockIds();
        });

        static::updating(function ($model) {
            $model->fillBlockIds();
        });
    }

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


    public function lastPrompt()
    {
        if ($this->prompt) {
            return $this->prompt;
        }

        return ProjectVersion::where('project_id', $this->project_id)
            ->whereNotNull('prompt')
            ->orderBy('created_at', 'desc')
            ->pluck('prompt')->first();
    }

    private function fillBlockIds()
    {
        $blockEditorData = json_decode($this->block_editor_data);

        $mapped = Arr::map($blockEditorData->blocks, function ($block) {
            if (!isset($block->id)) {
                $block->id = Str::uuid();
            }

            return $block;
        });

        $blockEditorData->blocks = $mapped;

        $this->block_editor_data = json_encode($blockEditorData);
    }

    protected $fillable = [
        'block_editor_data',
        'success_editor_data',
        'color_theme',
        'published',
        'name',
    ];
}
