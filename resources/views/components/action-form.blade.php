<div>
    <form
        action="{{ route($route, $modelId ? ['id' => $modelId] : []) }}"
        method="post"
        enctype="multipart/form-data"
        class="bg-white p-6 border border-gray-300 rounded-lg shadow-md"
    >
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @if($formType !== 'properties')
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        value="{{ old('name') ?? $model?->name }}"
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
                        value="{{ old('last_name') ?? $model?->last_name }}"
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
                        value="{{ old('last_name') ?? $model?->dni }}"
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
                        value="{{ old('last_name') ?? $model?->cuit }}"
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
                        value="{{ old('email') ?? $model?->email }}"
                    >

                    @error('email')
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
                        value="{{ old('country') ?? $model?->country }}"
                    >

                    @error('country')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            @endif

            <div>
                <label for="address" class="block text-sm font-medium text-gray-700">Dirección</label>
                <input
                    type="text"
                    id="address"
                    name="address"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    value="{{ old('address') ?? $model?->address }}"
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
                    value="{{ old('address_number') ?? $model?->address_number }}"
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
                    value="{{ old('city') ?? $model?->city }}"
                >

                @error('city')
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
                    value="{{ old('state') ?? $model?->state }}"
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
                    value="{{ old('neighborhood') ?? $model?->neighborhood }}"
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
                    value="{{ old('zip_code') ?? $model?->zip_code }}"
                >

                @error('zip_code')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            @if($formType !== 'properties')
                    <div>
                        <label for="phone_prefix_fk_id" class="block text-sm font-medium text-gray-700">Código de Área</label>

                        <select
                            id="phone_prefix_fk_id"
                            name="phone_prefix_fk_id"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        >
                            <option value="">Selecciona un código de área</option>

                            @if($action !== 'create')
                                @foreach($phonePrefixes as $prefix)
                                    <option
                                        value="{{ $prefix->phone_prefix_id }}"
                                        @selected(old('phone_prefix_fk_id', $model->phone_prefix_fk_id) == $prefix->phone_prefix_id)
                                    >
                                        {{ $prefix->name }} {{ $prefix->prefix }}
                                    </option>
                                @endforeach
                            @else
                                @foreach($phonePrefixes as $prefix)
                                    <option
                                        value="{{ $prefix->phone_prefix_id }}"
                                        @selected(old('phone_prefix_fk_id') == $prefix->phone_prefix_id)
                                    >
                                        {{ $prefix->name }} {{ $prefix->prefix }}
                                    </option>
                                @endforeach
                            @endif
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
                            value="{{ old('phone_number') ?? $model?->phone_number }}"
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
                            value="{{ old('birth_date') ?? $model?->birth_date }}"
                        >

                        @error('birth_date')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
            @endif

            @if($formType == 'properties')
                    <div>
                        <label for="total_area" class="block text-sm font-medium text-gray-700">Área Total (m²)</label>
                        <input
                            type="number"
                            id="total_area"
                            name="total_area"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            value="{{ old('total_area') ?? $model?->total_area }}"
                        >

                        @error('total_area')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="covered_area" class="block text-sm font-medium text-gray-700">Área Cubierta (m²)</label>
                        <input
                            type="number"
                            id="covered_area"
                            name="covered_area"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            value="{{ old('total_area') ?? $model?->covered_area }}"
                        >

                        @error('covered_area')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
                        <textarea id="description"
                                  name="description"
                                  class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                    </div>

                    <div>
                        <label for="rental_price" class="block text-sm font-medium text-gray-700">Precio de Alquiler</label>
                        <input
                            type="number"
                            id="rental_price"
                            name="rental_price"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            value="{{ old('rental_price') ?? $model?->rental_price }}"
                        >

                        @error('rental_price')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="expenses" class="block text-sm font-medium text-gray-700">Expensas</label>
                        <input
                            type="number"
                            id="expenses"
                            name="expenses"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            value="{{ old('expenses') ?? $model?->expenses }}"
                        >

                        @error('expenses')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="floor" class="block text-sm font-medium text-gray-700">Piso</label>
                        <input
                            type="number"
                            id="floor"
                            name="floor"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            value="{{ old('floor') ?? $model?->floor }}"
                        >

                        @error('floor')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="apartment_number" class="block text-sm font-medium text-gray-700">Número de Apartamento</label>
                        <input
                            type="text"
                            id="apartment_number"
                            name="apartment_number"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            value="{{ old('apartment_number') ?? $model?->apartment_number }}"
                        >

                        @error('apartment_number')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="is_for_professional_use" class="block text-sm font-medium text-gray-700">¿Uso Profesional?</label>
                        <select id="is_for_professional_use" name="is_for_professional_use" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="1">Sí</option>
                            <option value="0">No</option>
                        </select>
                    </div>

                    <div>
                        <label for="rooms" class="block text-sm font-medium text-gray-700">Ambientes</label>
                        <input
                            type="number"
                            id="rooms"
                            name="rooms"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            value="{{ old('rooms') ?? $model?->rooms }}"
                        >

                        @error('rooms')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="bedrooms" class="block text-sm font-medium text-gray-700">Dormitorios</label>
                        <input
                            type="number"
                            id="bedrooms"
                            name="bedrooms"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            value="{{ old('bedrooms') ?? $model?->bedrooms }}"
                        >

                        @error('bedrooms')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="bathrooms" class="block text-sm font-medium text-gray-700">Baños</label>
                        <input
                            type="number"
                            id="bathrooms"
                            name="bathrooms"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            value="{{ old('bathrooms') ?? $model?->bathrooms }}"
                        >

                        @error('bathrooms')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="owner_fk_id" class="block text-sm font-medium text-gray-700">Propietario</label>
                        <select
                            id="owner_fk_id"
                            name="owner_fk_id"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        >
                            <option value="">Selecciona un Propietario</option>

                            @foreach($owners as $owner)
                                <option
                                    value="{{ $owner->id }}"
                                    @selected(old('owner_fk_id', $model?->owner_fk_id) == $owner->id)
                                >
                                    {{ $owner->fullName }} DNI: {{ $owner->dni }}
                                </option>
                            @endforeach
                        </select>

                        @error('owner_fk_id')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="property_type_fk_id" class="block text-sm font-medium text-gray-700">Tipo de Propiedad</label>
                        <select
                            id="property_type_fk_id"
                            name="property_type_fk_id"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        >
                            <option value="">Selecciona un Propietario</option>

                            @foreach($propertyTypes as $type)
                                <option
                                    value="{{ $type->property_type_id }}"
                                    @selected(old('property_type_fk_id', $model?->property_type_fk_id) == $type->property_type_id)
                                >
                                    {{ $type->name }}
                                </option>
                            @endforeach
                        </select>

                        @error('property_type_fk_id')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700">Cargar una Imagen</label>
                        <input
                            type="file"
                            id="image"
                            name="image"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        >

                        @error('image')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
            @endif
        </div>

        <div class="mt-6 flex justify-end">
            <!-- TODO: MODIFICAR ESTO -->
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
                Confirmar
            </x-button>
        </div>
    </form>
</div>
