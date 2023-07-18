<div class="relative mt-16 bg-relva-30">
    <div class="min-h-screen">
        <header class="flex flex-col items-end">
            <div class="relative mt-1">
                @include('livewire.front.shop.slider')
            </div>

            <div
                class="flex flex-wrap justify-between w-full gap-2 p-4 mt-6 text-lg font-semibold sm:px-36 md:text-2xl bg-verde-800 text-branco">


                @include('livewire.front.shop.categories')


            </div>

        </header>

        <section class="flex flex-row w-full pt-2">
            <aside class="hidden w-1/6 md:block bg-verde-800 md:w-1/6 ">
                @include('livewire.front.shop.side')
            </aside>

            <section class="flex flex-wrap items-start w-full py-5 mx-auto justify-items-center bg-relva-30 ">
                @foreach ($this->shops as $shop)
                    @include('livewire.front.shop.body')
                @endforeach
            </section>
        </section>
    </div>


    @include('livewire.front.shop.modalStores')
</div>
