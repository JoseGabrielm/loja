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
    </div>

    <div class="flex space-x-6">
        <div class="py-3 pl-6 z-10">
            <select wire:model.debounce.500ms="search" id="form-group_id" class="mt-1 h-8 text-sm pr-8 pl-4 py-1 align-text-top border-cinza-300 rounded-lg ring-0 shadow-sm
            focus:border-marrom-700 focus:ring focus:ring-marrom-200 focus:ring-opacity-50 w-36">
                <option value="" class=""> Todos </option>

            </select>
        </div>

    </div>
</div>
