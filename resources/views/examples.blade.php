@extends('layouts.landing')

@section('title')
    Pricing. Start for free or go premium.
@endsection

<?php
    $examples = [
        [
            'imageUrl' => asset('img/waitlist-page.png'),
            'name' => 'Frobozzle',
            'description' => 'Demo project for fake product',
            'projectUrl' => 'https://github.com/frobozzle/frobozzle',
        ]
    ]
?>

@section('content')
    <div class="bg-white">
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
            <h2 id="products-heading" class="sr-only">Products</h2>

            <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:gap-x-8">
                @foreach($examples as $example)
                <a href="{{ $example['projectUrl'] }}" target="_blank" class="group">
                    <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg sm:aspect-h-3 sm:aspect-w-2">
                        <img src="{{ $example['imageUrl'] }}" alt="Person using a pen to cross a task off a productivity paper card." class="h-full w-full object-cover object-center group-hover:opacity-75">
                    </div>
                    <div class="mt-4 flex items-center justify-between text-base font-medium text-gray-900">
                        <h3>{{ $example['name'] }}</h3>
                        <p>

                            @svg('heroicon-o-arrow-top-right-on-square', 'w-4 h-4')
                        </p>
                    </div>
                    <p class="mt-1 text-sm italic text-gray-500">{{ $example['description'] }}</p>
                </a>
                @endforeach
            </div>
        </div>
    </div>


@endsection
