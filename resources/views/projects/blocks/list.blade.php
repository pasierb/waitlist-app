<?php
$listClass = $data->style === 'ordered' ? 'list-decimal' : 'list-disc';
?>

<div class="prose w-full max-w-3xl mx-auto">
    <ul class="{{ $listClass }}">
        @foreach($data->items as $item)
            <li>{!! $item !!}</li>
        @endforeach
    </ul>
</div>
