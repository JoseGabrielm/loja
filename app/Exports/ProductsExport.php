<?php

namespace App\Exports;


use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
//use Maatwebsite\Excel\Concerns\WithHeadingRow;


class ProductsExport implements FromCollection, WithHeadings
{
    
    public function collection()
    {
        return Product::all();
    }

    public function view(): View
    {
        return view('livewire.admin.product', [
            'products' => Product::all()
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
            'color',
            'base_currency',
            'price',
            'price_max',
            'stock',
            'image',
            'order',
            'active',
            'group_id',
            'created_at',
            'updated_at' 
        ];
    }

}
