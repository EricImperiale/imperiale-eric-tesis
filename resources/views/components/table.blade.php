<div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-300">
        <thead>
        {{ $slot }}
        </thead>
        <tbody>
        @foreach($info as $data)
            <tr class="hover:bg-[#f3f4f6]">
                <td class="px-4 py-2">{{ $data->fullName }}</td>
                <td class="px-4 py-2">{{ $data->dni }}</td>
                <td class="px-4 py-2">{{ $data->email }}</td>
                <td class="px-4 py-2">{{ $data->fullAddress }}</td>
                <td class="px-4 py-2">{{ $data->formattedPhoneNumber }}</td>
                <td class="px-4 py-2">
                    <x-action-link
                        href=""
                        class="px-2 py-1 text-blue-600 hover:underline"
                        action="edit"
                        model="{{ $model }}"
                        modelId="{{ $data->id }}"
                    >
                        Editar
                    </x-action-link>
                    <x-action-link
                        href=""
                        class="px-2 py-1 text-red-600 hover:underline"
                        action="delete"
                        model="{{ $model }}"
                        modelId="{{ $data->id }}"
                    >
                        Eliminar
                    </x-action-link>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>


