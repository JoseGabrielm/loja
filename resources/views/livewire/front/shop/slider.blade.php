<div class="relative " x-data="{
    activeSlide: 1,
    slides: [1, 2, 3, 4, 5],
    loop() {
        setInterval(() => { this.activeSlide = this.activeSlide === 5 ? 1 : this.activeSlide + 1 }, 4000)
    },

}" x-init="loop">
    <!-- Slides -->

    <div x-show="activeSlide === 1" class="flex items-center">
        <img class="aspect-ratio md:w-auto md:h-auto" src="{{ asset('storage/banner2.jpg') }}" alt="{{ __('') }}">
    </div>

    <div class="" x-show="activeSlide === 2" class="flex items-center ">
        <img class="aspect-ratio md:w-auto md:h-auto" src="{{ asset('storage/banner1.jpg') }}"
            alt="{{ __('') }}">
    </div>

    <div class="" x-show="activeSlide === 3" class="flex items-center ">
        <img class="aspect-ratio md:w-auto md:h-auto" src="{{ asset('storage/banner3.jpg') }}"
            alt="{{ __('') }}">
    </div>
    <div x-show="activeSlide === 4" class="flex items-center ">
        <img class="aspect-ratio md:w-auto md:h-auto" class="" src="{{ asset('storage/banner4.jpg') }}"
            alt="{{ __('') }}">
    </div>
    <div class="" x-show="activeSlide === 5" class="flex items-center ">
        <img class="aspect-ratio md:w-auto md:h-auto" src="{{ asset('storage/banner5.jpg') }}"
            alt="{{ __('') }}">
    </div>


    <!-- Prev/Next Arrows -->
    <div class="absolute inset-0 flex justify-between">
        <div class="flex items-center justify-start p-2">
            <button
                class="w-5 h-5 border-0 rounded-full swiper-button-next mdw-10 bg-floresta-40 text-cinza-100 hover:text-amarelo-400 hover:shadow-lg md:w-12 md:h-12 focus:outline-none focus:border-none"
                x-on:click="activeSlide = activeSlide === 1 ? slides.length : activeSlide - 1">
                <span class="text-xl font-extrabold md:text-4xl">
                    <x-icon.arrow-outline-left />
                </span>
            </button>
        </div>
        <div class="flex items-center justify-end p-2 ">
            <button
                class="w-5 h-5 border-0 rounded-full swiper-button-prev bg-floresta-40 text-cinza-100 hover:text-amarelo-400 hover:shadow-lg md:w-12 md:h-12 focus:outline-none focus:border-none"
                x-on:click="activeSlide = activeSlide === slides.length ? 1 : activeSlide + 1">
                <span class="text-xl font-extrabold md:text-4xl">
                    <x-icon.arrow-outline-right />
                </span>
            </button>
        </div>
    </div>

    <div class="absolute flex items-center justify-center w-full px-4">
        <template x-for="slide in slides" :key="slide">
            <button
                class="w-4 h-2 mx-2 mt-2 mb-0 overflow-hidden transition-colors duration-200 ease-out border-0 rounded-full hover:bg-marrom-600 hover:shadow-lg text-cinza-300 focus:outline-none focus:border-none"
                :class="{
                    'bg-floresta-60': activeSlide === slide,
                    'bg-floresta-20': activeSlide !== slide
                }"
                x-on:click="activeSlide = slide">
            </button>
        </template>
    </div>

    <script>
        setTimeout(function() {
            let activeSlide = document.querySelector('.slide.translate-x-0');
            activeSlide.classList.remove('translate-x-0');
            activeSlide.classList.add('-translate-x-full');

            let nextSlide = activeSlide.nextElementSibling;
            nextSlide.classList.remove('translate-x-full');
            nextSlide.classList.add('translate-x-0');
        }, 3000);
    </script>



    <!-- Buttons -->

</div>
