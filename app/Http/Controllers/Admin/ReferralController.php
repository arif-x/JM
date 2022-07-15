<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SaldoKomisi;
Use DataTables;

class ReferralController extends Controller
{
    public function index(Request $request){
        $data = SaldoKomisi::orderBy('id_saldo_komisi', 'DESC')->get();
        if($request->ajax()){
            return Datatables::of($data)
            ->addIndexColumn()
            ->make(true);
        }
        return view('admin.referral');
    }
}
