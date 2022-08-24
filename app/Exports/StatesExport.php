<?php

namespace App\Exports;

use App\Models\State;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;



class StatesExport implements FromCollection, WithHeadings
{
    

    public function collection()
    {
        return State::all();
    }

    //manter a ordem igual a migration ou tabela para dar certo
    //vai pegar totos os valores do banco de dados mesmo que não coloque abaixo
    //os valores abaixo servem apenas para nomear a coluna excel na ordem correta
    public function headings(): array
    {
        return [
            'id',
            'name',
            'initials',
            'country_id',
            ];
    }


}
