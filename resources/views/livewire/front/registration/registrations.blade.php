<div class="bg-relva-30 pt-24 pb-8 px-3 min-h-screen">

    <div class="flex flex-col mt-5">
        <div class="sm:-mx-2 lg:-mx-8 ">
            <div class="p-3 align-middle inline-block min-w-full sm:px-6 lg:px-20">
                <div class="min-w-full bg-cinza-200 rounded-lg shadow-lg p-1">
                    @include('livewire.front.registration.client')
                </div>
                @include('livewire.front.registration.modal-client')
            </div>
        </div>
    </div>

    <div class="flex flex-col mt-5">
        <div class="sm:-mx-2 lg:-mx-8 ">
            <div class="p-3 align-middle inline-block min-w-full sm:px-6 lg:px-20">
                <div class="bg-verde-580 py-3 pl-6 z-10">
                    <x-button.primary wire:click="newAddress" class="w-28">
                        <div class="flex items-center place-content-center space-x-2">
                            <x-icon.plus class="w-5 h-5"></x-icon.plus>
                            Novo Endereço
                        </div>
                    </x-button.primary>
                </div>
                @include('livewire.front.registration.addresses')
            </div>
        </div>
        @include('livewire.front.registration.modal-addresses')
        @include('livewire.front.registration.modal-city')
    </div>

    <div class="flex flex-col mt-5">
        <div class="sm:-mx-2 lg:-mx-8 ">
            <div class="p-3 align-middle inline-block min-w-full sm:px-6 lg:px-20">
                <div class="bg-verde-580 py-3 pl-6 z-10">
                    <x-button.primary wire:click="newContact" class="w-28">
                        <div class="flex items-center place-content-center space-x-2">
                            <x-icon.plus class="w-5 h-5"></x-icon.plus>
                            Novo Contato
                        </div>
                    </x-button.primary>
                </div>
                @include('livewire.front.registration.contact')
            </div>
        </div>
        @include('livewire.front.registration.modal-contact')
    </div>

</div>
