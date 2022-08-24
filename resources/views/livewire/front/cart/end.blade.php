<div class="overflow-visible flex justify-between items-center shadow-xl ">
    <div class="rounded w-full h-full bg-cinza-400 py-2 px-4 relative right-8">
        {{-- CEP --}}
        <div class="flex justify-center flex-col pt-2">
            <label class="text-xs text-cinza-700 "> CEP: </label>
            @if ($editedEnd !== null)
                <div class="flex w-full space-x-4">
                    <input type="text" wire:model="postcode" class="w-1/2 h-5 py-3 bg-cinza-700 text-branco text-xs rounded-sm focus:outline-none focus:border-none focus:ring-0" />
                    <x-button.secundary wire:click="searchAddress" class="w-1/2 h-7">Importar Rua
                    </x-button.secundary>
                </div>
                @if ($errors->has('postcode'))
                    <span class="text-vermelho-600 text-xs focus-none ">{{ $errors->first('postcode') }} </span>
                @endif
            @else
                <div class=" ">
                    <input type="text" wire:model="postcode" readonly class="w-full h-5 py-3 bg-cinza-800 text-branco text-xs rounded-sm focus:outline-none focus:border-none focus:ring-0" />
                </div>
            @endif
        </div>
        {{-- Endereço --}}
        <div class="flex justify-center flex-col pt-2">
            <label class="text-xs text-cinza-700 "> Endereço: </label>
            @if ($editedEnd !== null)
                <input type="text" wire:model="street" class="w-full h-5 py-3 bg-cinza-700 text-branco text-xs rounded-sm focus:outline-none focus:border-none focus:ring-0" />
                @if ($errors->has('street'))
                    <span class="text-vermelho-600 text-xs">{{ $errors->first('address') }} </span>
                @endif
            @else
                <div class=" ">
                    <input type="text" wire:model="street" readonly  class="w-full h-5 py-3 bg-cinza-800 text-branco text-xs rounded-sm focus:outline-none focus:border-none focus:ring-0" />
                </div>
            @endif
        </div>
        {{-- Número --}}
        <div class="flex justify-center flex-col pt-2">
            <label class="text-xs text-cinza-700 "> Número: </label>
            @if ($editedEnd !== null)
                <input type="text" wire:model="number" class="w-full h-5 py-3 bg-cinza-700 text-branco text-xs rounded-sm focus:outline-none focus:border-none focus:ring-0" />
                @if ($errors->has('number'))
                    <span class="text-vermelho-600 text-xs">{{ $errors->first('number') }} </span>
                @endif
            @else
                <div class=" ">
                    <input type="text" wire:model="number" readonly class="w-full h-5 py-3 bg-cinza-800 text-branco text-xs rounded-sm focus:outline-none focus:border-none focus:ring-0" />
                </div>
            @endif
        </div>
        {{-- Bairro --}}
        <div class="flex justify-center flex-col pt-2">
            <label class="text-xs text-cinza-700 "> Bairro: </label>
            @if ($editedEnd !== null)
                <input type="text" wire:model="neighborhood" class="w-full h-5 py-3 bg-cinza-700 text-branco text-xs rounded-sm focus:outline-none focus:border-none focus:ring-0" />
                @if ($errors->has('neighborhood'))
                    <span class="text-vermelho-600 text-xs">{{ $errors->first('neighborhood') }} </span>
                @endif
            @else
                <div class=" ">
                    <input type="text" wire:model="neighborhood" readonly  class="w-full h-5 py-3 bg-cinza-800 text-branco text-xs rounded-sm focus:outline-none focus:border-none focus:ring-0" />
                </div>
            @endif
        </div>
        {{-- Complemento --}}
        <div class="flex justify-center flex-col pt-2">
            <label class="text-xs text-cinza-700 "> Complemento: </label>
            @if ($editedEnd !== null)
                <input type="text" wire:model="complement" class="w-full h-5 py-3 bg-cinza-700 text-branco text-xs rounded-sm focus:outline-none focus:border-none focus:ring-0" />
                @if ($errors->has('complement'))
                    <span class="text-vermelho-600 text-xs">{{ $errors->first('complement') }} </span>
                @endif
            @else
                <div class=" ">
                    <input type="text" wire:model="complement" readonly  class="w-full h-5 py-3 bg-cinza-800 text-branco text-xs rounded-sm focus:outline-none focus:border-none focus:ring-0" />
                </div>
            @endif
        </div>
        {{-- Cidade --}}
        <div class="flex justify-center flex-col py-2">
            <label class="text-xs text-cinza-700 "> Cidade: </label>
            <div class=" ">
                <input type="text" wire:model="city" readonly class="w-full h-5 py-3 bg-cinza-800 text-branco text-xs rounded-sm focus:outline-none focus:border-none focus:ring-0" />
            </div>
        </div>
    </div>
</div>


<div class="p-3">
    <div class="text-gray-900 px-4 py-2 flex">
        @if ($editedEnd == null)
            <x-button.primary wire:click.prevent="editAddress()" class="w-full h-12">
                Modificar Endereço
            </x-button.primary>
        @else
            <x-button.success wire:click.prevent="saveAddress()" class="w-full h-12">
                Salvar Endereço
            </x-button.success>
        @endif
    </div>
</div>
