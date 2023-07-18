<?php

namespace App\Imports;

use App\Models\Fretado;
use Livewire\WithFileUploads;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;



class FretadosImport implements ToModel, WithHeadingRow, WithChunkReading
{

    public function model(array $row)
    {


        $price = ((int)$row['value'] * 100);

        if(array_key_exists('id', $row)) {
            Fretado::where('id', $row['id'])
            ->update([
                'region' => $row['region'],
                'zipini' => $row['zipini'],
                'zipfin' => $row['zipfin'],
                'wini' => $row['wini'],
                'wfin' => $row['wfin'],
                'value' => $row['value'],
                'deadline' => $row['deadline']
            ]);
        }else{
            Fretado::create([
                'region' => $row['region'],
                'zipini' => $row['zipini'],
                'zipfin' => $row['zipfin'],
                'wini' => $row['wini'],
                'wfin' => $row['wfin'],
                'value' => $price,
                'deadline' => $row['deadline']
            ]);
        }

    }


    public function chunkSize(): int
    {
        return 5000;
    }
}

