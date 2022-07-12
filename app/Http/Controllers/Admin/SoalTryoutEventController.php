<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use Str;
use App\Models\SoalTryoutEvent;
use App\Models\LabelSoalTryoutEvent;
use App\Models\JenisSoal;

class SoalTryoutEventController extends Controller
{
    public function index(Request $request){
        $data = SoalTryoutEvent::join('label_soal_tryout_event', 'label_soal_tryout_event.id_label_soal_tryout_event', '=', 'soal_tryout_event.id_label_soal_tryout_event')
        ->join('paket', 'paket.id_paket', '=', 'label_soal_tryout_event.id_paket')
        ->join('kategori', 'kategori.id_kategori', '=', 'label_soal_tryout_event.id_kategori')
        ->join('jenis_kampus', 'jenis_kampus.id_jenis_kampus', '=', 'label_soal_tryout_event.id_jenis_kampus')
        ->join('jenis_soal', 'jenis_soal.id_jenis_soal', '=', 'soal_tryout_event.id_jenis_soal')
        ->join('sub_jenis_soal', 'sub_jenis_soal.id_sub_jenis_soal', '=', 'soal_tryout_event.id_sub_jenis_soal')
        ->orderBy('id_soal_tryout_event', 'DESC')->get();
        if($request->ajax()){
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_soal_tryout_event.'" data-original-title="Edit" class="edit btn btn-primary btn-sm edit-data">Edit</a>';
                $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_soal_tryout_event.'" data-original-title="Delete" class="btn btn-danger btn-sm delete-data">Delete</a>';
                return $btn;
            })
            ->addColumn('soals', function($row){
                $soal = mb_strimwidth($row->soal_tryout_event, 0, 100, "...");
                return $soal;
            })
            ->rawColumns(['action', 'soals'])
            ->make(true);
        }

        $label_soal_tryout_event = LabelSoalTryoutEvent::pluck('id_label_soal_tryout_event', 'nama_label');
        $jenis_soal = JenisSoal::pluck('jenis_soal', 'id_jenis_soal');

        return view('admin.tryout-event.soal', compact('label_soal_tryout_event', 'jenis_soal'));
    }

    public function show($id){
        $data = SoalTryoutEvent::join('sub_jenis_soal', 'sub_jenis_soal.id_sub_jenis_soal', '=', 'soal_tryout_event.id_sub_jenis_soal')->find($id);
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $getJumlahSoal = SoalTryoutEvent::where('id_label_soal_tryout_event', $request->id_label_soal_tryout_event)->where('id_sub_jenis_soal', $request->id_sub_jenis_soal)->count();

        $count = 0;
        $name = encrypt(Str::of($request->soal)->slug('-'));
        $slug_name = $name;

        while(true) {
            $check = SoalTryoutEvent::where('id_soal_tryout_event', '!=', $request->id_soal_tryout_event)->where('slug', $slug_name)->first();
            if (empty($check)){
                break;
            } else {
                $slug_name = $name . '-' . (++$count);  
            }
        }

        if($getJumlahSoal <= 20){
            if($request->id_soal_tryout_event == ''){
                $data = SoalTryoutEvent::insert([
                    'id_label_soal_tryout_event' => $request->id_label_soal_tryout_event,
                    'soal_tryout_event' => $request->soal,
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
                $data = SoalTryoutEvent::where('id_soal_tryout_event', $request->id_soal_tryout_event)->update(
                    [
                        'id_label_soal_tryout_event' => $request->id_label_soal_tryout_event,
                        'soal_tryout_event' => $request->soal,
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
        $data = SoalTryoutEvent::find($id)->delete();
        return response()->json($data);
    }
}
