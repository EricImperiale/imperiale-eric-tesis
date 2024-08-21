<?php
/** @var \App\Models\Tenant[]|\Illuminate\Database\Eloquent\Collection $model */
/** @var string $modelId */
/** @var string $modelToBeDeleted */
?>

<x-app-layout title="Confirmar Eliminación de {{ $model->fullName }}">
    <x-confirm-delete
        :model="$model"
        modelId="{{ $model->id }}"
        modelToBeDeleted="owners"
        route="owners.processDelete"
    />
</x-app-layout>
