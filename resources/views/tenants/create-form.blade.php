<?php
/** @var \App\Models\PhonePrefix[]|\Illuminate\Database\Eloquent\Collection $phonePrefixes */
?>

<x-app-layout
    title="Crear Inquilino"
    class="overflow-y-scroll"
>
    <div class="container mx-auto">
        <header class="mb-4">
            <h2 class="text-2xl font-bold text-gray-800">Crear Inquilino</h2>
        </header>

        <x-action-form
            :model="null"
            :modelId="null"
            :$phonePrefixes
            action="create"
            route="tenants.processCreate"
        />
    </div>
</x-app-layout>
