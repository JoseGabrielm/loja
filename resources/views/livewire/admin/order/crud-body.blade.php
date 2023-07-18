<td class="px-3 py-2 whitespace-nowrap">
    <p class="text-sm text-cinza-900">{{ $order->id }}</p>
</td>

<td class="px-3 py-2 whitespace-nowrap">
    <p class="text-sm text-cinza-900">{{ $order->status }}</p>
</td>

<td class="px-3 py-2 whitespace-nowrap">
    <p class="text-sm text-center text-cinza-900">R$ {{ number_format(($order->ship_value) / 100, 2 , ',', '.' ) }}</p>
</td>


<td class="px-3 py-2 whitespace-nowrap">
    <p class="text-sm text-center text-cinza-900">{{ $order->ship_form }}</p>
</td>

<td class="px-3 py-2 whitespace-nowrap">
    <p class="text-sm text-center text-cinza-900">{{ $order->ship_address }}</p>
</td>

<td class="px-3 py-2 whitespace-nowrap">
    <p class="text-sm text-center text-cinza-900">{{ $order->doc_number }}</p>
</td>

<td class="px-3 py-2 whitespace-nowrap">
    <p class="text-sm text-center text-cinza-900">{{ $order->coupon_code }}</p>
</td>

<td class="px-3 py-2 whitespace-nowrap">
    <p class="text-sm text-center text-cinza-900">R$ {{ number_format(($order->discount) / 100, 2 , ',', '.' )  }}</p>
</td>

<td class="px-3 py-2 whitespace-nowrap">
    <p class="text-sm text-center text-cinza-900">R$ {{ number_format(($order->sub_total) / 100, 2 , ',', '.' )  }}</p>
</td>

<td class="px-3 py-2 whitespace-nowrap">
    <p class="text-sm text-center text-cinza-900">R$ {{ number_format(($order->grand_total) / 100, 2 , ',', '.' )  }}</p>
</td>

<td class="px-3 py-2 whitespace-nowrap">
    <p class="text-sm text-center text-cinza-900">{{ $order->client_id  }}</p>
</td>
