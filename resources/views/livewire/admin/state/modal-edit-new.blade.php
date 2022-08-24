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
                    <x-form.label for="form.initials" value="{{ __('Sigla') }}" />
                    <x-form.text wire:model.defer="form.initials" rows="3" id="form-initials" placeholder="Sigla"
                        class="mt-1 w-full" />
                    <x-alert.error-form for="form.initials" class="mt-2" />
                </div>
                <div>
                    <x-form.label for="form.country_id" value="{{ __('Pais') }}" />
                    <x-form.text wire:model.defer="form.country_id" rows="3" id="form-country_id" placeholder="Pais"
                        class="mt-1 w-full" />
                    <x-alert.error-form for="form.country_id" class="mt-2" />
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
