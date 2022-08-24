<!-- verificando auth -->
@auth()
    <div class="container relative mx-auto">
        <nav x-data="{ open: false }" class="container fixed top-0 z-40 mx-auto shadow-sm bg-celeste-40">

            <!-- Primary Navigation Menu -->
            <div class="px-4 mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex w-full">
                        <!-- Logo -->
                        <a href="{{ route('front.shop') }}">
                            <x-icon.logo-supreme class="w-32 text-amarelo-500" />
                        </a>
                        <!-- Navigation Links -->
                        <x-nav.navigation-itens />
                    </div>
                    <div class="flex place-items-center">
                        <!-- Cart -->
                        <div class="relative z-0 m-4">
                            <a href="{{ route('front.cart') }}">
                                <x-icon.shopping-cart class="z-10 w-8 h-8 text-branco hover:text-cinza-500" />
                            </a>
                            @if (Cart::count() > 0)
                                <p class="absolute inset-x-0 bottom-0 z-30 text-xl ml-7 text-amarelo-300">
                                    {{ Cart::count() }}
                                </p>
                            @endif
                        </div>
                        <!-- hidden or show menu right -->
                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <!-- Settings Dropdown -->
                            <div class="relative ml-3 ">
                                <x-jet-dropdown align="right" width="48">
                                    <!-- photo or name -->
                                    <x-slot name="trigger">
                                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                            <button
                                                class="flex text-sm transition border-2 border-transparent rounded-full focus:outline-none focus:border-cinza-300 hover:bg-cinza-500">
                                                <img class="object-cover w-8 h-8 rounded-full "
                                                    src="{{ Auth::user()->profile_photo_url }}"
                                                    alt="{{ Auth::user()->name }}" />
                                            </button>
                                        @else
                                            <span class="inline-flex rounded-md">
                                                <button type="button"
                                                    class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 transition border border-transparent rounded-md text-preto bg-branco hover:text-cinza-700 focus:outline-none">
                                                    {{ Auth::user()->name }}

                                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </span>
                                        @endif
                                    </x-slot>
                                    <x-slot name="content">
                                        <x-form.dropdown-link href="{{ route('front.registration') }}"
                                            class="text-preto hover:text-cinza-700 focus:bg-cinza-200">
                                            {{ __('Perfil') }}
                                        </x-form.dropdown-link>
                                        <div class="border-t border-cinza-100"></div>

                                        @can('isManager')
                                            <x-jet-responsive-nav-link href="{{ route('admin.clients') }}"
                                                :active="request()->routeIs('admin.clients')">
                                                {{ __('Painel') }}
                                            </x-jet-responsive-nav-link>
                                        @endCan

                                        <div class="border-t border-cinza-100"></div>


                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <x-form.dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    this.closest('form').submit();"
                                                class="text-preto hover:text-cinza-700 focus:bg-cinza-200">
                                                {{ __('Sair') }}
                                            </x-form.dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-jet-dropdown>
                            </div>
                        </div>
                    </div>

                    <!-- Hamburger -->
                    <div class="flex items-center block -mr-2 md:hidden">
                        <button @click="open = ! open" class="inline-flex items-center justify-center p-2 transition rounded-md text-cinza-400 hover:text-cinza-500 hover:bg-cinza-100 focus:outline-none focus:bg-cinza-100 focus:text-cinza-500">
                            <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Responsive Navigation Menu -->
            <div :class="{'block': open, 'hidden': !open}" class="sm:hidden">

                <!-- Navigation Links -->
                <x-nav.navigation-itens-responsive />

                <!-- Responsive Settings Options -->
                <div class="pt-2 pb-1 border-t border-cinza-200">
                    <!-- hidden or show menu photo -->
                    <div class="flex items-center px-4">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <div class="flex-shrink-0 mr-3">
                                <img class="object-cover w-10 h-10 rounded-full"
                                    src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </div>
                        @endif
                        <div>
                            <div class="text-base font-medium text-cinza-800">{{ Auth::user()->name }}</div>
                            <div class="text-sm font-medium text-cinza-500">{{ Auth::user()->email }}</div>
                        </div>
                    </div>
                    <!-- profile ou exit -->
                    <div class="mt-3 space-y-1">
                        <!-- Account Management -->
                        <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                            {{ __('Perfil') }}
                        </x-jet-responsive-nav-link>




                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-jet-responsive-nav-link href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Sair') }}
                            </x-jet-responsive-nav-link>
                        </form>
                    </div>
                </div>
            </div>

        </nav>
    </div>
@endauth


@guest()
    <div class="container relative mx-auto">
        <nav x-data="{ open: false }" class="container fixed top-0 z-40 mx-auto shadow-sm bg-celeste-40">



            <div class="px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex w-full">
                        <!-- Logo -->
                        <a href="{{ route('front.shop') }}">
                            <x-icon.logo-supreme class="w-32 pb-2 text-branco" />
                        </a>
                        <!-- TROCAR PARA ITENS DE GUEST -->
                        <x-nav.navigation-itens />

                    </div>
                    <div class="flex place-items-center">
                        <div class="relative z-0 flex flex-row justify-between place-items-center">



                            <a href="{{ route('front.about') }}">
                                <button class="w-10 h-10 border-2 border-black rounded-full md:hidden bg-amarelo-600">

                                    <span class="p-2 text-base font-bold">?</span>

                                </button>
                            </a>



                            <a href="{{ route('front.cart') }}">
                                <x-icon.shopping-cart class="z-10 w-8 h-8 text-branco hover:text-cinza-500" />
                            </a>
                            @if (Cart::count() > 0)
                                <p class="absolute inset-x-0 bottom-0 z-30 text-xl ml-7 text-amarelo-300">
                                    {{ Cart::count() }}
                                </p>
                            @endif







                        </div>
                        <div class="hidden md:flex sm:items-center sm:ml-4">

                            @if (Route::has('login'))
                                <div class="py-2 sm:px-4 sm:py-4">
                                    @auth
                                        <a href="{{ route('front.shop') }}" class="text-sm underline text-branco">Produtos</a>
                                    @else
                                        <div class="flex">
                                            <a href="{{ route('login') }}" class="text-sm underline text-branco">Entrar</a>

                                            @if (Route::has('register'))
                                                <a href="{{ route('register') }}" class="ml-4 text-sm underline text-branco">Cadastrar</a>
                                            @endif
                                        </div>
                                    @endauth
                                </div>
                            @endif
                        </div>


                    </div>
                </div>

            </div>



        </nav>
    </div>



@endguest
