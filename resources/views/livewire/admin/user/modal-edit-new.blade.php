<div class="flex fixed top-32 z-50">
    <x-modal.dialog wire:model='formModalOpened' title='Formulário de Produto' class="">

        <div class="w-full space-y-3">
            <div class="">
                <x-form.label for="form.profile_photo_url" value="{{ __('Foto') }}" />
                <x-form.text wire:model.defer="form.profile_photo_url" id="form-profile_photo_url" type="text" placeholder="URL da Foto" class="mt-1 w-full" />
                <x-alert.error-form for="form.profile_photo_url" class="mt-2" />
            </div>
            <div>
                <x-form.label for="form.name" value="{{ __('Nome') }}" />
                <x-form.text wire:model.defer="form.name" rows="3" id="form-name" placeholder="Nome"
                    class="mt-1 w-full" />
                <x-alert.error-form for="form.name" class="mt-2" />
            </div>
            <div>
                <x-form.label for="form.email" value="{{ __('Email') }}" />
                <x-form.text wire:model.defer="form.email" rows="3" id="form-email" placeholder="Email"
                    class="mt-1 w-full" />
                <x-alert.error-form for="form.email" class="mt-2" />
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