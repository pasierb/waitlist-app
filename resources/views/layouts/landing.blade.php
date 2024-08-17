<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="winter">
<head>
    <x-ga/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="waitlist, landing page, launch, CMS">
    <meta name="robots" content="index, follow">
    <meta name="language" content="English">

    <meta name="title" property="og:title" content="{{config('app.name')}}"/>
    <meta name="description"
          property="og:description"
          content="Create eye-catching waitlist landing pages in minutes. No coding required. Capture and manage potential customers effortlessly with our intuitive visual editor.">
    <meta name="image"
          property="og:image"
          content="{{'https://staging.siteshooter.app/snap/' . config('app.siteshooter_token') . '?url='.config('app.url')}}">
    <meta property="og:url" content="{{config('app.url')}}">

    <title>
        {{config('app.name')}}
        @hasSection('title')
            - @yield('title')
        @endif
    </title>

    <!-- Favicon definition -->
    <link rel="icon" type="image/png" href="{{asset('favicon/favicon.ico')}}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-base-100 min-h-screen flex flex-col">
<div class="navbar bg-base-100 container mx-auto">
    <div class="navbar-start">
        <a class="btn btn-ghost text-xl" href="/">
            <img src="{{asset('img/logo.png')}}" alt="Bunny.net" class="h-8"/>
            {{config('app.name')}}
        </a>
    </div>
    <div class="navbar-center hidden md:flex">
        <ul class="menu menu-horizontal px-1">
            <li>
                <a href="{{route('pricing')}}">Pricing</a>
            </li>
        </ul>
    </div>
    <div class="navbar-end">
        <ul class="menu menu-horizontal px-1">
            @auth
                <li>
                    <a href="{{route('dashboard')}}">Dashboard</a>
                </li>
                <li>
                    <details>
                        <summary>{{Auth::user()->name}}</summary>
                        <ul class="bg-base-100 rounded-t-none p-2">
                            <li>
                                <form action="{{route('logout')}}" method="POST">
                                    @csrf
                                    <button class="text-nowrap">{{__('Sign out')}}</button>
                                </form>
                            </li>
                        </ul>
                    </details>
                </li>
            @else
                <li>
                    <a href="{{route('login')}}">
                        {{__('Sign in')}}
                        <x-heroicon-o-arrow-right class="w-4 h-4"/>
                    </a>
                </li>
            @endauth
        </ul>
    </div>
</div>

<main class="grow">
    @yield('content')
</main>

<div class="bg-neutral text-neutral-content">
    <footer class="px-4 py-24 container mx-auto">
        <div class="footer">
            <aside class="max-w-xs">
                <x-application-logo class="h-12"/>
                <p class="font-semibold text-lg">
                    {{config('app.name')}}<br/>
                </p>
                <p class="text-sm text-neutral-contentl/70">
                    LaunchLoom enables entrepreneurs to create stunning, code-free waitlist landing pages effortlessly
                    with
                    an intuitive visual editor.
                </p>
                <p class="text-sm text-neutral-content/70">
                    Copyright &copy; {{date('Y')}} - All rights reserved.
                </p>
            </aside>
            <nav>
                <h6 class="footer-title">Company</h6>
                <a href="{{route('pricing')}}" class="link link-hover">Pricing</a>
                <a href="{{route('contact')}}" class="link link-hover">Contact</a>
                <a href="https://launchloom.io/p/newsletter" class="link link-hover">Newsletter</a>
            </nav>
            <nav>
                <h6 class="footer-title">Legal</h6>
                <a href="{{route('terms')}}" class="link link-hover">Terms of use</a>
                <a href="{{route('privacy')}}" class="link link-hover">Privacy policy</a>
            </nav>
        </div>

        <div class="w-full py-12 flex flex row items-center gap-4 max-w-3xl">
            <img src="img/profile-pic-michal-square.png" alt="Founder's profile picture"
                 class="w-16 h-16 rounded-badge">
            <p class="text-neutral-content/80 text-sm">
                Hi! I'm Michal, the founder of LaunchLoom. I'm here to help you with any questions you might have.
                Feel free to reach out to me at
                <a href="mailto:michal@launchloom.io" class="link link-hover">michal@launchloom.io</a>
            </p>
        </div>
    </footer>
</div>
<script defer>
    document.addEventListener('DOMContentLoaded', function () {
        window.sentryFeedback.createWidget();
    });
</script>
</body>
</html>
