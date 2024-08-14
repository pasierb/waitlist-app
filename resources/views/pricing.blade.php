@extends('layouts.landing')

@section('title')
    Pricing. Start for free or go premium.
@endsection

@section('content')
    <div class="container mx-auto py-24">
        <div class="text-center mx-auto">
            <h1 class="font-semibold text-4xl">Pricing Plans</h1>

            <div class="mt-8 prose mx-auto">
                <p>
                    At {{config('app.name')}}, we offer a generous free plan to get you started with creating beautiful waitlist
                    landing pages.
                </p>
                <p>
                    For those looking to unlock our full suite of premium features, a one-time payment provides
                    lifetime access with <strong>no recurring fees 💸</strong>.
                </p>
            </div>
        </div>

        @auth
            @if(Auth::user()->isPremium())
                <div class="max-w-4xl mx-auto my-8">
                    <div role="alert" class="alert">
                        <div></div>
                        <span>
                            You are already a premium user. Thank you for supporting {{config('app.name')}}!
                        </span>
                        <div>
                            <a href="{{route('dashboard')}}" class="btn btn-sm">Go to dashboard</a>
                        </div>
                    </div>
                </div>
            @endif
        @endauth

        <x-pricing-section />
    </div>
@endsection

