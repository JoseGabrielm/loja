<?php

namespace App\Imports;

use App\Models\Group;
use Livewire\WithFileUploads;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GroupsImport implements ToModel, WithHeadingRow
{
    
    public function model(array $row)
    {
        if($row['id']){
            Group::where('id', $row['id'])
            ->update([                  
            'sku' => $row['sku'], 
            'name' => $row['name'], 
            'slug' => $row['slug'], 
            'description' => $row['description'], 
            'description_short' => $row['description_short'], 
            'description_long' => $row['description_long'], 
            'technical_features' => $row['technical_features'],
            'order' => $row['order'],  
            'active' => $row['active']==null ? 0 : $row['active'] , 
            'qty_ship' => $row['qty_ship'], 
            'packing_format' => $row['packing_format'], 
            'grossweight' => $row['grossweight'], 
            'netweight' => $row['netweight'], 
            'packing_length' => $row['packing_length'], 
            'packing_width' => $row['packing_width'], 
            'packing_height' => $row['packing_height'], 
            'product_length' => $row['product_length'], 
            'product_width' => $row['product_width'], 
            'product_height' => $row['product_height'],
            'seller_id' => $row['seller_id'],
            'category_id' => $row['category_id']      
            ]);   
        }else{
            Group::create([
                'sku' => $row['sku'], 
                'name' => $row['name'], 
                'slug' => $row['slug'], 
                'description' => $row['description'], 
                'description_short' => $row['description_short'], 
                'description_long' => $row['description_long'], 
                'technical_features' => $row['technical_features'],
                'order' => $row['order'],  
                'active' => $row['active']==null ? 0 : $row['active'], 
                'qty_ship' => $row['qty_ship'], 
                'packing_format' => $row['packing_format'], 
                'grossweight' => $row['grossweight'], 
                'netweight' => $row['netweight'], 
                'packing_length' => $row['packing_length'], 
                'packing_width' => $row['packing_width'], 
                'packing_height' => $row['packing_height'], 
                'product_length' => $row['product_length'], 
                'product_width' => $row['product_width'], 
                'product_height' => $row['product_height'],
                'seller_id' => $row['seller_id'],
                'category_id' => $row['category_id'] 
            ]);
        }
    }
}
