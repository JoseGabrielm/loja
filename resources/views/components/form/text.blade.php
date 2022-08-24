@props([
    'disabled' => false,
    'type' => 'text',
    'placeholder' => null,
])

<input
        type="{{ $type }}"
        placeholder="{{ $placeholder }}"
        {{ $disabled ? 'disabled' : '' }}
    {!! $attributes->merge([
        'class' => 'border-cinza-300 rounded-lg px-1 py-1 ring-0 shadow-sm
                    focus:border-marrom-700 focus:ring focus:ring-marrom-200 focus:ring-opacity-50',
    ]) !!}>
</input>
