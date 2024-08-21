<?php
/** @var \App\Models\Tenant[]|\Illuminate\Database\Eloquent\Collection $tenant */
/** @var string $modelId */
/** @var string $modelToBeDeleted */
?>


<x-app-layout title="Confirmar Eliminación de {{ $tenant->fullName }}">
    <x-confirm-delete
        :model="$tenant"
        modelId="{{ $tenant->id }}"
        modelToBeDeleted="tenants"
        route="tenants.processDelete"
    />
</x-app-layout>
