
<x-button.base
{{ $attributes->merge(['type' => 'submit', 'class' => 'bg-write
                                                       text-cinza-700
                                                       hover:text-azul-500
                                                       active:bg-cinza-50
                                                       active:text-cinza-800
                                                       focus:border-azul-300
                                                       border border-cinza-300 ']) }}>
    {{ $slot }}
</x-button.base>
