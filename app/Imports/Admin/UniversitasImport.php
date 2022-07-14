<?php

namespace App\Imports\Admin;

use App\Models\Universitas;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UniversitasImport implements ToCollection, WithStartRow, WithHeadingRow
{
    public function startRow(): int
    {
        return 2;
    }

    public function collection(Collection $row){
        for ($i=0; $i < count($row); $i++) { 
            
            Universitas::insert([
                'id_jenis_kampus' => $row[$i]['id_jenis_kampus'],
                'nama_universitas' => $row[$i]['nama_universitas']
            ]);
        }
    }
}