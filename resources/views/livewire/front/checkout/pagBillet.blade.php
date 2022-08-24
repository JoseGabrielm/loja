<div class="overflow-visible flex justify-between items-center shadow-xl ">
    <div class="rounded w-full h-full bg-cinza-400 p-4 relative right-8">

        <div class=" p-5 bg-cinza-600 rounded overflow-visible">
            <span class="text-xl font-medium text-cinza-100 block pb-3">
                Boleto
            </span>
            <div class="overflow-visible flex justify-center items-center mt-2">
                <div class="rounded w-60 h-36 bg-cinza-500 py-2 px-4 flex justify-center ">
                    <img class="w-56 " src="{{ asset('storage/boleto.png') }}" alt="{{ __('') }}">
                </div>
            </div>

            <div class="pt-3 text-cinza-200 text-sm">
                Seu boleto sera emitido e gerenciado pela <b class="text-lg">gerencianet</b>
            </div>


            <div class="pt-3 text-cinza-200 text-sm">
                O boleto pode levar até 3 dias úteis para a confirmação do pagamento á Supreme Móveis Corporativos
            </div>


            <div class="pt-3 text-cinza-200 text-sm">
                Após a confirmação do pagamento começaremos a produção do seu produto
            </div>


            {{--
            <div class="pt-3 text-cinza-200 text-sm">
                Após efetuar o pagamento você pode enviar o
            </div>
            <div class="pt-3 text-cinza-200 text-sm">
                comprovante pelo whatsapp  19 99999-9999
            </div>
            <div class="pt-3 text-cinza-200 text-sm">
                ou pelo email:  financeiro@supreme.ind.br
            </div> --}}


            <button wire:click.prevent="payBillet()" class="h-12 mt-5 w-full bg-azul-500 rounded focus:outline-none text-branco hover:bg-azul-600">
                Pagar com Boleto
                <div wire:loading class="w-1/3">
                    <x-loading.clock-white class="mt-4 la-timer la-sm" />
                </div>
            </button>
        </div>

    </div>
</div>
