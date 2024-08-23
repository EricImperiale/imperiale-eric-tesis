<?php
use Illuminate\Support\Facades\Storage;
?>

<div>
    <!-- TODO: Agregar alt -->
    @if($model->image !== null)
        <img
            src="{{ Storage::url($model->image) }}"
            alt="{{ $alt ?? $model->image_alt }}"
            class="mt-3">
    @else
        <p class="mt-2 text-gray-500">No hay imagen para la propiedad.</p>
    @endif
</div>
