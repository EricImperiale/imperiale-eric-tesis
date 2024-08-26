<?php
/** @var \App\Models\Property[]|\Illuminate\Database\Eloquent\Collection $property */
?>

<x-app-layout
    title="Propiedad :: {{ $property->fullAddress }}"
    class="overflow-y-auto"
>
    <div class="container mx-auto">
        <header class="mb-6">
            <h2 class="text-2xl font-semibold text-gray-900">Detalle de Propiedad: {{ $property->fullAddress }}</h2>
        </header>

        <div class="mb-6">
            <a
                href="{{ route('properties.index') }}"
                class="inline-block px-4 py-2 text-white bg-blue-600 rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50"
            >
                Volver
            </a>
        </div>

        <div class="bg-white p-6 border border-gray-300 rounded-lg shadow-md">
            <div class="flex flex-col md:flex-row">
                <div class="md:w-1/3 mb-6 md:mb-0 mr-10">
                    <x-image
                        :model="$property"
                        class="w-full h-64 object-cover rounded-lg shadow-md"
                    />
                </div>

                <div class="md:w-2/3 ">
                    <div class="mb-4">
                        <h3 class="text-xl font-semibold text-gray-900">Dirección</h3>
                        <p class="text-gray-700">{{ $property->fullAddress }}</p>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-xl font-semibold text-gray-900">Ciudad</h3>
                        <p class="text-gray-700">{{ $property->city }}</p>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-xl font-semibold text-gray-900">Provincia</h3>
                        <p class="text-gray-700">{{ $property->state }}</p>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-xl font-semibold text-gray-900">Barrio</h3>
                        <p class="text-gray-700">{{ $property->neighborhood }}</p>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-xl font-semibold text-gray-900">Código Postal</h3>
                        <p class="text-gray-700">{{ $property->zip_code }}</p>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-xl font-semibold text-gray-900">Área Total</h3>
                        <p class="text-gray-700">{{ $property->total_area }}</p>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-xl font-semibold text-gray-900">Área Cubierta</h3>
                        <p class="text-gray-700">{{ $property->covered_area }}</p>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-xl font-semibold text-gray-900">Descripción</h3>
                        <p class="text-gray-700">{{ $property->description ?? 'No hay descripción para esta propiedad.' }}</p>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-xl font-semibold text-gray-900">Precio del Alquiler</h3>
                        <p class="text-gray-700">{{ $property->rental_price }}</p>
                    </div>

                    @if($property->propertyType->property_type_id !== 1)
                        <div class="mb-4">
                            <h3 class="text-xl font-semibold text-gray-900">Expensas</h3>
                            <p class="text-gray-700">{{ $property->expenses }}</p>
                        </div>

                        <div class="mb-4">
                            <h3 class="text-xl font-semibold text-gray-900">Piso</h3>
                            <p class="text-gray-700">{{ $property->floor }}</p>
                        </div>

                        <div class="mb-4">
                            <h3 class="text-xl font-semibold text-gray-900">Número de Departamento</h3>
                            <p class="text-gray-700">{{ $property->apartment_number }}</p>
                        </div>
                    @endif

                    <div class="mb-4">
                        <h3 class="text-xl font-semibold text-gray-900">Uso Profesional</h3>
                        <p class="text-gray-700">{{ $property->is_for_professional_use  }}</p>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-xl font-semibold text-gray-900">Ambientes</h3>
                        <p class="text-gray-700">3</p>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-xl font-semibold text-gray-900">Cuartos</h3>
                        <p class="text-gray-700">2</p>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-xl font-semibold text-gray-900">Baños</h3>
                        <p class="text-gray-700">1</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
