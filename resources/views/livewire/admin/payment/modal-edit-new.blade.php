<div class="flex fixed top-32 z-50 ">
    <x-modal.dialog wire:model='formModalOpened' title='Estados' class="">
        <div class="w-full space-y-3">
            <div class="flex space-x-6">
                <div>
                    <x-form.label for="form.status" value="{{ __('Situação') }}" />
                    <x-form.text wire:model.defer="form.status" rows="3" id="form-status" placeholder="Situação"
                        class="mt-1 w-full" />
                    <x-alert.error-form for="form.status" class="mt-2" />
                </div>
                <div>
                    <x-form.label for="form.method" value="{{ __('Forma Pagamento') }}" />
                    <x-form.text wire:model.defer="form.method" rows="3" id="form-method" placeholder="Forma Pagamento"
                        class="mt-1 w-full" />
                    <x-alert.error-form for="form.method" class="mt-2" />
                </div>
            </div>

            <div class="flex space-x-6">
                <div>
                    <x-form.label for="form.value" value="{{ __('Valor a Pagar') }}" />
                    <x-form.text wire:model.defer="form.value" rows="3" id="form-value" placeholder="Valor a Pagar"
                        class="mt-1 w-full" />
                    <x-alert.error-form for="form.value" class="mt-2" />
                </div>
                <div>
                    <x-form.label for="form.parcel" value="{{ __('Parcela') }}" />
                    <x-form.text wire:model.defer="form.parcel" rows="3" id="form-parcel" placeholder="Parcela"
                        class="mt-1 w-full" />
                    <x-alert.error-form for="form.parcel" class="mt-2" />
                </div>
                <div>
                    <x-form.label for="form.due_date" value="{{ __('Data Vencimento') }}" />
                    <x-form.text wire:model.defer="form.due_date" rows="3" id="form-due_date" placeholder="Data Vencimento"
                        class="mt-1 w-full" />
                    <x-alert.error-form for="form.due_date" class="mt-2" />
                </div>
            </div>

            <div class="flex space-x-6">
                <div>
                    <x-form.label for="form.payment_date" value="{{ __('Data Pagamento') }}" />
                    <x-form.text wire:model.defer="form.payment_date" rows="3" id="form-payment_date" placeholder="Data Pagamento"
                        class="mt-1 w-full" />
                    <x-alert.error-form for="form.payment_date" class="mt-2" />
                </div>
                <div>
                    <x-form.label for="form.note" value="{{ __('Obs') }}" />
                    <x-form.text wire:model.defer="form.note" rows="3" id="form-note" placeholder="Obs"
                        class="mt-1 w-full" />
                    <x-alert.error-form for="form.note" class="mt-2" />
                </div>
                <div>
                    <x-form.label for="form.order_id " value="{{ __('Pedido') }}" />
                    <x-form.text wire:model.defer="form.order_id " rows="3" id="form-order_id " placeholder="Pedido"
                        class="mt-1 w-full" />
                    <x-alert.error-form for="form.order_id " class="mt-2" />
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
