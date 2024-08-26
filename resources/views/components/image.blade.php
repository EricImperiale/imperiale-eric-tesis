<?php
use Illuminate\Support\Facades\Storage;
?>

<div>
    @if($model->image !== null)
        <img
            src="{{ Storage::url($model->image) }}"
            alt="{{ $model->image_alt ?? $image_alt }}"
            class="{{ $class ?? 'mt-3' }}"
        >
    @else
        <p class="mt-2 text-gray-500">No hay imagen para la propiedad.</p>
    @endif
</div>
