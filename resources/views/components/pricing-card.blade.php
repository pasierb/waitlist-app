<div class="border rounded-lg py-4 px-6">
    <h3 id="tier-basic" class="text-base font-semibold leading-7 text-gray-900">
        {{$title}}
    </h3>

    <p class="mt-6 flex items-end gap-x-1 flex-row">
        <span class="text-5xl font-bold tracking-tight text-gray-900">
            {{$price}}
        </span>
        @isset($priceNote)
            <span class="ml-2">
                {{$priceNote}}
            </span>
        @endisset
    </p>

    <div class="mt-10">
        <a href="{{$selectRoute}}"
           class="btn {{$plan == 'lifetime' ? 'btn-primary' : ''}} w-full">
            Select
        </a>
    </div>

    @isset($features)
        <ul role="list" class="mt-6 space-y-3 text-sm leading-6">
            @foreach($features as $feature)
                <li class="flex gap-x-3">
                    <x-heroicon-o-check class="w-5 h-5"/>
                    <span>{{$feature}}</span>
                </li>
            @endforeach
        </ul>
    @endisset
</div>
