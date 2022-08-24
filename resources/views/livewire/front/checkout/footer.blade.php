<div class="">







    <div class="grid p-2 mt-6 border-t justify-items-end xl:mr-24 xl:p-8">
        <div class="flex md:mr-4">
            <span class="mr-3 text-sm font-medium text-cinza-600 md:pt-1">
                Subtotal dos produtos:
            </span>
            <span class="text-sm font-bold md:text-lg text-cinza-800 min-w-max">
                {{ 'R$ ' . number_format($order->total / 100, 2, ',', '.') }}
            </span>
        </div>
        <div class="flex md:mr-4">
            <span class="mr-3 text-sm font-medium text-cinza-600 md:pt-1">
                Valor frete para o CEP {{ $order->ship_zip }}:
            </span>
            <span class="text-sm font-bold md:text-lg text-cinza-800 min-w-max">
                {{ 'R$ ' . number_format($order->ship_value / 100, 2, ',', '.') }}
            </span>
        </div>
        <div class="flex border-b md:mr-4">
            <span class="mr-3 text-sm font-medium text-cinza-600 md:pt-1">
                desconto:
            </span>
            <span class="text-sm font-bold md:text-lg text-cinza-800 min-w-max">
                {{ '- R$ ' . number_format($discount / 100, 2, ',', '.') }}
            </span>
        </div>
        <div class="flex pt-2 md:mr-4">
            <span class="mr-3 text-sm font-medium text-cinza-600 md:pt-1">
                Valor total para pagamento a vista:
            </span>
            <span class="text-sm font-bold md:text-lg text-cinza-800 min-w-max">
                {{ 'R$ ' . number_format(($order->grand_total - $discount) / 100, 2, ',', '.') }}
            </span>
        </div>
    </div>


    @if($order->ship_value !== 0 )

    <div class="px-3 py-2 border-t xl:mr-24">

        <span class="pt-4 text-sm font-bold md:text-lg text-cinza-800 min-w-max">
            Dados de entrega:
        </span>


        <div class="flex md:mr-4">
            <span class="mr-3 text-sm font-medium text-cinza-600 md:pt-1">
                Nome:
            </span>
            <span class="text-sm font-bold md:text-lg text-cinza-800 min-w-max">
                {{ $client->name }}
            </span>
        </div>






        <div class="flex md:mr-4">
            <span class="mr-3 text-sm font-medium text-cinza-600 md:pt-1">
                {{ $order->doc_type }}:
            </span>
            <span class="text-sm font-bold md:text-lg text-cinza-800 min-w-max">
                {{ $order->doc_number }}
            </span>
        </div>



        @php
            $city = $address->city ?? '';
            $states = $address->city->state ?? '';
        @endphp


        <div class="flex md:mr-4">
            <span class="mr-3 text-sm font-medium text-cinza-600 md:pt-1">
                Endereço:
            </span>
            <p>
                <span class="text-sm font-bold md:text-lg text-cinza-800 min-w-max">
                    {{ $address->neighborhood ?? '' }} - {{ $city->name ?? '' }}-{{ $states->initials ?? '' }} -
                    {{ $address->street ?? '' }}, {{ $address->number ?? '' }}
                    {{ $address->complement ?? '' }} - {{ $address->postcode }}
                </span>
            </p>
        </div>




    </div>






    @else

    <div class="px-3 py-6 border-t xl:mr-24">

        <span class="pt-4 text-sm font-bold md:text-lg text-cinza-800 min-w-max">
            Dados para retirar:
        </span>


        <div class="flex md:mr-4">
            <span class="mr-3 text-sm font-medium text-cinza-600 md:pt-1">
                Numero do pedido:
            </span>
            <span class="text-sm font-bold md:text-lg text-cinza-800 min-w-max">
                {{$order->id}}
            </span>
        </div>


        <div class="flex md:mr-4">
            <span class="mr-3 text-sm font-medium text-cinza-600 md:pt-1">
                Endereço:
            </span>
            <span class="text-sm font-bold md:text-lg text-cinza-800 min-w-max">
                Rua Ver. Humberto Barros Franco, 955 - Mogi Mirim-SP
            </span>
        </div>

        <div class="flex flex-col pt-4 md:mr-4">




        <p class="mr-3 text-sm font-medium  md:pt-1">Aguarde até que o pagamento do seu pedido seja confirmado para nós (você será notificado via email).
        </p>


        <p class="mr-3 text-sm font-medium  md:pt-1">
            Após confirmado, você pode verificar se os itens do seu pedido estão disponíveis para serem retirados pelo numero <b>(19) 3806-2314</b>.



        </p>


    </div>




    </div>



    @endif





    <div>



    </div>

</div>
