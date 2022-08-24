<div class="min-h-screen px-3 pt-24 pb-8 bg-relva-30">
    @if (count($orders) > 0)
        @foreach ($orders as $order)
            <div class="flex flex-col my-20">
                <div class="sm:-mx-2 lg:-mx-8 ">
                    <div class="inline-block min-w-full p-3 align-middle sm:px-6 lg:px-20">
                        <div class="min-w-full p-1 rounded-lg shadow-lg bg-cinza-200">
                            @include('livewire.front.shopping.orders')
                            @include('livewire.front.shopping.products')
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
       <p class="px-1 text-xl text-gray-500 whitespace-normal md:py-2">Nenhum pedido encontrado</p>
    @endif
</div>


