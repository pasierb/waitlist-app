<!doctype html>
<html lang="en" data-theme="{{$project->color_theme}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    @vite('resources/css/project.css')
</head>
<body class="bg-base-100 min-h-screen flex flex-col justify-center">

<div class="container mx-auto">
    <form action="{{route('projects.submissions.store', [$project])}}" method="POST">
        @csrf

        <div class="flex flex-col gap-4 items-center">
            @foreach(json_decode($project->block_editor_data)->blocks as $block)
                @include('projects.blocks.' . $block->type, ['data' => $block->data])
            @endforeach
        </div>
    </form>
</div>

</body>
</html>

