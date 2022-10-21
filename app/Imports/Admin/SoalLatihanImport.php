<?php

namespace App\Imports\Admin;

use App\Models\Soal;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SoalLatihanImport implements ToCollection, WithStartRow, WithHeadingRow
{
    public function startRow(): int
    {
        return 2;
    }

    public function collection(Collection $row){
        for ($i=0; $i < count($row); $i++) { 
            if($row[$i]['id_label_soal'] == null){
                break;
            }
            if(Soal::where('id_label_soal', $row[$i]['id_label_soal'])->count() <= 15) {
                Soal::insert([
                    'id_label_soal' => $row[$i]['id_label_soal'],
                    'soal' => $row[$i]['soal'],
                    'a' => $row[$i]['a'],
                    'b' => $row[$i]['b'],
                    'c' => $row[$i]['c'],
                    'd' => $row[$i]['d'],
                    'e' => $row[$i]['e'],
                    'kunci' => strtolower($row[$i]['kunci']),
                    'pembahasan' => $row[$i]['pembahasan'],
                    'slug' => encrypt($row[$i]['soal'])
                ]);
            }
        }
    }
}