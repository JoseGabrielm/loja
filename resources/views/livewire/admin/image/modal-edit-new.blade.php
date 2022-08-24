<div class="flex fixed top-32 z-50 ">
    <x-modal.dialog wire:model='formModalOpened' title='Formulário de Produto' class="">

        <div class="w-full space-y-3">
            <div class="">
                <x-form.label for="form.path" value="{{ __('Imagem') }}" />
                <x-form.text wire:model.defer="form.path" id="form-path" type="text" placeholder="URL da Imagem do Grupo" class="mt-1 w-150" />
                <x-alert.error-form for="form.path" class="mt-2" />
            </div>
            <div>
                <x-form.label for="form.group_id" value="{{ __('Grupo') }}" class="" />
                <select wire:model="form.group_id" id="form-group_id" class="mt-1 h-8 text-sm pr-8 pl-4 py-1 align-text-top border-cinza-300 rounded-lg ring-0 shadow-sm
                        focus:border-marrom-700 focus:ring focus:ring-marrom-200 focus:ring-opacity-50 w-full">
                        <option value="" class=""> Selecione o Grupo </option>
                    @foreach ($groups as $group)
                    <option value="{{ $group->id }}" class=""> {{ $group->sku }} </option>
                    @endforeach
                </select>
                <x-alert.error-form for="form.group_id" class="mt-2" />
            </div>
            <div>
                <x-form.label for="form.description" value="{{ __('Descrição da foto') }}" />
                <x-form.text wire:model.defer="form.description" rows="3" id="form-description" placeholder="Descrição da foto"
                    class="mt-1 w-full" />
                <x-alert.error-form for="form.description" class="mt-2" />
            </div>
            <div>
                <x-form.label for="form.type" value="{{ __('Grupo') }}" class="" />
                <select wire:model="form.type" id="form-type" class="mt-1 h-8 text-sm pr-8 pl-4 py-1 align-text-top border-cinza-300 rounded-lg ring-0 shadow-sm
                        focus:border-marrom-700 focus:ring focus:ring-marrom-200 focus:ring-opacity-50 w-full">
                    <option value="" class=""> Selecione o Grupo </option>
                    <option value="Principal" class=""> Principal </option>
                    <option value="Detalhe" class=""> Detalhe </option>
                    <option value="Outro" class=""> Outro </option>

                </select>
                <x-alert.error-form for="form.type" class="mt-2" />
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