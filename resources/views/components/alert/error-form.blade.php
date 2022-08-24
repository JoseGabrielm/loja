@props(['for'])

@error($for)
    <p {{ $attributes->merge(['class' => 'text-sm text-vermelho-600']) }}>{{ $message }}</p>
@enderror
