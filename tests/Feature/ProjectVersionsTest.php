<?php

use App\Models\Project;
use App\Models\ProjectVersion;
use App\Models\User;

it('publish fails if user has no credits', function () {
    $user = User::factory()->create();
    $project = Project::factory()->create(['user_id' => $user->id]);
    $version = ProjectVersion::factory()->create(['project_id' => $project->id]);

    $response = $this->actingAs($user)
        ->post('/projects/'.$project->id.'/versions/'.$version->id.'/publish');

    $response->assertSessionHas('error', 'You cannot publish a version without a license.');
    $response->assertSessionHas('errorCode', 'credits');
    $response->assertRedirect('/projects/'.$project->id.'/versions/'.$version->id.'/edit');
});

it('publish succeeds if project is already published, even without credits', function () {
    $user = User::factory()->create();
    $project = Project::factory()->create(['user_id' => $user->id]);
    $oldVersion = ProjectVersion::factory()->create(['project_id' => $project->id]);

    // Publish the project initially
    $newVersion = $oldVersion->publish();
    $project->refresh();

    // Ensure user has no credits
    $this->assertTrue($user->credits()->count() === 0);

    $response = $this->actingAs($user)
        ->post('/projects/'.$project->id.'/versions/'.$newVersion->id.'/publish');

    $response->assertSessionHas('success', 'Version '.$newVersion->name.' published successfully');
    $response->assertRedirect(route('projects.versions.edit', [$project, $newVersion->id + 1]));

    $project->refresh();
    $this->assertEquals($newVersion->id, $project->published_version_id);
});

it('consumes unconsumed order when user publishes', function () {
    $user = User::factory()->create();
    $project = Project::factory()->create(['user_id' => $user->id]);
    $version = ProjectVersion::factory()->create(['project_id' => $project->id]);

    // Create an unconsumed order for the user
    $order = \App\Models\Order::factory()->create([
        'user_id' => $user->id,
        'payment_status' => 'paid',
        'consumed_at' => null,
    ]);

    $response = $this->actingAs($user)
        ->post('/projects/'.$project->id.'/versions/'.$version->id.'/publish');

    $response->assertSessionHas('success', 'Version '.$version->name.' published successfully');
    $response->assertRedirect(route('projects.versions.edit', [$project, $version->id + 1]));

    // Check if the order has been consumed
    $order->refresh();
    $this->assertNotNull($order->consumed_at);
    $this->assertEquals($project->id, $order->project_id);

    // Verify the project is published
    $project->refresh();
    $this->assertEquals($version->id, $project->published_version_id);
});
