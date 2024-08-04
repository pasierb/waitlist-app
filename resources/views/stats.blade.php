<?php

use App\Models\Project;
use App\Models\User;

$usersCount = User::count();
$lastUser = User::latest()->first();

$totalProjects = Project::count();
$latestProject = Project::latest()->first();
?>


@extends('layouts.landing')

@section('content')
    <div class="mx-auto container flex flex-col items-center justify-center gap-4 py-12">
        <h1 class="text-xl font-semibold">LaunchLoom stats</h1>

        <div class="stats stats-vertical shadow">
            <div class="stat">
                <div class="stat-title">Total users</div>
                <div class="stat-value">{{$usersCount}}</div>
                <div class="stat-desc">
                    {{$lastUser->email}}
                    {{$lastUser->created_at->diffForHumans()}}
                </div>
            </div>

            <div class="stat">
                <div class="stat-title">Total projects</div>
                <div class="stat-value">{{$totalProjects}}</div>
                <div class="stat-desc">
                    Latest <a class="link" href="{{$latestProject->url()}}">{{$latestProject->name}}</a>
                </div>
            </div>
        </div>
    </div>
@endsection

