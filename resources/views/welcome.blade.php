@extends('layouts.landing')

@section('content')
    <div class="hero bg-base-100 text-content py-24">
        <div class="hero-content text-center">
            <div class="max-w-xl">
                <h1 class="text-5xl font-bold">
                    Build Buzz with a Stunning Waitlist Page
                </h1>

                <div class="py-6">
                    <p>
                        Create eye-catching waitlist landing pages in minutes. <strong>No coding required.</strong>
                        Capture and manage potential customers effortlessly with our intuitive visual editor.
                    </p>
                </div>

                <a href="{{route('dashboard')}}" class="btn btn-lg btn-neutral">Try it out!</a>
            </div>
        </div>
    </div>

    <x-pricing></x-pricing>
@endsection
