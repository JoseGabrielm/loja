<div>

    <!-- menu de navegação -->
    <nav class="bg-gray-800">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button-->
                    <button type="button"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-branco hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-branco"
                        aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <!--
                Icon when menu is closed.

                Heroicon name: outline/menu

                Menu open: "hidden", Menu closed: "block"
              -->
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <!--
                Icon when menu is open.

                Heroicon name: outline/x

                Menu open: "block", Menu closed: "hidden"
              -->
                        <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex-shrink-0 flex items-center">
                        <img class="block lg:hidden h-8 w-auto"
                            src="https://tailwindui.com/img/logos/workflow-mark-marrom-500.svg" alt="Workflow">
                        <img class="hidden lg:block h-8 w-auto"
                            src="https://tailwindui.com/img/logos/workflow-logo-marrom-500-mark-branco-text.svg"
                            alt="Workflow">
                    </div>
                    <div class="hidden sm:block sm:ml-6">
                        <div class="flex space-x-4">
                            <!-- Current: "bg-gray-900 text-branco", Default: "text-gray-300 hover:bg-gray-700 hover:text-branco" -->
                            <a href="#" class="bg-gray-900 text-branco px-3 py-2 rounded-md text-sm font-medium"
                                aria-current="page">Dashboard</a>

                            <a href="#"
                                class="text-gray-300 hover:bg-gray-700 hover:text-branco px-3 py-2 rounded-md text-sm font-medium">Team</a>

                            <a href="#"
                                class="text-gray-300 hover:bg-gray-700 hover:text-branco px-3 py-2 rounded-md text-sm font-medium">Projects</a>

                            <a href="#"
                                class="text-gray-300 hover:bg-gray-700 hover:text-branco px-3 py-2 rounded-md text-sm font-medium">Calendar</a>
                        </div>
                    </div>
                </div>
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <button
                        class="bg-gray-800 p-1 rounded-full text-gray-400 hover:text-branco focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-branco">
                        <span class="sr-only">View notifications</span>
                        <!-- Heroicon name: outline/bell -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </button>

                    <!-- Profile dropdown -->
                    <div class="ml-3 relative">
                        <div>
                            <button type="button"
                                class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-branco"
                                id="user-menu" aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full"
                                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                    alt="">
                            </button>
                        </div>

                        <!--
                Dropdown menu, show/hide based on menu state.

                Entering: "transition ease-out duration-100"
                  From: "transform opacity-0 scale-95"
                  To: "transform opacity-100 scale-100"
                Leaving: "transition ease-in duration-75"
                  From: "transform opacity-100 scale-100"
                  To: "transform opacity-0 scale-95"
              -->
                        <div class=" hidden origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-branco ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                role="menuitem">Your Profile</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                role="menuitem">Settings</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                role="menuitem">Sign out</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="sm:hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <!-- Current: "bg-gray-900 text-branco", Default: "text-gray-300 hover:bg-gray-700 hover:text-branco" -->
                <a href="#" class="bg-gray-900 text-branco block px-3 py-2 rounded-md text-base font-medium"
                    aria-current="page">Dashboard</a>

                <a href="#"
                    class="text-gray-300 hover:bg-gray-700 hover:text-branco block px-3 py-2 rounded-md text-base font-medium">Team</a>

                <a href="#"
                    class="text-gray-300 hover:bg-gray-700 hover:text-branco block px-3 py-2 rounded-md text-base font-medium">Projects</a>

                <a href="#"
                    class="text-gray-300 hover:bg-gray-700 hover:text-branco block px-3 py-2 rounded-md text-base font-medium">Calendar</a>
            </div>
        </div>
    </nav>




    <div class="max-w-7xl  mx-auto p-4 mt-7">

        {{-- CORES --}}
        <div class="mt-6">
            <div class=" h-14 bg-azul-900 text-branco"> 900 </div>
            <div class=" h-14 bg-azul-800 text-branco"> 800 </div>
            <div class=" h-14 bg-azul-700"> 700 </div>
            <div class=" h-14 bg-azul-600"> 600 </div>
            <div class=" h-14 bg-azul-500"> 500 </div>
            <div class=" h-14 bg-azul-400"> 400 </div>
            <div class=" h-14 bg-azul-300"> 300 </div>
            <div class=" h-14 bg-azul-200"> 200x </div>
            <div class=" h-14 bg-azul-100"> 100x </div>

            <div class=" h-14 bg-cinza-900 text-branco"> 900 </div>
            <div class=" h-14 bg-cinza-800 text-branco"> 800 </div>
            <div class=" h-14 bg-cinza-700"> 700 </div>
            <div class=" h-14 bg-cinza-600"> 600 </div>
            <div class=" h-14 bg-cinza-500"> 500 </div>
            <div class=" h-14 bg-cinza-400"> 400 </div>
            <div class=" h-14 bg-cinza-300"> 300 </div>
            <div class=" h-14 bg-cinza-200"> 200 </div>
            <div class=" h-14 bg-cinza-100"> 100 </div>

            <div class=" h-14 bg-amarelo-900 text-branco"> 900 </div>
            <div class=" h-14 bg-amarelo-800 text-branco"> 800 </div>
            <div class=" h-14 bg-amarelo-700"> 700 </div>
            <div class=" h-14 bg-amarelo-600"> 600 </div>
            <div class=" h-14 bg-amarelo-500"> 500 </div>
            <div class=" h-14 bg-amarelo-400"> 400 </div>
            <div class=" h-14 bg-amarelo-300"> 300 </div>
            <div class=" h-14 bg-amarelo-200"> 200 </div>
            <div class=" h-14 bg-amarelo-100"> 100 </div>

            <div class=" h-14 bg-vermelho-900 text-branco"> 900 </div>
            <div class=" h-14 bg-vermelho-800 text-branco"> 800 </div>
            <div class=" h-14 bg-vermelho-700"> 700 </div>
            <div class=" h-14 bg-vermelho-600"> 600 </div>
            <div class=" h-14 bg-vermelho-500"> 500 </div>
            <div class=" h-14 bg-vermelho-400"> 400 </div>
            <div class=" h-14 bg-vermelho-300"> 300 </div>
            <div class=" h-14 bg-vermelho-200"> 200 </div>
            <div class=" h-14 bg-vermelho-100"> 100 </div>

            <div class=" h-14 bg-verde-900 text-branco"> 900 </div>
            <div class=" h-14 bg-verde-800 text-branco"> 800 </div>
            <div class=" h-14 bg-verde-700"> 700 </div>
            <div class=" h-14 bg-verde-600"> 600 </div>
            <div class=" h-14 bg-verde-500"> 500 </div>
            <div class=" h-14 bg-verde-400"> 400 </div>
            <div class=" h-14 bg-verde-300"> 300 </div>
            <div class=" h-14 bg-verde-200"> 200 </div>
            <div class=" h-14 bg-verde-100"> 100 </div>

            <div class=" h-14 bg-marrom-900 text-branco"> 900 </div>
            <div class=" h-14 bg-marrom-800 text-branco"> 800 </div>
            <div class=" h-14 bg-marrom-700"> 700 </div>
            <div class=" h-14 bg-marrom-600"> 600 </div>
            <div class=" h-14 bg-marrom-500"> 500 </div>
            <div class=" h-14 bg-marrom-400"> 400 </div>
            <div class=" h-14 bg-marrom-300"> 300 </div>
            <div class=" h-14 bg-marrom-200"> 200 </div>
            <div class=" h-14 bg-marrom-100"> 100 </div>

            <div class=" h-14 bg-terra-50"> 50 terra </div>
            <div class=" h-14 bg-terra-40"> 40 </div>
            <div class=" h-14 bg-terra-30"> 30 </div>
            <div class=" h-14 bg-terra-20"> 20 </div>
            <div class=" h-14 bg-terra-10"> 10 </div>

            <div class=" h-14 bg-floresta-60 text-branco"> 60 floresta </div>
            <div class=" h-14 bg-floresta-50 text-branco"> 50 </div>
            <div class=" h-14 bg-floresta-40"> 40 </div>
            <div class=" h-14 bg-floresta-30"> 30 </div>
            <div class=" h-14 bg-floresta-20"> 20 </div>
            <div class=" h-14 bg-floresta-10"> 10 </div>

            <div class=" h-14 bg-relva-40"> 40 relva </div>
            <div class=" h-14 bg-relva-30"> 30 </div>
            <div class=" h-14 bg-relva-20"> 20 </div>
            <div class=" h-14 bg-relva-10"> 10 </div>

            <div class=" h-14 bg-argila-40"> 40 argila </div>
            <div class=" h-14 bg-argila-30"> 30 </div>
            <div class=" h-14 bg-argila-20"> 20 </div>
            <div class=" h-14 bg-argila-10"> 10 </div>

            <div class=" h-14 bg-celeste-40 text-branco"> 40 celeste </div>
            <div class=" h-14 bg-celeste-30"> 30 </div>
            <div class=" h-14 bg-celeste-20"> 20 </div>
            <div class=" h-14 bg-celeste-10"> 10 </div>


            <div class=" h-14 bg-supreme-rosa"> rosa </div>
            <div class=" h-14 bg-supreme-terra"> terra </div>
            <div class=" h-14 bg-supreme-base"> base </div>
            <div class=" h-14 bg-supreme-fundo"> fundo </div>
            <div class=" h-14 bg-supreme-ecinco"> ecinco </div>

            <div class=" h-14 bg-preto text-branco"> preto </div>
            <div class=" h-14 bg-branco"> branco </div>

            <div class=" h-14" style="background-color:#ffffff;"> ff </div>




        </div>

    </div>

    @if (session('alert'))
        <x-modal.alert class="bg-amarelo-200" :message="session('alert')"></x-modal.alert>
    @endif




</div>
