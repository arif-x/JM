<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use Str;
use App\Models\Soal;
use App\Models\LabelSoal;

class SoalLatihanController extends Controller
{
    public function index(Request $request){
        $data = Soal::join('label_soal', 'label_soal.id_label_soal', '=', 'soal.id_label_soal')
        ->join('paket', 'paket.id_paket', '=', 'label_soal.id_paket')
        ->join('kategori', 'kategori.id_kategori', '=', 'label_soal.id_kategori')
        ->join('jenis_kampus', 'jenis_kampus.id_jenis_kampus', '=', 'label_soal.id_jenis_kampus')
        ->orderBy('id_soal', 'DESC')->get();
        if($request->ajax()){
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_soal.'" data-original-title="Edit" class="edit btn btn-primary btn-sm edit-data">Edit</a>';
                $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_soal.'" data-original-title="Delete" class="btn btn-danger btn-sm delete-data">Delete</a>';
                return $btn;
            })
            ->addColumn('soals', function($row){
                $soal = mb_strimwidth($row->soal, 0, 100, "...");
                return $soal;
            })
            ->rawColumns(['action', 'soals'])
            ->make(true);
        }

        $label_soal = LabelSoal::pluck('id_label_soal', 'nama_label');

        return view('admin.latihan.soal', compact('label_soal'));
    }

    public function show($id){
        $data = Soal::find($id);
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $getJumlahSoal = Soal::where('id_label_soal', $request->id_label_soal)->count();

        $count = 0;
        $name = encrypt(Str::of($request->soal)->slug('-'));
        $slug_name = $name;

        while(true) {
            $check = Soal::where('id_soal', '!=', $request->id_soal)->where('slug', $slug_name)->first();
            if (empty($check)){
                break;
            } else {
                $slug_name = $name . '-' . (++$count);  
            }
        }

        if($getJumlahSoal <= 15){
            if($request->id_soal == ''){
                $data = Soal::insert([
                    'id_label_soal' => $request->id_label_soal,
                    'soal' => $request->soal,
                    'a' => $request->a,
                    'b' => $request->b,
                    'c' => $request->c,
                    'd' => $request->d,
                    'e' => $request->e,
                    'kunci' => $request->kunci,
                    'pembahasan' => $request->pembahasan,
                    'slug' => $slug_name,
                ]);

                return response()->json('Soal Ditambah');
            } else {
                $data = Soal::where('id_soal', $request->id_soal)->update(
                    [
                        'id_label_soal' => $request->id_label_soal,
                        'soal' => $request->soal,
                        'a' => $request->a,
                        'b' => $request->b,
                        'c' => $request->c,
                        'd' => $request->d,
                        'e' => $request->e,
                        'kunci' => $request->kunci,
                        'pembahasan' => $request->pembahasan,
                        'slug' => $slug_name,
                    ]
                );
                return response()->json('Soal Diedit');
            }
        } else {
            return response()->json('Gagal input soal karena telah melebihi maksimum jumlah soal tiap label soal');
        }
    }

    public function destroy($id){
        $data = Soal::find($id)->delete();
        return response()->json($data);
    }
}
