<div class="mb-4">
    <form
        action="{{ route($route) }}"
        method="GET"
        class="flex items-center space-x-4"
    >
        <input
            type="text"
            name="{{ $name }}"
            placeholder="{{ $placeholder }}"
            class="p-2 border border-gray-300 rounded-md w-full"
        >

        <x-button
            type="submit"
            class="px-4 py-2 ml-2 bg-blue-600 text-white font-semibold rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
        >
            {{ $buttonText }}
        </x-button>
    </form>
</div>
