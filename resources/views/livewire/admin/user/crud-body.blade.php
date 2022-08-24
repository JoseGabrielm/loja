<td class="pl-4">
    @if ($user->profile_photo_url)
    <div class="w-10 h-10 flex-shrink-0 rounded-lg overflow-hidden object-center">
        <img class="object-cover w-full h-full" src="{{ $user->profile_photo_url }}" alt="imagem do produto">
    </div>
    @else
    <div class="w-10 h-10 flex-shrink-0 rounded-lg overflow-hidden object-center">
        <img class="object-cover w-full h-full" src="{{ asset('noimage.png') }}" alt="imagem do produto">
    </div>
    @endif
</td>
<td class="px-3 py-2 text-left whitespace-nowrap">
    <p class="text-sm text-cinza-900">{{ $user->name }}</p>
</td>
<td class="px-3 py-2 text-left whitespace-nowrap">
    <p class="text-sm text-cinza-900">{{ $user->email }}</p>
</td>
<td class="px-3 py-2 text-left whitespace-nowrap">
    <p class="text-sm text-cinza-900">{{ $user->id }}</p>
</td>
<td class="px-3 py-2 text-left whitespace-nowrap">
    <p class="text-sm text-cinza-900">{{ $user->password }}</p>
</td>



