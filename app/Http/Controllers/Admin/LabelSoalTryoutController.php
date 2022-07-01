<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use Str;
use App\Models\LabelSoalTryout;
use App\Models\Paket;
use App\Models\Kategori;
use App\Models\JenisKampus;
use App\Models\JenisSoal;

class LabelSoalTryoutController extends Controller
{
    public function index(Request $request){
        $data = LabelSoalTryout::join('paket', 'paket.id_paket', 'label_soal_tryout.id_paket')
        ->join('kategori', 'kategori.id_kategori', 'label_soal_tryout.id_kategori')
        ->join('jenis_kampus', 'jenis_kampus.id_jenis_kampus', 'label_soal_tryout.id_jenis_kampus')
        ->join('jenis_soal', 'jenis_soal.id_jenis_soal', 'label_soal_tryout.id_jenis_soal')
        ->orderBy('id_label_soal_tryout', 'DESC')->get();
        if($request->ajax()){
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_label_soal_tryout.'" data-original-title="Edit" class="edit btn btn-primary btn-sm edit-data">Edit</a>';
                $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_label_soal_tryout.'" data-original-title="Delete" class="btn btn-danger btn-sm delete-data">Delete</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        $paket = Paket::pluck('nama_paket', 'id_paket');
        $kategori = Kategori::pluck('nama_kategori', 'id_kategori');
        $jenis_kampus = JenisKampus::pluck('nama_jenis_kampus', 'id_jenis_kampus');
        $jenis_soal = JenisSoal::pluck('jenis_soal', 'id_jenis_soal');

        return view('admin.tryout.label-soal', compact('paket', 'kategori', 'jenis_kampus', 'jenis_soal'));
    }

    public function show($id){
        $data = LabelSoalTryout::find($id);
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $count = 0;
        $name = Str::of($request->nama_label)->slug('-');
        $slug_name = $name;
        
        while(true) {
            $check = LabelSoalTryout::where('id_label_soal_tryout', '!=', $request->id_label_soal_tryout)->where('slug', $slug_name)->first();
            if (empty($check)){
                break;
            } else {
                $slug_name = $name . '-' . (++$count);  
            }
        }

        $data = LabelSoalTryout::updateOrCreate(
            ['id_label_soal_tryout' => $request->id_label_soal_tryout],
            [
                'id_paket' => $request->id_paket,
                'id_kategori' => $request->id_kategori,
                'id_jenis_kampus' => $request->id_jenis_kampus,
                'id_jenis_soal' => $request->id_jenis_soal,
                'nama_label' => $request->nama_label,
                'slug' => $slug_name
            ]
        );

        return response()->json($data);
    }

    public function destroy($id){
        $data = LabelSoalTryout::find($id)->delete();
        return response()->json($data);
    }
}
