<?php

namespace App\Listeners;

use App\Events\ProjectCreated;
use App\Models\ProjectVersion;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
        ProjectVersion::factory()->forProject($event->project)->create();
    }
}
