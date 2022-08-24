<div class="flex fixed top-32 z-50 ">
    <x-modal.dialog wire:model='formModalOpened' title='Formulário de Produto' class="">
        <div class="w-full space-y-3">
            <div>
                <x-form.label for="form.name" value="{{ __('Nome do Produto') }}" />
                <x-form.text wire:model.defer="form.name" rows="3" id="form-name" placeholder="Nome do Produto" class="mt-1 w-full" />
                <x-alert.error-form for="form.name" class="mt-2" />
            </div>
            <div class="flex space-x-6">
                <div class="">
                    <x-form.label for="form.sku" value="{{ __('SKU') }}" />
                    <x-form.text wire:model.defer="form.sku" id="form-sku" type="text" placeholder="SKU da grupo" class="mt-1 w-20" />
                    <x-alert.error-form for="form.sku" class="mt-2" />
                </div>
                <div class="">
                    <x-form.label for="form.order" value="{{ __('Ordem') }}" />
                    <x-form.text wire:model.defer="form.order" id="form-order" type="text" placeholder="Ordem de exibição" class="mt-1 w-20" />
                    <x-alert.error-form for="form.order" class="mt-2" />
                </div>
                <div class="">
                    <x-form.label for="form.qty_ship" value="{{ __('Quant/frete') }}" />
                    <x-form.text wire:model.defer="form.qty_ship" id="form-qty_ship" type="text" placeholder="Quantidade por frete" class="mt-1 w-20" />
                    <x-alert.error-form for="form.qty_ship" class="mt-2" />
                </div>
                <div class="text-center">
                    <x-form.label for="form.active" value="{{ __('Ativo') }}" />
                    <input type="checkbox" wire:model.defer="form.active" id="form-active" class="mt-3 " />
                </div>
                <div>
                    <x-form.label for="form.category_id" value="{{ __('Categoria') }}" class="" />                                                          
                        <select  wire:model="form.category_id" id="form-category_id" class="mt-1 h-8 text-sm pr-8 pl-4 py-1 align-text-top border-cinza-300 rounded-lg ring-0 shadow-sm
                        focus:border-marrom-700 focus:ring focus:ring-marrom-200 focus:ring-opacity-50 w-full"> 
                        @foreach ($categories as $category)                     
                            <option  value="{{ $category->id }}" class=""> {{ $category->description }} </option>
                        @endforeach
                        </select>
                    <x-alert.error-form for="form.category_id" class="mt-2" />
                </div>
            </div>
        </div>
        <x-slot name="footer">
            <x-button.white @click="$dispatch('close')" class="w-28">
                <div class="flex items-center place-content-center space-x-2">
                    <x-icon.plus class="w-5 h-5"></x-icon.plus>
                    Cancelar
                </div>
            </x-button.white>
            <x-button.primary wire:click="save" class="w-28">
                <div class="flex items-center place-content-center space-x-2">
                    <x-icon.plus class="w-5 h-5"></x-icon.plus>
                    Salvar
                </div>
            </x-button.primary>
        </x-slot>
    </x-modal.dialog>
</div>

