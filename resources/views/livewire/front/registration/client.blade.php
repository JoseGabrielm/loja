<div class="md:flex md:flex-row md:space-x-6">
    <div class="flex items-center mt-3">
        <p class="px-3 text-2xl font-bold uppercase text-cinza-900">{{ $form->name }}</p>
    </div>
</div>

<div class="md:flex md:flex-row md:space-x-6">
    <div class="flex items-center mt-3">
        <p class="px-3 text-lg text-cinza-900">{{ $form->is_company ? 'Pessoa Jurídica' : 'Pessoa Física' }}</p>
    </div>
    @if ($form->is_company == 1 )
        <div class="flex items-center mt-3">
            <span class="pl-4 text-left text-xs font-medium text-cinza-900 "> CNPJ: </span>
            <p class="px-3 text-lg text-cinza-900">{{ $form->doc_country }}</p>
        </div>
        <div class="flex items-center mt-3">
            <span class="pl-4 text-left text-xs font-medium text-cinza-900 "> IE: </span>
            <p class="px-3 text-lg text-cinza-900">{{ $form->doc_state }}</p>
        </div> 
        <div class="flex items-center mt-3">
            <span class="pl-4 text-left text-xs font-medium text-cinza-900 "> Nome do Contato: </span>
            <p class="px-3 text-lg text-cinza-900">{{ $form->fantasy }}</p>
        </div>   
    @else
        <div class="flex items-center mt-3">
            <span class="pl-4 text-left text-xs font-medium text-cinza-900 "> CPF: </span>
            <p class="px-3 text-lg text-cinza-900">{{ $form->doc_ssn }}</p>
        </div>
    @endif
</div>

<div class="md:flex md:flex-row md:space-x-6">
    <div class="flex items-center mt-3">
        <span class="pl-4 text-left text-xs font-medium text-cinza-900 "> Data Nascimento: </span>
        <p class="px-3 text-lg text-cinza-900">{{ $form->birthday }}</p>
    </div>
    <div class="flex items-center mt-3">
        <span class="pl-4 text-left text-xs font-medium text-cinza-900 "> Deseja Receber nossas Promoções: </span>
        <p class="px-3 text-lg text-cinza-900">{{ $form->news_letter ? 'Sim' : 'Não' }}</p>
    </div>
</div>

<button wire:click="editClient({{ $form->id }})"
    class="m-8 text-azul-500 hover:text-amarelo-700">
    Editar meus dados
</button>


