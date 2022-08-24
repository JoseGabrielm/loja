<?php
/*
* FUNÇÕES GLOBAIS
* QUE PODEM SER USADAS EM QUALQUER LOCAL
 */

if(!function_exists('test')){
    function test(){
        return 'teste de funções globais';
    }
}

if (!function_exists('date_format')) {
    function date_format()
    {
        return "";
    }
}

if (!function_exists('formatNaturalNumber')) {
    function formatNaturalNumber(int $number): string
    {
        return number_format($number, 0, ',', '');
    }
}

if (! function_exists('formatMoney')) {
    function formatMoney($number): String
    {
        return "";
    }
}

