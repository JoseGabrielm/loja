@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block pl-3 pr-1 border-l-4 border-amarelo-400 text-base font-medium text-amarelo-300 focus:outline-none focus:text-amarelo-800 focus:bg-amarelo-200 focus:border-amarelo-700 transition duration-150 ease-in-out'
            : 'block pl-3 pr-1 border-l-4 border-transparent text-base font-medium text-cinza-300 hover:text-cinza-600 hover:bg-cinza-50 hover:border-cinza-300 focus:outline-none focus:text-cinza-800 focus:bg-cinza-50 focus:border-cinza-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
