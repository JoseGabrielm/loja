
<x-button.base
{{ $attributes->merge(['type' => 'submit', 'class' => 'bg-vermelho-400
                                                       text-branco
                                                       hover:bg-vermelho-600
                                                       active:bg-vermelho-200
                                                       focus:border-vermelho-700 ']) }}>
    {{ $slot }}
</x-button.base>
