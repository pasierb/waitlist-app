<!doctype html>
<html lang="en" data-theme="{{$version->color_theme}}">
<head>
    <x-ga/>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta property="og:title" content="{{$project->name}}">
    <meta name="image"
          property="og:image"
          content="{{'https://staging.siteshooter.app/snap/' . config('app.siteshooter_token') . '?url='.route('project.page', $project)}}">
    <meta property="og:url" content="{{$project->url()}}">
    <meta property="og:site_name" content="{{config('app.name')}}">


    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@getlaunchsoon">
{{--    <meta name="twitter:creator" content="@SarahMaslinNir">--}}
    <meta name="twitter:title" content="{{$project->name}}">
{{--    <meta name="twitter:description" content="NEWARK - The guest list and parade of limousines with celebrities emerging from them seemed more suited to a red carpet event in Hollywood or New York than than a gritty stretch of Sussex Avenue near the former site of the James M. Baxter Terrace public housing project here.">--}}
    <meta name="twitter:image"
          content="{{'https://staging.siteshooter.app/snap/' . config('app.siteshooter_token') . '?url='.route('project.page', $project)}}">


    @if($project->custom_domain)
        <meta name="auth" property="og:auth" content="{{$project->custom_domain}}">
    @endif

    <title>{{$project->name}}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-base-100 min-h-screen flex flex-col">
<div class="navbar bg-base-100 fixed shadow">
    <span class="text-xl font-semibold mx-4 text-base-content">{{$project->name}}</span>
</div>

<div class="container mx-auto grow flex flex-col justify-center mb-12 mt-8 px-4">
    <form action="{{$version->published ? route('projects.submissions.store', [$project]) : ''}}"
          method="{{$version->published ? "POST" : "GET"}}">
        @csrf

        <div class="flex flex-col gap-4 items-center">
            @foreach(json_decode($version->block_editor_data)->blocks as $block)
                @include('projects.blocks.' . $block->type, ['data' => $block->data, 'project' => $project, 'version' => $version])
            @endforeach
        </div>
    </form>
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

