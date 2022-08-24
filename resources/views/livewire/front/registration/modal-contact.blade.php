
<div class="fixed z-50 flex w-screen top-32">
    <x-modal.dialog wire:model='formModalContactOpened' title='Formulário da Categoria' class="">
        <div class="w-full space-y-3">
            <div>
                <x-form.label for="contact.type" value="{{ __('Tipo') }}" />
                <select wire:model.defer="contact.type" class="form-control">
                    <option value="" selected> Selecione o tipo de contato </option>
                    <option value="telephone"> telefone </option>
                    <option value="email"> email </option>
                    <option value="cell"> celular </option>
                    <option value="message"> mensagem </option>
                    <option value="other"> outros </option>
                </select>
                <x-alert.error-form for="contact.type" class="mt-2" />
            </div>
            <div>
                <x-form.label for="contact.description" value="{{ __('Descrição') }}" />
                <x-form.text wire:model.defer="contact.description" rows="3" id="contact-description" placeholder="Descrição" class="mt-1 w-80 md:w-96" />
                <x-alert.error-form for="contact.description" class="mt-2" />
            </div>
            <div>
                <x-form.label for="contact.contact" value="{{ __('Nome do contato') }}" />
                <x-form.text wire:model.defer="contact.contact" rows="3" id="contact-contact" placeholder="Nome do contato" class="mt-1 w-80 md:w-96" />
                <x-alert.error-form for="contact.contact" class="mt-2" />
            </div>
        </div>
        <x-slot name="footer">
            <x-button.white @click="$dispatch('close')" class="w-28">
                <div class="flex items-center space-x-2 place-content-center">
                    <x-icon.plus class="w-5 h-5"></x-icon.plus>
                    Cancelar
                </div>
            </x-button.white>
            <x-button.primary wire:click="saveContact" class="w-28">
                <div class="flex items-center space-x-2 place-content-center">
                    <x-icon.plus class="w-5 h-5"></x-icon.plus>
                    Salvar
                </div>
            </x-button.primary>
        </x-slot>
    </x-modal.dialog>
</div>
