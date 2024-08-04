<!DOCTYPE html>
<html lang="en" data-theme="winter">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    @vite('resources/css/app.css')
</head>
<body class="antialiased bg-base-200 text-base-content min-h-screen flex flex-col justify-center">
<div class="container mx-auto flex flex-row justify-center">
    <div class="max-w-xl mx-auto sm:px-6 lg:px-8">

        <div class="flex items-center pt-8 sm:justify-start sm:pt-0">
            <div class="text-5xl">🫤</div>
            <div class="px-4 text-lg border-r tracking-wider">
                @yield('code')
            </div>

            <div class="ml-4 text-lg uppercase tracking-wider">
                @yield('message')
            </div>
        </div>
    </div>
</div>

<div class="container mx-auto flex flex-col justify-center items-center mt-8">
    @hasSection('explanation')
        @yield('explanation')
    @else
        <div class="prose">
            <p>
                Apologies, but something went wrong on our end. Please try again later.
            </p>

            <p>
                We are notified of this issue and will work to resolve it as soon as possible.
            </p>
        </div>
    @endif
</div>

<div class="text-center">
    <a href="{{ route('root') }}" class="btn btn-neutral mt-8">
        Go back home
    </a>
</div>
</body>
</html>
