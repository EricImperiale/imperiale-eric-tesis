<?php
/** @var \App\Models\Contract[]|\Illuminate\Database\Eloquent\Collection $contract */
/** @var \App\Models\Owner[]|\Illuminate\Database\Eloquent\Collection $owners */
/** @var \App\Models\Tenant[]|\Illuminate\Database\Eloquent\Collection $tenants */
/** @var string $modelId */
/** @var string $modelToBeDeleted */
?>

<x-app-layout title="Confirmar Eliminación de Contracto en {{ $contract->property->fullAddress }}">
    <x-confirm-delete
        :model="$contract"
        modelId="{{ $contract->id }}"
        modelToBeDeleted="contracts"
        route="contracts.processDelete"
        :owner="$owners"
        :tenant="$tenants"
        :property="$properties"
    />
</x-app-layout>
