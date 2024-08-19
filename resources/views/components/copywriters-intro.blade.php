<div class="bg-base-100 py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl sm:text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Meet our virtual copywriters</h2>
        </div>
        <ul role="list" class="mx-auto mt-20 grid max-w-2xl grid-cols-1 gap-x-6 gap-y-20 sm:grid-cols-2 lg:max-w-4xl lg:gap-x-8 xl:max-w-none">
            @foreach(\App\Services\CopyWriters\CopyWriterPersona::availablePersonas() as $key => $persona)
                <li class="flex flex-col gap-6 xl:flex-row">
                    <img class="aspect-[4/5] w-52 flex-none rounded-2xl object-cover"
                         src="{{ $persona->imageUrl }}"
                         alt="">
                    <div class="flex-auto">
                        <h3 class="text-lg font-semibold leading-8 tracking-tight text-gray-900">
                            {{ $persona->name }}
                        </h3>
{{--                        <p class="text-base leading-7 text-gray-600">Senior Designer</p>--}}
                        <p class="mt-6 text-sm leading-7 text-gray-600">
                            {{ $persona->description }}
                        </p>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
