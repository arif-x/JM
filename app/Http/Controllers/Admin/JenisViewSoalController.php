<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Models\JenisViewSoal;

class JenisViewSoalController extends Controller
{
    public function index(Request $request){
        $data = JenisViewSoal::orderBy('id_jenis_view_soal', 'DESC')->get();
        if($request->ajax()){
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_jenis_view_soal.'" data-original-title="Edit" class="edit btn btn-primary btn-sm edit-data">Edit</a>';
                $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_jenis_view_soal.'" data-original-title="Delete" class="btn btn-danger btn-sm delete-data">Delete</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('admin.jenis-view-soal');
    }

    public function show($id){
        $data = JenisViewSoal::find($id);
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $data = JenisViewSoal::updateOrCreate(
            ['id_jenis_view_soal' => $request->id_jenis_view_soal],
            [
                'jenis_view_soal' => $request->jenis_view_soal
            ]
        );

        return response()->json($data);
    }

    public function destroy($id){
        $data = JenisViewSoal::find($id)->delete();
        return response()->json($data);
    }
}
