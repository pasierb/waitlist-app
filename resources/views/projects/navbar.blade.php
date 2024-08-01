<?php
$versions = $project->versions()->latest()->get();

$navLinks = [
    [
        'href' => route('projects.edit', $project),
        'routeName' => 'projects.edit',
        'icon' => 'heroicon-o-cog-6-tooth',
        'label' => 'Settings',
    ], [
        'href' => route('projects.versions.edit', [$project, isset($version) ? $version : $project->latestDraftVersion()]),
        'routeName' => 'projects.versions.edit',
        'icon' => 'heroicon-o-paint-brush',
        'label' => 'Design',
    ], [
        'href' => route('projects.submissions.index', $project),
        'routeName' => 'projects.submissions.index',
        'icon' => 'heroicon-o-circle-stack',
        'label' => 'Submissions (' . ($project->submissions->count()) . ')',
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
                    <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
                        @foreach($versions as $v)
                            <li>
                                <a href="{{route('projects.versions.edit', [$project, $v])}}">
                                    {{$v->name}}
                                    @if($v->id === $project->published_version_id)
                                        <x-heroicon-o-check class="h-4 text-success"/>
                                    @endif
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <form action="{{route('projects.versions.publish', [$project, $version])}}" method="POST">
                    @csrf
                    @if($version->id === $project->published_version_id)
                        <button class="btn btn-sm" disabled>
                            <x-heroicon-o-globe-alt class="h-4"/>
                            Published
                        </button>
                    @else
                        <button class="btn btn-sm">
                            <x-heroicon-o-globe-alt class="h-4"/>
                            Publish
                        </button>
                    @endif
                </form>

                <a class="btn btn-sm"
                   target="_blank"
                   href="{{route('projects.versions.preview', [$project, $version])}}">
                    <x-heroicon-o-eye class="h-4"/>
                </a>
            @endisset
        </div>
    </div>
</div>
