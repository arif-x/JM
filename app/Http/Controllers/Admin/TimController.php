<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Models\Tim;

class TimController extends Controller
{
    public function index(Request $request){
        $data = Tim::orderBy('id_tim', 'DESC')->get();
        if($request->ajax()){
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('image', function($row){
                $img = '<img src="'.$row->foto.'"/>';
                return $img;
            })
            ->addColumn('action', function($row){
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_tim.'" data-original-title="Edit" class="edit btn btn-primary btn-sm edit-data">Edit</a>';
                $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_tim.'" data-original-title="Delete" class="btn btn-danger btn-sm delete-data">Delete</a>';
                return $btn;
            })
            ->rawColumns(['action', 'image'])
            ->make(true);
        }
        return view('admin.tim');
    }

    public function show($id){
        $data = Tim::find($id);
        return response()->json($data);
    }

    public function store(Request $request)
    {
        if(!empty($request->file('foto'))){
            $file = $request->file('foto');
            $fileName = rand().$file->getClientOriginalName();
            $file->move(storage_path('app/public/tim/'),$fileName);

            $data = Tim::updateOrCreate(
                ['id_tim' => $request->id_tim],
                [
                    'nama' => $request->nama,
                    'lulusan' => $request->lulusan,
                    'jabatan' => $request->jabatan,
                    'foto' => url('/').'/storage/tim/'.$fileName,
                ]
            );

            return response()->json($data);
        } else {
            $data = Tim::updateOrCreate(
                ['id_tim' => $request->id_tim],
                [
                    'nama' => $request->nama,
                    'lulusan' => $request->lulusan,
                    'jabatan' => $request->jabatan,
                ]
            );
            return response()->json($data);
        }
        
    }

    public function destroy($id){
        $data = Tim::find($id)->delete();
        return response()->json($data);
    }
}
