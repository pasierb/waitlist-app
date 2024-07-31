<?php
$whatsIncluded = [
    'Unlimited projects',
    'Unlimited submissions',
    '...and any future updates 🎉',
]
?>

<div class="py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto mt-16 max-w-2xl rounded-3xl border sm:mt-20 lg:mx-0 lg:flex lg:max-w-none">
            <div class="p-8 sm:p-10 lg:flex-auto">
                <h3 class="text-2xl font-bold tracking-tight">
                    Lifetime access
                </h3>
                <p class="mt-6 text-base leading-7">
                    Pay once, use forever. Get unlimited access to all features, updates, and premium support for a lifetime. No recurring fees.
                </p>
                <div class="mt-10 flex items-center gap-x-4">
                    <h4 class="flex-none text-sm font-semibold leading-6 text-secondary">What’s included</h4>
                    <div class="h-px flex-auto bg-gray-100"></div>
                </div>
                <ul role="list"
                    class="mt-8 grid grid-cols-1 gap-4 text-sm leading-6 text-gray-600 sm:grid-cols-2 sm:gap-6">
                    @foreach($whatsIncluded as $benefit)
                        <li class="flex gap-x-3">
                            <x-heroicon-o-check class="h-6 w-6"></x-heroicon-o-check>
                            {{$benefit}}
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="-mt-2 p-2 lg:mt-0 lg:w-full lg:max-w-md lg:flex-shrink-0">
                <div
                    class="bg-base-300 text-content rounded-2xl py-10 text-center border lg:flex lg:flex-col lg:justify-center lg:py-16">
                    <div class="mx-auto max-w-xs px-8">
                        <p class="text-base font-semibold">Pay once, own it forever</p>
                        <p class="mt-6 flex items-baseline justify-center gap-x-2">
                            <span class="text-5xl font-bold tracking-tight">${{config('app.lifetime_access_price')}}</span>
                            <span class="text-sm font-semibold leading-6 tracking-wide">USD</span>
                        </p>
                        <a href="{{route('checkout')}}" class="btn btn-primary mt-2">
                            Get access
                        </a>
                        <p class="mt-6 text-xs leading-5">
                            Invoices and receipts available for easy company reimbursement
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
