<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="winter">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon definition -->
    <link rel="icon" type="image/png" href="{{asset('favicon/favicon.ico')}}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased"
      x-data="{asideOpen: false}">
<div class="drawer lg:drawer-open">
    <input id="my-drawer" type="checkbox" class="drawer-toggle"/>
    <div class="drawer-content min-h-screen bg-base-100">
        {{$slot}}

        @if(Session::has('success'))
            <div class="toast toast-center">
                <div class="alert alert-success" x-data x-init="setTimeout(() => {$el.remove()}, 3000)">
                    <x-heroicon-o-check-circle class="w-4 h-4"/>
                    <span class="text-sm">{{Session::get('success')}}</span>
                </div>
            </div>
        @endif
    </div>
    <div class="drawer-side">
        <label for="my-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
        <div class="bg-base-200 text-base-content min-h-full w-48 py-4">
            <a href="{{route('root')}}" class="flex flex-row gap-2 ml-4 mt-2 mb-4">
                <img src="{{asset('img/logo.png')}}" alt="logo" class="w-8 h-8"/>
                <span class="font-semibold text-lg">LaunchLoom</span>
            </a>

            <ul class="menu">
                <li>
                    <a href="{{route('dashboard')}}">
                        <x-heroicon-o-home class="w-4 h-4"/>
                        {{__('Dashboard')}}
                    </a>
                </li>
                <li>
                    <a href="{{route('projects.index')}}">
                        <x-heroicon-o-folder class="w-4 h-4"/>
                        {{__('Projects')}}
                    </a>
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

@stack('scripts')
</body>
</html>
