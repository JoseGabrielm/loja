<div class="pt-4 mt-4">
    @if ($item)
        <div class="flex items-center justify-between w-full px-0 md:px-5">
            <div class="flex items-center">
                <img src="{{ $item->options->has('image') ? $item->options->image : '' }}" width="60"
                    class="w-12 h-16 rounded-sm" />
                <div class="flex flex-col ml-3">
                    <span class="font-medium md:text-sm">
                        {{ $item->name }}
                    </span>
                </div>
            </div>
            <div class="flex flex-col items-center justify-center ml-0 space-y-2 md:flex-row md:ml-5 md:space-y-0">
                <div class="flex pr-4">
                    <a href="#" wire:click="decreaseQty('{{ $item->rowId }}')" class="font-semibold">
                         <x-icon.minus-circle/>
                    </a>
                    <input type="text" value={{ $item->qty }} disabled class="w-10 h-6 px-1 mx-1 text-sm text-center border rounded focus:outline-none bg-cinza-100">
                    <a href="#" wire:click="increaseQty('{{ $item->rowId }}')" class="font-semibold">
                        <x-icon.plus-circle/>
                    </a>
                </div>
                <div class="pr-4">
                    <span class="text-sm font-medium whitespace-nowrap"> {{ 'R$ ' . number_format($item->price, 2, ',', '.') }} </span>
                </div>
                <div class="pr-4 w-9 text-vermelho-600">
                    <a href="#" wire:click="removeItemCart('{{ $item->rowId }}')" class="font-semibold">
                        <p> <abbr title="Excluir"> <x-icon.trash-z/> </abbr> </p>
                    </a>
                </div>
            </div>
        </div>
    @endif
</div>
