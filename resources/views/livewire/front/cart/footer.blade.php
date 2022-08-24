<div class=" w-full px-0 mt-10 md:flex-row md:px-5">
    <div class="w-full ml-0 md:ml-3 md:w-3/4">

        @if (Cart::count() > 0)
            {{-- <div>
                <p class="text-sm "> Frete calculado para o cep {{ $this->zip }}.</p>
                <p class="text-sm"> Valor do frete é de {{ 'R$ ' . number_format($totalship, 2, ',', '.') }} com prazo
                    de entrega de
                    {{ $deadlineship }} dias uteis.</p>
                <p class="text-sm min-w-max"> Valor total do produto e do frete é de
                    {{ 'R$ ' . number_format($totalship + Cart::total(2, '.', ''), 2, ',', '.') }}.</p>
            </div> --}}

            <div class=" w-full my-5 md:w-1/4">
                <x-button.primary wire:click.prevent="confirmInfo()" class="w-full md:w-2/3 md:h-12">
                    Continuar
                </x-button.primary>
                <div wire:loading class="w-sm">
                    <x-loading.clock-white class="ml-3 la-timer la-2x" />
                </div>

            </div>


        @else
        @endif






    </div>

</div>
