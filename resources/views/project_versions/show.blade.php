@extends('project_versions.layout')

@section('content')
    <form action="{{$version->published ? route('projects.submissions.store', [$project]) : ''}}"
          method="{{$version->published ? "POST" : "GET"}}">
        @csrf

        <div class="flex flex-col gap-4 items-center">
            @foreach(json_decode($version->block_editor_data)->blocks as $block)
                @if (View::exists('projects.blocks.' . $block->type))
                    @include('projects.blocks.' . $block->type, ['data' => $block->data, 'project' => $project, 'version' => $version])
                @endif
            @endforeach
        </div>
    </form>
@endsection

