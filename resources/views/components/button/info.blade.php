
<x-button.base
{{ $attributes->merge(['type' => 'submit', 'class' => 'bg-marrom-500
                                                       text-branco
                                                       hover:bg-marrom-700
                                                       active:bg-marrom-300
                                                       focus:border-marrom-800 ']) }}>
    {{ $slot }}
</x-button.base>
