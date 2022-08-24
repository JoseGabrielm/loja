<?php

namespace App\Imports;


use App\Models\State;
use Livewire\WithFileUploads;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;



class StatesImport implements ToModel, WithHeadingRow
{
   
    public function model(array $row)
    {
        if ($row['id']) {
            State::where('id', $row['id'])
                ->update([
                    'name' => $row['name'],
                    'initials' => $row['initials'],
                    'country_id' => $row['country_id']
                ]);
        } else {
            State::create([
                'name' => $row['name'],
                'initials' => $row['initials'],
                'country_id' => $row['country_id']
            ]);
        }
     
    }



}
