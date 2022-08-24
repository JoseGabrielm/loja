
        <div  class="fixed bottom-0 z-20 w-full h-24 shadow-inner md:top-0 bg-celeste-40 md:h-full md:w-32">

            <!--itens da navbar-->
            <div class="content-center justify-between text-left md:mt-16 md:w-48 md:content-start ">
                <ul class="flex flex-row px-1 py-0 text-center list-reset md:flex-col md:py-16 md:px-2 md:text-left">



                    @can('isAdmin')

                    <!--Categorias-->
                    <li class="flex-1 mr-3">
                        <x-nav.link href="{{ route('admin.categories') }}" :active="request()->routeIs('admin.categories')">
                            {{ __('Categorias') }}
                        </x-nav.link>
                    </li>


                    <!--Grupos-->
                    <li class="flex-1 mr-3 ">
                        <x-nav.link href="{{ route('admin.groups') }}" :active="request()->routeIs('admin.groups')">
                            {{ __('Grupos') }}
                        </x-nav.link>
                    </li>

                    <!--Produtos-->
                    <li class="flex-1 mr-3">
                        <x-nav.link href="{{ route('admin.products') }}" :active="request()->routeIs('admin.products')">
                            {{ __('Produtos') }}
                        </x-nav.link>
                    </li>

                     <!--Imagens-->
                     <li class="flex-1 mr-3">
                        <x-nav.link href="{{ route('admin.images') }}" :active="request()->routeIs('admin.images')">
                            {{ __('Imagens') }}
                        </x-nav.link>
                    </li>

                    <!--Fretado-->
                    <li class="flex-1 mr-3">
                        <x-nav.link href="{{ route('admin.fretados') }}" :active="request()->routeIs('admin.fretados')">
                            {{ __('Fretado') }}
                        </x-nav.link>
                    </li>

                    <!--Jadlog-->
                    <li class="flex-1 mr-3">
                        <x-nav.link href="{{ route('admin.jadlogs') }}" :active="request()->routeIs('admin.jadlogs')">
                            {{ __('Jadlog') }}
                        </x-nav.link>
                    </li>

                     <!--Usuários-->
                     <li class="flex-1 mr-3">
                        <x-nav.link href="{{ route('admin.users') }}" :active="request()->routeIs('admin.users')">
                            {{ __('Usuários') }}
                        </x-nav.link>
                    </li>

                    <!--Endereços-->
                    <li class="flex-1 mr-3">
                        <x-nav.link href="{{ route('admin.addresses') }}" :active="request()->routeIs('admin.addresses')">
                            {{ __('Endereços') }}
                        </x-nav.link>
                    </li>

                    <!--Cidades-->
                    <li class="flex-1 mr-3">
                        <x-nav.link href="{{ route('admin.cities') }}" :active="request()->routeIs('admin.cities')">
                            {{ __('Cidades') }}
                        </x-nav.link>
                    </li>

                    <!--Estados-->
                    <li class="flex-1 mr-3">
                        <x-nav.link href="{{ route('admin.states') }}" :active="request()->routeIs('admin.states')">
                            {{ __('Estados') }}
                        </x-nav.link>
                    </li>

                   <!--Detalhes-->
                   <li class="flex-1 mr-3">
                    <x-nav.link href="{{ route('admin.details') }}" :active="request()->routeIs('admin.details')">
                        {{ __('Detalhes') }}
                    </x-nav.link>
                    </li>



                    <!--Clientes-->
                    <li class="flex-1 mr-3">
                        <x-nav.link href="{{ route('admin.clients') }}" :active="request()->routeIs('admin.clients')">
                            {{ __('Clientes') }}
                        </x-nav.link>
                    </li>


                    <!--Pedidos-->
                    <li class="flex-1 mr-3">
                        <x-nav.link href="{{ route('admin.orders') }}" :active="request()->routeIs('admin.orders')">
                            {{ __('Pedidos') }}
                        </x-nav.link>
                    </li>


                    <!--Pagamentos-->
                    <li class="flex-1 mr-3">
                        <x-nav.link href="{{ route('admin.payments') }}" :active="request()->routeIs('admin.payments')">
                            {{ __('Pagamentos') }}
                        </x-nav.link>
                    </li>


                    @elsecan('isManager')



                    <!--Clientes-->
                    <li class="flex-1 mr-3">
                        <x-nav.link href="{{ route('admin.clients') }}" :active="request()->routeIs('admin.clients')">
                            {{ __('Clientes') }}
                        </x-nav.link>
                    </li>


                    <!--Pedidos-->
                    <li class="flex-1 mr-3">
                        <x-nav.link href="{{ route('admin.orders') }}" :active="request()->routeIs('admin.orders')">
                            {{ __('Pedidos') }}
                        </x-nav.link>
                    </li>


                    <!--Pagamentos-->
                    <li class="flex-1 mr-3">
                        <x-nav.link href="{{ route('admin.payments') }}" :active="request()->routeIs('admin.payments')">
                            {{ __('Pagamentos') }}
                        </x-nav.link>
                    </li>

                    @endcan

                </ul>
            </div>

        </div>
