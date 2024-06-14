<div>
    @if($productCreated)
        <x-correct-alert/>
    @endif
    <div class="flex items-center justify-center mt-10">
        <button type="button" wire:click="toggleForm" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Añadir producto</button>
        <select wire:model.live="chosenCategory" name="chosenCategory" id="chosenCategory"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
            <option value="0">Selecciona una categoría</option>
            @foreach ($category as $c)
                <option value="{{ $c->id }}">{{ $c->name }}</option>
            @endforeach
        </select>
    </div>
    @if ($showForm)
        @livewire('addproduct')
    @endif

    <div class="grid sm:grid-cols-1  md:grid-cols-4 gap-20 mt-10 w-full h-full">
        @foreach ($products as $product)
            @livewire('product-card', ['product' => $product], key($product->id))
        @endforeach
    </div>
</div>
