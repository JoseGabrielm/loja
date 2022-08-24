<meta charset="utf-8">
<link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">


<title>{{ config('app.name', 'Loja Supreme') }}</title>

<!-- Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

<!-- Styles -->
@stack('date-styles')
@stack('clock-styles')
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

@livewireStyles

<!-- Scripts -->
@stack('scripts')
@stack('date-scripts')
<script src="https://unpkg.com/js-image-zoom@0.7.0/js-image-zoom.js" type="application/javascript"></script>



<script src="{{ asset('js/app.js') }}" defer></script>

@stack('scripts-gn')










