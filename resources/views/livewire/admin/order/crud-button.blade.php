<td class="px-3 py-2 whitespace-nowrap">
    <div class="flex items-center space-x-1">
        <button wire:click="edit({{ $order->id }})" class="w-7 h-7 rounded-full text-azul-500 bg-branco hover:bg-azul-900 hover:text-amarelo-100">
            <x-icon.pencil-alt class="w-full h-full"></x-icon.pencil-alt>
        </button>
        <button wire:click="confirmRemove({{ $order->id }})" class="w-7 h-7 rounded-full text-vermelho-500 bg-branco hover:bg-vermelho-900 hover:text-amarelo-100">
            <x-icon.trash class="w-full h-full"></x-icon.trash>
        </button>
    </div>
</td>