@if ($this->images->hasPages())
<div class="px-4 py-2">
    {{ $this->images->onEachSide(2)->links('livewire.admin.layouts.pagination') }}
</div>
@endif