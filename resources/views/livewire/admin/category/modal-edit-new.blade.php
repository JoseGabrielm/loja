<div class="flex fixed top-32 z-50 ">
    <x-modal.dialog wire:model='formModalOpened' title='Formulário da Categoria' class="">
        <div class="w-full space-y-3">
            <div class="">
                <x-form.label for="form.image" value="{{ __('Imagem') }}" />
                <x-form.text wire:model.defer="form.image" id="form-image" type="text" placeholder="URL da Imagem da Categoria" class="mt-1 w-full" />
                <x-alert.error-form for="form.image" class="mt-2" />
            </div>
            <div>
                <x-form.label for="form.description" value="{{ __('Nome da Categoria') }}" />
                <x-form.text wire:model.defer="form.description" rows="3" id="form-description" placeholder="Nome da Categoria" class="mt-1 w-96" />
                <x-alert.error-form for="form.description" class="mt-2" />
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

