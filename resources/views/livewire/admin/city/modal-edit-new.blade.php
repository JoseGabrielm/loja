<div class="flex fixed top-32 z-50 ">
    <x-modal.dialog wire:model='formModalOpened' title='Estados' class="">
        <div class="w-full space-y-3">
            <div class="flex space-x-6">
                <div>
                    <x-form.label for="form.name" value="{{ __('Estado') }}" />
                    <x-form.text wire:model.defer="form.name" rows="3" id="form-name" placeholder="Estado"
                        class="mt-1 w-full" />
                    <x-alert.error-form for="form.name" class="mt-2" />
                </div>
                <div>
                    <x-form.label for="form.code" value="{{ __('IBGE') }}" />
                    <x-form.text wire:model.defer="form.code" rows="3" id="form-code" placeholder="IBGE"
                        class="mt-1 w-full" />
                    <x-alert.error-form for="form.code" class="mt-2" />
                </div>
                <div>
                    <x-form.label for="form.state_id" value="{{ __('Estado') }}" />
                    <x-form.text wire:model.defer="form.state_id" rows="3" id="form-state_id" placeholder="Estado"
                        class="mt-1 w-full" />
                    <x-alert.error-form for="form.state_id" class="mt-2" />
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
