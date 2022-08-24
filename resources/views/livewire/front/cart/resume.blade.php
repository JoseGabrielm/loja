<div class="justify-between max-w-lg ">

    @if (Cart::count() > 0)
        <div class="flex-col justify-between px-2 ">

            <div class="text-right">

                @auth
                    <span class="text-sm font-medium text-preto md:pt-1">
                        Frete para {{ $addressShip->postcode }} :
                    </span>
                @endauth

                @guest
                    <span class="text-sm font-medium text-preto md:pt-1">
                        Frete para {{ $this->zip }} :
                    </span>
                @endguest

                <span class="text-sm font-bold md:text-lg text-cinza-700 min-w-max">
                    {{ 'R$ ' . number_format($totalship, 2, ',', '.') }}
                </span>


            </div>

            <div class="text-right border-b">
                <span class="mr-2 text-sm font-medium text-preto md:pt-1">
                    Subtotal:
                </span>


                <span class="text-sm font-bold md:text-lg text-cinza-700 min-w-max">
                    R$ {{ Cart::total(2, ',', '.') }}
                </span>
            </div>


            <div class="pt-2 text-right">
                <span class="mr-2 text-sm font-medium text-preto md:pt-1">
                    Total:
                </span>

                <span class="text-sm font-bold md:text-lg text-cinza-700 min-w-max">
                    {{ 'R$ ' . number_format($totalship + Cart::total(2, '.', ''), 2, ',', '.') }}
                </span>
            </div>


        </div>



    @endif
</div>
