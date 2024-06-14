<div id="updateProductModal" tabindex="-1" aria-hidden="true"
     class="flex overflow-y-auto overflow-x-hidden fixed top-50 right-50 left-50 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class=" p-4 w-full max-w-2xl h-full md:h-auto">

        <!-- Modal content -->
        <div class=" p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            @if($errors->any())
                <x-alertaerrores :fails="$errors"/>
            @endif
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Actualizar usuario
                </h3>
                <button type="button" wire:click="closeModal"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="updateProductModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                              clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Cerrar</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <input wire:model="photoEdit" id="photoEdit" name="photoEdit"
                       class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                       aria-describedby="file_input_help" type="file">
                <p class="mt-1 text-sm text-black" id="file_input_help">La foto debe de estar en PNG, JPG o JPEG</p>
                <div class="sm:col-span-2">
                    <label for="name"
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre </label>
                    <input wire:model="name" type="text" name="name" id="name"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                           placeholder="Escriba el nombre del usuario" required="">
                </div>

                <div class="w-full">
                    <label for="rental_price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellidos</label>
                    <input wire:model="surname" type="text" name="surname" id="surname"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                           placeholder="Escriba los apellidos del usuario" required="">
                </div>
                <div class="">
                    <label for="category_id"
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input wire:model="email" type="text" name="email" id="email"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                           placeholder="Escriba el email del usuario" required="">
                </div>
                <div class="">
                    <label for="category_id"
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">País</label>
                    <input wire:model="country" type="text" name="country" id="country"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                           placeholder="Escriba el país del usuario" required="">

                </div>
                <div class="">
                    <label for="category_id"
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Número postal</label>
                    <input wire:model="postal_code" type="text" name="postal_code" id="postal_code"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                           placeholder="Escriba el país del usuario" required="">

                </div>
                <div class="sm:col-span-2">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Teléfono</label>
                    <input wire:model="phone" name="phone" id="phone" rows="8"
                           class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                           placeholder="¿De qué va el juego?">
                </div>
                <div class="">
                    <label for="year"
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Año de nacmiento</label>
                    <input wire:model="birth_date" type="date" name="year" id="year"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                           max="{{ date('Y-m-d', strtotime('-18 years')) }}" required>
                </div>
                <div class="">
                    <label for="year"
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rol</label>
                    <select wire:model="role" name="role" id="role"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option disabled>Selecciona un rol</option>
                        <option value="admin">Administrador</option>
                        <option value="user">Cliente</option>
                        <option value="seller">Vendedor</option>
                    </select>
                </div>
                <button type="submit"
                        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white rounded-lg botonEnviar w-full"
                        wire:click="updateUser">
                    Editar usuario
                </button>
            </div>
            @if($incorrecto)
                <div class="bg-red-100 border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline">{{ $incorrecto }}</span>
                </div>
            @endif
        </div>
    </div>
