<div class="container min-h-screen px-1 pt-24 pb-8 mx-auto bg-relva-30">
    <div class="h-full">
        <div class="max-w-md mx-auto rounded-lg shadow-xl md:max-w-6xl bg-cinza-200">
            <div class="md:flex">
                <div class="w-full py-5 md:p-4">
                    <div class="gap-1 px-1 lg:grid lg:grid-cols-5">
                        <div class="lg:col-span-3 lg:p-5">



                            @if (session()->has('error'))
                            <div class="p-2 m-6 border-2 rounded-md bg-cinza-300">
                                <div class="top-0 flex justify-center max-w-full p-2 border-2 rounded-md bg-vermelho-300">

                                    <h2><b>ERRO</b></h2>

                                </div>

                                <div class="flex flex-row p-2 text-lg text-center">
                                    <p>{{ session('error') }}</p>



                                </div>

                            </div>
                            @endif



                            @if (session()->has('pedidoSuccess'))
                            <div class="p-2 m-6 border-2 rounded-md bg-cinza-300">
                                <div class="top-0 flex justify-center max-w-full p-2 border-2 rounded-md bg-verde-100">

                                    <h2><b>{{ session('pedidoSuccess') }}</b></h2>

                                </div>

                                <div class="flex flex-row p-2 text-lg text-center">
                                    <p>Agora basta selecionar o método de pagamento ao lado e aguardar a confirmação para que possamos dar inicio ao preparo do seu pedido</p>

                                </div>

                            </div>
                            @endif


                            @include('livewire.front.checkout.messagesStatus')


                            @if (session()->has('message'))
                            <div class="p-2 m-6 border-2 rounded-md bg-cinza-300">
                                <div class="top-0 flex justify-center max-w-full p-2 border-2 rounded-md bg-verde-100">

                                    <h2>AVISO</h2>

                                </div>

                                <div class="flex flex-row justify-center p-2 text-lg">
                                    <p>{{ session('message') }}</p>



                                </div>

                            </div>
                            @endif


                            <div class="">
                                <h2 class="text-3xl font-semibold">Resumo do pedido</h2>
                            </div>
                            <div class="mt-8">
                                @foreach ($details as $item)
                                    @include('livewire.front.checkout.itens')
                                @endforeach
                            </div>
                            @include('livewire.front.checkout.footer')
                        </div>
                        <div class="p-2 pb-5 overflow-visible rounded shadow-xl md:col-span-2 bg-cinza-800">
                            @include('livewire.front.checkout.payment')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('livewire.front.checkout.script')
    @include('livewire.front.checkout.modal-addresses')
    @include('livewire.front.checkout.modal-city')
</div>

