<?php

namespace App\Listeners;

use App\Events\ProjectCreated;
use App\Models\ProjectVersion;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class CreateInitialProjectVersion
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ProjectCreated $event): void
    {
        $project = $event->project;

        Log::info('Creating initial project version', [
            'project_id' => $project->id,
        ]);

        $project->versions()->create([
            'name' => 'v' . ($project->versions()->count() + 1),
            'color_theme' => 'lofi',
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
        ]);
    }
}
