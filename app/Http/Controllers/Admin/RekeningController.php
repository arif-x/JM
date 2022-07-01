<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rekening;
use DataTables;

class RekeningController extends Controller
{
    public function index(Request $request){
        $data = Rekening::get();
        if($request->ajax()){
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_rekening.'" data-original-title="Edit" class="edit btn btn-primary btn-sm edit-data">Edit</a>';
                $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_rekening.'" data-original-title="Delete" class="btn btn-danger btn-sm delete-data">Delete</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('admin.rekening');
    }

    public function show($id){
        return response()->json(Rekening::find($id));
    }

    public function store(Request $request){
        $data = Rekening::updateOrCreate(
            ['id_rekening' => $request->id_rekening],
            [
                'nama_bank' => $request->nama_bank,
                'no_rekening' => $request->no_rekening,
                'atas_nama' => $request->atas_nama
            ]
        );

        return response()->json($data);
    }

    public function destroy($id){
        return response()->json(Rekening::find($id)->delete());
    }
}
