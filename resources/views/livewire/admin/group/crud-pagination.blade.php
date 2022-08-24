@if ($this->groups->hasPages())
<div class="px-4 py-2">
    {{ $this->groups->onEachSide(2)->links('livewire.admin.layouts.pagination') }}
</div>
@endif