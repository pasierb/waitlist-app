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

<div>
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
