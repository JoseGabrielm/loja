<div class="overflow-visible flex justify-between items-center shadow-xl ">
    <div class="rounded w-full h-full bg-cinza-400 p-4 relative right-8">

        <div class=" p-5 bg-cinza-800 rounded overflow-visible">
            <span class="text-xl font-medium text-cinza-100 block pb-3">
                Cartão de Crédito
            </span>
            <div class="w-full">
                @include('livewire.front.checkout.credcard')
            </div>
            <div class="flex justify-center flex-col pt-3">
                <label class="text-xs text-cinza-400 "> Nome do Usuario do Cartão </label>
                <input type="text" placeholder="Nome do usuário"
                    class="focus:outline-none w-full h-6 bg-cinza-800 text-branco placeholder-cinza-300 text-sm border-b border-cinza-600 py-4">
            </div>
            <div class="flex justify-center flex-col pt-3">
                <label class="text-xs text-cinza-400 "> Número do Cartão </label>
                <input type="text" placeholder="**** **** **** ****"
                class="focus:outline-none w-full h-6 bg-cinza-800 text-branco placeholder-cinza-300 text-sm border-b border-cinza-600 py-4">
            </div>
            <div class="grid grid-cols-3 gap-2 pt-2 mb-3">
                <div class="col-span-2 ">
                    <label class="text-xs text-cinza-400"> Data de Expiração do Cartão </label>
                    <div class="grid grid-cols-2 gap-2">
                        <input type="text" placeholder="mm"
                            class="focus:outline-none w-full h-6 bg-cinza-800 text-branco placeholder-cinza-300 text-sm border-b border-cinza-600 py-4">
                        <input type="text" placeholder="aaaa"
                            class="focus:outline-none w-full h-6 bg-cinza-800 text-branco placeholder-cinza-300 text-sm border-b border-cinza-600 py-4">
                    </div>
                </div>
                <div class="">
                    <label class="text-xs text-cinza-400"> CVV </label>
                    <input type="text" placeholder="XXX"
                        class="focus:outline-none w-full h-2 bg-cinza-800 text-branco placeholder-cinza-300 text-sm border-b border-cinza-600 py-4">
                </div>
            </div>
            <button wire:click.prevent="payCard()" class="h-12 w-full my-2 bg-azul-500 rounded focus:outline-none text-branco hover:bg-azul-600"> 
                Pagar com Cartão de Crédito
                <div wire:loading class="w-1/3">
                    <x-loading.clock-white class="mt-4 la-timer la-sm" />
                </div>
             </button>
        </div>

    </div>

</div>
