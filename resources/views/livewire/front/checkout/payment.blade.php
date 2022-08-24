
    <span class="block p-2 pb-3 text-xl font-medium text-center text-cinza-100">
        Formas de Pagamento:
    </span>
    <div class="flex justify-center w-full mb-3 text-preto">
        <div class="flex items-center gap-8">
            <label class="inline-flex items-center">
                <input wire:model="radioCard" wire:click="modifyRadioCard" type="radio" name="radio" value="0"
                    class="w-4 h-4 text-preto focus:outline-none focus:border-none focus:ring-0" />
                <span class="ml-2 text-branco">
                    Cartão
            </label>
            <label class="inline-flex items-center">
                <input wire:model="radioBillet" wire:click="modifyRadioBillet" type="radio" name="radio" value="0"
                    class="w-4 h-4 text-preto focus:outline-none focus:border-none focus:ring-0" />
                <span class="ml-2 text-branco">
                    Boleto (-10%)
            </label>
            <label class="inline-flex items-center">
                <input wire:model="radioDeposit" wire:click="modifyRadioDeposit" type="radio" name="radio" value="0"
                    class="w-4 h-4 text-preto focus:outline-none focus:border-none focus:ring-0" />
                <span class="ml-2 text-branco">
                    Deposito (-10%)
            </label>
        </div>
    </div>
    @if ($radioBillet == 0)
        @include('livewire.front.checkout.pagBillet')
    @endif
    @if ($radioDeposit == 0)
        @include('livewire.front.checkout.pagDeposit')
    @endif
    @if ($radioCard == 0)
        @include('livewire.front.checkout.pagCard')
    @endif
