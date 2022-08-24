@if ($adShips)
    @foreach ($adShips as $adShip)
        <div class="mt-5 min-w-full bg-cinza-200 rounded-lg shadow-lg p-1">
            <div class="md:flex md:flex-row md:space-x-6">
                <div class="flex items-center mt-3">
                    <span class="pl-4 text-left text-lg font-extrabold text-cinza-900 "> {{ $adShip->type }} </span> 
                </div>
            </div>
            
            <div class="md:flex md:flex-row md:space-x-6">
                <div class="flex items-center mt-3">
                    <span class="pl-4 text-left text-xs font-medium text-cinza-900 "> CEP: </span> 
                    <p class="px-3 text-lg text-cinza-900">{{ $adShip->postcode }}</p>
                </div>
            </div>
            
            <div class="md:flex md:flex-row md:space-x-6">
                <div class="flex items-center mt-3">
                    <span class="pl-4 text-left text-xs font-medium text-cinza-900 "> Endereço: </span> 
                    <p class="px-3 text-lg text-cinza-900">{{ $adShip->street }}</p>
                </div>
                <div class="flex items-center mt-3">
                    <span class="pl-4 text-left text-xs font-medium text-cinza-900 "> Número: </span> 
                    <p class="px-3 text-lg text-cinza-900">{{ $adShip->number }}</p>
                </div>
                <div class="flex items-center mt-3">
                    <span class="pl-4 text-left text-xs font-medium text-cinza-900 "> Complemento: </span> 
                    <p class="px-3 text-lg text-cinza-900">{{ $adShip->complement }}</p>
                </div>
            </div>
            
            <div class="md:flex md:flex-row md:space-x-6">
                <div class="flex items-center mt-3">
                    <span class="pl-4 text-left text-xs font-medium text-cinza-900 "> Bairro: </span> 
                    <p class="px-3 text-lg text-cinza-900">{{ $adShip->neighborhood }}</p>
                </div>
                <div class="flex items-center mt-3">
                    <span class="pl-4 text-left text-xs font-medium text-cinza-900 "> Cidade: </span> 
                    @if ($adShip->city)
                    <p class="px-3 text-lg text-cinza-900">{{ $adShip->city->name }} - {{ $adShip->city->state->initials }}</p>
                    @endif
                </div>
            </div>
            
            <button wire:click="editShipAddress({{ $adShip->id }})"
                class="m-8 text-azul-500 hover:text-amarelo-700">
                Editar meu endereço
            </button>
        </div>
    @endforeach
@else
<p>Nenhum enderaço encontrado</p>
@endif
  



