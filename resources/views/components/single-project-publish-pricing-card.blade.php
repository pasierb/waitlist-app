<?php
$features = [
    'Access to 4 virtual copywriters',
    'Unlimited submissions',
    'much more',
    '...and any future updates 🎉',
];
?>

<div class="border rounded-lg py-4 px-6">
    <h3 class="text-base font-semibold leading-7 text-gray-900">
        One-time payment per published waitlist
    </h3>

    <p class="mt-6 flex items-end gap-x-1 flex-row">
        <span class="text-5xl font-bold tracking-tight text-gray-900">
            ${{$price}}
        </span>
            <span class="ml-2">
                asd
            </span>
    </p>

    <div class="mt-10">
        <a href="{{ route('checkout', ['project_version_id' => $projectVersion->id]) }}"
           class="btn btn-primary w-full">
            Select
        </a>
    </div>

        <ul role="list" class="mt-6 space-y-3 text-sm leading-6">
            @foreach($features as $feature)
                <li class="flex gap-x-3">
                    <x-heroicon-o-check class="w-5 h-5"/>
                    <span>{{$feature}}</span>
                </li>
            @endforeach
        </ul>
</div>
