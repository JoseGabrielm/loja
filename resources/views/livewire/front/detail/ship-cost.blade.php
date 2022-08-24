<div class="flex mt-6 pb-5 border-b-2 border-cinza-100 mb-5 ">
    <div class="flex items-center">
        <span class="mr-3">Calcule aqui o valor do frete:</span>
        <div class="relative">
            <x-form.text wire:model.lazy="zip" type="text" placeholder="Digite o CEP" class="w-32 text-center" ></x-form.text>
        </div>
        <x-button.primary wire:click="calculateShipping" class="ml-3 px-2"> Simular
        </x-button.primary>
    </div>
</div>