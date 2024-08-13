<x-app-layout
    title="Confirmar Eliminación de {{ $model->fullName }}"
    class=""
>
    <div class="container mx-auto">
        <header class="mb-4">
            <h2 class="text-2xl font-bold text-gray-800">Confirmar Eliminación del Propietario</h2>
            <p class="text-gray-600">Estás a punto de eliminar al siguiente propietario. Por favor, confirma la acción ingresando el DNI.</p>

            <x-auth-message />
        </header>

        <div class="bg-white p-6 border border-gray-300 rounded-lg shadow-md">
            <h3 class="text-lg font-medium text-gray-700 mb-4">Detalles del Propietario</h3>
            <ul class="mb-6 text-gray-600">
                <li><strong>Nombre Completo:</strong> {{ $model->fullName }}</li>
                <li><strong>DNI:</strong> {{ $model->dni }}</li>
                <li><strong>Email:</strong> {{ $model->email }}</li>
            </ul>

            <form
                action="{{ route('owners.processDelete', ['id' => $model->id]) }}"
                method="post"
                class="space-y-4"
            >
                @csrf
                <div class="flex flex-col">
                    <label for="dni" class="text-sm font-medium text-gray-700">Confirma el DNI del propietario:</label>
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

                <div class="flex justify-end space-x-2">
                    <a
                        href="{{ route('owners.index') }}"
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
</x-app-layout>
