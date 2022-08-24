<?php

namespace App\Imports;


use App\Models\City;
use Maatwebsite\Excel\Concerns\ToModel;
use Livewire\WithFileUploads;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CitiesImport implements ToModel, WithHeadingRow
{
    
    public function model(array $row)
    {
        if ($row['id']) {
            City::where('id', $row['id'])
                ->update([
                    'name' => $row['name'],
                    'code' => $row['code'],
                    'state_id' => $row['state_id']
                ]);
        } else {
            City::create([
                'name' => $row['name'],
                'code' => $row['code'],
                'state_id' => $row['state_id']
            ]);
        }
    }

}
