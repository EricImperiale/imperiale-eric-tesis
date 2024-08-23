<?php
/** @var \App\Models\Property[]|\Illuminate\Database\Eloquent\Collection $property */
/** @var string $modelId */
/** @var string $modelToBeDeleted */
?>

<x-app-layout title="Confirmar Eliminación de {{ $property->fullAddress }}">
    <x-confirm-delete
        :model="$property"
        modelId="{{ $property->id }}"
        modelToBeDeleted="properties"
        route="properties.processDelete"
    />
</x-app-layout>
