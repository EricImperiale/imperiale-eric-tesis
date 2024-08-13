<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('assets/css/main.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <title>{{ $title ?? 'Page Title' }}</title>
</head>
    @if(request()->is(['iniciar-sesion', 'registro']))
        <body class="flex items-center justify-center min-h-screen bg-gray-100">
            {{ $slot }}
        </body>
    @else
    <body class="flex h-screen overflow-hidden bg-gray-100">
        <aside class="fixed inset-y-0 z-30 flex flex-col w-64 transition-transform duration-300 transform bg-white shadow-lg lg:translate-x-0 -translate-x-full lg:static lg:inset-0"
               id="sidebar">
            <div class="flex items-center justify-center h-[4.5em] bg-[#17418d]">
                <h1 class="text-2xl font-bold text-white">Panel de Admin</h1>
            </div>
            <nav class="flex-1 overflow-y-auto">
                <ul class="p-4">
                    <li class="mb-2">
                        <button
                            class="flex items-center justify-between w-full p-2 text-sm font-semibold text-left text-gray-700 transition duration-300 ease-in-out bg-gray-100 rounded-md hover:bg-gray-200"
                            onclick="toggleDropdown('contratosDropdown')"
                        >
                            Contratos
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-2 transition-transform transform"
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <ul class="hidden pl-4 mt-2 space-y-1" id="contratosDropdown">
                            <li>
                                <a href="#" class="block p-2 text-sm text-gray-600 transition duration-300 ease-in-out rounded-md hover:bg-gray-200">Crear
                                    Contrato</a>
                            </li>
                            <li>
                                <a href="#" class="block p-2 text-sm text-gray-600 transition duration-300 ease-in-out rounded-md hover:bg-gray-200">Ver
                                    Contratos</a>
                            </li>
                        </ul>
                    </li>
                    <li class="mb-2">
                        <button class="flex items-center justify-between w-full p-2 text-sm font-semibold text-left text-gray-700 transition duration-300 ease-in-out bg-gray-100 rounded-md hover:bg-gray-200"
                                onclick="toggleDropdown('inquilinosDropdown')">
                            Inquilinos
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-2 transition-transform transform"
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <ul class="hidden pl-4 mt-2 space-y-1" id="inquilinosDropdown">
                            <li>
                                <a href="#" class="block p-2 text-sm text-gray-600 transition duration-300 ease-in-out rounded-md hover:bg-gray-200">Crear
                                    Inquilino</a>
                            </li>
                            <li>
                                <a href="#" class="block p-2 text-sm text-gray-600 transition duration-300 ease-in-out rounded-md hover:bg-gray-200">Ver
                                    Inquilinos</a>
                            </li>
                        </ul>
                    </li>
                    <li class="mb-2">
                        <button class="flex items-center justify-between w-full p-2 text-sm font-semibold text-left text-gray-700 transition duration-300 ease-in-out bg-gray-100 rounded-md hover:bg-gray-200"
                                onclick="toggleDropdown('propiedadesDropdown')">
                            Propiedades
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-2 transition-transform transform"
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <ul class="hidden pl-4 mt-2 space-y-1" id="propiedadesDropdown">
                            <li>
                                <a href="#" class="block p-2 text-sm text-gray-600 transition duration-300 ease-in-out rounded-md hover:bg-gray-200">Crear
                                    Propiedad</a>
                            </li>
                            <li>
                                <a href="#" class="block p-2 text-sm text-gray-600 transition duration-300 ease-in-out rounded-md hover:bg-gray-200">Ver
                                    Propiedades</a>
                            </li>
                        </ul>
                    </li>
                    <li class="mb-2">
                        <button class="flex items-center justify-between w-full p-2 text-sm font-semibold text-left text-gray-700 transition duration-300 ease-in-out bg-gray-100 rounded-md hover:bg-gray-200"
                                onclick="toggleDropdown('propietariosDropdown')">
                            Propietarios
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-2 transition-transform transform"
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <ul class="hidden pl-4 mt-2 space-y-1" id="propietariosDropdown">
                            <li>
                                <a href="#" class="block p-2 text-sm text-gray-600 transition duration-300 ease-in-out rounded-md hover:bg-gray-200">Crear
                                    Propietario</a>
                            </li>
                            <li>
                                <a href="#" class="block p-2 text-sm text-gray-600 transition duration-300 ease-in-out rounded-md hover:bg-gray-200">Ver
                                    Propietarios</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </aside>

        <div class="flex flex-col flex-1">
            <header class="flex items-center justify-between p-4 bg-white shadow-lg">
                <h1 class="text-3xl font-semibold text-gray-900">Bienvenido al Panel de Administración</h1>
                <div class="flex items-center space-x-4">
                    <button class="hamburger lg:hidden" id="menuToggle" onclick="toggleSidebar()">
                        <span class="line w-6 h-0.5 bg-gray-800 mb-1"></span>
                        <span class="line w-6 h-0.5 bg-gray-800 mb-1"></span>
                        <span class="line w-6 h-0.5 bg-gray-800"></span>
                    </button>

                    <div class="relative">
                        <button class="p-2 text-gray-700 hover:bg-gray-200 hover:rounded-md focus:outline-none flex" onclick="toggleUserMenu()">
                            <p class="mr-2">{{ auth()->user()->full_name ??  auth()->user()->email }}</p>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </button>
                        <div class="user-menu absolute right-0 w-48 mt-2 bg-white shadow-md rounded-md z-50">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Ver Perfil</a>

                            <form
                                action="{{ route('auth.processLogout') }}"
                                method="post"
                            >
                                @csrf

                                <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                   Cerrar Sesión
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            <main class="flex-1 p-4 {{ $class }}">
                {{ $slot }}
            </main>
        </div>

        <script src="{{ url('assets/js/main.js') }}"></script>
    </body>
@endif
</html>
