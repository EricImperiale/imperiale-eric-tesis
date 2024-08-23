<?php
    $title = '';
    $dataToBeEntered = '';

    switch ($modelToBeDeleted) {
        case 'owners':
            $title = 'del Propietario';
            break;

        case 'tenants':
            $title = 'del Inquilino';
            break;

        case 'guarantors':
            $title = 'del Garante';
            break;

        case 'properties':
            $title = 'de la Propiedad';
            $dataToBeEntered = 'la Dirección completa';
            break;
    }
?>
<div class="container mx-auto">
    <header class="mb-4">
        <h2 class="text-2xl font-bold text-gray-800">Confirmar Eliminación {{ $title }}</h2>
        <p class="text-gray-600">Estás a punto de eliminar al siguiente {{ $title }}. Por favor, confirma la acción ingresando {{ $dataToBeEntered ?? 'el DNI' }}.</p>

        <x-auth-message />
    </header>

    <div class="bg-white p-6 border border-gray-300 rounded-lg shadow-md">
        <h3 class="text-lg font-medium text-gray-700 mb-4">Detalles del {{ $title }}</h3>
        <ul class="mb-4 text-gray-600">
            @if($modelToBeDeleted !== 'properties')
                <li><strong>Nombre Completo:</strong> {{ $model->fullName }}</li>
                <li><strong>DNI:</strong> {{ $model->dni }}</li>
                <li><strong>Email:</strong> {{ $model->email }}</li>
            @else
                <li><strong>Dirección completa:</strong> {{ $model->address }} {{ $model->address_number }}</li>
                <li><strong>Dueño/a:</strong> {{ $model->owner->fullName }} con DNI: {{ $model->owner->dni }}</li>
            @endif
        </ul>

        @if($model->property_type_fk_id !== 1)
            <p class="mt-0 text-gray-600">Está propiedad es un <b>{{ $model->propertyType->name }} en el piso {{ $model->floor }} {{ $model->apartment_number }}</b>.</p>
        @endif
        <form
            action="{{ route($route, ['id' => $model->id]) }}"
            method="post"
            class="space-y-4"
        >
            @csrf

            @if($modelToBeDeleted !== 'properties')
                <div class="flex flex-col">
                    <label for="dni" class="text-sm font-medium text-gray-700">Confirma el DNI del {{ $title }}:</label>
                    <input
                        type="text"
                        id="dni"
                        name="dni"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        maxlength="8"
                        value="{{ old('dni') }}"
                    >

                    @error('dni')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            @else
                <div class="flex flex-col">
                    <label for="full_address" class="text-sm font-medium text-gray-700">Confirma la dirección {{ $title }}:</label>
                    <input
                        type="text"
                        id="full_address"
                        name="full_address"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        value="{{ old('full_address') }}"
                    >

                    @error('full_address')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            @endif

            <div class="flex justify-end space-x-2">
                <a
                    href="{{ route($modelToBeDeleted . '.index') }}"
                    class="px-4 py-2 bg-red-600 text-white font-semibold rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                >
                    Cancelar
                </a>

                <button
                    type="submit"
                    class="px-4 py-2 ml-2 border border-red-600 text-red-600 font-semibold rounded-md bg-white hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                    Confirmar Eliminación
                </button>
            </div>
        </form>
    </div>
</div>
