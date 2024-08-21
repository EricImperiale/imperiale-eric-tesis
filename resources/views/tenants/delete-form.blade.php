<?php
/** @var \App\Models\Owner[]|\Illuminate\Database\Eloquent\Collection $tenant */
/** @var \App\Models\PhonePrefix[]|\Illuminate\Database\Eloquent\Collection $phonePrefixes */
?>

<x-app-layout
    title="Eliminar Inquilino :: {{ $tenant->fullName }}"
    class="overflow-y-scroll"
>

    <div class="container mx-auto">
        <header class="mb-4">
            <h2 class="text-2xl font-bold text-gray-800">Eliminar Inquilino</h2>
            <p class="mt-2 text-sm text-gray-600">Vas a eliminar a <b>{{ $tenant->fullName }}</b> con DNI <b>{{ $tenant->dni }}</b>.</p>
        </header>
    </div>
</x-app-layout>

