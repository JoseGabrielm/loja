<div class="flex items-center justify-between overflow-visible shadow-xl ">
    <div class="relative w-full h-full px-4 py-2 rounded bg-cinza-400 right-8">
        {{-- Nome --}}
        <div class="flex flex-col justify-center pt-2">
            <label class="text-xs text-cinza-700 "> Nome Completo: </label>
            @if ($editedDoc !== null)
                    <input type="text" wire:model="name"
                        class="w-full h-5 py-3 text-xs rounded-sm bg-cinza-700 text-branco focus:outline-none focus:border-none focus:ring-0" />
                @if ($errors->has('name'))
                    <span class="text-xs text-vermelho-600 focus-none ">{{ $errors->first('name') }} </span>
                @endif
            @else
                <div class="">
                    <input type="text" wire:model="name" readonly
                        class="w-full h-5 py-3 text-xs rounded-sm bg-cinza-800 text-branco focus:outline-none focus:border-none focus:ring-0" />
                </div>
            @endif
        </div>
        {{-- Nome do contato ou recebedor --}}
        <div class="flex flex-col justify-center pt-2">
            <label class="text-xs text-cinza-700 "> Nome do contato ou recebedor: </label>
            @if ($editedDoc !== null)
                    <input type="text" wire:model="contact"
                        class="w-full h-5 py-3 text-xs rounded-sm bg-cinza-700 text-branco focus:outline-none focus:border-none focus:ring-0" />
                @if ($errors->has('contact'))
                    <span class="text-xs text-vermelho-600 focus-none ">{{ $errors->first('contact') }} </span>
                @endif
            @else
                <div class="">
                    <input type="text" wire:model="contact" readonly
                        class="w-full h-5 py-3 text-xs rounded-sm bg-cinza-800 text-branco focus:outline-none focus:border-none focus:ring-0" />
                </div>
            @endif
        </div>
        {{-- CPF --}}
        <div class="flex flex-col justify-center pt-2">
            <label class="text-xs text-cinza-700 "> CPF: </label>
            @if ($editedDoc !== null)
                <input type="text" wire:model="doc_ssn"
                    class="w-full h-5 py-3 text-xs rounded-sm bg-cinza-700 text-branco focus:outline-none focus:border-none focus:ring-0" />
                @if ($errors->has('doc_ssn'))
                    <span class="text-xs text-vermelho-600">{{ $errors->first('doc_ssn') }} </span>
                @endif
            @else
                <div class="">
                    <input type="text" wire:model="doc_ssn" readonly
                        class="w-full h-5 py-3 text-xs rounded-sm bg-cinza-800 text-branco focus:outline-none focus:border-none focus:ring-0" />
                </div>
            @endif
        </div>
        {{-- CNPJ --}}
        <div class="flex flex-col justify-center pt-2">
            <label class="text-xs text-cinza-700 "> CNPJ: (Apenas para Empresas) </label>
            @if ($editedDoc !== null)
                <input type="text" wire:model="doc_country"
                    class="w-full h-5 py-3 text-xs rounded-sm bg-cinza-700 text-branco focus:outline-none focus:border-none focus:ring-0" />
                @if ($errors->has('doc_country'))
                    <span class="text-xs text-vermelho-600">{{ $errors->first('doc_country') }} </span>
                @endif
            @else
                <div class="">
                    <input type="text" wire:model="doc_country" readonly
                        class="w-full h-5 py-3 text-xs rounded-sm bg-cinza-800 text-branco focus:outline-none focus:border-none focus:ring-0" />
                </div>
            @endif
        </div>
        {{-- IE --}}
        <div class="flex flex-col justify-center pt-2">
            <label class="text-xs text-cinza-700 "> IE: (Apenas para Empresas) </label>
            @if ($editedDoc !== null)
                <input type="text" wire:model="doc_state"
                    class="w-full h-5 py-3 text-xs rounded-sm bg-cinza-700 text-branco focus:outline-none focus:border-none focus:ring-0" />
                @if ($errors->has('doc_state'))
                    <span class="text-xs text-vermelho-600">{{ $errors->first('doc_state') }} </span>
                @endif
            @else
                <div class="">
                    <input type="text" wire:model="doc_state" readonly
                        class="w-full h-5 py-3 text-xs rounded-sm bg-cinza-800 text-branco focus:outline-none focus:border-none focus:ring-0" />
                </div>
            @endif
        </div>
        {{-- Obs --}}
        <div class="flex flex-col justify-center py-2">
            <label class="text-xs text-cinza-700 "> Obs: </label>
            @if ($editedDoc !== null)
                <input type="text" wire:model="note"
                    class="w-full h-5 py-3 text-xs rounded-sm bg-cinza-700 text-branco focus:outline-none focus:border-none focus:ring-0" />
                @if ($errors->has('note'))
                    <span class="text-xs text-vermelho-600">{{ $errors->first('note') }} </span>
                @endif
            @else
                <div class="">
                    <input type="text" wire:model="note" readonly
                        class="w-full h-5 py-3 text-xs rounded-sm bg-cinza-800 text-branco focus:outline-none focus:border-none focus:ring-0" />
                </div>
            @endif
        </div>
    </div>
</div>


<div class="p-3">
    <div class="flex px-4 py-2 text-gray-900">
        @if ($editedDoc == null)
            <x-button.primary wire:click.prevent="editDocument()" class="w-full h-12">
                Modificar Documentos
            </x-button.primary>
        @else
            <x-button.success wire:click.prevent="saveDocument()" class="w-full h-12">
                Salvar Documentos
            </x-button.success>
        @endif
    </div>
</div>
