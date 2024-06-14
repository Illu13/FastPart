<div class="mt-5 centrar w-full">
    <div class="md:formulario w-1/2">
        <div
            class="userInputs pl-12 pr-12 pt-5 pb-5 rounded-lg d-flex text-center items-center">
            <label class="block mb-2 text-sm font-medium text-black" for="file_input">Foto del producto a
                vender</label>
            <input id="photoEdit" name="photoEdit"
                   class="w-1/2 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                   aria-describedby="file_input_help" type="file">
            <p class="mt-1 text-sm text-black" id="file_input_help">La foto debe de estar en PNG, JPG o JPEG</p>
            <x-input-error class="mt-2" :messages="$errors->get('photo')"/>

        </div>
        <div class="userInputs mt-10 h-fit rounded-lg">
            <form method="post" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="pt-5 d-flex text-center">
                    <x-input-label for="name" :value="__('Nombre del producto')"/>
                    <x-text-input id="name"  name="name" type="text" class="mt-1 w-1/2"
                                  :value="$product->name" required
                                  autofocus autocomplete="name"/>
                    <x-input-error class="mt-2" :messages="$errors->get('name')"/>
                </div>
                <div class=" d-flex text-center">
                    <x-input-label for="brand" :value="__('Marca del producto')"/>
                    <x-text-input id="brand" wire:model.live="brand" name="brand" type="text" class="mt-1 w-1/2"
                                  :value="$product->brand" required
                                  autofocus autocomplete="brand"/>
                    <x-input-error class="mt-2" :messages="$errors->get('brand')"/>
                </div>
                <div class="d-flex text-center">
                    <label for="category_id"
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categoría</label>
                    <select wire:model.live="category_id" name="category_id" id="category_id"
                            class="mt-1 w-1/2 rounded-lg">
                        <option disabled>Selecciona una categoría</option>
                        @foreach ($categories as $category)
                            @if ($category->id == $product->id_category)
                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                            @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class=" d-flex text-center">
                    <x-input-label for="name" :value="__('Coche del que proviene')"/>
                    <x-text-input id="name" wire:model.live="carFrom" name="carFrom" type="text" class="mt-1 w-1/2"
                                  :value="$product->car_from" required
                                  autofocus autocomplete="name"/>
                    <x-input-error class="mt-2" :messages="$errors->get('carFrom')"/>
                </div>
                <div class=" d-flex text-center">
                    <x-input-label for="status" :value="__('Estado del producto')"/>
                    <select id="status" name="status"
                            class="mt-1 w-1/2 rounded-lg">
                        <option>Escoger</option>
                        <option value="Nuevo">Nuevo</option>
                        <option value="Como nuevo">Como nuevo</option>
                        <option value="Correcto">Correcto</option>
                        <option value="Desgastado">Desgastado</option>
                        <option value="Roto">Roto</option>
                    </select>
                    <x-input-error class="mt-2" :messages="$errors->get('status')"/>
                </div>
                <div class=" d-flex text-center">
                    <x-input-label for="name" :value="__('Descripción del producto')"/>
                    <x-text-input id="description" wire:model.live="description" name="description" type="text"
                                  class="mt-1 w-1/2" :value="$product->description" required
                                  autofocus autocomplete="description"/>
                    <x-input-error class="mt-2" :messages="$errors->get('description')"/>
                </div>
                <div class=" d-flex text-center">
                    <x-input-label for="antiquity" :value="__('Antigüedad del producto')"/>
                    <input wire:model.live="antiquity" type="number" name="antiquity" id="antiquity"
                           class="mt-1 w-1/2" value="{{$product->antiquity}}"
                           placeholder="2000" required="">
                    <x-input-error class="mt-2" :messages="$errors->get('antiquity')"/>

                </div>
                <div class=" d-flex text-center">
                    <x-input-label for="kilometers" :value="__('Kilometraje del producto')"/>
                    <x-text-input id="kilometers" wire:model.live="kilometers" name="kilometers" type="number"
                                  class="mt-1 w-1/2" value="{{$product->kilometers }}"
                                  :value="old('kilometers')" required
                                  autofocus autocomplete="kilometers"/>
                    <x-input-error class="mt-2" :messages="$errors->get('kilometers')"/>
                </div>
                <div class=" pb-5 d-flex text-center">
                    <x-input-label for="price" :value="__('Precio del producto')"/>
                    <x-text-input id="price" wire:model.live="price" name="price" type="number" class=" w-1/2"
                                  :value="$product->price" required
                                  autofocus autocomplete="price"/>
                    <x-input-error class="mt-2" :messages="$errors->get('price')"/>
                </div>
                <button type="submit"
                        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white rounded-lg botonEnviar">
                    Editar juego
                </button>
            </form>
        </div>
    </div>
</div>
