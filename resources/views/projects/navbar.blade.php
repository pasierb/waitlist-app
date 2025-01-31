<?php
$navLinks = [
    [
        'href' => route('projects.edit', $project),
        'routeName' => 'projects.edit',
        'icon' => 'heroicon-o-cog-6-tooth',
        'label' => 'Settings',
    ], [
        'href' => route('projects.versions.edit', [$project, $project->latestDraftVersion()]),
        'routeName' => 'projects.versions.edit',
        'icon' => 'heroicon-o-paint-brush',
        'label' => 'Design',
    ], [
        'href' => route('projects.submissions.index', $project),
        'routeName' => 'projects.submissions.index',
        'icon' => 'heroicon-o-circle-stack',
        'label' => 'Submissions (' . ($project->submissions->count()) . ')',
    ]
, [
    'href' => "https://plausible.io/getlaunchsoon.com?filters=((is,page,(". route('project.page', [$project], false) . ")))",
    'target' => '_blank',
    'routeName' => 'projects.analytics',
    'icon' => 'heroicon-o-chart-bar',
    'label' => 'Analytics',
]
];
?>

<div class="navbar bg-base-100 border-b px-4">
    <div class="navbar-start">
        <x-drawer-open-button/>
        <ul class="menu menu-horizontal gap-2">
            @foreach($navLinks as $navLink)
                <li>
                    <a href="{{$navLink['href']}}"
                       @isset($navLink['target']) target="{{$navLink['target']}}" @endif
                       class="{{request()->routeIs($navLink['routeName']) ? 'active' : ''}}">
                        @svg($navLink['icon'], 'h-4 w-4')
                        {{$navLink['label']}}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="navbar-center flex">
    </div>
    <div class="navbar-end">
        <div class="flex flex-row gap-2">
            @isset($version)
                <div class="dropdown">
                    <div tabindex="0" role="button" class="btn btn-sm">
                        {{$version->name}}
                        @if($version->id === $project->published_version_id)
                            <x-heroicon-o-check class="h-4 text-success"/>
                        @endif
                        <x-heroicon-o-chevron-down class="h-4"/>
                    </div>
                    <ul tabindex="0"
                        class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow max-h-screen scroll-auto">
                        @foreach($project->versions()->latest()->get() as $v)
                            <li>
                                <a href="{{route('projects.versions.edit', [$project, $v])}}">
                                    {{$v->getName()}}
                                    @if($v->id === $project->published_version_id)
                                        <x-heroicon-o-check class="h-4 text-success"/>
                                    @endif
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <button class="btn btn-sm" x-on:click="publishConfirmationDialog.showModal()">
                    <x-heroicon-o-globe-alt class="h-4 w-4 mr-2"/>
                    Publish
                </button>
                <x-project-publish-confirmation-dialog id="publishConfirmationDialog" :projectVersion="$version"/>

                <a class="btn btn-sm"
                   target="_blank"
                   href="{{route('projects.versions.preview', [$project, $version])}}">
                    <x-heroicon-o-eye class="h-4"/>
                </a>
            @else
                @if($project->published_version_id)
                    <a href="{{$project->url()}}" class="btn btn-sm" target="_blank">
                        <x-heroicon-o-globe-alt class="h-4"/>
                        View
                    </a>
                @else
                    <div class="flex flex-row items-center gap-2 text-sm text-base-content/70">
                        <x-heroicon-o-globe-alt class="h-4"/>
                        Not published
                    </div>
                @endif
            @endisset
        </div>
    </div>
</div>
