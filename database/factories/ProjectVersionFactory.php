<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\ProjectVersion;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProjectVersion>
 */
class ProjectVersionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'color_theme' => 'lofi',
            'block_editor_data' => json_encode([
                'blocks' => []
            ]),
            'success_editor_data' => json_encode([
                'blocks' => []
            ]),
            'published' => 0,
        ];
    }

    public function fromAnotherVersion(ProjectVersion $version): ProjectVersionFactory|Factory
    {
        return $this->state(function (array $attributes) use ($version) {
            return [
                'project_id' => $version->project_id,
                'name' => 'v' . ($version->project()->first()->versions()->count() + 1),
                'color_theme' => $version->color_theme,
                'block_editor_data' => $version->block_editor_data,
                'success_editor_data' => $version->success_editor_data,
            ];
        });
    }

    public function forProject(Project $project): ProjectVersionFactory|Factory
    {
        return $this->state(function (array $attributes) use ($project) {
            return [
                'project_id' => $project->id,
                'name' => 'v' . ($project->versions()->count() + 1),
                'block_editor_data' => json_encode([
                    'blocks' => [
                        [
                            'type' => 'header',
                            'data' => [
                                'level' => 1,
                                'text' => $project->name,
                            ]
                        ],
                        [
                            'type' => 'email-input',
                            'data' => [
                                'button' => 'Sign up!',
                                'placeholder' => 'Enter your email',
                            ]
                        ]
                    ]
                ]),
                'success_editor_data' => json_encode([
                    'blocks' => [
                        [
                            'type' => 'header',
                            'data' => [
                                'level' => 1,
                                'text' => 'Thanks for signing up!',
                            ]
                        ],
                        [
                            'type' => 'paragraph',
                            'data' => [
                                'text' => 'You\'ll receive an email shortly with more information.',
                            ]
                        ]
                    ]
                ])
            ];
        });
    }
}
