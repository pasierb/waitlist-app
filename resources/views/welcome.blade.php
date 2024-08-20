@extends('layouts.landing')

@section('title')
    Build ⚡Buzz⚡ with a Stunning Waitlist Page
@endsection

@section('content')
    <div class="hero bg-base-200 text-content py-36">
        <div class="hero-content text-center">
            <div class="max-w-xl">
                <h1 class="text-5xl font-bold sm:text-6xl">
                    Build waitlists that look like <span class="bg-amber-200/20">pages, not forms</span>
                </h1>

                <div class="py-6">
                    <p class="text-xl">
                        Create eye-catching waitlist pages in minutes. <strong>No coding required.</strong>
                        Capture and manage potential customers with waitlists that look like real pages, not forms.
                    </p>
                </div>

                <a href="{{route('register')}}" class="btn btn-lg btn-neutral">Try for free!</a>
            </div>
        </div>
    </div>

    <div class="relative isolate pt-14">
        <svg
            class="absolute inset-0 -z-10 h-full w-full stroke-gray-200 [mask-image:radial-gradient(100%_100%_at_top_right,white,transparent)]"
            aria-hidden="true">
            <defs>
                <pattern id="83fd4e5a-9d52-42fc-97b6-718e5d7ee527" width="200" height="200" x="50%" y="-1"
                         patternUnits="userSpaceOnUse">
                    <path d="M100 200V.5M.5 .5H200" fill="none"/>
                </pattern>
            </defs>
            <svg x="50%" y="-1" class="overflow-visible fill-gray-50">
                <path
                    d="M-100.5 0h201v201h-201Z M699.5 0h201v201h-201Z M499.5 400h201v201h-201Z M-300.5 600h201v201h-201Z"
                    stroke-width="0"/>
            </svg>
            <rect width="100%" height="100%" stroke-width="0" fill="url(#83fd4e5a-9d52-42fc-97b6-718e5d7ee527)"/>
        </svg>
        <div class="mx-auto max-w-7xl px-6 py-24 sm:py-32 lg:flex lg:items-center lg:gap-x-10 lg:px-8 lg:py-40">
            <div class="sm:mt-24 lg:mt-0 lg:flex-shrink-0 lg:flex-grow">
                <div class="mx-auto w-[30rem] max-w-full drop-shadow-xl">
                    <p class="text-xl mb-8 text-center font-semibold text-secondary">
                        Demo waitlist page build with LaunchSoon 👇
                    </p>

                    <div class="mockup-browser border-base-300 border">
                        <div class="mockup-browser-toolbar">
                            <div class="input border-base-300 border text-sm">https://getlaunchsoon.com/p/frobozzle
                            </div>
                        </div>
                        <div class="border-base-300 flex justify-center border-t">
                            <img src="img/waitlist-page.png" class="" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="mx-auto max-w-2xl lg:mx-0 lg:flex-auto mt-16">
                <div class="flex">
                    <div
                        class="relative flex items-center gap-x-4 rounded-full px-4 py-1 text-sm leading-6 text-gray-600 ring-1 ring-gray-900/10 hover:ring-gray-900/20">
                        <span class="font-semibold text-indigo-600">Sample</span>
                        <span class="h-4 w-px bg-gray-900/10" aria-hidden="true"></span>
                        <a href="{{ route('examples') }}" class="flex items-center gap-x-1">
                            <span class="absolute inset-0" aria-hidden="true"></span>
                            See examples gallery
                            <svg class="-mr-2 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                 aria-hidden="true">
                                <path fill-rule="evenodd"
                                      d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <h1 class="mt-10 max-w-lg text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">
                    Expertly Crafted Waitlists That Convert
                </h1>
                <p class="mt-6 text-lg leading-8 text-gray-600">
                    At LaunchSoon, we understand what it takes to create a waitlist landing page that truly converts.
                    We’ve researched the key elements that drive sign-ups and taught our <strong>virtual
                        copywriters</strong> to help you
                    craft compelling content effortlessly. Whether it’s persuasive copy, eye-catching design, or the
                    right call-to-action, our tools and insights are here to ensure your waitlist captures and engages
                    your audience effectively.
                </p>
                <div class="mt-10 flex items-center gap-x-6">
                    <a href="#" class="btn btn-primary">Get started</a>
                    <a href="#" class="btn btn-ghost">Learn more <span aria-hidden="true">→</span></a>
                </div>
            </div>
        </div>
    </div>

    <x-copywriters-intro></x-copywriters-intro>

    <?php
    $features = [
        [
            "headline" => "Create Your Page:",
            "text" => "Start by setting up your waitlist landing page in just a few clicks.",
            "icon" => "heroicon-o-clipboard-document-list"
        ],
        [
            "headline" => "Write Your Copy:",
            "text" => "Use one of our AI copy-writing assistants to craft compelling text that resonates with your audience, or bring your own words to life.",
            "icon" => "heroicon-o-pencil"
        ],
        [
            "headline" => "Adjust the Design:",
            "text" => "Choose from over 30 beautiful color themes to match your brand’s style.",
            "icon" => "heroicon-o-paint-brush"
        ],
        [
            "headline" => "Customize Everything:",
            "text" => "Our Notion-like visual block editor lets you tweak and tailor every detail to your liking.",
            "icon" => "heroicon-o-wrench-screwdriver"
        ]
    ];
    ?>
    <div class="overflow-hidden bg-base-300 text-base-content py-24 sm:py-32">
        <div class="mx-auto max-w-7xl md:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-x-8 gap-y-16 sm:gap-y-20 lg:grid-cols-2 lg:items-start">
                <div class="px-6 md:px-0 lg:pr-4 lg:pt-4">
                    <div class="mx-auto max-w-2xl lg:mx-0 lg:max-w-lg">
                        <h2 class="text-base font-semibold leading-7 text-secondary">How it works</h2>
                        <p class="mt-2 text-3xl font-bold tracking-tight sm:text-4xl">
                            Build waitlists that look like pages not forms
                        </p>
                        <p class="mt-6 text-lg leading-8 text-gray-600">
                            A well-designed waitlist page does more than just collect emails—it builds anticipation and
                            engages your audience. At LaunchSoon, we know what it takes to create a high-converting
                            waitlist, and we’ve built our platform to help you do just that. From persuasive copy to
                            sleek design, we’ve got you covered.
                        </p>
                        <dl class="mt-10 max-w-xl space-y-8 text-base leading-7 lg:max-w-none">
                            @foreach($features as $feature)
                                <div class="relative pl-9">
                                    <dt class="inline font-semibold">
                                        @svg($feature["icon"], "h-5 w-5 text-indigo-600 absolute left-1")
                                        {{ $feature["headline"] }}
                                    </dt>
                                    <dd class="inline">
                                        {{ $feature["text"] }}
                                    </dd>
                                </div>
                            @endforeach
                        </dl>
                    </div>
                </div>
                <div class="sm:px-6 lg:px-0">
                    <div
                        class="relative isolate overflow-hidden bg-indigo-500 px-6 pt-8 sm:mx-auto sm:max-w-2xl sm:rounded-3xl sm:pl-16 sm:pr-0 sm:pt-16 lg:mx-0 lg:max-w-none">
                        <div
                            class="absolute -inset-y-px -left-3 -z-10 w-full origin-bottom-left skew-x-[-30deg] bg-indigo-100 opacity-20 ring-1 ring-inset ring-white"
                            aria-hidden="true"></div>
                        <div class="mx-auto max-w-2xl sm:mx-0 sm:max-w-none">
                            <div class="w-screen overflow-hidden rounded-tl-xl bg-gray-900 ring-1 ring-white/10">
                                <img src="img/launchsoon-dashboard.png" width="800px" class="aspect-auto" alt="">
                            </div>
                        </div>
                        <div class="pointer-events-none absolute inset-0 ring-1 ring-inset ring-black/10 sm:rounded-3xl"
                             aria-hidden="true"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
