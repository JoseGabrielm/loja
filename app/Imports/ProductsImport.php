<?php

namespace App\Imports;


use App\Models\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;
use Livewire\WithFileUploads;

class ProductsImport implements ToModel, WithHeadingRow
{
   
    public function model(array $row)
    {
        if($row['id']){
            Product::where('id', $row['id'])
            ->update([                  
            'sku' => $row['sku'], 
            'name' => $row['name'], 
            'color' => $row['color'],
            'slug' => $row['slug'], 
            'active' => $row['active']==null ? 0 : $row['active'] , 
            'base_currency' => $row['base_currency'], 
            'price' => $row['price']*100, 
            'price_max' => $row['price_max']*100, 
            'image' => $row['image'],
            'order' => $row['order'],  
            'stock' => $row['stock'], 
            'group_id' => $row['group_id'],    
            ]);   
        }else{
            Product::create([
                'sku' => $row['sku'], 
                'name' => $row['name'], 
                'color' => $row['color'],
                'slug' => $row['slug'], 
                'active' => $row['active']==null ? 0 : $row['active'] , 
                'base_currency' => $row['base_currency'], 
                'price' => $row['price'], 
                'price_max' => $row['price_max'], 
                'image' => $row['image'], 
                'order' => $row['order'], 
                'stock' => $row['stock'], 
                'group_id' => $row['group_id'], 
            ]);
        }

    }
}

