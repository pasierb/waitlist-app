<?php
$listClass = $data->style === 'ordered' ? 'list-decimal' : 'list-disc';
?>


<div class="prose">
    <ul class="{{ $listClass }}">
        @foreach($data->items as $item)
            <li>{!! $item !!}</li>
        @endforeach
    </ul>
</div>
