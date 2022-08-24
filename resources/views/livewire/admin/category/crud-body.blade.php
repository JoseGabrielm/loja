<td class="pl-4">
    @if ($category->image)
    <div class="w-10 h-10 flex-shrink-0 rounded-lg overflow-hidden object-center">
        <img class="object-cover w-full h-full" src="{{ $category->image }}" alt="imagem do produto">
    </div>
    @else
    <div class="w-10 h-10 flex-shrink-0 rounded-lg overflow-hidden object-center">
        <img class="object-cover w-full h-full" src="{{ asset('noimage.png') }}" alt="imagem do produto">
    </div>
    @endif
</td>

<td class="px-3 py-2 whitespace-nowrap">
    <p class="text-sm text-cinza-900">{{ $category->id }}</p>
</td>

<td class="px-3 py-2 whitespace-nowrap">
    <p class="text-sm text-cinza-900">{{ $category->description }}</p>
</td>

