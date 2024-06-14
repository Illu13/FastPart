<div class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-neutral-300 md:p-6">
    <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
        <a href="#" class="shrink-0 md:order-1">
            <img class="h-20 w-20" src="{{asset($product->photo)}}" alt="imac image" />
        </a>
        <label for="counter-input" class="sr-only">Cantidad:</label>
        <div class="flex items-center justify-between md:order-3 md:justify-end">
            <div class="text-end md:order-4 md:w-32">
                <p class="text-base font-bold text-gray-900 dark:text-black">{{$product->price}}€</p>
            </div>
        </div>
        <div class="w-full min-w-0 flex-1 space-y-4 md:order-2 md:max-w-md">
            <a href="#" class="text-base font-medium text-gray-900 hover:underline dark:text-black">{{$product->name}}</a>
            <div class="flex items-center gap-4">
                <button type="button" class="inline-flex items-center text-sm font-medium text-red-600 hover:underline dark:text-red-500" wire:click="delete">
                    <svg class="me-1.5 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                    </svg>
                    Eliminar
                </button>
            </div>
        </div>
    </div>
</div>
