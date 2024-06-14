<div class="m-10 w-fit">
    <div class="grid md:grid-cols-4 sm:grid-cols-1" id="principal">
        <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-lg w-fit h-fit grid-cols-1 sm:w-full">
            <div class="flex flex-col gap-6">
                <div class="flex flex-col">
                    <label for="chosenCategory" class="text-sm font-medium text-stone-600">Categoría</label>
                    <select name="chosenCategory" id="chosenCategory" wire:model.live="chosenCategory"
                            class="mt-2 block w-full rounded-md border border-gray-100 bg-gray-100 px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                        <option value="0">Cualquiera</option>
                        @foreach($categories as $category)

                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <label>Margen de precio</label>
                <div class="flex justify-center items-center h-full w-full">
                    <div class="grid grid-cols-2 gap-6 content-center">
                        <input type="number" class="w-20" wire:model.live="minPrice" placeholder="min" min="0">
                        <input type="number" class="w-20" wire:model.live="maxPrice" placeholder="max" min="0">
                    </div>
                </div>

                <div class="flex flex-col">
                    <label for="manufacturer" class="text-sm font-medium text-stone-600">Marca</label>
                    <select id="manufacturer" wire:model.live="chosenBrand"
                            class="mt-2 block w-full rounded-md border border-gray-100 bg-gray-100 px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                        <option value="">Cualquier marca</option>
                        @foreach($brands as $brand)
                            <option value="{{$brand->brand}}">{{$brand->brand}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="md:col-span-3 sm:col-span-1">
            <div class="grid md:grid-cols-4 sm:grid-cols-1">
                @foreach($products as $product)
                    <div class="col-span-1" wire:key="{{ Str::uuid() }}">
                        <livewire:product-card-shop :$product wire:key="{{ Str::uuid() }}"></livewire:product-card-shop>
                    </div>
                @endforeach

            <div class="pagination">{{$products->links()}} </div>
            </div>
        </div>
    </div>
</div>
