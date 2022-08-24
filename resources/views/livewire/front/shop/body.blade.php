
<datagrid class="flex flex-row justify-center flex-1 m-4 ">
    <div class="">
        <div class="relative w-64 group">
            {{-- efeito no fundo --}}
            <div
                class="absolute inset-0 transition duration-300 ease-in-out transform shadow-lg bg-cinza-500 rounded-3xl group-hover:-rotate-3">
            </div>
            {{-- corpo na frente --}}
            <section class="relative p-3 shadow-lg bg-cinza-200 rounded-3xl ">
                <figure class="mb-2 h-80 ">
                    <button wire:click="redirectDetail('{{ $shop->slug }}') " class="focus:outline-none">
                        <img class="w-full max-h-80 rounded-xl "
                            src="{{ $shop->images->where('type', 'like', 'Principal')->first() ? $shop->images->where('type', 'like', 'Principal')->first()->path : '' }}"
                            alt="Woman paying for a purchase">
                    </button>
                </figure>
                <section class="h-32 mt-2 space-y-2 overflow-hidden text-center md:mt-0">
                    <h2 class="text-sm font-extrabold tracking-wide uppercase text-azul-900">
                        {{ $shop->name }}
                    </h2>
                    @if ($shop->products->first())
                        <p class="block text-sm font-semibold leading-tight text-cinza-900">
                            De
                            {{ 'R$ ' . number_format( $shop->products->min('price'), 2, ',', '.') }}
                            a
                            {{ 'R$ ' . number_format( $shop->products->max('price') , 2, ',', '.') }}
                        </p>
                    @endif
                    <article class="text-xs text-cinza-700">
                        {{ $shop->description_short }}
                    </article>
                </section>
            </section>
        </div>
    </div>




</datagrid>
