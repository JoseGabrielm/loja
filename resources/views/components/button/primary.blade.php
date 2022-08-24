
<x-button.base
{{ $attributes->merge(['type' => 'submit', 'class' => 'bg-azul-600
                                                       text-branco
                                                       hover:bg-azul-700
                                                       active:bg-azul-400
                                                       focus:border-azul-800 ']) }}>
    {{ $slot }}
</x-button.base>
