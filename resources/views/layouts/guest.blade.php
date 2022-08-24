<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('layouts.head')
    </head>
    <body>




        <div class="w-7xl mx-auto bg-supreme-ecinco">


            {{ $slot }}
        </div>



    </body>
</html>
