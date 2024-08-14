<div class="flex flex-row flex-wrap gap-4 justify-center max-w-6xl">
    @foreach($data->items as $item)
        <div class="border rounded-lg bg-base-200/60 p-4 max-w-sm">
            <strong>{{$item->headline}}</strong>
            <p>{{$item->description}}</p>
        </div>
    @endforeach
</div>
