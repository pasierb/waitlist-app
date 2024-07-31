<?php
$classes = [];

if ($data->withBorder) {
    $classes[] = 'border border-2';
}

if ($data->stretched) {
    $classes[] = 'w-full';
}

if ($data->withBackground) {
    $classes[] = 'bg-base-200 p-4';
}
?>

<img src="{{$data->url}}" class="{{implode(' ', $classes)}}" />
