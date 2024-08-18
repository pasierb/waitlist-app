<div class="prose text-center mb-4" id="{{$block->id}}">
    @if($data->level == 1)
        <h1 class="text-6xl mt-20">
            {!! $data->text  !!}
        </h1>
    @elseif($data->level == 2)
        <h2 class="text-5xl mt-16">
            {!! $data->text  !!}
        </h2>
    @elseif($data->level == 3)
        <h3 class="text-4xl mt-12">
            {!! $data->text  !!}
        </h3>
    @elseif($data->level == 4)
        <h4 class="text-3xl mt-10">
            {!! $data->text  !!}
        </h4>
    @elseif($data->level == 5)
        <h5 class="text-2xl mt-8">
            {!! $data->text  !!}
        </h5>
    @elseif($data->level == 6)
        <h6 class="text-xl mt-4">
            {!! $data->text  !!}
        </h6>
    @endif
</div>
