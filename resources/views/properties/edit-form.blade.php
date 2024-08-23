<?php
/** @var \App\Models\Property[]|\Illuminate\Database\Eloquent\Collection $property */
/** @var \App\Models\Owner[]|\Illuminate\Database\Eloquent\Collection $owners */
/** @var \App\Models\PropertyType[]|\Illuminate\Database\Eloquent\Collection $propertyTypes */
?>

<x-app-layout
    title="Editar Propiedad"
    class="overflow-y-scroll"
>
    <div class="container mx-auto">
        <header class="mb-4">
            <h2 class="text-2xl font-bold text-gray-800">Editar Propiedad</h2>
        </header>

        <x-action-form
            :model="$property"
            :modelId="$property->id"
            :$propertyTypes
            :$owners
            formType="properties"
            action="edit"
            route="properties.processUpdate"
        />
    </div>
</x-app-layout>
