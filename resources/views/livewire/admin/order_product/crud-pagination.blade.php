@if ($this->orderProducts->hasPages())
<div class="px-4 py-2">
    {{ $this->orderProducts->onEachSide(2)->links('livewire.admin.layouts.pagination') }}
</div>
@endif
