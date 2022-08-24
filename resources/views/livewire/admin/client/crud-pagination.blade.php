@if ($this->clients->hasPages())
<div class="px-4 py-2">
    {{ $this->clients->onEachSide(2)->links('livewire.admin.layouts.pagination') }}
</div>
@endif

