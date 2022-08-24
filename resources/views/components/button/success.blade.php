
<x-button.base
{{ $attributes->merge(['type' => 'submit', 'class' => 'bg-verde-600
                                                       text-branco
                                                       hover:bg-verde-800
                                                       active:bg-verde-400
                                                       focus:border-verde-900 ']) }}>
    {{ $slot }}
</x-button.base>
