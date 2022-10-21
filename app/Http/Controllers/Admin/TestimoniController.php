<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Models\Testimoni;

class TestimoniController extends Controller
{
    public function index(Request $request){
        $data = Testimoni::orderBy('id_testimoni', 'DESC')->get();
        if($request->ajax()){
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('image', function($row){
                $img = '<img src="'.$row->foto.'"/>';
                return $img;
            })
            ->addColumn('action', function($row){
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_testimoni.'" data-original-title="Edit" class="edit btn btn-primary btn-sm edit-data">Edit</a>';
                $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_testimoni.'" data-original-title="Delete" class="btn btn-danger btn-sm delete-data">Delete</a>';
                return $btn;
            })
            ->rawColumns(['action', 'image'])
            ->make(true);
        }
        return view('admin.testimoni');
    }

    public function show($id){
        $data = Testimoni::find($id);
        return response()->json($data);
    }

    public function store(Request $request)
    {
        if(!empty($request->file('foto'))){
            $file = $request->file('foto');
            $fileName = rand().$file->getClientOriginalName();
            $file->move(storage_path('app/public/testimoni/'),$fileName);

            $data = Testimoni::updateOrCreate(
                ['id_testimoni' => $request->id_testimoni],
                [
                    'nama' => $request->nama,
                    'testimoni' => $request->testimoni,
                    'foto' => url('/').'/storage/testimoni/'.$fileName,
                ]
            );

            return response()->json($data);
        } else {
            $data = Testimoni::updateOrCreate(
                ['id_testimoni' => $request->id_testimoni],
                [
                    'nama' => $request->nama,
                    'testimoni' => $request->testimoni,
                ]
            );
            return response()->json($data);
        }
        
    }

    public function destroy($id){
        $data = Testimoni::find($id)->delete();
        return response()->json($data);
    }
}
