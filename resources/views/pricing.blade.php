@extends('layouts.landing')

<?php
$freeFeatures = [
    'Unlimited projects',
    'Unlimited submissions',
    'Fully customizable templates',
];
$lifetimeFeatures = [
    'Everything in Free',
    'Remove LaunchLoom branding',
    'Custom domain',
];
?>

@section('content')
    <div class="container mx-auto py-24">
        <div class="text-center mx-auto">
            <h1 class="font-semibold text-4xl">Pricing Plans</h1>

            <div class="mt-8 prose mx-auto">
                <p>
                    At LaunchLoom, we offer a generous free plan to get you started with creating beautiful waitlist
                    landing pages.
                </p>
                <p>
                    For those looking to unlock our full suite of premium features, a one-time payment provides
                    lifetime access with <strong>no recurring fees 💸</strong>.
                </p>
            </div>
        </div>

        <div class="mt-20 px-8 max-w-5xl mx-auto">
            <div class="grid w-full grid-cols-1 gap-x-8 gap-y-16 md:grid-cols-2">
                <x-pricing-card
                                plan="free"
                                 :features="$freeFeatures"/>

                <x-pricing-card title="Premium" price="$65"
                                plan="lifetime"
                                 :features="$lifetimeFeatures">
                    <x-slot:price-note>
                        One-time payment
                    </x-slot:price-note>
                </x-pricing-card>
            </div>
        </div>
    </div>
@endsection

