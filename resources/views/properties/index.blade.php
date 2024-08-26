<?php
/** @var \App\Models\Property[]|\Illuminate\Database\Eloquent\Collection $properties */
?>

<x-app-layout title="Tus Propiedades">
    <div class="container mx-auto">
        <x-auth-message />

        <div class="flex items-center justify-between mb-4">
            <h2 class="text-2xl font-bold text-gray-800">Sección de Propiedades</h2>
            <a
                href="{{ route('properties.createForm') }}"
                class="px-4 py-2 ml-2 bg-blue-600 text-white font-semibold rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
            >
                Crear Propiedad
            </a>
        </div>

        <div class="mb-4">
            <form action="" class="flex items-center space-x-4">
                <input type="text" name="filtro" placeholder="Buscar dirección o ciudad" class="p-2 border border-gray-300 rounded-md w-full" value="{{ request('filtro') }}">
                <button type="submit" class="px-4 py-2 ml-2 bg-blue-600 text-white font-semibold rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Filtrar
                </button>
            </form>
        </div>

        <div class="overflow-x-auto">
            <x-table
                :info="$properties"
                model="properties"
            >
                <thead>
                <tr>
                    <th class="px-4 py-2 text-left">Dirección</th>
                    <th class="px-4 py-2 text-left">Departamento</th>
                    <th class="px-4 py-2 text-left">Precio Alquiler</th>
                    <th class="px-4 py-2 text-left">Expensas</th>
                    <th class="px-4 py-2 text-left">Caracteristicas</th>
                    <th class="px-4 py-2 text-left">Propietario</th>
                    @if(auth()->user()->has_permission)
                        <th class="px-4 py-2 text-left">Acciones</th>
                    @endif
                </tr>
                </thead>
            </x-table>
        </div>

        <div class="mt-4">
            {{ $properties->links() }}
        </div>
    </div>
</x-app-layout>
