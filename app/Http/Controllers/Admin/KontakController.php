<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kontak;
use DataTables;

class KontakController extends Controller
{
    public function index(Request $request){
        $data = Kontak::get();
        if($request->ajax()){
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_kontak.'" data-original-title="Edit" class="edit btn btn-primary btn-sm edit-data">Edit</a>';
                // $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_kontak.'" data-original-title="Delete" class="btn btn-danger btn-sm delete-data">Delete</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('admin.kontak');
    }

    public function show($id){
        return response()->json(Kontak::find($id));
    }

    public function store(Request $request){
        $data = Kontak::updateOrCreate(
            ['id_kontak' => $request->id_kontak],
            [
                'email' => $request->email,
                'no_hp' => $request->no_hp,
            ]
        );

        return response()->json($data);
    }

    public function destroy($id){
        return response()->json(Kontak::find($id)->delete());
    }
}
