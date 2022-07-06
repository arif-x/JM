<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use Str;
use App\Models\LabelMateri;
use App\Models\Paket;
use App\Models\Kategori;
use App\Models\JenisKampus;
use App\Models\JenisSoal;

class LabelMateriController extends Controller
{
    public function index(Request $request){
        $data = LabelMateri::join('paket', 'paket.id_paket', 'label_materi.id_paket')
        ->join('kategori', 'kategori.id_kategori', 'label_materi.id_kategori')
        ->join('jenis_kampus', 'jenis_kampus.id_jenis_kampus', 'label_materi.id_jenis_kampus')
        ->orderBy('id_label_materi', 'DESC')->get();
        if($request->ajax()){
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_label_materi.'" data-original-title="Edit" class="edit btn btn-primary btn-sm edit-data">Edit</a>';
                $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_label_materi.'" data-original-title="Delete" class="btn btn-danger btn-sm delete-data">Delete</a>';
                return $btn;
            })
            ->addColumn('jenis', function($row){
                $jenis = '';
                if($row->jenis_materi == 1){
                    $jenis = 'TPS';
                } elseif($row->jenis_materi == 2){
                    $jenis = 'TKA';
                } elseif($row->jenis_materi == 3){
                    $jenis = 'Bahasa Inggris';
                } elseif($row->jenis_materi == 4){
                    $jenis = 'TPS Video';
                } elseif($row->jenis_materi == 5){
                    $jenis = 'TKA Video';
                } elseif($row->jenis_materi == 6){
                    $jenis = 'Bahasa Inggris Video';
                }
                return $jenis;
            })
            ->rawColumns(['action', 'jenis'])
            ->make(true);
        }
        $paket = Paket::pluck('nama_paket', 'id_paket');
        $kategori = Kategori::pluck('nama_kategori', 'id_kategori');
        $jenis_kampus = JenisKampus::pluck('nama_jenis_kampus', 'id_jenis_kampus');

        return view('admin.materi.label-materi', compact('paket', 'kategori', 'jenis_kampus'));
    }

    public function show($id){
        $data = LabelMateri::find($id);
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $count = 0;
        $name = Str::of($request->nama_label)->slug('-');
        $slug_name = $name;
        
        while(true) {
            $check = LabelMateri::where('id_label_materi', '!=', $request->id_label_materi)->where('slug', $slug_name)->first();
            if (empty($check)){
                break;
            } else {
                $slug_name = $name . '-' . (++$count);  
            }
        }

        $data = LabelMateri::updateOrCreate(
            ['id_label_materi' => $request->id_label_materi],
            [
                'id_paket' => $request->id_paket,
                'id_kategori' => $request->id_kategori,
                'id_jenis_kampus' => $request->id_jenis_kampus,
                'nama_label' => $request->nama_label,
                'jenis_materi' => $request->jenis_materi,
                'slug' => $slug_name
            ]
        );

        return response()->json($data);
    }

    public function destroy($id){
        $data = LabelMateri::find($id)->delete();
        return response()->json($data);
    }
}
