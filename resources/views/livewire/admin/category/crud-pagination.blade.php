@if ($this->categories->hasPages())
<div class="px-4 py-2">
    {{ $this->categories->onEachSide(2)->links('livewire.admin.layouts.pagination') }}
</div>
@endif