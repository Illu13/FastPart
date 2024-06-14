<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
        <img src="{{ asset($user->photo) }}" alt="foto del usuario" class="w-12 h-12">
    </th>
    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
        {{ $user->id }}
    </th>
    <td class="px-6 py-4">
        {{ $user->name }}
    </td>
    <td class="px-6 py-4">
        {{ $user->surname }}
    </td>
    <td class="px-6 py-4">
        {{ $user->email }}
    </td>
    <td class="px-6 py-4">
        {{ $user->country }}
    </td>
    <td class="px-6 py-4">
        {{ $user->postal_code}}
    </td>
    <td class="px-6 py-4">
        {{ $user->phone }}
    </td>
    <td class="px-6 py-4">
        {{ $user->birth_date }}
    </td>
    <td class="px-6 py-4">
        {{ $user->role }}
    </td>
    <td class="px-6 py-4">
        <button wire:click="edit({{ $user->id }})" class="text-white focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-black">Editar</button>
        <button wire:click="delete({{ $user->id }})" class="text-white focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-black">Eliminar</button>
    </td>

</tr>
