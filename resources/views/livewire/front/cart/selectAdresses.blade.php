<div class="w-full overflow-x-auto grid grid-rows-1 h-[200px]  content-center rounded-md">

    <div class="  w-full flex h-[150px] items-center  m-2 ">


        @foreach ($addressList as $address)
            <div x-data="{ selected: {{ $address->id == $addressShip->id }} }" :class="{ 'bg-azul-200': selected }"
                class="rounded-lg h-[150px] w-[300px]
                bg-cinza-300 m-2 shadow-md">
                <div class="m-2 ">

                    <div class="font-bold">
                        <span>{{ $address->type }}</span>
                    </div>


                    <div class="pt-2">
                        <p>{{ $address->postcode . ' - ' . $address->street . ' - ' . $address->number . ', ' . $address->neighborhood }}
                        </p>
                    </div>

                </div>


            </div>
        @endforeach

    </div>

</div>
