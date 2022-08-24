<div x-data
     x-init="new Pikaday({ field:$refs.input, format:'DD/MM/YYYY', yearRange: [1930, 2040],
        i18n: {
        previousMonth : 'Anterior',
        nextMonth     : 'Seguinte',
        months        : ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
        weekdays      : ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sabado'],
        weekdaysShort : ['Dom','Seg','Ter','Qua','Qui','Sex','Sab']
            } 
        })"
     @change="$dispatch('input', $event.target.value)" >

        <input  x-ref="input" {{ $attributes->merge(['class' => 'border-cinza-300 rounded-lg px-1 py-1 ring-0 shadow-sm
        focus:border-marrom-700 focus:ring focus:ring-marrom-200 focus:ring-opacity-50']) }} />  

</div>

@push('date-styles')
    <link rel="stylesheet" href="{{ asset('css/pikaday.css') }}">
@endpush

@push('date-scripts')
    <script src="{{ asset('js/moment.js') }}" defer></script>
    <script src="{{ asset('js/pikaday.js') }}" defer></script>
@endpush
