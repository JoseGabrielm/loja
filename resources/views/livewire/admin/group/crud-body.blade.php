<td class="px-3 py-2 text-center whitespace-nowrap">
    <p class="text-sm text-cinza-900">{{ $group->id }}</p>
</td>
<td class="pl-4">
    @php
        $image = $group->images->where('type', 'like', 'Principal')->first();
    @endphp
    @if ($image)
    <div class="flex-shrink-0 object-center w-10 h-10 overflow-hidden rounded-lg">
        <img class="object-cover h-full" src="{{ $image ? $image->path : '' }}" alt="imagem do produto">
    </div>
    @else
    <div class="flex-shrink-0 object-center w-10 h-10 overflow-hidden rounded-lg">
        <img class="object-cover h-full" src="{{ asset('noimage.png') }}" alt="imagem do produto">        
    </div>
    @endif
</td>
<td class="px-3 py-2 text-center whitespace-nowrap">
    <p class="text-sm text-cinza-900">{{ $group->sku }}</p>
</td>

<td class="px-3 py-2 whitespace-nowrap">
    <p class="text-sm text-cinza-900">{{ $group->name }}</p>
</td>

<td class="px-3 py-2 whitespace-nowrap">
    <p class="text-sm text-center text-cinza-900">{{ $group->order }}</p>
</td>

<td class="px-3 py-2 whitespace-nowrap">
    <p class="text-sm text-center text-cinza-900">{{ $group->qty_ship }}</p>
</td>

<td class="px-3 py-2 whitespace-nowrap">
    <p class="text-sm text-center text-cinza-900"> {{ $group->active ? 'Ativo' : ' '}} </p>
</td>

<td class="px-3 py-2 whitespace-nowrap">
    <p class="text-sm text-center text-cinza-900">{{ $group->categories->description }}</p>
</td>

<td class="px-3 py-2 whitespace-nowrap">
    <div class="flex items-center space-x-1">
        <button wire:click="editMeasures({{ $group->id }})" class="w-5 h-5 rounded-xl text-azul-500 bg-branco hover:bg-azul-500 hover:text-amarelo-100">
            <x-icon.measure class="w-full h-full"></x-icon.measure>
        </button>
    </div>
</td>

<td class="px-3 py-2 whitespace-nowrap">
    <div class="flex items-center space-x-1">
        <button wire:click="editDescriptions({{ $group->id }})" class="w-5 h-5 rounded-xl text-azul-500 bg-branco hover:bg-azul-500 hover:text-amarelo-100">
            <x-icon.description class="w-full h-full "></x-icon.description>
        </button>
    </div>
</td>