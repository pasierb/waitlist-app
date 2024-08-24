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

    @if($canPublish)
        <form action="{{route('projects.versions.publish', [$project, $projectVersion])}}" method="POST">
            @csrf
            <button class="btn btn-sm">
                <x-heroicon-o-globe-alt class="h-4"/>
                Publish
            </button>
        </form>
    @else
        <p class="text-sm">
            {{ __('You do not have enough credits to publish this project.') }}
            <a href="{{route('checkout', ['project_version_id' => $projectVersion->id])}}">Buy more credits</a>
    @endif
</x-dialog>
