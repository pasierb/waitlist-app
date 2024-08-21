<div class="text-center" style="font-family: '{{$version->header_font}}', sans-serif">
    @if($data->level == 1)
        <h1 class="text-6xl mt-20 font-semibold max-w-3xl mx-auto">
            {!! $data->text  !!}
        </h1>
    @elseif($data->level == 2)
        <h2 class="text-5xl mt-16 max-w-3xl mx-auto">
            {!! $data->text  !!}
        </h2>
    @elseif($data->level == 3)
        <h3 class="text-4xl mt-12 max-w-3xl mx-auto">
            {!! $data->text  !!}
        </h3>
    @elseif($data->level == 4)
        <h4 class="text-3xl mt-10 max-w-3xl mx-auto">
            {!! $data->text  !!}
        </h4>
    @elseif($data->level == 5)
        <h5 class="text-2xl mt-8 max-w-3xl mx-auto">
            {!! $data->text  !!}
        </h5>
    @elseif($data->level == 6)
        <h6 class="text-xl mt-4 max-w-3xl mx-auto">
            {!! $data->text  !!}
        </h6>
    @endif
</div>
