<!doctype html>
<html lang="en" data-theme="{{$version->color_theme}}">
<head>
    <x-ga/>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta property="og:title" content="{{$project->name}}">
    <meta property="og:description" content="{{$project->description}}">

    {{--    <meta name="og:image:width" content="1200">--}}
    {{--    <meta name="og:image:height" content="627">--}}
    <meta name="image"
          property="og:image"
          content="{{$project->ogimage_url}}">
    <meta property="og:url" content="{{$project->url()}}">
    <meta property="og:site_name" content="{{config('app.name')}}">


    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@getlaunchsoon">
    {{--    <meta name="twitter:creator" content="@SarahMaslinNir">--}}
    <meta name="twitter:title" content="{{$project->name}}">
    <meta name="twitter:description" content="{{$project->description}}">
    <meta name="twitter:image:alt" content="Banner">
    <meta name="twitter:image"
          content="{{$project->ogimage_url}}">
    {{--    <meta name="twitter:image:width" content="1200">--}}
    {{--    <meta name="twitter:image:height" content="627">--}}


    @if($project->custom_domain)
        <meta name="auth" property="og:auth" content="{{$project->custom_domain}}">
    @endif

    <title>{{$project->name}}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-base-100 min-h-screen flex flex-col items-center">

<div class="container mx-auto grow flex flex-col justify-center mb-12 px-4 mt-24">
    @yield('content')
</div>

<div class="container mx-auto fixed mt-4 px-4">
    <div class="navbar bg-base-100/95 shadow-xl">
        <div class="navbar-start">
            <a href="#" class="text-xl font-semibold text-base-content flex flex-row items-center gap-2">
                @if($project->logo_url)
                    <img src="{{$project->logo_url}}" class="w-12 h-12 inline-block" />
                @endif
                {{$project->name}}
            </a>
        </div>
        <div class="navbar-end">
            @yield('navbar')
        </div>
    </div>
</div>


<footer>
    <div class="container mx-auto text-center py-4 pb-16">
        <p class="text-sm">
            Powered by
            <a class="link" href="{{route('root')}}">
                <img src="{{asset('img/logo.png')}}" class="w-6 h-6 inline-block"/>
                {{config('app.name')}}
            </a>
        </p>
    </div>
</footer>
</body>
</html>

