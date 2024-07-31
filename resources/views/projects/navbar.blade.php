<?php
$navLinks = [
    [
        'href' => route('projects.edit', $project),
        'routeName' => 'projects.edit',
        'label' => 'Edit',
    ],
    [
        'href' => route('projects.submissions.index', $project),
        'routeName' => 'projects.submissions.index',
        'label' => 'Submissions (' . ($project->submissions->count()) . ')',
    ]
]
?>

<div class="navbar bg-base-100 border-b px-4">
    <div class="navbar-start">
        <x-drawer-open-button/>
        <ul class="menu menu-horizontal gap-2">
            @foreach($navLinks as $navLink)
                <li>
                    <a href="{{$navLink['href']}}"
                       class="{{request()->routeIs($navLink['routeName']) ? 'active' : ''}}">
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
                        {{$version->created_at}}
                        @if($version->id === $project->published_version_id)
                            <x-heroicon-o-check class="h-4 text-success"/>
                        @endif
                        <x-heroicon-o-chevron-down class="h-4"/>
                    </div>
                    <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
                        @foreach($versions as $v)
                            <li>
                                <a href="{{route('projects.edit', [$project, 'version_id' => $v->id])}}">
                                    {{$v->created_at}}
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
                        Published
                    @else
                        <button class="btn btn-sm">
                            <x-heroicon-o-globe-alt class="h-4" />
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
