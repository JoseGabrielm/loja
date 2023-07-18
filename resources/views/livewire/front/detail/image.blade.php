<div x-data="{ current: 0, open: true, imgModal : false, imgModalSrc : '', imgModalDesc : ''  }">
    <figure class="w-full p-3 shadow-lg bg-cinza-200 rounded-3xl">
        @php $i=0 @endphp
        <div x-show="open"  id="img-container">

            <a @click="$dispatch('img-modal', {  imgModalSrc: @js($prod ? $prod->image : ''), imgModalDesc: 'Random Image One Description' })" class="cursor-pointer">

            <img  x-show="current == 0"

                  src="{{ $prod ? $prod->image : '' }}"
                  alt="{{ __($prod ? $prod->description : '') }}">
            </a>

            @foreach ($images as $image)
                @php $i++ @endphp

                <a @click="$dispatch('img-modal', {  imgModalSrc: @js($prod ? $image->path : ''), imgModalDesc: 'Random Image One Description' })" class="cursor-pointer">

                <img x-show="current == {{ $i }}"

                     src="{{ $image->path }}"
                     alt="{{ __('') }}">
                </a>

            @endforeach
        </div>
    </figure>

    <section class="p-3 mt-2 shadow-lg bg-cinza-200 rounded-3xl">
        <div class="flex justify-around " >
            @php $j=0 @endphp
            <img @click="current = 0",
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

    @include('livewire.front.detail.modalImage')

</div>








































