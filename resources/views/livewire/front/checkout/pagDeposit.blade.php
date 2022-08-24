<div class="overflow-visible flex justify-between items-center shadow-xl ">
    <div class="rounded w-full h-full bg-cinza-400 p-4 relative right-8">

        <div class=" p-5 bg-cinza-600 rounded overflow-visible">
            <span class="text-xl font-medium text-cinza-100 block pb-3">
                Deposito
            </span>
            <div class="self-center overflow-visible flex justify-center items-center mt-2">
                <div class="rounded w-60 h-36 bg-cinza-500 py-2 px-4 flex justify-center ">
                    <img class="w-56" src="{{ asset('storage/deposito.png') }}" alt="{{ __('') }}">
                </div>
            </div>
            <div class="pt-3 text-cinza-200 text-sm">
                Banco Bradesco - Agência 402-2
            </div>
            <div class="pt-3 text-cinza-200 text-sm">
                CC 80131-3 - Supreme Moveis Corporativos
            </div>
            <div class="pt-3 text-cinza-200 text-sm">
                PIX: financeiro@supreme.ind.br
            </div>
            <div class="pt-3 text-cinza-200 text-sm">
                Após efetuar o pagamento envie o comprovante
            </div>

            <div class="pt-3 text-cinza-200 text-sm">
                pelo email:
                <b class="text-lg">financeiro@supreme.ind.br</b> com o assunto:
            </div>


            <div class="pt-3 text-cinza-200 ">
                <b class="text-lg">"Comprovante de depósito do pedido: {{$order->id}}" </b>
            </div>


            @if (Session::has('message'))
                <div class="h-16 p-2  bg-verde-400  text-center rounded-lg shadow-xl">
                    <em class="text-branco text-sm"> {!! session('message') !!}</em>
                </div>
            @else
                <button wire:click.prevent="payDeposit()"
                    class="h-12 mt-5 w-full bg-azul-500 rounded focus:outline-none text-branco hover:bg-azul-600">
                    Pagar com Depósito
                    <div wire:loading class="w-2/3">
                        <x-loading.clock-white class="  la-timer la-sm" />
                    </div>
                </button>
            @endif

        </div>

    </div>
</div>
