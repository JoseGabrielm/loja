@if ($this->orders->hasPages())
<div class="px-4 py-2">
    {{ $this->orders->onEachSide(2)->links('livewire.admin.layouts.pagination') }}
</div>
@endif
