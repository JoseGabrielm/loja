<div  class="fixed z-50 flex top-10 md:top-32">
    <x-modal.dialog  wire:model='formModalAddressOpened' title='Endereço de Entrega do Cliente:' class="">
        <div class="w-full space-y-3 bg-vermelho-400">


            <div class="flex items-baseline space-x-2 w-[20px] bg-azul-400 space-y-3 md:space-x-6 md:space-y-0">
                <x-form.label for="adShip.type" value="{{ __('Tipo') }}" />
                <select  wire:model.defer="adShip.type" class="rounded-lg w-[20px] -py-1">
                    <option value="" selected> Selecione o tipo de contato </option>
                    <option value="entrega"> entrega </option>
                    <option value="faturamento"> faturamento </option>
                    <option value="cobrança"> cobrança </option>
                    <option value="contato"> contato </option>
                    <option value="outro"> outro </option>
                </select>
                <x-alert.error-form for="adShip.type" class="mt-2" />
            </div>

            <div class="flex items-baseline space-x-2 space-y-3 md:space-x-6 md:space-y-0">
                <x-form.label for="adShip.postcode" value="{{ __('CEP') }}" />
                <x-form.text wire:model.defer="adShip.postcode" id="adShip-postcode" type="text" class="w-full mt-1" />
                <x-button.secundary wire:click="searchAddress" class="w-1/2 h-7">Importar Rua</x-button.secundary>
                <x-alert.error-form for="adShip.postcode" class="mt-2" />
            </div>
            <div class="flex flex-col space-y-3 md:flex-row md:space-x-6 md:space-y-0">
                <div class="flex items-baseline space-x-2 space-y-3 md:space-x-6 md:space-y-0">
                    <x-form.label for="adShip.street" value="{{ __('End.') }}" />
                    <x-form.text wire:model.defer="adShip.street" id="adShip-street" type="text"  class="mt-1 w-80" />
                    <x-alert.error-form for="adShip.street" class="mt-2" />
                </div>
                <div class="flex items-baseline space-x-2 space-y-3 md:space-x-6 md:space-y-0">
                    <x-form.label for="adShip.number" value="{{ __('Número') }}" />
                    <x-form.text wire:model.defer="adShip.number" id="adShip-number" type="text" class="w-full mt-1" />
                    <x-alert.error-form for="adShip.number" class="mt-2" />
                </div>
                <div class="flex items-baseline space-x-2 space-y-3 md:space-x-6 md:space-y-0">
                    <x-form.label for="adShip.neighborhood" value="{{ __('Bairro') }}" />
                    <x-form.text wire:model.defer="adShip.neighborhood" id="adShip-neighborhood" type="text" class="w-full mt-1" />
                    <x-alert.error-form for="adShip.neighborhood" class="mt-2" />
                </div>
            </div>
            <div class="flex items-baseline space-x-2 space-y-3 md:space-x-6 md:space-y-0">
                    <x-form.label for="adShip.complement" value="{{ __('Complemento') }}" />
                    <x-form.text wire:model.defer="adShip.complement" rows="3" id="adShip-complement" class="w-full mt-1" />
                    <x-alert.error-form for="adShip.complement" class="mt-2" />
            </div>
            <div class="flex flex-row items-center space-x-2 space-y-3 md:space-x-6 md:space-y-0">
                <div class="flex items-baseline space-x-2 space-y-3 md:space-x-6 md:space-y-0">
                    <x-form.label for="cityState" value="{{ __('Estado') }}" />
                    <x-form.text wire:model.defer="cityState" rows="3" id="cityState"  class="w-10 mt-1" readonly/>
                    <x-alert.error-form for="cityState" class="mt-2" />
                </div>
                <div class="flex items-baseline w-full space-x-2 space-y-0 md:space-x-6 md:space-y-0 ">
                    <x-form.label for="cityName" value="{{ __('Cidade') }}" />
                    <x-form.text wire:model.defer="cityName" rows="3" id="cityName"  class="w-full mt-1" readonly/>
                    <x-alert.error-form for="cityName" class="mt-2" />
                </div>
                <div class="flex space-x-2 space-y-3 md:space-x-6 md:space-y-0 ">
                    <x-button.primary wire:click="findCity" class="w-20 h-8 ml-2">
                        <div class="flex items-center space-x-2 place-content-center">
                            <x-icon.plus class="w-5 h-5"/>
                            Buscar
                        </div>
                    </x-button.primary>
                </div>
            </div>

            <div class="">
                <x-slot name="footer" >
                    <x-button.white @click="$dispatch('close')" class="w-28">
                        <div class="flex items-center space-x-2 place-content-center">
                            <x-icon.plus class="w-5 h-5"></x-icon.plus>
                            Cancelar
                        </div>
                    </x-button.white>
                    <x-button.primary wire:click="saveAddress" class="w-28">
                        <div class="flex items-center space-x-2 place-content-center">
                            <x-icon.plus class="w-5 h-5"></x-icon.plus>
                            Salvar
                        </div>
                    </x-button.primary>
                </x-slot>
            </div>

    </x-modal.dialog>
</div>
