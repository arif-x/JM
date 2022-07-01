<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Models\JenisKampus;

class JenisKampusController extends Controller
{
    public function index(Request $request){
        $data = JenisKampus::orderBy('id_jenis_kampus', 'DESC')->get();
        if($request->ajax()){
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_jenis_kampus.'" data-original-title="Edit" class="edit btn btn-primary btn-sm edit-data">Edit</a>';
                $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_jenis_kampus.'" data-original-title="Delete" class="btn btn-danger btn-sm delete-data">Delete</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('admin.jenis-kampus');
    }

    public function show($id){
        $data = JenisKampus::find($id);
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $data = JenisKampus::updateOrCreate(
            ['id_jenis_kampus' => $request->id_jenis_kampus],
            [
                'nama_jenis_kampus' => $request->nama_jenis_kampus
            ]
        );

        return response()->json($data);
    }

    public function destroy($id){
        $data = JenisKampus::find($id)->delete();
        return response()->json($data);
    }
}
