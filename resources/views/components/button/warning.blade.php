
<x-button.base
{{ $attributes->merge(['type' => 'submit', 'class' => 'bg-amarelo-600
                                                       text-preto
                                                       hover:bg-amarelo-800
                                                       active:bg-amarelo-400
                                                       focus:border-amarelo-900 ']) }}>
    {{ $slot }}
</x-button.base>
