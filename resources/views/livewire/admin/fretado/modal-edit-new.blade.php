<div class="flex fixed top-32 z-50 ">
    <x-modal.dialog wire:model='formModalOpened' title='Formulário de Produto' class="">
        <div class="w-full space-y-3">
            <div class="flex space-x-6">
                <div>
                    <x-form.label for="form.region" value="{{ __('Região') }}" />
                    <x-form.text wire:model.defer="form.region" rows="3" id="form-region" placeholder="Região"
                        class="mt-1 w-full" />
                    <x-alert.error-form for="form.region" class="mt-2" />
                </div>
                <div class="">
                    <x-form.label for="form.zipini" value="{{ __('CEP Inicial') }}" />
                    <x-form.text wire:model.defer="form.zipini" id="form-zipini" type="text" placeholder="CEP Inicial"
                        class="mt-1 w-20" />
                    <x-alert.error-form for="form.zipini" class="mt-2" />
                </div>
                <div class="">
                    <x-form.label for="form.zipfin" value="{{ __('CEP Final') }}" />
                    <x-form.text wire:model.defer="form.zipfin" id="form-zipfin" type="text" placeholder="CEP Final"
                        class="mt-1 w-20" />
                    <x-alert.error-form for="form.zipfin" class="mt-2" />
                </div>
            </div>
            <div class="flex space-x-6">
                <div class="">
                    <x-form.label for="form.wini" value="{{ __('Peso Inicial') }}" />
                    <x-form.text wire:model.defer="form.wini" id="form-wini" type="text" placeholder="Peso Inicial"
                        class="mt-1 w-20" />
                    <x-alert.error-form for="form.wini" class="mt-2" />
                </div>
                <div class="">
                    <x-form.label for="form.wfin" value="{{ __('Peso Final') }}" />
                    <x-form.text wire:model.defer="form.wfin" id="form-wfin" type="text" placeholder="Peso Final"
                        class="mt-1 w-20" />
                    <x-alert.error-form for="form.wfin" class="mt-2" />
                </div>
                <div class="">
                    <x-form.label for="form.value" value="{{ __('Valor do Frete') }}" />
                    <x-form.text wire:model.defer="form.value" id="form-value" type="text" placeholder="Valor do Frete"
                        class="mt-1 w-20" />
                    <x-alert.error-form for="form.value" class="mt-2" />
                </div>
                <div class="">
                    <x-form.label for="form.deadline" value="{{ __('Prazo') }}" />
                    <x-form.text wire:model.defer="form.deadline" id="form-deadline" type="text" placeholder="Prazo"
                        class="mt-1 w-20" />
                    <x-alert.error-form for="form.deadline" class="mt-2" />
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
