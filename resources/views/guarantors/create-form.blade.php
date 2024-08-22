<?php
/** @var \App\Models\PhonePrefix[]|\Illuminate\Database\Eloquent\Collection $phonePrefixes */
?>

<x-app-layout
    title="Crear Garante"
    class="overflow-y-scroll"
>
    <div class="container mx-auto">
        <header class="mb-4">
            <h2 class="text-2xl font-bold text-gray-800">Crear Garante</h2>
        </header>

        <x-action-form
            :model="null"
            :modelId="null"
            :$phonePrefixes
            action="create"
            route="guarantors.processCreate"
            formType="actors"
        />
    </div>
</x-app-layout>
