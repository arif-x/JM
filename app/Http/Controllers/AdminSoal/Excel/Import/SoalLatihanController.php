<?php

namespace App\Http\Controllers\AdminSoal\Excel\Import;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\Admin\SoalLatihanImport;
use Maatwebsite\Excel\Facades\Excel;

class SoalLatihanController extends Controller
{
    public function importExcel(Request $request) {
        $file = $request->file('file');
        $fileName = rand().$file->getClientOriginalName();
        $file->move(storage_path('app/public/excel-import/'),$fileName);
        if(Excel::import(new SoalLatihanImport, storage_path('app/public/excel-import/'.$fileName))){
            return back();
        } else {
            return back();
        }
    }
}
