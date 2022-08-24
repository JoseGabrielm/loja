<div class="fixed z-50 flex top-10 md:top-32 ">
    <x-modal.dialog wire:model='formModalClientOpened' title='Formulário de Cliente' class="">
        <div class="w-full space-y-3">
            <div class="flex flex-col w-full space-y-3 md:flex-row md:space-x-6 md:space-y-0">
                <div class="flex items-baseline w-full">
                    <x-form.label for="form.name" value="{{ __('Nome Completo') }}" class="whitespace-nowrap"/>
                    <x-form.text wire:model.defer="form.name"  id="form-name"  class="w-full mx-5 mt-1" />
                    <x-alert.error-form for="form.name" class="mt-2" />
                </div>
                <div class="flex items-baseline">
                    <x-form.label for="form.fantasy" value="{{ __('Contato') }}" />
                    <x-form.text wire:model.defer="form.fantasy" id="form-fantasy" type="text"  class="w-full mx-5 mt-1" />
                    <x-alert.error-form for="form.fantasy" class="mt-2" />
                </div>
            </div>
            <div class="flex flex-col items-baseline w-full space-y-3 md:flex-row md:space-x-6 md:space-y-0">
                <div class="flex items-baseline">
                    <x-form.label for="form.is_company" value="{{ __('É uma empresa?') }}" class="whitespace-nowrap" />
                    <input type="checkbox" wire:model.defer="iscompany" wire:click="$emit('refreshCompany')" id="form-is_company" class="mx-5 md:mt-1 md:mx-5" />
                </div>
                @if ($iscompany == 1)
                    <div class="flex items-baseline w-full">
                        <x-form.label for="form.doc_country" value="{{ __('CNPJ') }}" />
                        <x-form.text wire:model.defer="form.doc_country" id="form-doc_country" type="text"  class="w-full mx-5 text-center md:mt-1 md:w-48" />
                        <x-alert.error-form for="form.doc_country" class="mt-2" />
                    </div>
                    <div class="flex items-baseline w-full">
                        <x-form.label for="form.doc_state" value="{{ __('IE') }}" class="ml-5 md:ml-0" />
                        <x-form.text wire:model.defer="form.doc_state" id="form-doc_state" type="text"  class="w-full mx-5 text-center md:mt-1 md:w-48" />
                        <x-alert.error-form for="form.doc_state" class="mt-2" />
                    </div>
                @else
                    <div class="flex items-baseline w-full">
                        <x-form.label for="form.doc_ssn" value="{{ __('CPF') }}" />
                        <x-form.text wire:model.defer="form.doc_ssn" id="form-doc_ssn" type="text"  class="w-full mx-5 text-center md:mt-1 md:w-48" />
                        <x-alert.error-form for="form.doc_ssn" class="mt-2" />
                    </div>
                @endif
            </div>
            <div class="flex flex-col items-baseline w-full space-y-3 md:flex-row md:space-x-6 md:space-y-0">
                <div class="flex items-baseline">
                    <x-form.label for="form.birthday" value="{{ __('Data de Nascimento') }}" class="whitespace-nowrap"/>
                     <x-form.date wire:model.defer="form.birthday" id="form-birthday" placeholder="dd/mm/yyyy" class="w-32 mx-5 mt-1 text-center" />
                </div>
                <div class="flex items-baseline w-full">
                    <x-form.label for="form.note" value="{{ __('Observação') }}" />
                    <x-form.text wire:model.defer="form.note" id="form-note" type="text" class="w-full mx-5 mt-1" />
                    <x-alert.error-form for="form.note" class="mt-2" />
                </div>
            </div>
            <div class="flex items-baseline">
                <div class="flex items-baseline">
                    <x-form.label for="form.news_letter" value="{{ __('Deseja receber promoções?') }}" />
                    <input type="checkbox" wire:model.defer="form.news_letter" id="form-news_letter" class="mx-5 md:mt-1 md:mx-5" />
                </div>
            </div>
        </div>

        <x-slot name="footer">
            <x-button.white @click="$dispatch('close')" class="w-28">
                <div class="flex items-center space-x-2 place-content-center">
                    <x-icon.plus class="w-5 h-5"></x-icon.plus>
                    Cancelar
                </div>
            </x-button.white>
            <x-button.primary wire:click="saveClient" class="w-28">
                <div class="flex items-center space-x-2 place-content-center">
                    <x-icon.plus class="w-5 h-5"></x-icon.plus>
                    Salvar
                </div>
            </x-button.primary>
        </x-slot>
    </x-modal.dialog>
</div>
