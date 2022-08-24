<?php

namespace App\Exports;

use App\Models\Jadlog;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;




class JadlogsExport implements FromCollection, WithHeadings
{
    
    public function collection()
    {
        return Jadlog::all();
    }


    //manter a ordem igual a migration ou tabela para dar certo
    //vai pegar totos os valores do banco de dados mesmo que não coloque abaixo
    //os valores abaixo servem apenas para nomear a coluna excel na ordem correta
    public function headings(): array
    {
        return [
            'id',
            'region',
            'zipini',
            'zipfin',
            'wini',
            'wfin',
            'value',
            'deadline'
            ];
    }

}
