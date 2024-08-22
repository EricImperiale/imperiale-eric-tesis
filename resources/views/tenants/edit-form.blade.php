<?php
/** @var \App\Models\Tenant[]|\Illuminate\Database\Eloquent\Collection $tenant */
/** @var \App\Models\PhonePrefix[]|\Illuminate\Database\Eloquent\Collection $phonePrefixes */
?>

<x-app-layout
    title="Editar Inquilino :: {{ $tenant->fullName }}"
    class="overflow-y-scroll"
>
    <div class="container mx-auto">
        <header class="mb-4">
            <h2 class="text-2xl font-bold text-gray-800">Editar Inquilino</h2>
            <p class="mt-2 text-sm text-gray-600">Estás editando a <b>{{ $tenant->fullName }}</b> con DNI <b>{{ $tenant->dni }}</b>.</p>
        </header>

        <x-action-form
            :model="$tenant"
            :modelId="$tenant->id"
            :$phonePrefixes
            action="edit"
            route="tenants.processUpdate"
            formType="actors"
        />
    </div>
</x-app-layout>
