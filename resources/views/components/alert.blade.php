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
    <p class="text-base">{{ $message }}</p>
</div>

