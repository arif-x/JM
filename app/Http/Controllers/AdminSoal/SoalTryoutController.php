<?php

namespace App\Http\Controllers\AdminSoal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use Str;
use App\Models\SoalTryout;
use App\Models\LabelSoalTryout;
use App\Models\JenisSoal;

class SoalTryoutController extends Controller
{
    public function index(Request $request){
        $data = SoalTryout::join('label_soal_tryout', 'label_soal_tryout.id_label_soal_tryout', '=', 'soal_tryout.id_label_soal_tryout')
        ->join('paket', 'paket.id_paket', '=', 'label_soal_tryout.id_paket')
        ->join('kategori', 'kategori.id_kategori', '=', 'label_soal_tryout.id_kategori')
        ->join('jenis_kampus', 'jenis_kampus.id_jenis_kampus', '=', 'label_soal_tryout.id_jenis_kampus')
        ->join('jenis_soal', 'jenis_soal.id_jenis_soal', '=', 'soal_tryout.id_jenis_soal')
        ->join('sub_jenis_soal', 'sub_jenis_soal.id_sub_jenis_soal', '=', 'soal_tryout.id_sub_jenis_soal')
        ->orderBy('id_soal_tryout', 'DESC')->get();
        if($request->ajax()){
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_soal_tryout.'" data-original-title="Edit" class="edit btn btn-primary btn-sm edit-data">Edit</a>';
                $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_soal_tryout.'" data-original-title="Delete" class="btn btn-danger btn-sm delete-data">Delete</a>';
                return $btn;
            })
            ->addColumn('soals', function($row){
                $soal = mb_strimwidth($row->soal_tryout, 0, 100, "...");
                return $soal;
            })
            ->rawColumns(['action', 'soals'])
            ->make(true);
        }

        $label_soal_tryout = LabelSoalTryout::pluck('id_label_soal_tryout', 'nama_label');
        $jenis_soal = JenisSoal::pluck('jenis_soal', 'id_jenis_soal');

        return view('admin-soal.tryout.soal', compact('label_soal_tryout', 'jenis_soal'));
    }

    public function show($id){
        $data = SoalTryout::join('sub_jenis_soal', 'sub_jenis_soal.id_sub_jenis_soal', '=', 'soal_tryout.id_sub_jenis_soal')->find($id);
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $getJumlahSoal = SoalTryout::where('id_label_soal_tryout', $request->id_label_soal_tryout)->where('id_sub_jenis_soal', $request->id_sub_jenis_soal)->count();

        $count = 0;
        $name = encrypt(Str::of($request->soal)->slug('-'));
        $slug_name = $name;

        while(true) {
            $check = SoalTryout::where('id_soal_tryout', '!=', $request->id_soal_tryout)->where('slug', $slug_name)->first();
            if (empty($check)){
                break;
            } else {
                $slug_name = $name . '-' . (++$count);  
            }
        }

        if($getJumlahSoal <= 15){
            if($request->id_soal_tryout == ''){
                $data = SoalTryout::insert([
                    'id_label_soal_tryout' => $request->id_label_soal_tryout,
                    'soal_tryout' => $request->soal,
                    'id_jenis_soal' => $request->id_jenis_soal,
                    'id_sub_jenis_soal' => $request->id_sub_jenis_soal,
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
                $data = SoalTryout::where('id_soal_tryout', $request->id_soal_tryout)->update(
                    [
                        'id_label_soal_tryout' => $request->id_label_soal_tryout,
                        'soal_tryout' => $request->soal,
                        'id_jenis_soal' => $request->id_jenis_soal,
                        'id_sub_jenis_soal' => $request->id_sub_jenis_soal,
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
        $data = SoalTryout::find($id)->delete();
        return response()->json($data);
    }
}
