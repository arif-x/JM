<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Models\JenisSoal;

class JenisSoalController extends Controller
{
    public function index(Request $request){
        $data = JenisSoal::orderBy('id_jenis_soal', 'DESC')->get();
        if($request->ajax()){
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_jenis_soal.'" data-original-title="Edit" class="edit btn btn-primary btn-sm edit-data">Edit</a>';
                $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_jenis_soal.'" data-original-title="Delete" class="btn btn-danger btn-sm delete-data">Delete</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('admin.jenis-soal');
    }

    public function show($id){
        $data = JenisSoal::find($id);
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $data = JenisSoal::updateOrCreate(
            ['id_jenis_soal' => $request->id_jenis_soal],
            [
                'jenis_soal' => $request->jenis_soal
            ]
        );

        return response()->json($data);
    }

    public function destroy($id){
        $data = JenisSoal::find($id)->delete();
        return response()->json($data);
    }
}
