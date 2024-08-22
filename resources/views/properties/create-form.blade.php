<?php
/** @var \App\Models\Owner[]|\Illuminate\Database\Eloquent\Collection $owners */
/** @var \App\Models\PropertyType[]|\Illuminate\Database\Eloquent\Collection $propertyTypes */
?>

<x-app-layout
    title="Crear Propiedad"
    class="overflow-y-scroll"
>
    <div class="container mx-auto">
        <header class="mb-4">
            <h2 class="text-2xl font-bold text-gray-800">Crear Propiedad</h2>
        </header>

        <x-action-form
            :model="null"
            :modelId="null"
            :$propertyTypes
            :$owners
            formType="properties"
            action="create"
            route="properties.processCreate"
        />
    </div>
</x-app-layout>
