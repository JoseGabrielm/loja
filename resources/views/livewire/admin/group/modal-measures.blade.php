<div class="flex fixed top-32 z-50 ">
    <x-modal.dialog wire:model='formModalMeasuresOpened' title='Formulário de Medidas do Produto' class="">
        <div class="w-full space-y-3">
            <div class="flex space-x-6">
                <div>
                    <x-form.label for="form.packing_format" value="{{ __('Formato da embalagem') }}" />
                    <x-form.text wire:model.defer="form.packing_format" id="form-packing_format" type="text" placeholder="Formato da embalagem (retangular)" class="mt-1 w-full" />
                    <x-alert.error-form for="form.packing_format" class="mt-2" />
                </div>
                <div>
                    <x-form.label for="form.grossweight" value="{{ __('Peso Bruto em gramas') }}" />
                    <x-form.text wire:model.defer="form.grossweight" id="form-grossweight" type="text" placeholder="Peso Bruto em gramas" class="mt-1 w-full" />
                    <x-alert.error-form for="form.grossweight" class="mt-2" />
                </div>
                <div>
                    <x-form.label for="form.netweight" value="{{ __('Peso Líquido em gramas') }}" />
                    <x-form.text wire:model.defer="form.netweight" id="form-netweight" type="text" placeholder="Peso Líquido em gramas" class="mt-1 w-full" />
                    <x-alert.error-form for="form.netweight" class="mt-2" />
                </div>
            </div>
            <div class="flex space-x-6">
                <div>
                    <x-form.label for="form.packing_length" value="{{ __('Comprimento da embalagem mm') }}" />
                    <x-form.text wire:model.defer="form.packing_length" id="form-packing_length" type="text" placeholder="comprimeento da embalagem em mm" class="mt-1 w-full" />
                    <x-alert.error-form for="form.packing_length" class="mt-2" />
                </div>
                <div>
                    <x-form.label for="form.packing_width" value="{{ __('Largura da embalagem mm') }}" />
                    <x-form.text wire:model.defer="form.packing_width" id="form-packing_width" type="text" placeholder="Largura da embalagem em mm" class="mt-1 w-full" />
                    <x-alert.error-form for="form.packing_width" class="mt-2" />
                </div>
                <div>
                    <x-form.label for="form.packing_height" value="{{ __('Altura da embalagem mm') }}" />
                    <x-form.text wire:model.defer="form.packing_height" id="form-packing_height" type="text" placeholder="Altura da embalagem em mm" class="mt-1 w-full" />
                    <x-alert.error-form for="form.packing_height" class="mt-2" />
                </div>
            </div>
            <div class="flex space-x-6">
                <div>
                    <x-form.label for="form.product_length" value="{{ __('Comprimento do produto mm') }}" />
                    <x-form.text wire:model.defer="form.product_length" id="form-product_length" type="text" placeholder="Com primento do produto em mm" class="mt-1 w-full" />
                    <x-alert.error-form for="form.product_length" class="mt-2" />
                </div>
                <div>
                    <x-form.label for="form.product_width" value="{{ __('Largura do produto mm') }}" />
                    <x-form.text wire:model.defer="form.product_width" id="form-product_width" type="text" placeholder="Largura do produto em mm" class="mt-1 w-full" />
                    <x-alert.error-form for="form.product_width" class="mt-2" />
                </div>
                <div>
                    <x-form.label for="form.product_height" value="{{ __('Altura do produto mm') }}" />
                    <x-form.text wire:model.defer="form.product_height" id="form-product_height" type="text" placeholder="Altura do produto em mm" class="mt-1 w-full" />
                    <x-alert.error-form for="form.product_height" class="mt-2" />
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
