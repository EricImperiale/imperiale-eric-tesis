<?php
/** @var \App\Models\Contract[]|\Illuminate\Database\Eloquent\Collection $contracts */
?>

<x-app-layout title="Tus Contratos">
    <div class="container mx-auto">
        <x-auth-message />

        <div class="flex items-center justify-between mb-4">
            <h2 class="text-2xl font-bold text-gray-800">Sección de Contratos</h2>
            <a href="{{ route('contracts.createForm') }}"
               class="px-4 py-2 ml-2 bg-blue-600 text-white font-semibold rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Crear Contrato
            </a>
        </div>

        <div class="overflow-x-auto">
            <x-table
                :info="$contracts"
                model="contracts"
            >
                <thead>
                <tr>
                    <th class="px-4 py-2 text-left">Propiedad</th>
                    <th class="px-4 py-2 text-left">Duración</th>
                    <th class="px-4 py-2 text-left">Alquiler</th>
                    <th class="px-4 py-2 text-left">Expensas</th>
                    <th class="px-4 py-2 text-left">Propiedad</th>
                    <th class="px-4 py-2 text-left">Inquilino y Garante</th>
                    <th class="px-4 py-2 text-left">Estado de Pago</th>
                    @if(auth()->user()->has_permission)
                        <th class="px-4 py-2 text-left">Acciones</th>
                    @endif
                </tr>
                </thead>
            </x-table>
        </div>

        <div class="mt-4">
            {{ $contracts->links() }}
        </div>
    </div>
</x-app-layout>
