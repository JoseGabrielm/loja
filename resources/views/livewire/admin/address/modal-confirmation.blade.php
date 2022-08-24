<div class="flex fixed top-32 z-50 ">
    <x-modal.confirmation wire:model='confirmationOpened' title="Confirme a remoção">
        @if ($toRemove)
        <p> Voce quer realmente apagar o registro {{ $toRemove->postcode }}</p>
        @endif
        <x-slot name="footer">
            <x-button.white @click="$dispatch('close')" class="w-28">
                <div class="flex items-center place-content-center space-x-2">
                    <x-icon.plus class="w-5 h-5"></x-icon.plus>
                    Cancelar
                </div>
            </x-button.white>
            <x-button.danger wire:click="remove" class="w-28">
                <div class="flex items-center place-content-center space-x-2">
                    <x-icon.plus class="w-5 h-5"></x-icon.plus>
                    Excluir
                </div>
            </x-button.danger>
        </x-slot>
    </x-modal.confirmation>
</div>