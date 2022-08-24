@if ($this->jadlogs->hasPages())
<div class="px-4 py-2">
    {{ $this->jadlogs->onEachSide(2)->links('livewire.admin.layouts.pagination') }}
</div>
@endif

@if ($this->jadlogs)
<div class="bg-verde-580 pt-20 pl-6">
    <x-button.danger wire:click="deleteAll" class="w-52">
        <div class="flex items-center place-content-center space-x-2 ">
            <x-icon.plus class="w-5 h-5"></x-icon.plus>
            Apagar todos os dados
        </div>
    </x-button.danger>
</div>
@endif