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
            if($row[$i]['id_label_soal_tryout'] == null){
                break;
            }

            $getJumlahSoal = SoalTryout::where('id_label_soal_tryout', $row[$i]['id_label_soal_tryout'])->where('id_sub_jenis_soal', $row[$i]['id_sub_jenis_soal'])->count();

            if($getJumlahSoal <= 50) {
                SoalTryout::insert([
                    'id_label_soal_tryout' => $row[$i]['id_label_soal_tryout'],
                    'soal_tryout' => $row[$i]['soal_tryout'],
                    'a' => $row[$i]['a'],
                    'b' => $row[$i]['b'],
                    'c' => $row[$i]['c'],
                    'd' => $row[$i]['d'],
                    'e' => $row[$i]['e'],
                    'kunci' => strtolower($row[$i]['kunci']),
                    'id_jenis_soal' => $row[$i]['id_jenis_soal'],
                    'id_sub_jenis_soal' => $row[$i]['id_sub_jenis_soal'],
                    'pembahasan' => $row[$i]['pembahasan'],
                    'slug' => encrypt($row[$i]['soal_tryout'])
                ]);
            }
        }
    }
}