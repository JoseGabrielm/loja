<div x-data="{ current: 0, open: true }">
    <figure class="w-full p-3 shadow-lg bg-cinza-200 rounded-3xl">
        @php $i=0 @endphp
        <div x-show="open"  id="img-container">


            <img  x-show="current == {{ $i }}"
                  class="zoom"

                  src="{{ $prod ? $prod->image : '' }}"
                  alt="{{ __($prod ? $prod->description : '') }}">


            @foreach ($images as $image)
                @php $i++ @endphp

                <img x-show="current == {{ $i }}"
                     class="zoom"

                     src="{{ $image->path }}"
                     alt="{{ __('') }}">
            @endforeach
        </div>
    </figure>

    <section class="p-3 mt-2 shadow-lg bg-cinza-200 rounded-3xl">
        <div class="flex justify-around " >
            @php $j=0 @endphp
            <img @click="current = {{ $j }},
             open = true" class="w-1/6 max-h-16 rounded-xl"
                src="{{ $prod ? $prod->image : '' }}" alt="{{ __($prod ? $prod->description : '') }}">
            @foreach ($images as $image)
                @php $j++ @endphp
                <img @click="current = {{ $j }}, open = true" class="w-1/6 max-h-16 rounded-xl"
                    src="{{ $image ? $image->path : '' }}" alt="{{ __($prod ? $prod->description : '') }}">
            @endforeach
        </div>
    </section>
    <p class="mt-5 text-xs leading-relaxed text-verde-700"> * As cores podem apresentar variações de tonalidade. </p>
    <p class="text-xs leading-relaxed text-verde-700"> ** Imagens meramente ilustrativas. </p>
</div>

<script>





    var options = {
        width: 400,
        zoomWidth: 500,
        offset: {vertical: 0, horizontal: 10},

    };
    new ImageZoom(document.getElementById("img-container"), options);

</script>
