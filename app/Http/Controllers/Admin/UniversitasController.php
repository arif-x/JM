<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JenisKampus;
use App\Models\Universitas;
use DataTables;

class UniversitasController extends Controller
{
    public function index(Request $request){
        $data = Universitas::join('jenis_kampus', 'jenis_kampus.id_jenis_kampus', '=', 'universitas.id_jenis_kampus')->get();
        if($request->ajax()){
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_universitas.'" data-original-title="Edit" class="edit btn btn-primary btn-sm edit-data">Edit</a>';
                $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_universitas.'" data-original-title="Delete" class="btn btn-danger btn-sm delete-data">Delete</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        $jenis_kampus = JenisKampus::pluck('id_jenis_kampus', 'nama_jenis_kampus');
        return view('admin.universitas', compact('jenis_kampus'));
    }

    public function store(Request $request){
        $data = Universitas::updateOrCreate(
            ['id_universitas' => $request->id_universitas],
            [
                'id_jenis_kampus' => $request->id_jenis_kampus,
                'nama_universitas' => $request->nama_universitas
            ]
        );
        return response()->json($data);
    }

    public function show($id){
        $data = Universitas::find($id);
        return response()->json($data);
    }

    public function destroy($id){
        $data = Universitas::find($id)->delete();
        return response()->json($data);
    }
}
