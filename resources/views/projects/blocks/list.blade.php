<?php
$listClass = $data->style === 'ordered' ? 'list-decimal' : 'list-disc';
?>

<div class="prose w-full max-w-3xl mx-auto">
    <ul class="{{ $listClass }}">
        @foreach($data->items as $item)
            <li>{!! Illuminate\Mail\Markdown::parse($item) !!}</li>
        @endforeach
    </ul>
</div>
