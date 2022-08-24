@props(['id' => null, 'maxWidth' => null, 'title' => null])

<x-modal.base :id="$id" :maxWidth="$maxWidth" {{ $attributes }} >
    <div class="px-6 py-4">
        <div class="mt-4">
            {{ $slot }}
        </div>
    </div>

</x-modal.base>

