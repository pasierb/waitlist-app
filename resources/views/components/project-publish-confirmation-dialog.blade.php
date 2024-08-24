@props([
    'id',
    'projectVersion',
])

<?php
$credits = auth()->user()->credits()->count();
$project = $projectVersion->project()->first();
$canPublish = $credits > 0 || $project->isPublished();
?>

<x-dialog :id="$id">
    <x-slot:title>
        {{ __('Publish Project') }}
    </x-slot>

    @if($project->isPublished())
        <form action="{{route('projects.versions.publish', [$project, $projectVersion])}}" method="POST">
            @csrf
            
            <p class="mb-4">
                This project is already published. Publishing this version will update the live project immediately.
            </p>
            <p class="mb-4">
                Remember, you can always choose one of the previous versions to publish instead if needed.
            </p>


            <button class="btn btn-primary">
                <x-heroicon-o-globe-alt class="h-4"/>
                Publish
            </button>
        </form>
    @elseif($credits > 0)
        <p class="mb-4">You have {{ auth()->user()->credits()->count() }} credit(s) available. Publishing this project
            will consume 1 credit.</p>
        <form action="{{ route('projects.versions.publish', [$project, $projectVersion]) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">
                <x-heroicon-o-globe-alt class="h-4 w-4 mr-2"/>
                Publish and Use 1 Credit
            </button>
        </form>
    @else
    <div class="max-w-sm mx-auto">
        <x-single-project-publish-pricing-card :project-version="$projectVersion"/>
    </div>
    @endif
</x-dialog>
