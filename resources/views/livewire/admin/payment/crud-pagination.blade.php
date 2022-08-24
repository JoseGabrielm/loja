@if ($this->payments->hasPages())
<div class="px-4 py-2">
    {{ $this->payments->onEachSide(2)->links('livewire.admin.layouts.pagination') }}
</div>
@endif
