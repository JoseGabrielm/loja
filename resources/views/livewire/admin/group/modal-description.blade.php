<div class="flex fixed top-32 z-50 ">
    <x-modal.dialog wire:model='formModalDescriptionOpened' title='Formulário de Descrição do Produto' class="">
        <div class="relative">
            <div >
                <div class="">
                    <x-form.label for="form.description" value="{{ __('Descrição') }}" />
                    <x-form.text wire:model.defer="form.description" id="form-description" type="text" placeholder="Descrição" class="mt-1 sm:w-150 w-72" />
                    <x-alert.error-form for="form.description" class="mt-2" />
                </div>
                <div>
                    <x-form.label for="form.description_short" value="{{ __('Descrição curta') }}" />
                    <x-form.textarea wire:model.defer="form.description_short" id="form-description_short" type="text" placeholder="Descrição curta" class="mt-1 sm:w-150 w-72" />
                    <x-alert.error-form for="form.description_short" class="mt-2" />
                </div>
                <div>
                    <x-form.label for="form.description_long" value="{{ __('Descrição longa') }}" />
                    <x-form.textarea wire:model.defer="form.description_long" id="form-description_long" type="text" placeholder="Descrição longa" class="mt-1 sm:w-150 w-72" />
                    <x-alert.error-form for="form.description_long" class="mt-2" />
                </div>
                <div>
                    <x-form.label for="form.technical_features" value="{{ __('Dados técnicos') }}" />
                    <x-form.textarea wire:model.defer="form.technical_features" id="form-technical_features" type="text" placeholder="Dados técnicos" class="mt-1 sm:w-150 w-72" />
                    <x-alert.error-form for="form.technical_features" class="mt-2" />
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
        </div>
    </x-modal.dialog>

</div>
