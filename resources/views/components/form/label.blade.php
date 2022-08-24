@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-cinza-700']) }}>
    {{ $value ?? $slot }}
</label>
