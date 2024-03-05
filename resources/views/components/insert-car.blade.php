<div class="centrar mt-10">
    <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="userInputs roundedBorder pl-12 pr-12 pt-5 pb-5 lg: subirProducto">
            <label class="block mb-2 text-sm font-medium text-black" for="file_input">Foto del producto a vender</label>
            <input id="photo" name="photo"
                   class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                   aria-describedby="file_input_help" type="file">
            <p class="mt-1 text-sm text-black" id="file_input_help">La foto debe de estar en PNG, JPG o JPEG</p>
        </div>
        <div class="userInputs roundedBorder pl-12 pr-12 pt-5 pb-5 mt-10 ´lg: subirProducto">
            <div class="subirProducto">
                <x-input-label for="name" :value="__('Nombre del producto')"/>
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required
                              autofocus autocomplete="name"/>
                <x-input-error class="mt-2" :messages="$errors->get('name')"/>
            </div>
            <div class="border border-black w-full flex-grow mt-3"></div>

            <div mt-5>
                <x-input-label for="brand" :value="__('Marca del producto')"/>
                <x-text-input id="brand" name="brand" type="text" class="mt-1 block w-full"
                              :value="old('brand')" required autofocus autocomplete="name"/>
                <x-input-error class="mt-2" :messages="$errors->get('brand')"/>
            </div>
            <div class="border border-black w-full flex-grow mt-3"></div>
            <div mt-5>
                <x-input-label for="id_category" :value="__('Categoría')"/>
                <label for="id_category" class="sr-only">Underline select</label>
                <select name="id_category" id="id_category" class="block py-2.5 px-0 w-full text-sm black bg-transparent border-0 border-b-2 border-gray-800 appearance-none focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="border border-black w-full flex-grow mt-3"></div>

            <div mt-5>
                <x-input-label for="car_from" :value="__('Coche del que se extrajo')"/>
                <x-text-input id="car_from" name="car_from" type="text" class="mt-1 block w-full"
                              :value="old('carFrom')" required autofocus autocomplete="name"/>
                <x-input-error class="mt-2" :messages="$errors->get('carFrom')"/>
            </div>
            <div class="border border-black w-full flex-grow mt-3"></div>

            <div mt-5>
                <x-input-label for="status" :value="__('Estado')"/>
                <x-text-input id="status" name="status" type="text" class="mt-1 block w-full"
                              :value="old('status')" required autofocus autocomplete="name"/>
                <x-input-error class="mt-2" :messages="$errors->get('status')"/>
            </div>
            <div class="border border-black w-full flex-grow mt-3"></div>
            <div mt-5>
                <x-input-label for="antiquity" :value="__('Antigüedad')"/>
                <x-text-input id="antiquity" name="antiquity" type="text" class="mt-1 block w-full"
                              :value="old('antiquity')" required autofocus autocomplete="name"/>
                <x-input-error class="mt-2" :messages="$errors->get('antiquity')"/>
            </div>
            <div class="border border-black w-full flex-grow mt-3"></div>
            <div mt-5>
                <x-input-label for="kilometers" :value="__('Kilometraje')"/>
                <x-text-input id="kilometers" name="kilometers" type="number" class="mt-1 block w-full"
                              :value="old('kilometers')" required autofocus autocomplete="name"/>
                <x-input-error class="mt-2" :messages="$errors->get('kilometers')"/>
            </div>
            <div class="border border-black w-full flex-grow mt-3"></div>
            <div mt-5>
                <x-input-label for="description" :value="__('Descripción')"/>
                <x-text-input id="description" name="description" type="text" class="mt-1 block w-full"
                              :value="old('price')" required autofocus autocomplete="name"/>
                <x-input-error class="mt-2" :messages="$errors->get('description')"/>
            </div>
            <div class="border border-black w-full flex-grow mt-3"></div>
            <div mt-5>
                <x-input-label for="price" :value="__('Precio')"/>
                <x-text-input id="price" name="price" type="number" class="mt-1 block w-full"
                              :value="old('price')" required autofocus autocomplete="name"/>
                <x-input-error class="mt-2" :messages="$errors->get('price')"/>
            </div>
            <div class="border border-black w-full flex-grow mt-3"></div>

            <div class="centrar gap-4 mt-4">
                <x-primary-button>{{ __('¡Vender producto!') }}</x-primary-button>
            </div>
            <div class="text-red-600">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </form>
</div>
