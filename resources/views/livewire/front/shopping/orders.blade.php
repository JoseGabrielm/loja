<div class="flex items-center justify-between">
    <div class="">
        <div class="md:flex md:flex-row md:space-x-6">
            <div class="flex items-center mt-3">
                <span class="pl-4 text-xs font-bold text-left text-cinza-900 "> Pedido: </span>
                <p class="px-3 text-lg font-bold text-cinza-900 "> {{ $order->id }} </p>
            </div>
        </div>
        <div class="md:flex md:flex-row md:space-x-6">
            <div class="flex items-center mt-3">
                <span class="pl-4 text-xs font-medium text-left text-cinza-900 "> Data: </span>
                <p class="px-3 text-lg text-cinza-900"> {{ date('d/m/Y', strtotime($order->created_at)) }} </p>
            </div>
            <div class="flex items-center mt-3">
                <span class="pl-4 text-xs font-medium text-left text-cinza-900 "> Forma Pagamento: </span>



              @if($order->payby == 'credit_card' || $order->payby == 'link')
              <p class="px-3 text-lg text-cinza-900"> Cartão de crédito </p>
              @elseif($order->payby == 'deposit')
              <p class="px-3 text-lg text-cinza-900"> Depósito </p>
              @else
              <p class="px-3 text-lg text-cinza-900"> Boleto </p>
              @endif






            </div>
            <div class="flex items-center mt-3">
                <span class="pl-4 text-xs font-medium text-left text-cinza-900 "> Subtotal: </span>
                <p class="px-3 text-lg text-cinza-900"> {{ 'R$ ' . number_format($order->sub_total / 100, 2, ',', '.') }} </p>
            </div>


            <div class="flex items-center mt-3">
                <span class="pl-4 text-xs font-medium text-left text-cinza-900 "> Valor a Pagar: </span>
                <p class="px-3 text-lg text-cinza-900"> {{ 'R$ ' . number_format($order->grand_total / 100, 2, ',', '.') }} </p>
            </div>
        </div>
        <div class="md:flex md:flex-row md:space-x-6">
            <div class="flex items-center mt-3">
                <span class="pl-4 text-xs font-medium text-left text-cinza-900 "> Valor Frete: </span>
                <p class="px-3 text-lg text-cinza-900"> {{ 'R$ ' . number_format($order->ship_value / 100, 2, ',', '.') }} </p>
            </div>
            <div class="flex items-center mt-3">
                <span class="pl-4 text-xs font-medium text-left text-cinza-900 "> Forma Entrega: </span>
                <p class="px-3 text-lg text-cinza-900"> {{ $order->ship_form }} </p>
            </div>
            <div class="flex items-center mt-3">
                <span class="pl-4 text-xs font-medium text-left text-cinza-900 "> Situação: </span>


                @if($order->status == 'link')
                <p class="px-3 text-lg text-cinza-900"> Aguardando pagamento </p>
                @elseif($order->status == 'awaiting payment')
                <p class="px-3 text-lg text-cinza-900"> Aguardando confirmação do pagamento </p>
                @elseif($order->status == 'payment confirmed')
                <p class="px-3 text-lg text-cinza-900"> Pagamento confirmado </p>
                @elseif($order->status == 'payment disapproved')
                <p class="px-3 text-lg text-cinza-900"> Pagamento rejeitado </p>
                @endif





            </div>
        </div>
    </div>
    <div>
        <button wire:click="redirectCheckout({{ $order->id }})" class="m-8 text-azul-600 hover:text-amarelo-700">
            Abrir pagamento
        </button>
    </div>
</div>




