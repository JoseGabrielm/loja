@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-cinza-300 focus:border-marrom-300 focus:ring focus:ring-marrom-200 focus:ring-opacity-50 rounded-md shadow-sm']) !!}>
