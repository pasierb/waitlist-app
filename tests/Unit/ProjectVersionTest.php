<?php

use App\Models\Project;
use App\Models\ProjectVersion;
use App\Models\User;

test('publish creates new version', function () {
    $user = User::factory()->create();
    $project = Project::factory()->create(['user_id' => $user->id]);
    $version = ProjectVersion::factory()->create(['project_id' => $project->id]);

    $newVersion = $version->publish();

    $this->assertEquals(true, $version->published);
    $this->assertEquals(false, $newVersion->published);
    $this->assertEquals('v2', $newVersion->name);
});

test('sets a name', function () {
    $user = User::factory()->create();
    $project = Project::factory()->create(['user_id' => $user->id]);
    $version = ProjectVersion::factory()->create(['project_id' => $project->id]);

    $this->assertEquals('v1', $version->name);
});
