<?php
/** @var \App\Models\Tenant[]|\Illuminate\Database\Eloquent\Collection $tenants */
/** @var \App\Searches\BaseSearches $baseSearches */
?>

<x-app-layout title="Tus Inquilinos">
    <div class="container mx-auto">
        <x-auth-message />

        <div class="flex items-center justify-between mb-4">
            <h2 class="text-2xl font-bold text-gray-800">Sección de Inquilinos</h2>
            <a href="{{ route('tenants.createForm') }}"
               class="px-4 py-2 ml-2 bg-blue-600 text-white font-semibold rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Crear Inquilino
            </a>
        </div>

        @if($tenants->isNotEmpty() || $baseSearches->getFullName())
            <x-base-filter
                route="tenants.index"
                name="fn"
                placeholder="Nombre completo"
                :baseSearches="$baseSearches"
                buttonText="Filtrar"
            />
        @endif

        @if($tenants->isEmpty() && $baseSearches->getFullName())
            <p class="text-gray-700">No se encontraron inquilinos con el filtro aplicado <b>{{ $baseSearches->getFullName() }}</b>.</p>
        @elseif($tenants->isEmpty())
            <p class="text-gray-700">Aún no hay inquilinos cargados.</p>
        @else
            @if($baseSearches->getFullName())
                <p class="mb-3">Se muestran los resultados para la búsqueda del inquilinos <b>{{ $baseSearches->getFullName() }}</b>.</p>
            @endif

            <div class="overflow-x-auto">
                <x-table
                    :info="$tenants"
                    model="tenants"
                >
                    <thead>
                    <tr>
                        <th class="px-4 py-2 text-left">Nombre Completo</th>
                        <th class="px-4 py-2 text-left">DNI</th>
                        <th class="px-4 py-2 text-left">Email</th>
                        <th class="px-4 py-2 text-left">Dirección Completa</th>
                        <th class="px-4 py-2 text-left">Número de Teléfono</th>
                        @if(auth()->user()->has_permission)
                            <th class="px-4 py-2 text-left">Acciones</th>
                        @endif
                    </tr>
                    </thead>
                </x-table>
            </div>

            <div class="mt-4">
                {{ $tenants->links() }}
            </div>
        @endif
    </div>
</x-app-layout>
