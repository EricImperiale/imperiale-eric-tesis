<?php
/** @var \App\Models\Guarantor[]|\Illuminate\Database\Eloquent\Collection $guarantor */
/** @var string $modelId */
/** @var string $modelToBeDeleted */
?>

<x-app-layout title="Confirmar Eliminación de {{ $guarantor->fullName }}">
    <x-confirm-delete
        :model="$guarantor"
        modelId="{{ $guarantor->id }}"
        modelToBeDeleted="guarantors"
        route="guarantors.processDelete"
    />
</x-app-layout>
