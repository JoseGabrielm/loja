<?php

namespace App\Imports;

use App\Models\Jadlog;
use Livewire\WithFileUploads;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithChunkReading;


class JadlogsImport implements ToModel, WithHeadingRow, WithChunkReading, ShouldQueue
{

    public function model(array $row)
    {
        if ($row['id']) {
            Jadlog::where('id', $row['id'])
                ->update([
                    'region' => $row['region'],
                    'zipini' => $row['zipini'],
                    'zipfin' => $row['zipfin'],
                    'wini' => $row['wini'],
                    'wfin' => $row['wfin'],
                    'value' => $row['value'],
                    'deadline' => $row['deadline'],
                ]);
        } else {
            Jadlog::create([
                'region' => $row['region'],
                'zipini' => $row['zipini'],
                'zipfin' => $row['zipfin'],
                'wini' => $row['wini'],
                'wfin' => $row['wfin'],
                'value' => $row['value'],
                'deadline' => $row['deadline'],
            ]);
        }

    }

    public function chunkSize(): int
    {
        return 5000;
    }
}
