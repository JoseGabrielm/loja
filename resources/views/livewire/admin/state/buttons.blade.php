<div class="flex flex-wrap mx-5 justify-between">
    <div class="flex">
        <div class="bg-verde-580 py-3 pl-6 z-10">
            <x-button.primary wire:click="new" class="w-28">
                <div class="flex items-center place-content-center space-x-2">
                    <x-icon.plus class="w-5 h-5"></x-icon.plus>
                    Novo
                </div>
            </x-button.primary>
        </div>
        <div class="bg-verde-580 py-3 pl-6 z-10">
            <x-button.secundary wire:click="export" class="w-28">
                <div class="flex items-center place-content-center space-x-2">
                    <x-icon.plus class="w-5 h-5"></x-icon.plus>
                    Exportar
                </div>
            </x-button.secundary>
        </div>
        <div class="bg-verde-580 py-3 pl-6 z-10">
                <x-button.info wire:click="openModalImport" class="w-28">
                    <div class="flex items-center place-content-center space-x-2">
                        <x-icon.plus class="w-5 h-5"></x-icon.plus>
                        Importar
                    </div>
                </x-button.info>
        </div>
    </div>

    @if (session('importSuccess'))
    <div class=" px-2 h-5 rounded-lg bg-amarelo-600">
        <p class="align-middle">{{ session('importSuccess') }}</p>
    </div>
    @endif
    
    <div class="flex space-x-6">
        <div class="py-3 pl-6 z-10">
            <input wire:model.debounce.500ms="search" type="search" placeholder="Filtrar"
                class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
        </div>
    </div>
</div>