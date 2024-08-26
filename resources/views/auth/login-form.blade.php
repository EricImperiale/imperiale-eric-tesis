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
                <div class="relative">
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-[#17418d] focus:border-[#17418d] pr-10"
                        placeholder="********"
                    >
                    <button
                        type="button"
                        id="togglePassword"
                        class="absolute inset-y-0 right-0 px-3 flex items-center text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#17418d]"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6" id="eye">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 hidden" id="eye-closed">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                        </svg>
                    </button>
                </div>

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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const togglePasswordButton = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eye');
        const eyeClosedIcon = document.getElementById('eye-closed');

        togglePasswordButton.addEventListener('click', function () {
            // Toggle the type attribute
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.add('hidden');
                eyeClosedIcon.classList.remove('hidden');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('hidden');
                eyeClosedIcon.classList.add('hidden');
            }
        });
    });
</script>
