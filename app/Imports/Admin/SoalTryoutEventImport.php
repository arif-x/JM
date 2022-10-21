<?php

namespace App\Imports\Admin;

use App\Models\SoalTryoutEvent;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SoalTryoutEventImport implements ToCollection, WithStartRow, WithHeadingRow
{
    public function startRow(): int
    {
        return 2;
    }

    public function collection(Collection $row){
        for ($i=0; $i < count($row); $i++) { 
            if($row[$i]['id_label_soal_tryout_event'] == null){
                break;
            }

            $getJumlahSoal = SoalTryoutEvent::where('id_label_soal_tryout_event', $row[$i]['id_label_soal_tryout_event'])->where('id_sub_jenis_soal', $row[$i]['id_sub_jenis_soal'])->count();

            if($getJumlahSoal <= 50) {
                SoalTryoutEvent::insert([
                    'id_label_soal_tryout_event' => $row[$i]['id_label_soal_tryout_event'],
                    'soal_tryout_event' => $row[$i]['soal_tryout_event'],
                    'a' => $row[$i]['a'],
                    'b' => $row[$i]['b'],
                    'c' => $row[$i]['c'],
                    'd' => $row[$i]['d'],
                    'e' => $row[$i]['e'],
                    'kunci' => strtolower($row[$i]['kunci']),
                    'id_jenis_soal' => $row[$i]['id_jenis_soal'],
                    'id_sub_jenis_soal' => $row[$i]['id_sub_jenis_soal'],
                    'pembahasan' => $row[$i]['pembahasan'],
                    'slug' => encrypt($row[$i]['soal_tryout_event'])
                ]);
            }
        }
    }
}