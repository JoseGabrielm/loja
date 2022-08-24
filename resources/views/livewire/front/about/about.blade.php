<div class="px-3 py-32 bg-relva-30 md:min-h-screen">

    <section class="w-full max-w-2xl px-6 py-4 mx-auto rounded-md shadow-xl bg-cinza-200">
        <h2 class="text-3xl font-semibold text-center text-gray-800 dark:text-white">Supreme Móveis Corporativos Ltda
        </h2>
        <p class="mt-3 text-center text-gray-600 dark:text-gray-400">Mogi Mirim-SP</p>


        <div class="text-center">

            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem quidem, asperiores totam alias
                architecto incidunt. Adipisci perferendis quasi dolor nisi aliquid aperiam explicabo, magnam beatae! Sit
                inventore tempore amet incidunt. </p>


        </div>



        <div class="grid justify-center flex-1 m-4 ">


            <div class="flex flex-row justify-center">
                <div class="p-2">


                    <figure class="rounded-full shadow-md bg-cinza-300">
                        <a href="https://lista.mercadolivre.com.br/_CustId_193139959" class="focus:outline-none" target="_blank">
                            <img class="w-full rounded-full max-h-80 " src="{{ asset('storage/mercado-livre.jpg') }}"
                                alt="Mercado livre">
                        </a>
                    </figure>


                </div>

                <div class="p-2">
                    <figure class="rounded-full shadow-md bg-cinza-300">
                        <a href="https://www.americanas.com.br/lojista/supreme-moveis-corporativos?origem=blancalojista" target="_blank" class="focus:outline-none">
                            <img class="w-full rounded-full max-h-80 " src="{{ asset('storage/americanas.jpg') }}"
                                alt="Americanas">
                        </a>
                    </figure>


                </div>

            </div>



            <div class="flex flex-row ">


                <div class="p-2">



                    <figure class="rounded-full shadow-md bg-cinza-300">
                        <a  href="https://www.submarino.com.br/lojista/supreme-moveis-corporativos?origem=blancalojista" target="_blank">
                            <img  class="w-full rounded-full max-h-80 " src="{{ asset('storage/submarino.png') }}"
                                alt="submarino">
                        </a>
                    </figure>


                </div>



                <div class="p-2">
                    <figure class="rounded-full shadow-md bg-cinza-300">
                        <a href="https://www.shoptime.com.br/lojista/supreme-moveis-corporativos?origem=blancalojista" target="_blank" class="focus:outline-none">
                            <img class="w-full rounded-full max-h-80 " src="{{ asset('storage/shoptime.png') }}"
                                alt="shoptime">
                        </a>
                    </figure>
                </div>

                <div class="p-2">
                    <figure class="rounded-full shadow-md bg-cinza-300">
                        <a href="https://supreme.mercadoshops.com.br" class="focus:outline-none" target="_blank">
                            <img class="w-full rounded-full max-h-80" src="{{ asset('storage/mercado-shops.jpg') }}"
                                alt="shoptime">
                        </a>
                    </figure>
                </div>



            </div>

        </div>


</div>

</section>


@auth
    <a href="{{ route('admin.products') }}">{{ __('A') }}</a>
@endauth

</div>
