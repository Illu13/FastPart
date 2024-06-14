<div id="updateProductModal" tabindex="-1" aria-hidden="true" class="flex overflow-y-auto overflow-x-hidden fixed top-50 right-50 left-50 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class=" p-4 w-full max-w-2xl h-full md:h-auto">

        <!-- Modal content -->
        <div class=" p-4 bg-white rounded-lg userInputs shadow sm:p-5">
            @if($errors->any())
                <x-alertaerrores :fails="$errors"/>
            @endif
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Update Product
                </h3>
                <button type="button" wire:click="closeModal" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="updateProductModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <label class="block mb-2 text-sm font-medium text-black" for="file_input">Foto del producto a
                vender</label>
            <input wire:model="photoEdit" id="photoEdit" name="photoEdit"
                   class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                   aria-describedby="file_input_help" type="file">
            <p class="mt-1 text-sm text-black" id="file_input_help">La foto debe de estar en PNG, JPG o JPEG</p>
            <x-input-error class="mt-2" :messages="$errors->get('photo')"/>
        <div class="userInputs mt-10 h-fit rounded-lg">
            <div class="pt-5 d-flex text-center">
                <x-input-label for="name" :value="__('Nombre del producto')"/>
                <x-text-input id="name" wire:model.live="name" name="name" type="text" class="mt-1 w-1/2"
                              :value="old('name')" required
                              autofocus autocomplete="name"/>
                <x-input-error class="mt-2" :messages="$errors->get('name')"/>
            </div>
            <div class=" d-flex text-center">
                <x-input-label for="brand" :value="__('Marca del producto')"/>
                <x-text-input id="brand" wire:model.live="brand" name="brand" type="text" class="mt-1 w-1/2"
                              :value="old('brand')" required
                              autofocus autocomplete="brand"/>
                <x-input-error class="mt-2" :messages="$errors->get('brand')"/>
            </div>
            <div class="d-flex text-center">
                <label for="id_category"
                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categoría</label>
                <select wire:model.live="id_category" name="id_category" id="id_category"
                        class="mt-1 w-1/2 rounded-lg">
                    <option disabled>Selecciona una categoría</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class=" d-flex text-center">
                <x-input-label for="name" :value="__('Coche del que proviene')"/>
                <x-text-input id="name" wire:model.live="carFrom" name="carFrom" type="text" class="mt-1 w-1/2"
                              :value="old('carFrom')" required
                              autofocus autocomplete="name"/>
                <x-input-error class="mt-2" :messages="$errors->get('carFrom')"/>
            </div>
            <div class=" d-flex text-center">
                <x-input-label for="status" :value="__('Estado del producto')"/>
                <select id="status" wire:model.live="status"
                        class="mt-1 w-1/2 rounded-lg">
                    <option>Escoger</option>
                    <option value="Nuevo">Nuevo</option>
                    <option value="Como nuevo">Como nuevo</option>
                    <option value="Correcto">Correcto</option>
                    <option value="Desgastado">Desgastado</option>
                    <option value="Roto">Roto</option>
                </select>
            </div>
            <div class=" d-flex text-center">
                <x-input-label for="name" :value="__('Descripción del producto')"/>
                <x-text-input id="description" wire:model.live="description" name="description" type="text"
                              class="mt-1 w-1/2" :value="old('description')" required
                              autofocus autocomplete="description"/>
                <x-input-error class="mt-2" :messages="$errors->get('description')"/>
            </div>
            <div class=" d-flex text-center">
                <x-input-label for="antiquity" :value="__('Antigüedad del producto')"/>
                <input wire:model.live="antiquity" type="number" name="antiquity" id="antiquity"
                       class="mt-1 w-1/2"
                       placeholder="2000" required="">
                <x-input-error class="mt-2" :messages="$errors->get('antiquity')"/>

            </div>
            <div class=" d-flex text-center">
                <x-input-label for="kilometers" :value="__('Kilometraje del producto')"/>
                <x-text-input id="kilometers" wire:model.live="kilometers" name="kilometers" type="number" class="mt-1 w-1/2"
                              :value="old('kilometers')" required
                              autofocus autocomplete="kilometers"/>
                <x-input-error class="mt-2" :messages="$errors->get('kilometers')"/>
            </div>
            <div class=" pb-5 d-flex text-center">
                <x-input-label for="price" :value="__('Precio del producto')"/>
                <x-text-input id="price" wire:model.live="price" name="price" type="number" class=" w-1/2"
                              :value="old('price')" required
                              autofocus autocomplete="price"/>
                <x-input-error class="mt-2" :messages="$errors->get('price')"/>
            </div>
            <div class="d-flex text-center pb-5" wire:click="editProduct">
                <x-danger-button class="ms-3">
                    {{ __('Editar producto') }}
                </x-danger-button>
            </div>
            @if($incorrecto)
                <div class="bg-red-100 border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline">{{ $incorrecto }}</span>
                </div>
            @endif
        </div>
    </div>
</div>
