<dl class="col-span-2 grid grid-cols-1 gap-x-8 gap-y-16 sm:grid-cols-2 my-8">
    @foreach($data->items as $item)
        <div class="relative pl-9">
            <dt class="font-semibold text-base-content">
                <svg class="absolute left-0 top-1 h-5 w-5 text-secondary" viewBox="0 0 20 20" fill="currentColor"
                     aria-hidden="true">
                    <path fill-rule="evenodd"
                          d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                          clip-rule="evenodd"/>
                </svg>
                {{$item->headline}}
            </dt>
            <dd class="mt-2">
                {!! $item->description !!}
            </dd>
        </div>
    @endforeach
</dl>
