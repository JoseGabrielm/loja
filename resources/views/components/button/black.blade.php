
<x-button.base
{{ $attributes->merge(['type' => 'submit', 'class' => 'bg-cinza-800
                                                       text-branco
                                                       hover:bg-cinza-700
                                                       active:bg-cinza-900
                                                       focus:border-cinza-900 ']) }}>
    {{ $slot }}
</x-button.base>

