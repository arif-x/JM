<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Models\LaporanSoal;

class LaporanController extends Controller
{
    public function index(Request $request){
        $data = LaporanSoal::orderBy('id_laporan_soal', 'DESC')->get();
        if($request->ajax()) {
            return Datatables::of($data)
            ->addIndexColumn()
            ->make(true);
        }
        return view();
    }
}
