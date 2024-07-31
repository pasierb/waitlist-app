<?php

namespace App\Listeners;

use App\Events\UserCreated;
use App\Models\Project;
use App\Models\ProjectVersion;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateSampleProject
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
    public function handle(UserCreated $event): void
    {
        $project = Project::factory()->create([
            'user_id' => $event->user->id,
            'name' => 'Sample Project',
            'slug' => 'sample-user-project-' . $event->user->id . '-' . Carbon::now()->unix(),
        ]);
        ProjectVersion::factory()->forProject($project)->create();
    }
}
