@php use Illuminate\Support\Arr; @endphp
@extends('project_versions.layout')

<?php
$emailInputBlock = Arr::first(json_decode($version->block_editor_data)->blocks, function ($block) {
    return $block->type === 'email-input';
});

$headings2 = Arr::where(json_decode($version->block_editor_data)->blocks, function ($block) {
    return $block->type === 'header' && $block->data->level === 2;
});
?>

@if ($emailInputBlock)
    @section('navbar')
        <div class="flex justify-center">
            @foreach($headings2 as $heading)
                <a href="#{{$heading->id}}" class="btn btn-link">{{$heading->data->text}}</a>
            @endforeach

            <a href="#{{$emailInputBlock->id}}" class="btn btn-primary"
               type="submit">{{$emailInputBlock->data->button}}</a>
        </div>
    @endsection
@endif


@section('content')
    <form action="{{$version->published ? route('projects.submissions.store', [$project]) : ''}}"
          method="{{$version->published ? "POST" : "GET"}}">
        @csrf

        <div class="flex flex-col gap-4 items-center">
            @foreach(json_decode($version->block_editor_data)->blocks as $block)
                @if (View::exists('projects.blocks.' . $block->type))
                    @include('projects.blocks.' . $block->type, ['block' => $block, 'data' => $block->data, 'project' => $project, 'version' => $version])
                @endif
            @endforeach
        </div>
    </form>
@endsection

