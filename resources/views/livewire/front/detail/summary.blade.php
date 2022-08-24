    <p class="ml-5 text-xl font-bold text-vermelho-600">
        {{ $noShipMessage }}
    </p>
@if ($costShip)
    <p class="mb-5 text-lg font-bold text-azul-600">
        {{ $messageNoAuth }}
    </p>
    <div class="flex justify-between mb-10 md:mb-2 pb-5 border-b-2 border-cinza-100">
        <div class="flex flex-col justify-between">
            <div class="flex items-center justify-between md:space-x-10">
                <span class="title-font font-medium text-sm text-cinza-900 align-middle"> Valor unitário: </span>
                <span class="title-font font-medium text-sm md:text-xl text-cinza-900 whitespace-nowrap">
                    {{ $prod ? 'R$ ' . number_format($prod->price, 2, ',', '.') : '' }}
                </span>
            </div>
            <div class="flex items-center justify-between md:space-x-10">
                <span class="title-font font-medium text-sm text-cinza-900"> Valor do frete: </span>
                <span class="title-font font-medium text-sm md:text-xl text-cinza-900 whitespace-nowrap">
                    {{ $prod ? 'R$ ' . number_format($costShip/100, 2, ',', '.') : '' }}
                </span>
            </div>
            <div class="flex items-center justify-between md:space-x-10">
                @php
                    if(!is_numeric($qty)){$qty = 0;}
                @endphp
                <span class="title-font font-medium text-sm text-cinza-900"> Valor total: </span>
                <span class="title-font font-medium text-sm md:text-xl text-cinza-900 whitespace-nowrap">
                    {{ $prod ? 'R$ ' . number_format( ($prod->price * $qty) + $costShip/100 , 2, ',', '.') : 0 }}
                </span>
            </div>
            <div class="flex items-center justify-between">
                <span class="title-font font-medium text-sm text-cinza-900 mr-3"> Prazo de entrega: </span>
                <span class="title-font font-medium text-sm md:text-xl text-cinza-900 whitespace-nowrap">
                    {{ $prod ? $deadlineShip . ' dias uteis' : '' }} 
                </span>
            </div>
        </div>

        <div class="flex justify-between place-items-center">
            <x-button.info wire:click="addCart" class="md:mx-3 md:px-3">
                Adicionar ao Carrinho
            </x-button.info>
            {{-- @include('livewire.front.detail.wish') --}}
        </div>
    </div>
@endif
