<div class="flex fixed top-32 z-50">
    <x-modal.confirmation wire:model='modalImportOpened' title="Importar Arquivo Excel">
        <form wire:submit.prevent="save">
            
            <div class="my-10">
                <input type="file" wire:model="path" class="sm:w-96">
                @error('path') <span class="error">{{ $message }}</span> @enderror
            </div>
            
            <x-slot name="footer">
                <x-button.white @click="$dispatch('close')" class="w-28">
                    <div class="flex items-center place-content-center space-x-2">
                        <x-icon.plus class="w-5 h-5"></x-icon.plus>
                        Fechar
                    </div>
                </x-button.white>
                <x-button.info wire:click="import" class="w-28">
                    <div class="flex items-center place-content-center space-x-2">
                        <x-icon.plus class="w-5 h-5"></x-icon.plus>
                        Importar
                    </div>
                </x-button.info>
            </x-slot>
        </form>
    </x-modal.confirmation>
</div>
