<?php
/** @var \App\Models\Guarantor[]|\Illuminate\Database\Eloquent\Collection $guarantor */
/** @var \App\Models\PhonePrefix[]|\Illuminate\Database\Eloquent\Collection $phonePrefixes */
?>

<x-app-layout
    title="Editar Garante :: {{ $guarantor->fullName }}"
    class="overflow-y-scroll"
>
    <div class="container mx-auto">
        <header class="mb-4">
            <h2 class="text-2xl font-bold text-gray-800">Editar Inquilino</h2>
            <p class="mt-2 text-sm text-gray-600">Estás editando a <b>{{ $guarantor->fullName }}</b> con DNI <b>{{ $guarantor->dni }}</b>.</p>
        </header>

        <x-action-form
            :model="$guarantor"
            :modelId="$guarantor->id"
            :$phonePrefixes
            action="edit"
            route="guarantors.processUpdate"
        />
    </div>
</x-app-layout>
