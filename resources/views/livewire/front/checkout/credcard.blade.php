<div class="overflow-visible flex justify-between items-center">
    <div class="rounded h-34 ">
        {{-- <span class="italic text-lg font-medium text-cinza-200 underline">
            VISA
        </span>
        <div class="flex justify-between items-center pt-4">
            <span class="text-xs text-cinza-200 font-medium">
                **** **** **** ****
            </span>
        </div>
        <div class="flex justify-between items-center mt-3">
            <span class="text-xs text-cinza-200">
                Jose Silva
            </span>
            <span class="text-xs text-cinza-200">
                11/23
            </span>
        </div> --}}


        <img class="w-full h-full" src="{{ asset('storage/cartao-de-credito.png') }}" alt="{{ __('') }}">
    </div>
    <div class="flex flex-row flex-wrap justify-between items-center h-34 w-1/2  px-2 py-2 rounded-lg">
        <div class="flex items-center p-2">
            <img class="w-12 " src="{{ asset('storage/visa-logo.png') }}" alt="{{ __('') }}">
           {{--  <span class="text-xs font-medium text-cinza-200 bottom-2 pl-2">
                Visa
            </span> --}}
        </div>
        <div class="flex items-center p-2">
            <img class="w-12 " src="{{ asset('storage/mastercard-logo.png') }}" alt="{{ __('') }}">
           {{--  <span class="text-xs font-medium text-cinza-200 bottom-2 pl-2">
                Mastercard
            </span> --}}
        </div>
        <div class="flex items-center p-2">
            <img class="w-12  " src="{{ asset('storage/elo-logo.png') }}" alt="{{ __('') }}">
           {{--  <span class="text-xs font-medium text-cinza-200 bottom-2 pl-2">
                Elo
            </span> --}}
        </div>
        <div class="flex items-center p-2">
            <img class="w-12 " src="{{ asset('storage/hipercard-logo.png') }}" alt="{{ __('') }}">
           {{--  <span class="text-xs font-medium text-cinza-200 bottom-2 pl-2">
                Hipercard
            </span> --}}
        </div>
        <div class="flex items-center p-2">
            <img class="w-12 m-2" src="{{ asset('storage/amex-logo.png') }}" alt="{{ __('') }}">
           {{--  <span class="text-xs font-medium text-cinza-200 bottom-2 pl-2">
                American Express
            </span> --}}
        </div>
    </div>
</div>
