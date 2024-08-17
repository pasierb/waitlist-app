<?php

use Illuminate\Support\Arr;

$classes = [
    1 => 'text-5xl',
];
$cssClass = Arr::get($classes, $data->level, '');
?>

<div class="prose text-center mb-4 mt-20">
    <h{{ $data->level }} class="font-semibold {{$cssClass}}">
    {!! $data->text  !!}
    </h{{ $data->level }}>
</div>
