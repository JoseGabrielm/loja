<!-- Navigation Links -->

@auth
    <div class="items-center justify-between hidden ml-8 xl:space-x-8 sm:flex">

        <x-nav.link href="{{ route('front.shop') }}" :active="request()->routeIs('front.shop')">
            {{ __('Produto') }}
        </x-nav.link>

        <x-nav.link href="{{ route('front.cart') }}" :active="request()->routeIs('front.cart')">
            {{ __('Carrinho') }}
        </x-nav.link>

        <x-nav.link href="{{ route('front.shopping') }}" :active="request()->routeIs('front.shopping')">
            {{ __('Meus Pedidos') }}
        </x-nav.link>


        <x-nav.link href="{{ route('front.contact') }}" :active="request()->routeIs('front.contact')">
            {{ __('Contato') }}
        </x-nav.link>

        <a href="{{ route('front.about') }}">
            <button class=" h-[40px] w-[40px] md:w-auto md:h-auto p-2 ml-4 rounded font-sm bg-amarelo-600 ">
                {{ __('Onde mais comprar?') }}
            </button>
        </a>


    </div>
@endauth

@guest






    <div class="flex items-center justify-between md:ml-4 xl:space-x-8">

        <x-nav.link class="hidden ml-8 md:block" href="{{ route('front.shop') }}" :active="request()->routeIs('front.shop')">
            {{ __('Produtos') }}
        </x-nav.link>

        <x-nav.link class="hidden ml-2 md:block" href="{{ route('front.contact') }}" :active="request()->routeIs('front.contact')">
            {{ __('Contato') }}
        </x-nav.link>




        <a href="{{ route('front.about') }}">
            <button class="hidden p-2 ml-4 rounded md:block md:w-auto md:h-auto bg-amarelo-600">

                <span class="text-sm">Onde mais comprar?</span>

            </button>



        </a>

    </div>






@endguest
