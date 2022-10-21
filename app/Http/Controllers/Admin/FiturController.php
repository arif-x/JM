<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JenisKampus;
use App\Models\Fitur;
use DataTables;

class FiturController extends Controller
{
    public function index(Request $request){
        $data = Fitur::get();
        if($request->ajax()){
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_fitur.'" data-original-title="Edit" class="edit btn btn-primary btn-sm edit-data">Edit</a>';
                // $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_fitur.'" data-original-title="Delete" class="btn btn-danger btn-sm delete-data">Delete</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('admin.fitur');
    }

    public function store(Request $request){
        $data = Fitur::updateOrCreate(
            ['id_fitur' => $request->id_fitur],
            [
                'header' => $request->header,
                'deskripsi' => $request->deskripsi
            ]
        );
        return response()->json($data);
    }

    public function show($id){
        $data = Fitur::find($id);
        return response()->json($data);
    }

    public function destroy($id){
        $data = Fitur::find($id)->delete();
        return response()->json($data);
    }
}
