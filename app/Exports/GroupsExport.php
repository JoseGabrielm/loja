<?php

namespace App\Exports;

use App\Models\Group;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class GroupsExport implements FromCollection, WithHeadings
{

    public function collection()
    {
        return Group::all();
    }
    
 public function view(): View
    {
        return view('livewire.admin.group', [
            'groups' => Group::all()
        ]);
    }

    //manter a ordem igual a migration ou tabela para dar certo
    //vai pegar totos os valores do banco de dados mesmo que não coloque abaixo
    //os valores abaixo servem apenas para nomear a coluna excel na ordem correta
    public function headings(): array
    {
        return [
            'id',
            'sku',
            'name',
            'slug', 
            'packing_format',
            'qty_ship', 
            'grossweight',
            'netweight',
            'packing_length',
            'packing_width',
            'packing_height',
            'product_length',
            'product_width',
            'product_height',          
            'description',
            'description_short',
            'description_long',
            'technical_features',
            'order',
            'active',  
            'seller_id',
            'category_id', 
            'created_at',
            'updated_at' 
            ];
    }

}
