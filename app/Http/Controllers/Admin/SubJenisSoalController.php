<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubJenisSoal;
use App\Models\JenisSoal;
use DataTables;

class SubJenisSoalController extends Controller
{
    public function index(Request $request){
        $data = SubJenisSoal::join('jenis_soal', 'jenis_soal.id_jenis_soal', '=', 'sub_jenis_soal.id_jenis_soal')->get();
        if($request->ajax()){
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_sub_jenis_soal.'" data-original-title="Edit" class="edit btn btn-primary btn-sm edit-data">Edit</a>';
                $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_sub_jenis_soal.'" data-original-title="Delete" class="btn btn-danger btn-sm delete-data">Delete</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        $jenis_soal = JenisSoal::pluck('id_jenis_soal', 'jenis_soal');
        return view('admin.sub-jenis-soal', compact('jenis_soal'));
    }

    public function store(Request $request){
        $data = SubJenisSoal::updateOrCreate(
            ['id_sub_jenis_soal' => $request->id_sub_jenis_soal],
            [
                'id_jenis_soal' => $request->id_jenis_soal,
                'sub_jenis_soal' => $request->sub_jenis_soal
            ]
        );
        return response()->json($data);
    }

    public function show($id){
        $data = SubJenisSoal::find($id);
        return response()->json($data);
    }

    public function destroy($id){
        $data = SubJenisSoal::find($id)->delete();
        return response()->json($data);
    }
}
