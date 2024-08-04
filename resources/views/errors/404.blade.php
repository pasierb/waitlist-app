@extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Not Found'))
@section('explanation')
    <div class="prose text-center">
        <p>Whatever you were looking for, it's not here 🤷</p>
        <p>We have been notified about that though and will check it out 👍</p>
    </div>
@endsection
