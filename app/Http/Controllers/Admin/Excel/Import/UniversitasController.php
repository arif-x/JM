<?php

namespace App\Http\Controllers\Admin\Excel\Import;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\Admin\UniversitasImport;
use Maatwebsite\Excel\Facades\Excel;

class UniversitasController extends Controller
{
    public function importExcel(Request $request) {
        $file = $request->file('file');
        $fileName = rand().$file->getClientOriginalName();
        $file->move(storage_path('app/public/excel-import/'),$fileName);
        if(Excel::import(new UniversitasImport, storage_path('app/public/excel-import/'.$fileName))){
            return back();
        } else {
            return back();
        }
    }
}
