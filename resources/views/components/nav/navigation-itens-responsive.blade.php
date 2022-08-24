<!-- Responsive Navigation Links -->
<div class="grid space-y-6">

        <x-nav.link-responsive href="{{ route('front.shop') }}" :active="request()->routeIs('front.shop')">
            {{ __('Produto') }}
        </x-nav.link-responsive>

        <x-nav.link-responsive href="{{ route('front.cart') }}" :active="request()->routeIs('front.cart')">
            {{ __('Carrinho') }}
        </x-nav.link-responsive>

        <x-nav.link-responsive href="{{ route('front.shopping') }}" :active="request()->routeIs('front.shopping')">
            {{ __('Meus Pedidos') }}
        </x-nav.link-responsive>

        <x-nav.link-responsive href="{{ route('front.registration') }}"
            :active="request()->routeIs('front.registration')">
            {{ __('Meus Dados') }}
        </x-nav.link-responsive>

        <x-nav.link-responsive href="{{ route('front.contact') }}" :active="request()->routeIs('front.contact')">
            {{ __('Contato') }}
        </x-nav.link-responsive>

</div>
