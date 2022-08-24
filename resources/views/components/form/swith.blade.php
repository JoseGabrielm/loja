
<div>
    <button type="button" 
            x-data="{ isOn: false }"
            @click="isOn = !isOn;" 
            :aria-checked="isOn"
            class="relative inline-flex items-center justify-center flex-shrink-0 w-10 h-5 border-0 rounded-full cursor-pointer group focus:outline-none focus:ring-0">
        
        <input type="checkbox" wire:model="active" aria-hidden="true" 
               class="absolute inline-flex items-center justify-center flex-shrink-0 w-10 h-5 border-0 rounded-full outline-none cursor-pointer group focus:outline-none focus:ring-0"/>

        <span aria-hidden="true" role="swith" aria-checked="false" 
            class="absolute w-full h-full rounded-md pointer-events-none bg-relva-30">
        </span>
        
        <!-- Enabled: bg-azul-600 e not enabled: bg-cinza-200 -->
        <span aria-hidden="true" 
            class="absolute h-4 mx-auto transition-colors duration-200 ease-in-out rounded-full pointer-events-none bg-cinza-200 w-9" 
            :class="{'bg-azul-600': isOn, 'bg-cinza-200': !isOn }">
        </span>

        <!-- Enabled: translate-x-5 e not enabled: translate-x-0 -->
        <span aria-hidden="true" 
            class="absolute left-0 inline-block w-5 h-5 transition-transform duration-200 ease-in-out transform translate-x-0 border rounded-full shadow pointer-events-none border-relva-40 bg-branco ring-0"
            :class="{'translate-x-5': isOn, 'translate-x-0': !isOn }">
        </span>
        
    </button>

    <div>
        {{ $active==true ? 'vivo' : 'morto' }}
    </div>
    
</div>