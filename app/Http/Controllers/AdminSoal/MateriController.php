<?php

namespace App\Http\Controllers\AdminSoal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use Str;
use App\Models\LabelMateri;
use App\Models\Materi;

class MateriController extends Controller
{
    public function index(Request $request){
        $data = Materi::join('label_materi', 'label_materi.id_label_materi', 'materi.id_label_materi')
        ->join('paket', 'paket.id_paket', 'label_materi.id_paket')
        ->join('kategori', 'kategori.id_kategori', 'label_materi.id_kategori')
        ->join('jenis_kampus', 'jenis_kampus.id_jenis_kampus', 'label_materi.id_jenis_kampus')
        ->orderBy('id_materi', 'DESC')->get();
        if($request->ajax()){
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_materi.'" data-original-title="Edit" class="edit btn btn-primary btn-sm edit-data">Edit</a>';
                $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_materi.'" data-original-title="Delete" class="btn btn-danger btn-sm delete-data">Delete</a>';
                return $btn;
            })
            ->addColumn('materis', function($row){
                $materi = mb_strimwidth($row->materi, 0, 100, "...");
                return $materi;
            })
            ->rawColumns(['action', 'materis'])
            ->make(true);
        }

        $label_materi = LabelMateri::pluck('id_label_materi', 'nama_label');

        return view('admin-soal.materi.materi', compact('label_materi'));
    }

    public function show($id){
        $data = Materi::find($id);
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $count = 0;
        $name = Str::of($request->judul_materi)->slug('-');
        $slug_name = $name;
        
        while(true) {
            $check = Materi::where('id_materi', '!=', $request->id_materi)->where('slug', $slug_name)->first();
            if (empty($check)){
                break;
            } else {
                $slug_name = $name . '-' . (++$count);  
            }
        }

        $data = Materi::updateOrCreate(
            ['id_materi' => $request->id_materi],
            [
                'id_label_materi' => $request->id_label_materi,
                'judul_materi' => $request->judul_materi,
                'materi' => $request->materi,
                'deskripsi' => $request->deskripsi,
                'slug' => $slug_name
            ]
        );

        return response()->json($data);
    }

    public function destroy($id){
        $data = Materi::find($id)->delete();
        return response()->json($data);
    }
}
