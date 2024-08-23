<?php
$lifetimeFeatures = [
    'Access to 4 virtual copywriters',
    'Unlimited submissions',
    'much more',
    '...and any future updates 🎉',
];
?>

<div>
    <div class="mt-20 px-8 max-w-5xl mx-auto">
        <div class="w-full flex flex-row justify-center gap-x-8 gap-y-16 md:grid-cols-2">
            <x-pricing-card plan="single"
                            :features="$lifetimeFeatures">
                <x-slot:price-note>
                    One-time payment per published waitlist
                </x-slot:price-note>
            </x-pricing-card>
        </div>
    </div>
</div>
