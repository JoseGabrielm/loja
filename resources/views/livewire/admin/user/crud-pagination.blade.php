@if ($this->users->hasPages())
<div class="px-4 py-2">
    {{ $this->users->onEachSide(2)->links('livewire.admin.layouts.pagination') }}
</div>
@endif