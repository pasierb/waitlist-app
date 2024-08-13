<div class="w-full flex flex-col items-center gap-2 px-4">
    @foreach($data->items as $item)
        <div class="collapse collapse-plus bg-base-200 w-full max-w-3xl">
            <input type="radio" name="my-accordion-3" />
            <div class="collapse-title text-lg font-medium">
                {{$item->question}}
            </div>
            <div class="collapse-content">
                <p>{{$item->answer}}</p>
            </div>
        </div>
    @endforeach
</div>
