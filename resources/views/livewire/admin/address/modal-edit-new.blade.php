<div class="flex fixed top-32 z-50 ">
    <x-modal.dialog wire:model='formModalOpened' title='Endereço de Cliente' class="">
        <div class="w-full space-y-3">
            <div class="flex space-x-6">
                <div>
                    <x-form.label for="form.type" value="{{ __('Tipo') }}" />
                    <x-form.text wire:model.defer="form.type" rows="3" id="form-type" placeholder="Tipo"
                        class="mt-1 w-full" />
                    <x-alert.error-form for="form.type" class="mt-2" />
                </div>
                <div class="">
                    <x-form.label for="form.postcode" value="{{ __('CEP') }}" />
                    <x-form.text wire:model.defer="form.postcode" id="form-postcode" type="text"
                        placeholder="CEP" class="mt-1 w-full" />
                    <x-alert.error-form for="form.postcode" class="mt-2" />
                </div>
            </div>
            <div class="flex space-x-6">
                <div class="">
                    <x-form.label for="form.address" value="{{ __('Endereço') }}" />
                    <x-form.text wire:model.defer="form.address" id="form-address" type="text" placeholder="Endereço" class="mt-1 w-80" />
                    <x-alert.error-form for="form.address" class="mt-2" />
                </div>
                <div class="">
                    <x-form.label for="form.number" value="{{ __('Número') }}" />
                    <x-form.text wire:model.defer="form.number" id="form-number" type="text"
                        placeholder="Número" class="mt-1 w-full" />
                    <x-alert.error-form for="form.number" class="mt-2" />
                </div>
                <div class="">
                    <x-form.label for="form.neighborhood" value="{{ __('Bairro') }}" />
                    <x-form.text wire:model.defer="form.neighborhood" id="form-neighborhood" type="text" placeholder="Bairro"
                        class="mt-1 w-full" />
                    <x-alert.error-form for="form.neighborhood" class="mt-2" />
                </div>
            </div>
            <div class="flex space-x-6">
                <div>
                    <x-form.label for="form.complement" value="{{ __('Complemento') }}" />
                    <x-form.text wire:model.defer="form.complement" rows="3" id="form-complement"
                        placeholder="Complemento" class="mt-1 w-full" />
                    <x-alert.error-form for="form.complement" class="mt-2" />
                </div>
                <div>
                    <x-form.label for="form.client_id" value="{{ __('Cliente') }}" />
                    <x-form.text wire:model.defer="form.client_id" rows="3" id="form-client_id" placeholder="Cliente" class="mt-1 w-full" />
                    <x-alert.error-form for="form.client_id" class="mt-2" />
                </div>
                <div>
                    <x-form.label for="form.city_id" value="{{ __('Cidade') }}" />
                    <x-form.text wire:model.defer="form.city_id" rows="3" id="form-city_id" placeholder="Cidade" class="mt-1 w-full" />
                    <x-alert.error-form for="form.city_id" class="mt-2" />
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
