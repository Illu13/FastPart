<div class="col-span-1 rounded shadow-lg card bg-gray-300">
    <img class="w-full object-cover" src="{{asset($product->photo)}}" alt="Photo of {{$product->name}}">
    <div class="px-6 py-4 w-full bg-gray-300">
        <div class="font-bold text-xl mb-2">{{$product->name}}</div>
        <p class="text-gray-700">
            {{$product->description}}
        </p>
    </div>
    <div class="px-6 pt-4 pb-2 bg-gray-300">
        <span
            class="bg-white rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{\App\Models\Category::find($product->id_category)->name}}</span>
        <button type="submit"
                class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-black rounded-lg botonEnviar"
                wire:click="deleteGame">
            Borrar producto
        </button>
        <button id="updateProductButton" wire:click="editGame({{$product->id}})"
                class="focus:ring-4 focus:outline-none focus:ring-primary-300 text-black font-medium rounded-lg text-sm px-5 py-2.5 text-center "
                type="button">
            Editar producto
        </button>
    </div>
    @if ($showEditModal == true)
        @livewire('edit-product', ['product_id' => $product->id], key($product->id))
    @endif

</div>
