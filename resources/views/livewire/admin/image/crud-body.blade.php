<td class="pl-4">
    @if ($image->path)
    <div class="flex-shrink-0 object-center w-10 h-10 overflow-hidden rounded-lg">
        <img class="object-cover w-full h-full" src="{{ $image->path }}" alt="imagem do produto">
    </div>
    @else
    <div class="flex-shrink-0 object-center w-10 h-10 overflow-hidden rounded-lg">
        <img class="object-cover w-full h-full" src="{{ asset('noimage.png') }}" alt="imagem do produto">
    </div>
    @endif
</td>
<td class="px-3 py-2 text-left whitespace-nowrap">
    <p class="text-sm text-cinza-900">{{ $image->group ? $image->group->sku : '' }}</p>
</td>
<td class="px-3 py-2 text-left whitespace-nowrap">
    <p class="text-sm text-cinza-900">{{ $image->description }}</p>
</td>
<td class="px-3 py-2 text-left whitespace-nowrap">
    <p class="text-sm text-cinza-900">{{ $image->type }}</p>
</td>



