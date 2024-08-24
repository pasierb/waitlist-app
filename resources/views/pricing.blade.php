@extends('layouts.landing')

@section('title')
    Pricing. Start for free or go premium.
@endsection

@section('content')
    <div class="container mx-auto py-24">
        <div class="text-center mx-auto">
            <h1 class="font-semibold text-4xl">Pricing</h1>

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

        <x-pricing-section />
    </div>
@endsection

