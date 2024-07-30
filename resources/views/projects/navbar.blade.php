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
            'label' => 'Submissions',
        ]
    ]
?>

<div class="navbar bg-base-100 border-b px-4">
    <div class="navbar-start">
        {{$project->name}}
    </div>
    <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal gap-2">
            @foreach($navLinks as $navLink)
                <li>
                    <a href="{{$navLink['href']}}" class="{{request()->routeIs($navLink['routeName']) ? 'active' : ''}}">
                        {{$navLink['label']}}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="navbar-end">
        <a class="btn btn-link"
           target="_blank"
           href="{{route('project.page', $project)}}">
            View
            <x-heroicon-o-arrow-top-right-on-square class="h-4" />
        </a>
    </div>
</div>
