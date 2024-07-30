<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="winter">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased" x-data="{asideOpen: false}">
<div class="drawer lg:drawer-open">
    <input id="my-drawer-2" type="checkbox" class="drawer-toggle"/>
    <div class="drawer-content min-h-screen bg-base-100">
        {{$slot}}

        {{--        <label for="my-drawer-2" class="btn btn-primary drawer-button lg:hidden">--}}
        {{--            Open drawer--}}
        {{--        </label>--}}
    </div>
    <div class="drawer-side">
        <label for="my-drawer-2" aria-label="close sidebar" class="drawer-overlay"></label>
        <div class="bg-base-200 text-base-content min-h-full w-48">
            <ul class="menu">
                <li>
                    <a href="{{route('dashboard')}}">{{__('Dashboard')}}</a>
                </li>
                <li>
                    <a href="{{route('projects.index')}}">{{__('Projects')}}</a>
                </li>
            </ul>

            <ul class="menu rounded-box">
                <li class="menu-title">Projects</li>
                @foreach(\Illuminate\Support\Facades\Auth::user()->projects()->get() as $project)
                    <li>
                        <a href="{{route('projects.edit', $project)}}">{{$project->name}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

@isset($scripts)
    {{$scripts}}
@endisset
</body>
</html>
