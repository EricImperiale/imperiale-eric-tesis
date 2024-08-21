<x-app-layout title="Iniciar Sesión">
    <section class="w-full max-w-md p-6 bg-white rounded-md shadow-md">
        <header class="mb-3 text-3xl text-center">
            <h2 class="font-bold">Iniciar Sesión</h2>

            <x-auth-message />
        </header>
        <form
            action="#"
            method="post"
        >
            @csrf

            <div class="mb-4">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Correo Electrónico</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-[#17418d] focus:border-[#17418d]"
                    value="{{ old('email') }}"
                >

                @error('email')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-700">Contraseña</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-[#17418d] focus:border-[#17418d]"
                >

                @error('password')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <x-button
                type="submit"
                class="w-full px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#17418d]"
            >
                Iniciar Sesión
            </x-button>
        </form>

        <p class="mt-4 text-center text-sm text-gray-600">¿No tenés una cuenta? <a href="#" class="font-medium text-blue-600 hover:text-blue-700">Regístrate acá</a></p>
    </section>
</x-app-layout>
