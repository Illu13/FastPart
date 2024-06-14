<section class="userInputs">
    @if($errors->any())
        <x-alertaerrores :fails="$errors"/>
    @endif

    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
        <h2 class="mb-4 text-xl font-bold text-black">Añadir un producto nuevo</h2>
        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
            <input wire:model.live="photo" id="photo" name="photo"
                   class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                   aria-describedby="file_input_help" type="file">
            <p class="mt-1 text-sm text-black" id="file_input_help">La foto debe de estar en PNG, JPG o JPEG</p>
            <div class="sm:col-span-2">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre del
                    producto</label>
                <input wire:model.live="name" type="text" name="name" id="name"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                       placeholder="Escriba el nombre del producto" required="">
            </div>
            <div class="w-full">
                <label for="seller_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Vendedor</label>
                <select wire:model.live="seller_id" name="seller_id" id="seller_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option>Selecciona a un vendedor</option>
                    @foreach ($sellers as $s)
                        <option value="{{ $s->id }}">{{ $s->name }} {{$s->surname}}</option>
                    @endforeach
                </select>
            </div>
            <div class="w-full">
                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Precio</label>
                <input wire:model.live="price" type="number" name="price" id="price"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                       placeholder="10€" required="">
            </div>
            <div class="">
                <label for="category_id"
                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categoría</label>
                <select wire:model.live="category_id" name="category_id" id="category_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option disabled>Selecciona una categoría</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="">
                <label for="antiquity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Año de construcción</label>
                <input wire:model.live="antiquity" type="number" name="antiquity" id="antiquity"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                       placeholder="2000" required="">
            </div>
            <div class="">
                <label for="kilometers" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kilómetros</label>
                <input wire:model.live="kilometers" type="number" name="kilometers" id="kilometers"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                       placeholder="2000" required="">
            </div>
            <div class="">
                <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Marca</label>
                <input wire:model.live="brand" type="text" name="brand" id="brand"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                       placeholder="Marca" required="">
            </div>
            <div class="">
                <label for="car_from" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Coche del que proviene</label>
                <input wire:model.live="car_from" type="text" name="car_from" id="car_from"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                       placeholder="Marca" required="">
            </div>
            <div class="">
                <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estado</label>
                <select id="status" wire:model.live="status"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option>Escoger</option>
                    <option value="Nuevo">Nuevo</option>
                    <option value="Como nuevo">Como nuevo</option>
                    <option value="Correcto">Correcto</option>
                    <option value="Desgastado">Desgastado</option>
                    <option value="Roto">Roto</option>
                </select>

            </div>
            <div class="sm:col-span-2">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción
                    del producto</label>
                <textarea wire:model="description" name="description" id="description" rows="8"
                          class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                          placeholder="¿Qué estás vendiendo?"></textarea>
            </div>
        </div>
        <button type="submit"
                class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-black rounded-lg botonEnviar"
                wire:click="addgame">
            Añadir juego
        </button>
    </div>
    @if($incorrecto)
        <div class="bg-red-100 border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">{{ $incorrecto }}</span>
        </div>
    @endif
</section>
