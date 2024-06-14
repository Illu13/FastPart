<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="grid grid-cols-2 gap-4">
            <div class="col-span-1">
                <x-input-label for="name" :value="__('Nombre')"/>
                @if(isset($user))
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                                  required
                                  autofocus autocomplete="name" :valor="$user->user['given_name']"/>
                @else
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                                  required
                                  autofocus autocomplete="name"/>
                @endif
                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
            </div>
            <div class="col-span-1">
                <x-input-label for="surname" :value="__('Apellido')"/>
                @if(isset($user->user['family_name']))
                    <x-text-input id="surname" class="block mt-1 w-full" type="text" name="surname"
                                  :value="old('surname')"
                                  :valor="$user->user['family_name']" required autofocus autocomplete="name"/>
                @else
                    <x-text-input id="surname" class="block mt-1 w-full" type="text" name="surname"
                                  :value="old('surname')"
                                  required autofocus autocomplete="name"/>
                @endif
                <x-input-error :messages="$errors->get('surname')" class="mt-2"/>
            </div>
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')"/>
            @if(isset($user))
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                              required
                              :valor="$user->user['email']" autocomplete="username"/>
            @else
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                              required
                               autocomplete="username"/>
            @endif
            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
        </div>

        <div class="grid grid-cols-2 gap-4 mt-4">
            <div class="col-span-1">
                <x-input-label for="country" :value="__('País')"/>
                <x-text-input id="country" class="block mt-1 w-full" type="text" name="country" :value="old('country')"
                              required autofocus autocomplete="name"/>
                <x-input-error :messages="$errors->get('country')" class="mt-2"/>
            </div>
            <div class="col-span-1">
                <x-input-label for="postalCode" :value="__('Código postal')"/>
                <x-text-input id="postalCode" class="block mt-1 w-full" type="text" name="postalCode"
                              :value="old('postalCode')" required autofocus autocomplete="name"/>
                <x-input-error :messages="$errors->get('postalCode')" class="mt-2"/>
            </div>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')"/>

            <x-text-input id="password" class="block mt-1 w-full"
                          type="password"
                          name="password"
                          required autocomplete="new-password"/>

            <x-input-error :messages="$errors->get('password')" class="mt-2"/>
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar contraseña')"/>

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                          type="password"
                          name="password_confirmation" required autocomplete="new-password"/>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
        </div>
        <div class="mt-4">
            <x-input-label for="telephone" :value="__('Teléfono')"/>

            <x-text-input id="telephone" class="block mt-1 w-full"
                          type="tel"
                          name="telephone" required :value="old('telephone')"/>

            <x-input-error :messages="$errors->get('telephone')" class="mt-2"/>
        </div>
        <div class="mt-4">
            <x-input-label for="birthDate" :value="__('Fecha de nacimiento')"/>

            <x-text-input id="birthDate" class="block mt-1 w-full"
                          type="date"
                          name="birthDate" required autocomplete="new-password" :value="old('birthDate')"/>

            <x-input-error :messages="$errors->get('birthDate')" class="mt-2"/>
        </div>
        <div class="flex items-center mt-4">
            <input id="terms" name="terms" type="checkbox" value="" required
                   class="checkMarcado w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="link-checkbox" class="ms-2 text-sm">Acepto los <a href="{{route('cookies')}}" class="terminos hover:underline">términos
                    y condiciones</a>.</label>
        </div>
        <div class="flex items-center mt-4">
            <input id="age" name="age" type="checkbox" value="" required
                   class="checkMarcado w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="link-checkbox" class="ms-2 text-sm">Soy mayor de edad.</label>
        </div>
        <div class="mt-4 centrar">
            <x-primary-button class="btn-block loginButton">
                {{ __('Crear cuenta') }}
            </x-primary-button>
        </div>


        <div class="mt-4 centrar">

            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
               href="{{ route('password.request') }}">
                {{ __('¿Contraseña olvidada?') }}
            </a>
        </div>
        <div class="mt-4 centrar">

            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
               href="{{ url('/login') }}">
                {{ __('¿Tienes cuenta?') }}
            </a>
        </div>

    </form>
</x-guest-layout>
