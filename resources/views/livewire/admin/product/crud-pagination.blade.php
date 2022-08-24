@if ($this->products->hasPages())
<div class="px-4 py-2">
    {{ $this->products->onEachSide(2)->links('livewire.admin.layouts.pagination') }}
</div>
@endif