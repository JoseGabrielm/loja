
  <div class="flex flex-row items-center  border-b-2 h-[70px] border-cinza-100">

    <div class="">
        <span class="mr-3 ">Cor:</span>
        <select wire:model="colorProduct"
            class="pl-3 pr-10 text-base border rounded appearance-none border-cinza-300 focus:outline-none focus:ring-2 focus:ring-azul-200 focus:border-azul-500">
            @foreach ($products as $product)
            <div class="flex flex-col items-center justify-between space-x-3">
                <option value="{{ $product->color }}"> {{ $product->color }}
                </option>
            </div>
            @endforeach
        </select>
    </div>




    <div class="pl-2">
        <span class="mr-3">Quant.:</span>
        <x-form.text wire:model.debounce.1000ms="qty" type="number" min="1" class="w-10 pl-3">
        </x-form.text>
    </div>



</div>
