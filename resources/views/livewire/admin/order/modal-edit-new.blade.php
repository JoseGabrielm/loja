<div class="fixed z-50 flex top-32 ">



    <x-modal.dialog wire:model='formModalOpened' title="Pedido {{ $this->form->payment_code ?? '' }}" class="">
        <div x-data="{

            value: '',

            demaskValue(value, inputId) {

                var element = document.getElementById(inputId);

                this.value = value.replaceAll('R$', '').replaceAll(',', '').replaceAll('.', '').replaceAll(' ', '');

                element.dispatchEvent(new Event('input'));

            }


        }" class="w-full space-y-3">


            @if (session()->has('success'))
                <div class="p-2 m-6 border-2 rounded-md bg-cinza-300">
                    <div class="top-0 flex max-w-full p-2 border-2 rounded-md bg-verde-100">

                        <h2> {{ session('success') }}</h2>

                    </div>
                </div>
            @elseif(session()->has('failure'))
                <div class="p-2 m-6 border-2 rounded-md bg-cinza-300">
                    <div class="top-0 flex max-w-full p-2 border-2 rounded-md bg-vermelho-100">

                        <h2> {{ session('failure') }}</h2>

                    </div>
                </div>
            @endif

            <div class="flex flex-col ">
                <div class="flex flex-row w-full pb-4">
                    <div class="w-full">
                        <x-form.label for="form.client_id " value="{{ __('Cliente') }}" />
                        <x-form.text rows="3" id="form-client_id " placeholder="Cliente" class="w-full mt-1 "
                            value="{{ $form?->client?->name }}" readonly />
                        <x-alert.error-form for="form.client_id " class="mt-2" />
                    </div>
                </div>

                <div class="flex space-x-6">

                    <div>
                        <x-form.label for="form.id" value="{{ __('ID') }}" />
                        <x-form.text wire:model.defer="form.id" rows="3" id="form-id" placeholder="ID"
                            class="w-full mt-1" readonly />
                        <x-alert.error-form for="form.id" class="mt-2" />
                    </div>

                    <div>
                        <x-form.label for="form.status" value="{{ __('Situação') }}" />
                        <x-form.text wire:model.defer="form.status" rows="3" id="form-status"
                            placeholder="Situação" class="w-full mt-1" />
                        <x-alert.error-form for="form.status" class="mt-2" />
                    </div>


                    <div class="-mr-2">

                        <x-form.label for="form.ship_value" value="{{ __('Valor do frete') }}" />

                        <x-form.text placeholder="Valor do frete" class="w-full mt-1" wire:model.defer="form.ship_value"
                            @input="demaskValue($el.value, 'ship_value')" type="text"
                            x-mask:dynamic="divisionMoneyMask" />

                        <x-form.text wire:model.defer="form.ship_value" x-bind:value="value" id="ship_value"
                            type="hidden" />

                        <x-alert.error-form for="form.ship_value" class="mt-2" />
                    </div>

                </div>
            </div>

            <div class="flex space-x-6">

                <div>
                    <x-form.label for="form.ship_form" value="{{ __('Forma de entrega') }}" />
                    <x-form.text wire:model.defer="form.ship_form" rows="3" id="form-ship_form"
                        placeholder="Forma de entrega" class="w-full mt-1" />
                    <x-alert.error-form for="form.ship_form" class="mt-2" />
                </div>

            </div>

            <div class="flex space-x-6">
                <div>
                    <x-form.label for="form.doc_number" value="{{ __('Documento') }}" />
                    <x-form.text x-mask:dynamic="documentMask" wire:model.defer="form.doc_number" rows="3"
                        id="form-doc_number" placeholder="Documento" class="w-full mt-1" readonly />
                    <x-alert.error-form for="form.doc_number" class="mt-2" />
                </div>
                <div>
                    <x-form.label for="form.coupon_code" value="{{ __('Cupom') }}" />
                    <x-form.text wire:model.defer="form.coupon_code" rows="3" id="form-coupon_code"
                        placeholder="Cupom" class="w-full mt-1" />
                    <x-alert.error-form for="form.coupon_code" class="mt-2" />
                </div>
                <div>
                    <x-form.label for="form.discount" value="{{ __('Desconto') }}" />
                    <x-form.text x-mask:dynamic="divisionMoneyMask" @input="demaskValue($el.value, 'discount')"
                        wire:model.defer="form.discount" rows="3" id="form-discount" placeholder="Desconto"
                        class="w-full mt-1" />

                    <x-form.text wire:model.defer="form.discount" x-bind:value="value" id="discount"
                        type="hidden" />
                    <x-alert.error-form for="form.discount" class="mt-2" />
                </div>
            </div>

            <div class="flex space-x-6">
                <div>
                    <x-form.label for="form.sub_total" value="{{ __('Produto menos desconto') }}" />
                    <x-form.text x-mask:dynamic="divisionMoneyMask" @input="demaskValue($el.value, 'sub_total')"
                        wire:model.defer="form.sub_total" rows="3" id="form-sub_total"
                        placeholder="Produto menos desconto" class="w-full mt-1" />

                    <x-form.text wire:model.defer="form.sub_total" x-bind:value="value" id="sub_total"
                        type="hidden" />

                    <x-alert.error-form for="form.sub_total" class="mt-2" />
                </div>




            </div>

            <div>

                <div class="pt-2">

                <span class="text-lg">Infos Produtos</span>

                </div>

                @if (isset($formProduct))
                    @foreach ($formProduct as $product)
                        <div class="bg-cinza-200 w-full flex rounded-md m-2">

                            <div class="m-2">


                                <div class="flex flex-row w-full h-[80px] space-x-4 place-items-center ">

                                    <div class="justify-self-end rounded-md">

                                        <img class="h-[80px] rounded-md w-[80px]" src="{{ $product->product->image }}" />

                                    </div>

                                    <div>

                                    <div class="pb-2">
                                        <div>
                                        <span class="font-bold">{{ $product->product_description }}</span>
                                        </div>
                                        <div>
                                        <span class="">SKU: {{ $product->sku }} </span>
                                        </div>
                                    </div>

                                    <div class="flex justify-between text-right w-[200px]">
                                        <span class="">R$
                                            {{ number_format($product->unitary_price / 100, 2, ',', '.') }} </span>
                                        <span class="space-x-4">Qtde.: {{ $product->amount }}</span>

                                    </div>

                                    </div>



                                </div>

                            </div>



                        </div>
                    @endforeach
                @endif

                <div class="text-right">

                    <div class="m-2">
                        <x-form.label for="form.grand_total" value="{{ __('Porduto mais frete menos desconto') }}" />
                        <x-form.text x-mask:dynamic="divisionMoneyMask"
                            value="{{ $form?->sub_total + $form?->ship_value - $form?->discount }}"
                            id="form-grand_total" placeholder="Porduto mais frete menos desconto"
                            class="text-right mt-1" readonly />


                        <x-alert.error-form for="form.grand_total" class="mt-2" />
                    </div>

                </div>






            </div>
            <x-slot name="footer">




                <div class="text-left">
                    <a href="{{ $form->url_pay ?? '' }}" target="_blank"> {{ $form->url_pay ?? '' }} </a>
                </div>

                <div class="flex flex-row justify-end w-full">
                    <div class="justify-between">
                        <x-button.white @click="$dispatch('close')" class="w-28">
                            <div class="flex items-center space-x-2 place-content-center">
                                <x-icon.plus class="w-5 h-5"></x-icon.plus>
                                Cancelar
                            </div>
                        </x-button.white>
                        <x-button.primary wire:click="save" class="w-28">
                            <div class="flex items-center space-x-2 place-content-center">
                                <x-icon.plus class="w-5 h-5"></x-icon.plus>
                                Salvar
                            </div>
                        </x-button.primary>

                        <x-button.primary wire:click="forcePay()" class="w-28">
                            <div class="flex items-center space-x-2 place-content-center">
                                <x-icon.plus class="w-5 h-5"></x-icon.plus>
                                Forçar pagamento
                            </div>
                        </x-button.primary>
                    </div>
                </div>

                <div class="flex flex-row">
                    <x-jet-dropdown align="center" width="48" class="border border-azul-300">
                        <!-- photo or name -->
                        <x-slot name="trigger">

                            <span class="inline-flex rounded-md">
                                <button type="button"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 transition border border-transparent rounded-md border-azul-300 text-preto bg-branco hover:text-cinza-700 focus:outline-none">
                                    Reenviar emails
                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </span>
                        </x-slot>
                        <x-slot name="content">
                            <x-form.dropdown-link class="w-full hover:bg-cinza-200">

                                <button type="button" class="w-full" wire:click="resendEmail(1)">Pedido
                                    recebido</button>

                            </x-form.dropdown-link>
                            <x-form.dropdown-link class="w-full hover:bg-cinza-200">

                                <button type="button" class="w-full" wire:click="resendEmail(2)">Pagamento
                                    confirmado</button>

                            </x-form.dropdown-link>
                            <x-form.dropdown-link class="w-full hover:bg-cinza-200">

                                <button type="button" class="w-full" wire:click="resendEmail(3)">Produto
                                    enviado</button>

                            </x-form.dropdown-link>
                        </x-slot>
                    </x-jet-dropdown>
                </div>





            </x-slot>
    </x-modal.dialog>






</div>
