<div class="flex flex-col mx-5 mt-5 md:mx-32">
    @foreach ($order->order_products as $product)
    <div class="mb-3 sm:-mx-4 lg:-mx-8">
        <div class="py-1 sm:px-6 lg:px-6">
            <div class="w-full rounded-lg shadow bg-cinza-300">
                <div class="flex flex-col xl:flex-row md:mx-10 ">
                    <div class="flex items-baseline mr-5">
                        <span scope="col" class="px-1 text-xs font-medium text-left md:py-2 text-cinza-600 "> SKU: </span>
                        <p class="px-1 text-sm text-gray-500 whitespace-normal md:py-2">{{ $product->sku }}</p>
                    </div>
                    <div class="flex items-baseline mr-5">
                        <span scope="col" class="px-1 text-xs font-medium text-left md:py-2 text-cinza-600 "> Descrição: </span>
                        <p class="px-1 text-sm text-gray-500 whitespace-normal md:py-2"> {{ $product->product_description }}</p>
                    </div>
                    <div class="flex items-baseline mr-5">
                        <span scope="col" class="px-1 text-xs font-medium text-left md:py-2 text-cinza-600 "> Preço  Unitário: </span>
                        <p class="px-1 text-sm text-gray-500 whitespace-normal md:py-2"> {{ 'R$ ' . number_format($product->unitary_price / 100, 2, ',', '.') }}</p>
                    </div>
                    <div class="flex items-baseline mr-5">
                        <span scope="col" class="px-1 text-xs font-medium text-left md:py-2 text-cinza-600 ">  Quant.: </span>
                        <p class="px-1 text-sm text-gray-500 whitespace-normal md:py-2">{{ $product->amount }}</p>
                    </div>
                    <div class="flex items-baseline mr-5">
                        <span scope="col" class="px-1 text-xs font-medium text-left md:py-2 text-cinza-600 "> Valor  Total: </span>
                        <p class="px-1 text-sm text-gray-500 whitespace-normal md:py-2"> {{ 'R$ ' . number_format($product->base_total / 100, 2, ',', '.') }}</p>
                    </div>                     
                </div>
            </div>
        </div>
    </div>
@endforeach
</div>
  

