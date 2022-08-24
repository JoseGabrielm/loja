@props(['id' => null, 'maxWidth' => null, 'title' => null])

<x-modal.base :id="$id" :maxWidth="$maxWidth" {{ $attributes }} >
    <div class="px-6 py-4">
        <div class="text-lg">
            {{ $title }}
        </div>

        <div class="mt-4">
            {{ $slot }}
        </div>
    </div>

    @isset($footer)
        <div class="px-6 py-4 text-right bg-cinza-100">
            {{ $footer }}
        </div>
    @endisset

</x-modal.base>

