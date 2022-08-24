@if ($this->states->hasPages())
<div class="px-4 py-2">
    {{ $this->states->onEachSide(2)->links('livewire.admin.layouts.pagination') }}
</div>
@endif
