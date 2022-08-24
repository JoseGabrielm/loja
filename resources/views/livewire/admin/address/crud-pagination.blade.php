@if ($this->addresses->hasPages())
<div class="px-4 py-2">
    {{ $this->addresses->onEachSide(2)->links('livewire.admin.layouts.pagination') }}
</div>
@endif

