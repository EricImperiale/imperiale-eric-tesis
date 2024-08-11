<div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-300">
        <thead>
        {{ $slot }}
        </thead>
        <tbody>
        @foreach($info as $owner)
            <tr class="hover:bg-[#f3f4f6]">
                <td class="px-4 py-2">{{ $owner->name . ' ' . $owner->last_name }}</td>
                <td class="px-4 py-2">{{ $owner->dni }}</td>
                <td class="px-4 py-2">{{ $owner->email }}</td>
                <td class="px-4 py-2">{{ $owner->fullAddress() }}</td>
                <td class="px-4 py-2">{{ $owner->phoneNumber() }}</td>
                <td class="px-4 py-2">
                    <a href="#" class="px-2 py-1 text-blue-600 hover:underline">Editar</a>
                    <a href="#" class="px-2 py-1 text-red-600 hover:underline">Eliminar</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
