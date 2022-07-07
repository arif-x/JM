<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubJenisSoal;

class DataController extends Controller
{
    public function getSubJenisSoal($id){
        $sub_jenis_soal = SubJenisSoal::where('id_jenis_soal', $id)->pluck('sub_jenis_soal', 'id_sub_jenis_soal');
        return response()->json($sub_jenis_soal);
    }
}
