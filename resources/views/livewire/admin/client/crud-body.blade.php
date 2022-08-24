
<td class="px-3 py-2 text-center whitespace-nowrap">
    <p class="text-sm text-cinza-900">{{ $client->name }}</p>
</td>

<td class="px-3 py-2 whitespace-nowrap">
    <p class="text-sm text-cinza-900">{{ $client->fantasy}}</p>
</td>

<td class="px-3 py-2 whitespace-nowrap">
    <p class="text-sm text-center text-cinza-900">{{ $client->is_company ? 'CNPJ' : 'CPF'}}</p>
</td>

<td class="px-3 py-2 whitespace-nowrap">
    <p class="text-sm text-center text-cinza-900">{{ $client->doc_ssn }}</p>
</td>

<td class="px-3 py-2 whitespace-nowrap">
    <p class="text-sm text-cinza-900">{{ $client->doc_country }}</p>
</td>

<td class="px-3 py-2 whitespace-nowrap">
    <p class="text-sm text-center text-cinza-900">{{ $client->doc_state }}</p>
</td>

<td class="px-3 py-2 whitespace-nowrap">
    <p class="text-sm text-center text-cinza-900">{{ $client->doc_city }}</p>
</td>

<td class="px-3 py-2 whitespace-nowrap">
    <p class="text-sm text-center text-cinza-900">{{ $client->birthday }}</p>
</td>

<td class="px-3 py-2 whitespace-nowrap">
    <p class="text-sm text-center text-cinza-900">{{ $client->is_active ? 'Ativo' : ' '}}</p>
</td>

<td class="px-3 py-2 whitespace-nowrap">
    <p class="text-sm text-center text-cinza-900">{{ $client->news_letter ? 'Sim' : 'Não'}}</p>
</td>

<td class="px-3 py-2 whitespace-nowrap">
    <p class="text-sm text-center text-cinza-900">{{ $client->is_verified ? 'Sim' : 'Não'}}</p>
</td>

<td class="px-3 py-2 whitespace-nowrap">
    <p class="text-sm text-center text-cinza-900">{{ $client->note }}</p>
</td>

<td class="px-3 py-2 whitespace-nowrap">
    <p class="text-sm text-center text-cinza-900">{{ $client->user_id }}</p>
</td>



