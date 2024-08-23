<div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-300">
        {{ $slot }}
        <tbody>
        @foreach($info as $data)
           @if($model !== 'properties')
               <tr class="hover:bg-[#f3f4f6]">
                   <td class="px-4 py-2">{{ $data->fullName }}</td>
                   <td class="px-4 py-2">{{ $data->dni }}</td>
                   <td class="px-4 py-2">{{ $data->email }}</td>
                   <td class="px-4 py-2">{{ $data->fullAddress }}</td>
                   <td class="px-4 py-2">{{ $data->formattedPhoneNumber }}</td>
                   <td class="px-4 py-2">
                       @if(auth()->user()->has_permission)
                           <x-action-link
                               class="px-2 py-1 text-blue-600 hover:underline"
                               action="edit"
                               model="{{ $model }}"
                               modelId="{{ $data->id }}"
                           >
                               Editar
                           </x-action-link>
                           <x-action-link
                               class="px-2 py-1 text-red-600 hover:underline"
                               action="delete"
                               model="{{ $model }}"
                               modelId="{{ $data->id }}"
                           >
                               Eliminar
                           </x-action-link>
                       @endif
                   </td>
               </tr>
           @else
               <tr class="hover:bg-[#f3f4f6]">
                   <td class="px-4 py-2">{{ $data->fullAddress }}</td>
                   <td class="px-4 py-2">Piso {{ $data->floor }} - {{ $data->apartment_number }}</td>
                   <td class="px-4 py-2">{{ $data->rental_price }}</td>
                   <td class="px-4 py-2">{{ $data->expenses }}</td>
                   <td class="px-4 py-2">{{ $data->caracteristics }}</td>
                   <td class="px-4 py-2">
                       @if(auth()->user()->has_permission)
                           <x-action-link
                               class="px-2 py-1 text-blue-600 hover:underline"
                               action="edit"
                               model="{{ $model }}"
                               modelId="{{ $data->id }}"
                           >
                               Editar
                           </x-action-link>
                           <x-action-link
                               class="px-2 py-1 text-red-600 hover:underline"
                               action="delete"
                               model="{{ $model }}"
                               modelId="{{ $data->id }}"
                           >
                               Eliminar
                           </x-action-link>
                       @endif
                   </td>
               </tr>
           @endif
        @endforeach
        </tbody>
    </table>
</div>


