<?php

namespace App\Imports\Admin;

use App\Models\SoalTryout;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SoalTryoutImport implements ToCollection, WithStartRow, WithHeadingRow
{
    public function startRow(): int
    {
        return 2;
    }

    public function collection(Collection $row){
        for ($i=0; $i < count($row); $i++) { 
            echo json_encode($row);
            if($row[$i]['id_label_soal_tryout'] == null){
                break;
            }
            if(SoalTryout::where('id_label_soal_tryout', $row[$i]['id_label_soal_tryout'])->count() > 50) {
                break;
            }

            SoalTryout::insert([
                'id_label_soal_tryout' => $row[$i]['id_label_soal_tryout'],
                'soal_tryout' => $row[$i]['soal_tryout'],
                'a' => $row[$i]['a'],
                'b' => $row[$i]['b'],
                'c' => $row[$i]['c'],
                'd' => $row[$i]['d'],
                'e' => $row[$i]['e'],
                'kunci' => $row[$i]['kunci'],
                'pembahasan' => $row[$i]['pembahasan'],
            ]);
        }
    }
}