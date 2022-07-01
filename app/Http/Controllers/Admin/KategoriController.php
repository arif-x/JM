<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index(Request $request){
        $data = Kategori::orderBy('id_kategori', 'DESC')->get();
        if($request->ajax()){
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_kategori.'" data-original-title="Edit" class="edit btn btn-primary btn-sm edit-data">Edit</a>';
                $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_kategori.'" data-original-title="Delete" class="btn btn-danger btn-sm delete-data">Delete</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('admin.kategori');
    }

    public function show($id){
        $data = Kategori::find($id);
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $data = Kategori::updateOrCreate(
            ['id_kategori' => $request->id_kategori],
            [
                'nama_kategori' => $request->nama_kategori
            ]
        );

        return response()->json($data);
    }

    public function destroy($id){
        $data = Kategori::find($id)->delete();
        return response()->json($data);
    }
}
