<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-black">
            {{ __('¿Seguro de que quieres borrar la cuenta?') }}
        </h2>

        <p class="mt-1 text-sm text-black">
            {{ __('Una vez que borres tu cuenta, todo será permanentemente eliminado, así que si quieres guardar algo, descárgalo en este momento.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Delete Account') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-black">
                {{ __('Confirmación') }}
            </h2>

            <p class="mt-1 text-sm text-black">
                {{ __('¿Estás completamente seguro? En el caso de que sí, ponga su contraseña en el cuadro de texto de abajo.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancelar') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Borrar cuenta') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
