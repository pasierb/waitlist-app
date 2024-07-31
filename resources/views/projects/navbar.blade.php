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
        @isset($versions)
            <div class="dropdown">
                <div tabindex="0" role="button" class="btn m-1">
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
        @endisset
    </div>
    <div class="navbar-end">
        @isset($version)
            <form action="{{route('projects.versions.publish', [$project, $version])}}" method="POST">
                @csrf
                @if($version->id === $project->published_version_id)
                    Published
                @else
                    <button>Publish</button>
                @endif
            </form>
        @endisset

        <a class="btn btn-link"
           target="_blank"
           href="{{route('project.page', $project)}}">
            View
            <x-heroicon-o-arrow-top-right-on-square class="h-4"/>
        </a>
    </div>
</div>
