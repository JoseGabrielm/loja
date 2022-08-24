
        <div class="w-full px-5 mt-5">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <img class="w-5 rounded-full h-7" src="{{ $item->product ? $item->product->image : ''}}" />
                    <span class="text-sm font-medium">
                         {{ $item->product_description }} 
                    </span>
                </div>
                <div class="flex flex-col items-center space-x-3 md:flex-row min-w-max">
                    <span class="text-sm font-medium"> {{ $item->amount }} pç </span>
                    <span class="text-sm font-medium min-w-max">
                         {{ 'R$ ' . number_format($item->unitary_price /100, 2, ',', '.') }} 
                    </span>
                </div>             
            </div>
        </div>


