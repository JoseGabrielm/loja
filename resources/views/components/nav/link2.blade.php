@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-marrom-400 text-sm font-medium leading-5 text-cinza-900 focus:outline-none focus:border-marrom-700 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-cinza-500 hover:text-cinza-700 hover:border-cinza-300 focus:outline-none focus:text-cinza-700 focus:border-cinza-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
