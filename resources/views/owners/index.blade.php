<?php
/** @var \App\Models\Owner[]|\Illuminate\Database\Eloquent\Collection $owners */
?>

<x-app-layout
    title="Tus Propietarios"
    class=""
>
    <div class="container mx-auto">

        <x-auth-message />

        <div class="flex items-center justify-between mb-4">
            <h2 class="text-2xl font-bold text-gray-800">Sección de Propietarios</h2>
            <a href="{{ route('owners.createForm') }}"
               class="px-4 py-2 ml-2 bg-blue-600 text-white font-semibold rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Crear Propietario
            </a>
        </div>

        @if($owners->isNotEmpty())
            <x-filter-by-name-form
                route="owners.index"
                name="n"
                placeholder="Nombre completo"
                buttonText="Filtrar"
            />
        @endif

        @if($owners->isNotEmpty())
            <div class="overflow-x-auto">
                <x-table
                    :info="$owners"
                    model="owners"
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
        @else
            <p class="text-gray-700">Aún no hay propietarios cargados.</p>
        @endif

        <div class="mt-4">
           {{ $owners->links() }}
        </div>
    </div>
</x-app-layout>
