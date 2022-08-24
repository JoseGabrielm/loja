<div class="flex fixed top-10 md:top-32 z-50 ">
    <x-modal.dialog wire:model='formModalCityOpened' title='Buscar Cidade:' class="">
        <div class="w-full space-y-3">
            <div class="flex flex-col md:flex-row md:space-x-6 space-y-3 md:space-y-0"
                <div class="flex w-full">
                    <div>
                        <x-form.label for="cityState" value="{{ __('Estado') }}" />
                        <select wire:model="selectedState" class="form-control">
                            <option value="" selected> 
                               Selecione o Estado 
                            </option>
                            @foreach($states as $state)
                                <option value="{{ $state->id }}">
                                    {{ $state->initials }}                
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-full">
                        <x-form.label for="cityName" value="{{ __('Cidade') }}" />
                        @if (!is_null($selectedState))
                            <select wire:model="selectedCity" class="form-control" name="city_id">
                                <option value="" selected> 
                                    Selecione a Cidade
                                </option>
                                @foreach($cities as $city)
                                    <option value="{{ $city->code }}">
                                        {{ $city->name }}
                                    </option>
                                @endforeach
                            </select>
                        @endif
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
            <x-button.primary wire:click="selectCity" class="w-28">
                <div class="flex items-center place-content-center space-x-2">
                    <x-icon.plus class="w-5 h-5"></x-icon.plus>
                    Salvar
                </div>
            </x-button.primary>
        </x-slot>
    </x-modal.dialog>
</div>
