@php
/** @var \App\Models\PhonePrefix[]|\Illuminate\Database\Eloquent\Collection $phonePrefixes */
@endphp

<x-app-layout
    title="Crear Propietario"
    class="overflow-y-scroll"
>
    <div class="container mx-auto">
        <header class="mb-4">
            <h2 class="text-2xl font-bold text-gray-800">Crear Propietario</h2>
        </header>

        <form
            action="{{ route('owners.createForm') }}"
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
                        value="{{ old('name') }}"
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
                        value="{{ old('last_name') }}"
                    >

                    @error('last_name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div x-data="{ dni: '{{ old('dni') }}', maxLength: 8 }">
                    <label for="dni" class="block text-sm font-medium text-gray-700">DNI (Sin puntos)</label>
                    <input
                        type="number"
                        id="dni"
                        name="dni"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        x-model="dni"
                        x-bind:value="dni"
                    >

                    <div x-show="dni.length <= maxLength">
                        <p class="mt-2 text-sm text-gray-600">
                            Caracteres restantes: <span x-text="maxLength - dni.length"></span>
                        </p>
                    </div>

                    <div x-show="dni.length > maxLength">
                        <p class="mt-2 text-sm text-red-600">
                            El DNI no puede tener más de 8 caracteres.
                        </p>
                    </div>

                    @error('dni')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div x-data="{ cuit: '{{ old('cuit') }}', maxLength: 12 }">
                    <label for="cuit" class="block text-sm font-medium text-gray-700">CUIT (Sin puntos ni guiones)</label>
                    <input
                        type="text"
                        id="cuit"
                        name="cuit"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        x-model="cuit"
                        x-bind:value="cuit"
                    >

                    <div x-show="cuit.length <= maxLength">
                        <p class="mt-2 text-sm text-gray-600">
                            Caracteres restantes: <span x-text="maxLength - cuit.length"></span>
                        </p>
                    </div>

                    <div x-show="cuit.length > maxLength">
                        <p class="mt-2 text-sm text-red-600">
                            El CUIT no puede tener más de 12 caracteres.
                        </p>
                    </div>

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
                        value="{{ old('email') }}"
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
                        value="{{ old('address') }}"
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
                        value="{{ old('address_number') }}"
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
                        value="{{ old('city') }}"
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
                        value="{{ old('country') }}"
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
                        value="{{ old('state') }}"
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
                        value="{{ old('neighborhood') }}"
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
                        value="{{ old('zip_code') }}"
                    >

                    @error('zip_code')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="area_code" class="block text-sm font-medium text-gray-700">Código de Área</label>
                    <select
                        id="area_code"
                        name="phone_prefix_fk_id"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    >
                        <option value="">Selecciona un código de área</option>

                        @foreach($phonePrefixes as $prefix)
                            <option
                                value="{{ $prefix->phone_prefix_id }}"
                                @selected(old('phone_prefix_fk_id') == $prefix->phone_prefix_id)
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
                        value="{{ old('phone_number') }}"
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
                        value="{{ old('birth_date') }}"
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

                <form action="">
                    <x-button
                        type="submit"
                        class="px-4 py-2 ml-2 bg-blue-600 text-white font-semibold rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                    >
                        Crear Propietario
                    </x-button>
                </form>
            </div>
        </form>
    </div>
</x-app-layout>
