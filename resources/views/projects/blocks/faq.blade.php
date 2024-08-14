<div class="w-full flex flex-col items-center gap-2 px-4">
    @foreach($data->items as $item)
        <details class="collapse bg-base-200 max-w-4xl collapse-plus">
            <summary class="collapse-title text-xl font-medium">{{$item->question}}</summary>
            <div class="collapse-content">
                <p>{{$item->answer}}</p>
            </div>
        </details>
    @endforeach
</div>
