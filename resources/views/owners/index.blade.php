@php
/** @var \App\Models\Owner[]|\Illuminate\Database\Eloquent\Collection $owners */
@endphp

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

        <x-filter-by-name-form
            route="owners.index"
            name="n"
            placeholder="Nombre completo"
            buttonText="Filtrar"
        />

        @if($owners->isNotEmpty())
            <div class="overflow-x-auto">
                <x-table :info="$owners">
                    <thead>
                    <tr>
                        <th class="px-4 py-2 text-left">Nombre Completo</th>
                        <th class="px-4 py-2 text-left">DNI</th>
                        <th class="px-4 py-2 text-left">Email</th>
                        <th class="px-4 py-2 text-left">Dirección Completa</th>
                        <th class="px-4 py-2 text-left">Número de Teléfono</th>
                        <th class="px-4 py-2 text-left">Acciones</th>
                    </tr>
                    </thead>
                </x-table>
            </div>
        @else
            <p>Aún no hay propietarios cargados. <a href="">Creá uno</a></p>
        @endif

        <div class="flex justify-between items-center mt-4">
            <span class="text-sm text-gray-600">Mostrando 1-10 de 50 resultados</span>
            <nav class="flex space-x-2">
                <a href="#" class="px-4 py-2 text-sm text-blue-600 bg-white border border-gray-300 rounded-md hover:bg-gray-100">Anterior</a>
                <a href="#" class="px-4 py-2 text-sm text-blue-600 bg-white border border-gray-300 rounded-md hover:bg-gray-100">1</a>
                <a href="#" class="px-4 py-2 text-sm text-blue-600 bg-white border border-gray-300 rounded-md hover:bg-gray-100">2</a>
                <a href="#" class="px-4 py-2 text-sm text-blue-600 bg-white border border-gray-300 rounded-md hover:bg-gray-100">3</a>
                <a href="#" class="px-4 py-2 text-sm text-blue-600 bg-white border border-gray-300 rounded-md hover:bg-gray-100">Siguiente</a>
            </nav>
        </div>
    </div>
</x-app-layout>
