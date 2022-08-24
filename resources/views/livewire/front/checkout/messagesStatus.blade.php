                        @if(session()->has('creditcardExists') && $order->status == 'link')


                            <div class="p-2 m-6 border-2 rounded-md bg-cinza-300 ">
                                <div class="top-0 flex max-w-full p-2 border-2 rounded-md bg-amarelo-400">

                                    <h2><b>{{ session('creditcardExists') }}</b></h2>

                                </div>

                                <div class="justify-center p-2 text-lg ">
                                    <p>Caso já tenha realizado o pagamento, aguarde o mesmo ser processado</p>
                                    <p>Se ainda não pagou, acesse a tela de pagamento por <b><a href="{{$order->url_pay}} target="_blank">aqui</a></b> </p>
                                </div>

                            </div>
                            @elseif(session()->has('creditcardExists') && $order->status == 'awaiting payment')

                            <div class="p-2 m-6 border-2 rounded-md bg-cinza-300 ">
                                <div class="top-0 flex max-w-full p-2 border-2 rounded-md bg-amarelo-400">

                                    <h2><b>{{ session('creditcardExists') }}</b></h2>

                                </div>

                                <div class="flex flex-row justify-center p-2 text-lg">
                                    <p>Aguarde o pagamento ser processado</p>



                                </div>

                            </div>

                            @elseif(session()->has('creditcardExists') && $order->status == 'payment confirmed')

                            <div class="p-2 m-6 border-2 rounded-md bg-cinza-300 ">
                                <div class="top-0 flex justify-center max-w-full p-2 border-2 rounded-md bg-verde-300">

                                    <h2><b>{{ session('creditcardExists') }}</b></h2>

                                </div>

                                <div class="flex flex-row justify-center p-2 text-lg">
                                    <p>Seu pagamento já foi confirmado e estamos preparando sua encomenda!</p>



                                </div>

                            </div>



                            @elseif(session()->has('billetExists'))

                            <div class="p-2 m-6 border-2 rounded-md bg-cinza-300 ">
                                <div class="top-0 flex max-w-full p-2 border-2 rounded-md bg-amarelo-400">

                                    <h2><b>{{ session('billetExists') }}</b></h2>

                                </div>

                                <div class="flex flex-row justify-center p-2 text-lg">
                                    <a href="{{$order->url_pay}}" target="_blank" >Clique aqui para ver o boleto</a>



                                </div>

                            </div>

                            @elseif(session()->has('depositExists'))

                            <div class="p-2 m-6 border-2 rounded-md bg-cinza-300 ">
                                <div class="top-0 flex max-w-full p-2 border-2 rounded-md bg-amarelo-400">

                                    <h2><b>{{ session('depositExists') }}</b></h2>

                                </div>

                                <div class="justify-center p-2 text-lg">
                                    <p> Deposite o valor da compra em nossa conta e envie o comprovante para nosso email informado ao lado.</p>
                                    <p>para trocar a forma de pagamentom, selecionar a opção e gerar o boleto ANTES de enviar o comprovante de pagamento para o email</p>
                                </div>

                            </div>



                        @endif
