<div class="flex fixed top-32 z-50 ">
    <x-modal.dialog wire:model='formModalOpened' title='Formulário de Produto' class="">
        <div class="w-full space-y-3">
            <div class="">
                <x-form.label for="form.image" value="{{ __('Imagem') }}" />
                <x-form.text wire:model.defer="form.image" id="form-image" type="text" placeholder="URL da Imagem do Produto" class="mt-1 w-full" />
                <x-alert.error-form for="form.image" class="mt-2" />
            </div>
            <div class="flex space-x-6">
                <div class="text-center">
                    <x-form.label for="form.active" value="{{ __('Ativo') }}" />
                    <input type="checkbox" wire:model.defer="form.active" id="form-active" class="mt-3 " />
                </div>
                <div>
                    <x-form.label for="form.order" value="{{ __('Ordem') }}" />
                    <x-form.text wire:model.defer="form.order" id="form-order" type="text" placeholder="Ordem do produto" class="mt-1 w-20" />
                    <x-alert.error-form for="form.order" class="mt-2" />
                </div>
                <div>
                    <x-form.label for="form.group_id" value="{{ __('Grupo') }}" class="" />                                                          
                        <select  wire:model="form.group_id" id="form-group_id" class="mt-1 h-8 text-sm pr-8 pl-4 py-1 align-text-top border-cinza-300 rounded-lg ring-0 shadow-sm
                        focus:border-marrom-700 focus:ring focus:ring-marrom-200 focus:ring-opacity-50 w-36"> 
                        @foreach ($groups as $group)                     
                            <option  value="{{ $group->id }}" class=""> {{ $group->sku }} </option>
                        @endforeach
                        </select>
                    <x-alert.error-form for="form.group_id" class="mt-2" />
                </div>
                <div>
                    <x-form.label for="form.sku" value="{{ __('SKU do produto') }}" />
                    <x-form.text wire:model.defer="form.sku" id="form-sku" type="text" placeholder="SKU do produto" class="mt-1 w-full" />
                    <x-alert.error-form for="form.sku" class="mt-2" />
                </div>
                <div>
                    <x-form.label for="form.color" value="{{ __('Cor do Produto') }}" />
                    <x-form.text wire:model.defer="form.color" rows="3" id="form-color" placeholder="Cor do Produto" class="mt-1 w-full" />
                    <x-alert.error-form for="form.color" class="mt-2" />
                </div>
            </div>
            <div>
                <x-form.label for="form.name" value="{{ __('Nome do Produto') }}" />
                <x-form.text wire:model.defer="form.name" rows="3" id="form-name" placeholder="Nome do Produto" class="mt-1 w-full" />
                <x-alert.error-form for="form.name" class="mt-2" />
            </div>
            <div class="flex space-x-6">
                <div>
                    <x-form.label for="form.price" value="{{ __('Preço') }}" />
                    <x-form.text wire:model.defer="form.price" id="form-price" type="number" step="1" min="0" placeholder="Preço do Produto" class="mt-1 w-full text-center" />
                    <x-alert.error-form for="form.price" class="mt-2" />
                </div>
                <div>
                    <x-form.label for="form.price_max" value="{{ __('Preço Máximo') }}" />
                    <x-form.text wire:model.defer="form.price_max" id="form-price_max" type="number" step="1" min="0" placeholder="Preço Máximo do Produto" class="mt-1 w-full text-center" />
                    <x-alert.error-form for="form.price_max" class="mt-2" />
                </div>
                <div>
                    <x-form.label for="form.stock" value="{{ __('Estoque') }}" />
                    <x-form.text wire:model.defer="form.stock" id="form-stock" type="number" step="1" min="0" placeholder="Quantidade em Estoque de Produto" class="mt-1 w-full text-center" />
                    <x-alert.error-form for="form.stock" class="mt-2" />
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

