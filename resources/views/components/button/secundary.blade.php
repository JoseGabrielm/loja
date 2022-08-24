
<x-button.base
{{ $attributes->merge(['type' => 'submit', 'class' => 'bg-cinza-600
                                                       text-branco
                                                       hover:bg-cinza-800
                                                       active:bg-cinza-400
                                                       focus:border-cinza-900 ']) }}>
    {{ $slot }}
</x-button.base>
