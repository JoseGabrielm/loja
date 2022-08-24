@if ($this->cities->hasPages())
<div class="px-4 py-2">
    {{ $this->cities->onEachSide(2)->links('livewire.admin.layouts.pagination') }}
</div>
@endif
