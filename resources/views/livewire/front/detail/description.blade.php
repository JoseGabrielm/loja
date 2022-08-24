<div class="">
    <div class="flex flex-col-reverse md:flex-col">
        <div class="">
            {{-- <h1 class="mb-1 text-2xl font-medium text-cinza-900 md:text-2xl title-font">{{ $prod ? $prod->name : '' }} --}}
            </h1>
            <div class="flex">
                @include('livewire.front.detail.stars')
            </div>
            <p class="leading-relaxed whitespace-pre-line text-cinza-800">
                {{ $group ? $group->description_short : '' }}
            </p>
            <p class="leading-relaxed whitespace-pre-line text-cinza-800">
                {{$group ? $group->description_long : ''}}
            </p>
        </div>
        <div>
            @include('livewire.front.detail.color')
            @include('livewire.front.detail.ship-cost')
            @include('livewire.front.detail.summary')
        </div>
    </div>
</div>
