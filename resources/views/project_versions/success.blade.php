@extends('project_versions.layout')

@section('content')
    <div class="flex flex-col gap-4 items-center">
        @foreach(json_decode($version->success_editor_data)->blocks as $block)
            @if (View::exists('projects.blocks.' . $block->type))
                @include('projects.blocks.' . $block->type, ['data' => $block->data])
            @endif
        @endforeach
    </div>
@endsection
