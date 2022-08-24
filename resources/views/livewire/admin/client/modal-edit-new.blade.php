<div class="flex fixed top-32 z-50 ">
    <x-modal.dialog wire:model='formModalOpened' title='Formulário de Cliente' class="">
        <div class="w-full space-y-3">
            <div class="flex space-x-6">
                <div>
                    <x-form.label for="form.name" value="{{ __('Nome') }}" />
                    <x-form.text wire:model.defer="form.name"  id="form-name" placeholder="Nome" class="mt-1 w-80" />
                    <x-alert.error-form for="form.name" class="mt-2" />
                </div>
                <div class="">
                    <x-form.label for="form.fantasy" value="{{ __('Nome Fantasia') }}" />
                    <x-form.text wire:model.defer="form.fantasy" id="form-fantasy" type="text" placeholder="Nome Fantasia" class="mt-1 w-56" />
                    <x-alert.error-form for="form.fantasy" class="mt-2" />
                </div>
                <div class="text-center">
                    <x-form.label for="form.is_company" value="{{ __('Companhia') }}" />
                    <input type="checkbox" wire:model.defer="form.is_company" id="form-is_company" class="mt-3 " />
                </div>
            </div>
            <div class="flex space-x-6">
                <div class="">
                    <x-form.label for="form.doc_ssn" value="{{ __('CPF') }}" />
                    <x-form.text wire:model.defer="form.doc_ssn" id="form-doc_ssn" type="text" placeholder="CPF" class="mt-1 w-36 text-center" />
                    <x-alert.error-form for="form.doc_ssn" class="mt-2" />
                </div>
                <div class="">
                    <x-form.label for="form.doc_country" value="{{ __('CNPJ') }}" />
                    <x-form.text wire:model.defer="form.doc_country" id="form-doc_country" type="text" placeholder="CNPJ" class="mt-1 w-36 text-center" />
                    <x-alert.error-form for="form.doc_country" class="mt-2" />
                </div>
                <div class="">
                    <x-form.label for="form.doc_state" value="{{ __('IE') }}" />
                    <x-form.text wire:model.defer="form.doc_state" id="form-doc_state" type="text" placeholder="IE" class="mt-1 w-36 text-center" />
                    <x-alert.error-form for="form.doc_state" class="mt-2" />
                </div>
                <div class="">
                    <x-form.label for="form.doc_city" value="{{ __('IM') }}" />
                    <x-form.text wire:model.defer="form.doc_city" id="form-doc_city" type="text" placeholder="IM" class="mt-1 w-36 text-center" />
                    <x-alert.error-form for="form.doc_city" class="mt-2" />
                </div>
            </div>
            <div class="flex space-x-6">
                <div>
                    <x-form.label for="form.birthday" value="{{ __('Data Nasc.') }}" />
                     <x-form.date wire:model.defer="form.birthday" id="form-birthday" placeholder="dd/mm/yyyy" class="mt-1 w-28 text-center" />
             </div>
            
                <div class="text-center">
                    <x-form.label for="form.is_active" value="{{ __('Ativo') }}" />
                    <input type="checkbox" wire:model.defer="form.is_active" id="form-is_active" class="mt-3 " />
                </div>
                <div class="text-center">
                    <x-form.label for="form.news_letter" value="{{ __('Ativo') }}" />
                    <input type="checkbox" wire:model.defer="form.news_letter" id="form-news_letter" class="mt-3 " />
                </div>
         
                <div class="text-center">
                    <x-form.label for="form.is_verified" value="{{ __('Verificado') }}" />
                    <input type="checkbox" wire:model.defer="form.is_verified" id="form-is_verified" class="mt-3 " />
                </div>
                <div class="">
                    <x-form.label for="form.note" value="{{ __('Notas') }}" />
                    <x-form.text wire:model.defer="form.note" id="form-note" type="text" placeholder="Notas"
                        class="mt-1 w-full" />
                    <x-alert.error-form for="form.note" class="mt-2" />
                </div>
                <div class="">
                    <x-form.label for="form.user_id" value="{{ __('Usuario') }}" />
                    <x-form.text wire:model.defer="form.user_id" id="form-user_id" type="text" placeholder="Usuario"
                        class="mt-1 w-20" />
                    <x-alert.error-form for="form.user_id" class="mt-2" />
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
