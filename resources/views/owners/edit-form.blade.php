<?php
/** @var \App\Models\Owner[]|\Illuminate\Database\Eloquent\Collection $owner */
/** @var \App\Models\PhonePrefix[]|\Illuminate\Database\Eloquent\Collection $phonePrefixes */
?>

<x-app-layout
    title="Editar Propietario :: {{ $owner->fullName }}"
    class="overflow-y-scroll"
>
    <div class="container mx-auto">
        <header class="mb-4">
            <h2 class="text-2xl font-bold text-gray-800">Editar Propietario</h2>
            <p class="mt-2 text-sm text-gray-600">Estás editando a <b>{{ $owner->fullName }}</b> con DNI <b>{{ $owner->dni }}</b>.</p>
        </header>

        <form
            action="{{ route('owners.editForm', ['id' => $owner->id]) }}"
            method="post"
            class="bg-white p-6 border border-gray-300 rounded-lg shadow-md"
        >
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        value="{{ old('name') ?? $owner->name }}"
                    >

                    @error('name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="last_name" class="block text-sm font-medium text-gray-700">Apellido</label>
                    <input
                        type="text"
                        id="last_name"
                        name="last_name"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        value="{{ old('last_name') ?? $owner->last_name }}"
                    >

                    @error('last_name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="dni" class="block text-sm font-medium text-gray-700">DNI (Sin puntos)</label>
                    <input
                        type="number"
                        id="dni"
                        name="dni"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        value="{{ old('dni') ?? $owner->dni }}"
                        autocomplete="off"
                    >

                    @error('dni')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="cuit" class="block text-sm font-medium text-gray-700">CUIT (Sin puntos ni guiones)</label>
                    <input
                        type="text"
                        id="cuit"
                        name="cuit"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        value="{{ old('cuit') ?? $owner->cuit }}"
                        autocomplete="off"
                    >

                    @error('cuit')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        value="{{ old('email') ?? $owner->email }}"
                    >

                    @error('email')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="address" class="block text-sm font-medium text-gray-700">Dirección</label>
                    <input
                        type="text"
                        id="address"
                        name="address"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        value="{{ old('address') ?? $owner->address }}"
                    >

                    @error('address')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="address_number" class="block text-sm font-medium text-gray-700">Altura</label>
                    <input
                        type="number"
                        id="address_number"
                        name="address_number"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        value="{{ old('address_number') ?? $owner->address_number }}"
                    >

                    @error('address_number')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="city" class="block text-sm font-medium text-gray-700">Ciudad</label>
                    <input
                        type="text"
                        id="city"
                        name="city"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        value="{{ old('city') ?? $owner->city }}"
                    >

                    @error('city')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="country" class="block text-sm font-medium text-gray-700">País</label>
                    <input
                        type="text"
                        id="country"
                        name="country"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        value="{{ old('country') ?? $owner->country }}"
                    >

                    @error('country')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="state" class="block text-sm font-medium text-gray-700">Provincia</label>
                    <input
                        type="text"
                        id="state"
                        name="state"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        value="{{ old('state') ?? $owner->state }}"
                    >

                    @error('state')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="neighborhood" class="block text-sm font-medium text-gray-700">Barrio</label>
                    <input
                        type="text"
                        id="neighborhood"
                        name="neighborhood"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        value="{{ old('neighborhood') ?? $owner->neighborhood }}"
                    >

                    @error('neighborhood')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="zip_code" class="block text-sm font-medium text-gray-700">Código Postal</label>
                    <input
                        type="text"
                        id="zip_code"
                        name="zip_code"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        value="{{ old('zip_code') ?? $owner->zip_code }}"
                    >

                    @error('zip_code')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="phone_prefix_fk_id" class="block text-sm font-medium text-gray-700">Código de Área</label>
                    <select
                        id="phone_prefix_fk_id"
                        name="phone_prefix_fk_id"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    >
                        <option value="">Selecciona un código de área</option>

                        @foreach($phonePrefixes as $prefix)
                            <option
                                value="{{ $prefix->phone_prefix_id }}"
                                @selected(old('phone_prefix_fk_id', $prefix->phone_prefix_id) == $owner->phone_prefix_fk_id)
                            >
                                {{ $prefix->name }} {{ $prefix->prefix }}
                            </option>
                        @endforeach
                    </select>

                    @error('phone_prefix_fk_id')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="phone_number" class="block text-sm font-medium text-gray-700">Número de Teléfono</label>
                    <input
                        type="text"
                        id="phone_number"
                        name="phone_number"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        value="{{ old('phone_number') ?? $owner->phone_number }}"
                    >

                    @error('phone_number')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="birth_date" class="block text-sm font-medium text-gray-700">Fecha de Nacimiento</label>
                    <input
                        type="date"
                        id="birth_date"
                        name="birth_date"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        value="{{ old('birth_date') ?? $owner->birth_date }}"
                    >

                    @error('birth_date')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-6 flex justify-end">
                <a
                    href="{{ route('owners.index') }}"
                    class="px-4 py-2 bg-red-600 text-white font-semibold rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                >
                    Cancelar
                </a>

                <x-button
                    type="submit"
                    class="px-4 py-2 ml-2 bg-blue-600 text-white font-semibold rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                >
                    Editar Propietario
                </x-button>
            </div>
        </form>
    </div>
</x-app-layout>
