
<button
{{ $attributes->merge(['type' => 'submit', 'class' => 'text-center font-semibold text-xs py-2
                                                       outline-none border border-transparent rounded-lg
                                                       hover:shadow-lg transform-gpu active:scale-95
                                                       focus:outline-none focus:shadow-outline-cinza
                                                       disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>

