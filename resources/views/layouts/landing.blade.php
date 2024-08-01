<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="winter">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{config('app.name')}}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    @vite('resources/css/app.css')
</head>
<body class="bg-base-100 min-h-screen flex flex-col">
<div class="navbar bg-base-100 container mx-auto">
    <div class="flex-1">
        <a class="btn btn-ghost text-xl" href="/">
            <img src="{{asset('img/logo.png')}}" alt="Bunny.net" class="h-8"/>
            {{config('app.name')}}
        </a>
    </div>
    <div class="flex-none">
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

<div class="bg-base-200">
    <footer class="footer bg-base-200 text-base-content p-10 container mx-auto">
        <aside>
            <img src="{{asset('img/logo.png')}}" class="h-12"/>
            <p>
                {{config('app.name')}}<br/>
                <br/>
                Providing reliable tech since 1992
            </p>
        </aside>
        <nav>
            <h6 class="footer-title">Company</h6>
            <a class="link link-hover">About us</a>
            <a class="link link-hover">Contact</a>
            <a class="link link-hover">Jobs</a>
            <a class="link link-hover">Press kit</a>
        </nav>
        <nav>
            <h6 class="footer-title">Legal</h6>
            <a href="{{route('terms')}}" class="link link-hover">Terms of use</a>
            <a href="{{route('privacy')}}" class="link link-hover">Privacy policy</a>
        </nav>
    </footer>
</div>
</body>
</html>
