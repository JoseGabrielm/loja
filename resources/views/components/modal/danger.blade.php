@props(['message'])

<div x-data="{show: true}"  x-show="show">
    <div class="fixed inset-0 z-50 bg-preto bg-opacity-80 flex items-center justify-center p-8">
        <div {!! $attributes->merge(['class' => 'w-full md:w-1/2 rounded-2xl p-8']) !!}>
            <h3 class="text-3xl "> Erro </h3>
            <div class="mt-4">
                {{ $message }}
            </div>
            <x-button.black  x-on:click="show=false" class="py-3 px-5 mt-3 ">
                Fechar
            </x-button.black>
        </div>
    </div>
</div>




// no blade 
{{--  @if (session('danger'))
<x-modal.alert class="bg-amarelo-200" :message="session('danger')"></x-modal.alert>
@endif  --}}

//gerar
//session()->flash('danger', 'Cores escolhidas por mim, não diga que não gosta');