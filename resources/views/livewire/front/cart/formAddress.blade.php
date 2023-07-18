<div class="py-3 text-xl font-medium text-left border-b ">
    <p class="bold"> Confirme suas informações </p>
</div>



<h1 class="pt-4 text-xl font-medium "> Dados do cliente </h1>

<div class="w-full pb-4 space-y-3 border-b">
    <div class="flex flex-col w-full space-y-3 md:flex-row md:space-x-6 md:space-y-0">
        <div class="flex items-baseline w-full">
            <x-form.label for="documentShip.name" value="{{ __('Nome Completo') }}" class="whitespace-nowrap" />
            <x-form.text wire:model.defer="documentShip.name" id="documentShip-name" class="w-full mx-5 mt-1" />
            <x-alert.error-form for="documentShip.name" class="mt-2" />
        </div>

    </div>
    <div class="flex flex-col space-y-4 md:flex-row md:space-x-6 md:space-y-0">
        <div class="flex items-baseline">
            <x-form.label for="documentShip.fantasy" value="{{ __('Telefone') }}" />
            <x-form.text wire:model.defer="documentShip.fantasy" id="documentShip-fantasy" type="email"
                class="w-1/2 mx-5 mt-1" />
            <x-alert.error-form for="documentShip.fantasy" class="mt-2" />
        </div>
        <div class="flex items-baseline w-full">
            <x-form.label for="documentShip.contact" value="{{ __('Email') }}" />
            <x-form.text wire:model.defer="documentShip.contact" id="documentShip-contact" type="text"
                class="w-full mx-5 mt-1" />
            <x-alert.error-form for="documentShip.contact" class="mt-2" />
        </div>
    </div>
    <div class="flex flex-col items-baseline w-full space-y-3 md:flex-row md:space-x-6 md:space-y-0">
        <div class="flex items-baseline">
            <x-form.label for="documentShip.is_company" value="{{ __('É uma empresa?') }}" class="whitespace-nowrap" />
            <input type="checkbox" wire:model.defer="iscompany" wire:click="$emit('refreshCompany')"
                id="documentShip-is_company" class="mx-5 md:mt-1 md:mx-5" />
        </div>


        @if ($iscompany == 1)
            <div class="flex items-baseline w-full">
                <x-form.label for="documentShip.doc_country" value="{{ __('CNPJ') }}" />
                <x-form.text wire:model.defer="documentShip.doc_country" id="documentShip-doc_country" type="text"
                    class="w-full mx-5 text-center md:mt-1 md:w-48" />
                <x-alert.error-form for="documentShip.doc_country" class="mt-2" />
            </div>
            <div class="flex items-baseline w-full">
                <x-form.label for="documentShip.doc_state" value="{{ __('IE') }}" class="ml-5 md:ml-0" />
                <x-form.text wire:model.defer="documentShip.doc_state" id="documentShip-doc_state" type="text"
                    class="w-full mx-5 text-center md:mt-1 md:w-48" />
                <x-alert.error-form for="documentShip.doc_state" class="mt-2" />
            </div>
        @else
            <div class="flex items-baseline w-full">
                <x-form.label for="documentShip.doc_ssn" value="{{ __('CPF') }}" />
                <x-form.text wire:model.defer="documentShip.doc_ssn" id="documentShip-doc_ssn" type="text"
                    class="w-full mx-5 text-center md:mt-1 md:w-48" />
                <x-alert.error-form for="documentShip.doc_ssn" class="mt-2" />
            </div>
        @endif

    </div>
    <div class="flex flex-col items-baseline w-full space-y-3 md:flex-row md:space-x-6 md:space-y-0">
        <div class="flex items-baseline">
            <x-form.label for="documentShip.birthday" value="{{ __('Data de Nascimento') }}"
                class="whitespace-nowrap" />
            <x-form.date wire:model.defer="documentShip.birthday" id="documentShip-birthday" placeholder="dd/mm/yyyy"
                class="w-32 mx-5 mt-1 text-center" />
        </div>
        <div class="flex items-baseline w-full">
            <x-form.label for="documentShip.note" value="{{ __('Observação') }}" />
            <x-form.text wire:model.defer="documentShip.note" id="documentShip-note" type="text"
                class="w-full mx-5 mt-1" />
            <x-alert.error-form for="documentShip.note" class="mt-2" />
        </div>
    </div>
    <div class="flex items-baseline">
        <div class="flex items-baseline">
            <x-form.label for="documentShip.news_letter" value="{{ __('Deseja receber promoções?') }}" />
            <input type="checkbox" wire:model.defer="documentShip.news_letter" id="documentShip-news_letter"
                class="mx-5 md:mt-1 md:mx-5" />
        </div>
    </div>
</div>



<h1 class="pt-4 text-xl font-medium "> Dados de entrega </h1>



<div class="w-full pb-4 space-y-3 border-b">


    @if (Session::has('message'))
        <em class="text-amarelo-800"> {!! session('message') !!}</em>
    @endif

    <div class="flex flex-col items-baseline w-full space-y-3 md:flex-row md:space-x-6 md:space-y-0">
        <div class="flex items-baseline">
            <x-form.label value="{{ __('Gostaria de retirar no local?') }}" class="whitespace-nowrap" />
            <input type="checkbox" wire:click="$toggle('retira')" id="documentShip-is_company"
                class="mx-5 md:mt-1 md:mx-5" />
        </div>
    </div>




    @if ($retira == 1)
    @else
        <div class="flex flex-col space-y-4 md:flex-row md:space-x-6 md:space-y-0">


            <div class="flex items-baseline pt-2 space-x-2 space-y-3 md:space-x-6 md:space-y-0">
                <x-form.label for="addressShip.postcode" value="{{ __('CEP') }}" />
                <x-form.text wire:model.defer="addressShip.postcode" id="addressShip-postcode" type="text"
                    class="w-32 mt-1 text-center" />
                <x-button.secundary wire:click="searchAddressShip" class="w-36 h-7">Importar Rua</x-button.secundary>
                <x-alert.error-form for="addressShip.postcode" class="mt-2" />

            </div>

            <div class="flex items-baseline w-full space-x-2">
                <x-form.label for="addressShip.neighborhood" value="{{ __('Bairro') }}" />
                <x-form.text wire:model.defer="addressShip.neighborhood" id="addressShip-neighborhood" type="text"
                    class="w-7/12 mt-1" />
                <x-alert.error-form for="addressShip.neighborhood" class="mt-2" />
            </div>



            <div class="flex items-baseline w-full space-x-2">
                <x-form.label for="addressShip.number" value="{{ __('Número') }}" />
                <x-form.text wire:model.defer="addressShip.number" id="addressShip-number" type="text"
                    class="w-16 mt-1" />
                <x-alert.error-form for="addressShip.number" class="mt-2" />
            </div>


        </div>


        <div class="flex flex-col w-full space-y-4 md:flex-row md:space-x-6 md:space-y-0">


            <div class="flex items-baseline w-full space-x-2">
                <x-form.label for="addressShip.street" value="{{ __('End.') }}" />
                <x-form.text wire:model.defer="addressShip.street" id="addressShip-street" type="text"
                    class="w-full mt-1" />
                <x-alert.error-form for="addressShip.street" class="mt-2" />
            </div>

        </div>






        <div class="flex flex-col space-y-4 md:flex-row md:space-x-6 md:space-y-0">



            <div class="flex items-baseline space-x-2">
                <x-form.label for="cityName" value="{{ __('Cidade') }}" />
                <x-form.text wire:model.defer="cityName" rows="3" id="cityName" class="w-6/12 mt-1"
                    readonly />
                <x-alert.error-form for="cityName" class="mt-2" />
            </div>

            <div class="flex items-baseline space-x-2">
                <x-form.label for="cityState" value="{{ __('Estado') }}" />
                <x-form.text wire:model.defer="cityState" rows="3" id="cityState"
                    class="w-10 mt-1 text-center" readonly />
                <x-alert.error-form for="cityState" class="mt-2" />
            </div>

        </div>


        <div class="flex items-baseline space-x-2">

            <div class="flex flex-col items-baseline w-full space-x-2 md:flex-row">
                <x-form.label for="addressShip.complement" value="{{ __('Complemento: ') }}" />
                <x-form.textarea wire:model.defer="addressShip.complement" rows="3" id="addressShip-complement"
                    class="w-full mt-1" />
                <x-alert.error-form for="addressShip.complement" class="mt-2" />
            </div>

        </div>



        <div class="">


            @include('livewire.front.cart.selectAdresses')


        </div>
    @endif







</div>


<div class="relative py-4 border-t">

    <h1 class="text-xl font-medium "> Contato alternativo </h1>

    @if (Session::has('message'))
        <em class="text-amarelo-800"> {!! session('message') !!}</em>
    @endif








    <div class="flex flex-col pt-2 space-y-3 md:flex-row md:space-x-6 md:space-y-0">
        <div class="flex items-baseline space-x-2 space-y-3 md:space-x-6 md:space-y-0">
            <x-form.label for="contactForm.description" value="{{ __('Descrição') }}" />
            <x-form.text wire:model.defer="contact.description" id="addressShip-street" type="text"
                class="mt-1 w-80" />
            <x-alert.error-form for="contactForm.description" class="mt-2" />
        </div>





        <div class="flex items-baseline space-y-3 md:space-x-6 md:space-y-0">
            <x-form.label for="contactForm.type" value="{{ __('Tipo') }}" />
            <select wire:model.defer="contactForm.type" class="w-24 form-control">
                <option value="" selected> Selecione o tipo de contato </option>
                <option value="telephone"> telefone </option>
                <option value="email"> email </option>
                <option value="cell"> celular </option>
                <option value="message"> mensagem </option>
                <option value="other"> outros </option>
            </select>
            <x-alert.error-form for="contactForm.type" class="mt-2" />
        </div>




        <div class="flex items-baseline space-y-3 md:space-x-6 md:space-y-0">
            <x-form.label for="contactForm.contact" value="{{ __('Nome do contato') }}" />
            <x-form.text wire:model.defer="contactForm.contact" id="addressShip-neighborhood" type="text"
                class="w-full mt-1" />
            <x-alert.error-form for="contactForm.contact" class="mt-2" />
        </div>
    </div>







</div>



















{{-- jogar resume para a coluna ao lado --}}
