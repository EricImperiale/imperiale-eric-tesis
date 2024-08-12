@php
    $currentPage = request()->query('page');
@endphp

@if ($paginator->hasPages())
    <div class="flex items-center justify-between">
        <!-- Texto de paginación -->
        <div class="flex-1 flex items-center">
            <span class="text-sm text-gray-600">
                Mostrando {{ $paginator->firstItem() }}-{{ $paginator->lastItem() }} de {{ $paginator->total() }} resultados
            </span>
        </div>

        <!-- Navegación -->
        <nav class="flex space-x-2">
            <!-- Botón Anterior -->
            @if ($paginator->onFirstPage())
                <span class="px-4 py-2 text-sm text-gray-400 bg-white border border-gray-300 rounded-md cursor-not-allowed">
                    Anterior
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="px-4 py-2 text-sm text-blue-600 bg-white border border-gray-300 rounded-md hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    Anterior
                </a>
            @endif

            @foreach ($elements[0] as $page => $url)
                @if ($page == $paginator->currentPage())
                    <span class="px-4 py-2 text-sm font-semibold text-white bg-blue-600 border border-gray-300 rounded-md cursor-default">
                        {{ $page }}
                    </span>
                @else
                    <a href="{{ $url }}" class="px-4 py-2 text-sm text-blue-600 bg-white border border-gray-300 rounded-md hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                        {{ $page }}
                    </a>
                @endif
            @endforeach

            <!-- Botón Siguiente -->
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="px-4 py-2 text-sm text-blue-600 bg-white border border-gray-300 rounded-md hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    Siguiente
                </a>
            @else
                <span class="px-4 py-2 text-sm text-gray-400 bg-white border border-gray-300 rounded-md cursor-not-allowed">
                    Siguiente
                </span>
            @endif
        </nav>
    </div>
@endif
