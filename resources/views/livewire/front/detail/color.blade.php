
  <div class="flex flex-row pb-5 mt-6 mb-5 border-b-2 border-cinza-100">
    <div class="flex items-center">
        <span class="mr-3 ">Cor:</span>
        <select wire:model="colorProduct"
            class="py-2 pl-3 pr-10 text-base border rounded appearance-none border-cinza-300 focus:outline-none focus:ring-2 focus:ring-azul-200 focus:border-azul-500">
            @foreach ($products as $product)
            <div class="flex flex-col items-center justify-between space-x-3">
                <option value="{{ $product->color }}"> {{ $product->color }}
                </option>
            </div>
            @endforeach
        </select>
    </div>
    <div class="flex items-center m-2 md:mt-5 sm:ml-6 sm:mt-0">
        <span class="mr-3">Quant.:</span>
        <x-form.text wire:model.debounce.1000ms="qty" type="number" min="1" class="w-20 pl-3">
        </x-form.text>
    </div>
</div>
