<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Models\Paket;

class PaketController extends Controller
{
    public function index(Request $request){
        $data = Paket::orderBy('id_paket', 'DESC')->get();
        if($request->ajax()){
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_paket.'" data-original-title="Edit" class="edit btn btn-primary btn-sm edit-data">Edit</a>';
                $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_paket.'" data-original-title="Delete" class="btn btn-danger btn-sm delete-data">Delete</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('admin.paket');
    }

    public function show($id){
        $data = Paket::find($id);
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $data = Paket::updateOrCreate(
            ['id_paket' => $request->id_paket],
            [
                'nama_paket' => $request->nama_paket,
                'harga' => $request->harga,
                'diskon' => $request->diskon,
                'akses' => $request->akses,
                'keterangan_akses' => $request->keterangan_akses,
                'keterangan_no_akses' => $request->keterangan_no_akses,
            ]
        );

        return response()->json($data);
    }

    public function destroy($id){
        $data = Paket::find($id)->delete();
        return response()->json($data);
    }
}
