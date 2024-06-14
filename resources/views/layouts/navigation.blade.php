<nav x-data="{ open: false }" class="border-b border-white">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <!-- Primary Navigation Menu -->
    <div class="flex-grow ">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center content-start mr-10 ml-5">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo/>
                    </a>
                </div>
            </div>
            <div class="flex-grow w-fit mt-1 hidden md:flex ">
                <ul class="navbar-list w-full centrar">
                    <li><a href="{{ route('seeall') }}" class="hover:text-gray-700">Tienda</a></li>
                    <li><a href="{{ route('about-us') }}" class="hover:text-gray-700">Sobre nosotros</a></li>
                    <li><a href="{{ route('cookies') }}" class="hover:text-gray-700">Política de privacidad</a></li>
                    <li><a href="{{ route('cart') }}" class="hover:text-gray-700"><span
                                class="material-symbols-outlined">shopping_cart</span></a></li>
                </ul>
            </div>
            <!-- Settings Dropdown -->
            @if(Auth::check())
                <div class="hidden sm:flex sm:items-center sm:ms-6 mr-5">

                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">

                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 focus:outline-none transition ease-in-out duration-150">
                                <div class="text-white">{{ Auth::user()->name }}</div>

                                <div class="ms-1 text-white">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            @if(Auth::user()->role == 'admin')
                                <x-dropdown-link :href="route('users')">
                                    {{ __('Lista de usuarios') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('product.list')">
                                    {{ __('Lista de productos') }}
                                </x-dropdown-link>
                            @endif
                            @if(Auth::user()->role == 'seller')
                                <x-dropdown-link :href="route('product.upload')">
                                    {{ __('Subir producto') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('product.myproducts')">
                                    {{ __('Mis productos') }}
                                </x-dropdown-link>
                            @endif
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Perfil') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                                 onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Cerrar sesión') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>

                </div>
            @else
                <div class="grid-cols-2 flex content-center items-center ml-10 gap-5">
                    <a href="{{ route('login') }}">
                        <x-navbuttons>{{ __('Acceder') }}</x-navbuttons>
                    </a>
                    <a href="{{ route('register') }}">
                        <x-navbuttons href="{{ route('register') }}">{{ __('Registrarse') }}</x-navbuttons>
                    </a>
                </div>
            @endif

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                              stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Página principal') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="pt-4 pb-1 border-t border-gray-200 dark:bord    er-gray-600">
                @if(Auth::check())

                    <div class="px-4">
                        <div
                            class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                    <div class="mt-3 space-y-1">
                        @if(Auth::user()->role == 'admin')
                            <x-dropdown-link :href="route('users')">
                                {{ __('Lista de usuarios') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('product.list')">
                                {{ __('Lista de productos') }}
                            </x-dropdown-link>
                        @endif
                        @if(Auth::user()->role == 'seller')
                            <x-dropdown-link :href="route('product.upload')">
                                {{ __('Subir producto') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('product.myproducts')">
                                {{ __('Mis productos') }}
                            </x-dropdown-link>
                        @endif
                        <div class="mt-3 space-y-1">
                            <x-responsive-nav-link :href="route('profile.edit')">
                                {{ __('Perfil') }}
                            </x-responsive-nav-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-responsive-nav-link :href="route('logout')"
                                                       onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                    {{ __('Cerrar sesión') }}
                                </x-responsive-nav-link>
                            </form>

                        </div>
                        @else

                        @endif
                    </div>
            </div>
</nav>
