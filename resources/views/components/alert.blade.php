<div
    class="{{
        $type === 'success' ?
        'bg-green-100 border border-green-300 text-green-800 p-4 rounded-md shadow-md' :
        'bg-red-100 border border-red-300 text-red-800 p-4 rounded-md shadow-md'
    }}
        px-4 py-3 mt-3 mb-0 rounded relative {{ $style }}"
    role="alert"
    id="{{ $type === 'success' ? 'alert-success' : 'alert-error' }}"
>
    @if($withHeader)
        @if($type === 'success')
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <span class="font-medium">¡Éxito!</span>
                <button class="ml-auto text-green-600 hover:text-green-700">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        @else
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
                <span class="font-medium">¡Error!</span>
                <button class="ml-auto text-red-600 hover:text-red-700">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        @endif
    @endif

    <p class="text-base">{!! $message !!}</p>
</div>

