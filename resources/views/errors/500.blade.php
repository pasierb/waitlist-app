@extends('errors::minimal')

@section('title', __('Server Error'))
@section('code', '500')
@section('message', __('Server Error'))

@section('explanation')
    <p>
        Apologies, but something went wrong on our end. Please try again later.
    </p>

    <p>
        We are notified of this issue and will work to resolve it as soon as possible.
    </p>
@endsection
