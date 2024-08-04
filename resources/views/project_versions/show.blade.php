<!doctype html>
<html lang="en" data-theme="{{$version->color_theme}}">
<head>
    <x-ga/>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="image"
          property="og:image"
          content="{{'https://staging.siteshooter.app/snap/e9ec1a3140862afddf3c19b09941e8f0b1b0c707625b7c64e4250175a3ead3b7?url='.route('project.page', $project)}}">
    <title>{{$project->name}}</title>

    @vite('resources/css/project.css')
</head>
<body class="bg-base-100 min-h-screen flex flex-col">

<div class="container mx-auto grow flex flex-col justify-center mb-24">
    <form action="{{route('projects.submissions.store', [$project])}}" method="POST">
        @csrf

        <div class="flex flex-col gap-4 items-center">
            @foreach(json_decode($version->block_editor_data)->blocks as $block)
                @include('projects.blocks.' . $block->type, ['data' => $block->data])
            @endforeach
        </div>
    </form>
</div>

<footer>
    <div class="container mx-auto text-center py-4">
        <p class="text-sm">
            Powered by
            <a class="link" href="{{route('root')}}">
                <img src="{{asset('img/logo.png')}}" class="w-6 h-6 inline-block"/>
                LaunchLoom.io
            </a>
        </p>
    </div>
</footer>

</body>
</html>

