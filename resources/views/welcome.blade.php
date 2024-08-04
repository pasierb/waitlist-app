@extends('layouts.landing')

@section('title')
    Build ⚡Buzz⚡ with a Stunning Waitlist Page
@endsection

@section('content')
    <div class="hero bg-base-100 text-content py-24">
        <div class="hero-content text-center">
            <div class="max-w-xl">
                <h1 class="text-5xl font-bold">
                    Build ⚡Buzz⚡ with a Stunning Waitlist Page
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

    <div class="bg-base-300 py-24 px-4">
        <div class="relative container mx-auto">
            <img src="img/editor.png" class="border rounded-lg w-full max-w-4xl mx-auto" alt="">
            <div class="absolute -inset-x-20 bottom-0 bg-gradient-to-t from-base-300 pt-[7%]"></div>
        </div>
    </div>

    <div class="bg-base-100 text-base-content py-24 px-4">
        <div class="text-center mx-auto">
            <h1 class="font-semibold text-4xl">Pricing</h1>

            <div class="mt-8 prose mx-auto">
                <p>
                    Enjoy generous free plan to get you started with creating beautiful waitlist
                    landing pages.
                </p>
                <p>
                    For those looking to unlock our full suite of premium features, a one-time payment provides
                    lifetime access with <strong>no recurring fees 💸</strong>.
                </p>
            </div>
        </div>

        <x-pricing-section />
    </div>
@endsection
