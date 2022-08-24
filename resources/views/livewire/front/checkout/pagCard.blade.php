<div class="flex items-center justify-between overflow-visible shadow-xl ">
    <div class="relative w-full h-full p-4 rounded bg-cinza-400 right-8">

        <div class="p-5 overflow-visible rounded bg-cinza-600">
            <span class="block pb-3 text-xl font-medium text-cinza-100">
                Cartão de Crédito
            </span>
            <div class="w-full mt-2">
                @include('livewire.front.checkout.credcard')
            </div>
            <div class="pt-3 text-sm leading-6 text-cinza-200">
               Uma nova aba será aberta em seu navegador para dar prosseguimento ao seu pagamento.

            </div>

            <div class="pt-3 text-sm leading-6 text-cinza-200">
            caso não consiga visualizar a aba de pagamento
            <a href="" title="tutorial"><b>clique AQUI</b> </a> siga o tutorial
            </div>
            <div class="pt-3 text-sm leading-6 text-cinza-200">
                 Nenhuma informação sua será armazenada em nossos servidores, exceto os dados para entrega.
            </div>


            @if ($order->status !== 'payment confirmed')


            <div class="pt-2">
            <button wire:click.prevent="payCard()" class="w-full h-12 my-2 rounded bg-azul-500 focus:outline-none text-branco hover:bg-azul-600">
                Pagar com Cartão de Crédito
                <div wire:loading class="w-1/3">
                    <x-loading.clock-white class="mt-4 la-timer la-sm" />
                </div>
             </button>
            </div>

            @else





            @endif
        </div>

    </div>

</div>
