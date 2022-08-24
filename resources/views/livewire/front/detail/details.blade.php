<div class="relative min-h-screen mx-auto mt-10 bg-relva-30">

    @if ($prod)
        @include('livewire.front.detail.header')
        <section class="overflow-hidden text-cinza-600 body-font">
            <div class="container px-4 py-8 mx-auto sm:py-12">
                <div class="flex flex-wrap mx-auto lg:w-4/5">
                    <div class="w-full lg:w-1/2 lg:px-5 xl:px-10 2xl:px-20 lg:py-6">
                        @include('livewire.front.detail.image')
                    </div>
                    <div class="w-full mt-6 lg:w-1/2 lg:px-5 xl:px-10 2xl:px-20 lg:py-6 lg:mt-0">
                        @include('livewire.front.detail.description')
                    </div>
                </div>
            </div>
        </section>
    @endif


</div>


