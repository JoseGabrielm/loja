<div class="flex fixed top-32 z-50 ">
    <x-modal.dialog wire:model='formModalOpened' title="Pedido {{ $this->form->payment_code ?? '' }}"
        class="">
        <div class="w-full space-y-3">


            @if (session()->has('success'))
            <div class="p-2 m-6 rounded-md  bg-cinza-300 border-2">
                <div class="flex p-2 rounded-md max-w-full bg-verde-100 border-2 top-0">

                    <h2> {{ session('success') }}</h2>

                </div>
            </div>

            @elseif(session()->has('failure'))


            <div class="p-2 m-6 rounded-md  bg-cinza-300 border-2">
                <div class="flex p-2 rounded-md max-w-full bg-vermelho-100 border-2 top-0">

                    <h2> {{ session('failure') }}</h2>

                </div>
            </div>

            @endif

            <div class="flex space-x-6">
                <div>
                    <x-form.label for="form.id" value="{{ __('ID') }}" />
                    <x-form.text wire:model.defer="form.id" rows="3" id="form-id" placeholder="ID"
                        class="mt-1 w-full" readonly />
                    <x-alert.error-form for="form.id" class="mt-2"  />
                </div>
                <div>
                    <x-form.label for="form.status" value="{{ __('Situação') }}" />
                    <x-form.text wire:model.defer="form.status" rows="3" id="form-status" placeholder="Situação"
                        class="mt-1 w-full" />
                    <x-alert.error-form for="form.status" class="mt-2" />
                </div>
                <div>
                    <x-form.label for="form.ship_value" value="{{ __('Valor do frete') }}" />
                    <x-form.text wire:model.defer="form.ship_value" rows="3" id="form-ship_value"
                        placeholder="Valor do frete" class="mt-1 w-full" />
                    <x-alert.error-form for="form.ship_value" class="mt-2" />
                </div>
            </div>

            <div class="flex space-x-6">

                <div>
                    <x-form.label for="form.ship_form" value="{{ __('Forma de entrega') }}" />
                    <x-form.text wire:model.defer="form.ship_form" rows="3" id="form-ship_form"
                        placeholder="Forma de entrega" class="mt-1 w-full" />
                    <x-alert.error-form for="form.ship_form" class="mt-2" />
                </div>

            </div>

            <div class="flex space-x-6">
                <div>
                    <x-form.label for="form.doc_number" value="{{ __('Documento') }}" />
                    <x-form.text wire:model.defer="form.doc_number" rows="3" id="form-doc_number"
                        placeholder="Documento" class="mt-1 w-full" readonly/>
                    <x-alert.error-form for="form.doc_number" class="mt-2" />
                </div>
                <div>
                    <x-form.label for="form.coupon_code" value="{{ __('Cupom') }}" />
                    <x-form.text wire:model.defer="form.coupon_code" rows="3" id="form-coupon_code" placeholder="Cupom"
                        class="mt-1 w-full" />
                    <x-alert.error-form for="form.coupon_code" class="mt-2" />
                </div>
                <div>
                    <x-form.label for="form.discount" value="{{ __('Desconto') }}" />
                    <x-form.text wire:model.defer="form.discount" rows="3" id="form-discount" placeholder="Desconto"
                        class="mt-1 w-full" />
                    <x-alert.error-form for="form.discount" class="mt-2" />
                </div>
            </div>

            <div class="flex space-x-6">
                <div>
                    <x-form.label for="form.sub_total" value="{{ __('Produto menos desconto') }}" />
                    <x-form.text wire:model.defer="form.sub_total" rows="3" id="form-sub_total"
                        placeholder="Produto menos desconto" class="mt-1 w-full" />
                    <x-alert.error-form for="form.sub_total" class="mt-2" />
                </div>
                <div>
                    <x-form.label for="form.grand_total" value="{{ __('Porduto mais frete menos desconto') }}" />
                    <x-form.text wire:model.defer="form.grand_total" rows="3" id="form-grand_total"
                        placeholder="Porduto mais frete menos desconto" class="mt-1 w-full" />
                    <x-alert.error-form for="form.grand_total" class="mt-2" />
                </div>
                <div>
                    <x-form.label for="form.client_id " value="{{ __('Cliente') }}" />
                    <x-form.text wire:model.defer="form.client_id " rows="3" id="form-client_id " placeholder="Cliente"
                        class="mt-1 w-full" readonly/>
                    <x-alert.error-form for="form.client_id " class="mt-2" />
                </div>
            </div>

        </div>
        <x-slot name="footer">




            <div class="text-left">
                    <a href="{{ $form->url_pay ?? '' }}" target="_blank"> {{ $form->url_pay ?? '' }} </a>
                </div>





            <x-button.white @click="$dispatch('close')" class="w-28">
                <div class="flex items-center place-content-center space-x-2">
                    <x-icon.plus class="w-5 h-5"></x-icon.plus>
                    Cancelar
                </div>
            </x-button.white>
            <x-button.primary wire:click="save" class="w-28">
                <div class="flex items-center place-content-center space-x-2">
                    <x-icon.plus class="w-5 h-5"></x-icon.plus>
                    Salvar
                </div>
            </x-button.primary>

            <x-button.primary wire:click="forcePay()" class="w-28">
                <div class="flex items-center place-content-center space-x-2">
                    <x-icon.plus class="w-5 h-5"></x-icon.plus>
                    Forçar pagamento
                </div>
            </x-button.primary>



        </x-slot>
    </x-modal.dialog>
</div>
