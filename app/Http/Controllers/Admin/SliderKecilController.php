<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Models\SliderKecil;

class SliderKecilController extends Controller
{
    public function index(Request $request){
        $data = SliderKecil::orderBy('id_slider_kecil', 'DESC')->get();
        if($request->ajax()){
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('image', function($row){
                $img = '<img src="'.$row->img.'"/>';
                return $img;
            })
            ->addColumn('action', function($row){
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_slider_kecil.'" data-original-title="Edit" class="edit btn btn-primary btn-sm edit-data">Edit</a>';
                $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_slider_kecil.'" data-original-title="Delete" class="btn btn-danger btn-sm delete-data">Delete</a>';
                return $btn;
            })
            ->rawColumns(['action', 'image'])
            ->make(true);
        }
        return view('admin.slider.kecil');
    }

    public function show($id){
        $data = SliderKecil::find($id);
        return response()->json($data);
    }

    public function store(Request $request)
    {
        if(!empty($request->file('img'))){
            $file = $request->file('img');
            $fileName = rand().$file->getClientOriginalName();
            $file->move(storage_path('app/public/slider/'),$fileName);

            $data = SliderKecil::updateOrCreate(
                ['id_slider_kecil' => $request->id_slider_kecil],
                [
                    'judul' => $request->judul,
                    'img' => url('/').'/storage/slider/'.$fileName,
                ]
            );

            return response()->json($data);
        } else {
            $data = SliderKecil::updateOrCreate(
                ['id_slider_kecil' => $request->id_slider_kecil],
                [
                    'judul' => $request->judul,
                ]
            );
            return response()->json($data);
        }
        
    }

    public function destroy($id){
        $data = SliderKecil::find($id)->delete();
        return response()->json($data);
    }
}
