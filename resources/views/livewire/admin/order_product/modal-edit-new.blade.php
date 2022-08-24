<div class="flex fixed top-32 z-50 ">
    <x-modal.dialog wire:model='formModalOpened' title='Estados' class="">
        <div class="w-full space-y-3">
            <div class="flex space-x-6">
                <div>
                    <x-form.label for="form.product_description" value="{{ __('Descrição do produto') }}" />
                    <x-form.text wire:model.defer="form.product_description" rows="3" id="form-product_description" placeholder="Descrição do produto"
                        class="mt-1 w-full" />
                    <x-alert.error-form for="form.product_description" class="mt-2" />
                </div>
                <div>
                    <x-form.label for="form.unitary_price" value="{{ __('Valor unitario do produto') }}" />
                    <x-form.text wire:model.defer="form.unitary_price" rows="3" id="form-unitary_price" placeholder="Valor unitario do produto"
                        class="mt-1 w-full" />
                    <x-alert.error-form for="form.unitary_price" class="mt-2" />
                </div>
                <div>
                    <x-form.label for="form.ship_form" value="{{ __('entrega') }}" />
                    <x-form.text wire:model.defer="form.ship_form" rows="3" id="form-ship_form" placeholder="entrega"
                        class="mt-1 w-full" />
                    <x-alert.error-form for="form.ship_form" class="mt-2" />
                </div>
            </div>

            <div class="flex space-x-6">
                <div>
                    <x-form.label for="form.amount" value="{{ __('Quantidade de Produtos') }}" />
                    <x-form.text wire:model.defer="form.amount" rows="3" id="form-amount" placeholder="Quantidade de Produtos"
                        class="mt-1 w-full" />
                    <x-alert.error-form for="form.amount" class="mt-2" />
                </div>
                <div>
                    <x-form.label for="form.ship_value" value="{{ __('Valor do frete') }}" />
                    <x-form.text wire:model.defer="form.ship_value" rows="3" id="form-ship_value" placeholder="Valor do frete"
                        class="mt-1 w-full" />
                    <x-alert.error-form for="form.ship_value" class="mt-2" />
                </div>
                <div>
                    <x-form.label for="form.base_total" value="{{ __('Valor total produtos') }}" />
                    <x-form.text wire:model.defer="form.base_total" rows="3" id="form-base_total" placeholder="Valor total produtos"
                        class="mt-1 w-full" />
                    <x-alert.error-form for="form.base_total" class="mt-2" />
                </div>
            </div>

            <div class="flex space-x-6">
                <div>
                    <x-form.label for="form.total" value="{{ __('Total produto mais frete') }}" />
                    <x-form.text wire:model.defer="form.total" rows="3" id="form-total" placeholder="Total produto mais frete"
                        class="mt-1 w-full" />
                    <x-alert.error-form for="form.total" class="mt-2" />
                </div>
                <div>
                    <x-form.label for="form.discount_percent" value="{{ __('Desconto percentual') }}" />
                    <x-form.text wire:model.defer="form.discount_percent" rows="3" id="form-discount_percent" placeholder="Desconto percentual"
                        class="mt-1 w-full" />
                    <x-alert.error-form for="form.discount_percent" class="mt-2" />
                </div>
                <div>
                    <x-form.label for="form.discount_amount" value="{{ __('Desconto em valor') }}" />
                    <x-form.text wire:model.defer="form.discount_amount" rows="3" id="form-discount_amount" placeholder="Desconto em valor"
                        class="mt-1 w-full" />
                    <x-alert.error-form for="form.discount_amount" class="mt-2" />
                </div>
            </div>

            <div class="flex space-x-6">
                <div>
                    <x-form.label for="form.additional" value="{{ __('Adicional') }}" />
                    <x-form.text wire:model.defer="form.additional" rows="3" id="form-additional" placeholder="Adicional"
                        class="mt-1 w-full" />
                    <x-alert.error-form for="form.additional" class="mt-2" />
                </div>
                <div>
                    <x-form.label for="form.order_id" value="{{ __('Pedido') }}" />
                    <x-form.text wire:model.defer="form.order_id" rows="3" id="form-order_id" placeholder="Pedido"
                        class="mt-1 w-full" />
                    <x-alert.error-form for="form.order_id" class="mt-2" />
                </div>
                <div>
                    <x-form.label for="form.product_id" value="{{ __('Produto') }}" />
                    <x-form.text wire:model.defer="form.product_id" rows="3" id="form-product_id" placeholder="Produto"
                        class="mt-1 w-full" />
                    <x-alert.error-form for="form.product_id" class="mt-2" />
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
