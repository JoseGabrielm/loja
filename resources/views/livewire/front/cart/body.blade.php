@if (!$formConfirmAd)

    <div class="relative col-span-3 p-3">
        <h1 class="text-xl font-medium "> Carrinho de Compras </h1>

        @foreach (Cart::content() as $item)
            @include('livewire.front.cart.itens')
        @endforeach

        <div class="flex items-center justify-between pt-3 mt-6 border-t md:p-8">
            <div class="flex">
                <a href="{{ route('front.shop') }}">
                    <x-button.secundary class="px-1 font-medium text-md md:px-3 text-branco">
                        Comprar mais itens
                    </x-button.secundary>
                </a>
            </div>

        </div>

        @include('livewire.front.cart.footer')
        @include('livewire.front.cart.modalLogin')

    </div>

    @if (Cart::count() > 0)
        @include('livewire.front.cart.side')
    @endif
@else
    <div class="col-span-3 p-3">
        @include('livewire.front.cart.formAddress')
    </div>


    @include('livewire.front.cart.side')





    <div class="right-0 pt-6">

        <x-button.primary wire:click="saveShipping()" class="w-28">
            <div class="flex items-center space-x-2 place-content-center">
                <x-icon.plus class="w-5 h-5"></x-icon.plus>
                Salvar
            </div>
        </x-button.primary>
    </div>


    @include('livewire.front.cart.modalLogin')






@endif
