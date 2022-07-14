<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Hash;
use DataTables;

class AdminSoalController extends Controller
{
    public function index(Request $request){
        $data = Admin::where('level', 2)->orderBy('id_admin', 'DESC')->get();
        if($request->ajax()){
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_admin.'" data-original-title="Edit" class="edit btn btn-primary btn-sm edit-data">Edit</a>';
                $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_admin.'" data-original-title="Delete" class="btn btn-danger btn-sm delete-data">Delete</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('admin.admin-soal');
    }

    public function show($id){
        $data = Admin::find($id);
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $data = Admin::updateOrCreate(
            ['id_admin' => $request->id_admin],
            [
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'nama_lengkap' => $request->nama_lengkap,
                'username' => $request->email,
                'level' => '2',
            ]
        );

        return response()->json($data);
    }

    public function destroy($id){
        $data = Admin::find($id)->delete();
        return response()->json($data);
    }
}
