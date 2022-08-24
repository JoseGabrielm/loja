<?php

namespace App\Exports;


use App\Models\City;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;



class CitiesExport implements FromCollection, WithHeadings
{
    

    public function collection()
    {
        return City::all();
    }

    //manter a ordem igual a migration ou tabela para dar certo
    //vai pegar totos os valores do banco de dados mesmo que não coloque abaixo
    //os valores abaixo servem apenas para nomear a coluna excel na ordem correta
    public function headings(): array
    {
        return [
            'id',
            'name',
            'code',
            'state_id',
            ];
    }

}
