<td class="pl-4">
    @if ($product->image)
    <div class="w-10 h-10 flex-shrink-0 rounded-lg overflow-hidden object-center">
        <img class="object-cover w-full h-full" src="{{ $product->image }}" alt="imagem do produto">
    </div>
    @else
    <div class="w-10 h-10 flex-shrink-0 rounded-lg overflow-hidden object-center">
        <img class="object-cover w-full h-full" src="{{ asset('noimage.png') }}" alt="imagem do produto">
    </div>
    @endif
</td>
<td class="px-3 py-2 text-center whitespace-nowrap">
    <p class="text-sm text-cinza-900">{{ $product->group->sku }}</p>
</td>
<td class="px-3 py-2 whitespace-nowrap">
    <p class="text-sm text-cinza-900">{{ $product->sku }}</p>
</td>
<td class="px-3 py-2 whitespace-nowrap">
    <p class="text-sm text-cinza-900">{{ $product->name }}</p>
</td>
<td class="px-3 py-2 whitespace-nowrap">
    <p class="text-sm text-cinza-900">{{ $product->color }}</p>
</td>

<td class="px-3 py-2 whitespace-nowrap">
    <p class="text-sm text-cinza-900 text-right"> {{ 'R$ ' . number_format($product->price, 2, ',', '.') }}</p>
</td>

<td class="px-3 py-2 whitespace-nowrap">
    <p class="text-sm text-cinza-900 text-right"> {{ 'R$ ' . number_format($product->price_max, 2, ',', '.') }} </p>
</td>

<td class="px-3 py-2 whitespace-nowrap">
    <p class="text-sm text-cinza-900 text-center"> {{ $product->stock }} </p>
</td>

<td class="px-3 py-2 whitespace-nowrap">
    <p class="text-sm text-cinza-900 text-center"> {{ $product->order }} </p>
</td>

<td class="px-3 py-2 whitespace-nowrap">
    <p class="text-sm text-cinza-900 text-center"> {{ $product->active ? 'Ativo' : ' '}} </p>
</td>

