
@props([
    'disabled' => false,
    'placeholder' => null,
])

<textarea
        placeholder="{{ $placeholder }}"
        {{ $disabled ? 'disabled' : '' }}
    {!! $attributes->merge([
        'class' => 'border-cinza-300 rounded-lg px-2 py-2 ring-0 shadow-sm
                    focus:border-marrom-700 focus:ring focus:ring-marrom-200 focus:ring-opacity-50'
    ]) !!}>
</textarea>
