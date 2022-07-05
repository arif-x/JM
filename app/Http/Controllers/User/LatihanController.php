<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Soal;
use App\Models\User;
use App\Models\LabelSoal;
use App\Models\StatusMengerjakan;
use App\Models\JawabanUser;
use App\Models\LaporanSoal;
use Auth;
use File;
use DB;
use Str;
use Carbon\Carbon;
use DataTables;

class LatihanController extends Controller
{
    public function index(){
        $tps = LabelSoal::join('soal', 'soal.id_label_soal', '=', 'label_soal.id_label_soal')
        ->join('paket', 'paket.id_paket', '=', 'label_soal.id_paket')
        ->where('label_soal.id_jenis_soal', 1)
        ->select('label_soal.id_label_soal', 'nama_paket', 'label_soal.slug' , 'label_soal.nama_label', DB::raw("count(soal.id_label_soal) as counts"))
        ->groupBy('soal.id_label_soal')
        ->get();
        
        $tka = LabelSoal::join('soal', 'soal.id_label_soal', '=', 'label_soal.id_label_soal')
        ->join('paket', 'paket.id_paket', '=', 'label_soal.id_paket')
        ->where('label_soal.id_jenis_soal', 2)
        ->select('label_soal.id_label_soal', 'nama_paket', 'label_soal.slug' , 'label_soal.nama_label', DB::raw("count(soal.id_label_soal) as counts"))
        ->groupBy('soal.id_label_soal')
        ->get();

        $inggris = LabelSoal::join('soal', 'soal.id_label_soal', '=', 'label_soal.id_label_soal')
        ->join('paket', 'paket.id_paket', '=', 'label_soal.id_paket')
        ->where('label_soal.id_jenis_soal', 3)
        ->select('label_soal.id_label_soal', 'nama_paket', 'label_soal.slug' , 'label_soal.nama_label', DB::raw("count(soal.id_label_soal) as counts"))
        ->groupBy('soal.id_label_soal')
        ->get();

        $slug = StatusMengerjakan::join('label_soal', 'label_soal.id_label_soal', '=', 'status_mengerjakan.id_label_soal')->where('status_mengerjakan.status', 1)->where('id_user', Auth::user()->id_user)->value('label_soal.slug');

        $modal = '';

        $checkStatus = StatusMengerjakan::where('status_mengerjakan.status', 1)->where('id_user', Auth::user()->id_user)->first();

        if(!empty($checkStatus)){
            $slug_old = LabelSoal::where('slug', $slug)->value('label_soal.nama_label');
            $modal = '
            <div class="modal fade" id="warningModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-body text-center">
            <i class="mdi mdi-information-outline" style="font-size: 75px;"></i>
            <p class="mb-3">Anda Masih Mengerjakan <strong>'.$slug_old.'</strong>, Ingin Batalkan Latihan?</p>
            <div class="d-flex flex-wrap justify-content-center mb-3">
            <form method="POST" id="formId">
            '.csrf_field().'
            <input type"hidden" id="kerjakanInput" name="slug">
            <button type="submit" class="btn btn-inverse-danger btn-fw ml-0 ml-sm-1 font-weight-bold" id="batalBtn" value="create">Batalkan</button>
            </form>
            <a href="'.route('user.latihan.kerjakan', $slug).'" class="btn btn-inverse-primary btn-fw ml-0 ml-sm-1 font-weight-bold" id="lanjutBtn" value="create">Lanjutkan</a>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            ';
        } else {
            $modal = '
            <div class="modal fade" id="warningModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="warningModalHeading">Mulai Latihan</h4>
            </div>
            <div class="modal-body">
            <h5 class="mb-3">Anda Yakin Ingin Mengerjakan?</h5>
            </div>
            <div class="modal-footer">
            <a type="button" class="btn btn-inverse-primary btn-fw mr-0 mr-sm-1 font-weight-bold mb-2 mb-sm-0" id="kerjakanBtn" value="create">Kerjakan</a>
            </div>
            </div>
            </div>
            </div>
            ';
        }

        return view('user.latihan.latihan', ['tka' => $tka, 'tps' => $tps, 'inggris' => $inggris], compact('modal'));
    }

    public function ready($slug){
        $checkSoal = LabelSoal::join('soal', 'soal.id_label_soal', '=', 'label_soal.id_label_soal')
        ->join('paket', 'paket.id_paket', '=', 'label_soal.id_paket')
        ->join('kategori', 'kategori.id_kategori', '=', 'label_soal.id_kategori')
        ->where('label_soal.slug', $slug)
        ->groupBy('soal.id_label_soal')
        ->value('paket.id_paket');

        $checkPaket = User::join('paket_aktif', 'paket_aktif.id_user', '=', 'users.id_user')->where('paket_aktif.id_user', Auth::user()->id_user)->value('paket_aktif.id_paket');

        if($checkSoal > $checkPaket){
            return redirect()->route('user.paket')->with('success', 'Upgrade Paket Anda Sebelum Mengakses');
        } else {
            $soal = LabelSoal::join('soal', 'soal.id_label_soal', '=', 'label_soal.id_label_soal')
            ->join('paket', 'paket.id_paket', '=', 'label_soal.id_paket')
            ->join('kategori', 'kategori.id_kategori', '=', 'label_soal.id_kategori')
            ->select('label_soal.id_label_soal', 'nama_paket', 'label_soal.slug' , 'label_soal.nama_label', 'kategori.nama_kategori', DB::raw("count(soal.id_label_soal) as counts"))
            ->where('label_soal.slug', $slug)
            ->groupBy('soal.id_label_soal')
            ->get();
            return view('user.latihan.persiapan', ['soals' => $soal]);
        }
    }

    public function kerjakan($slug){
        $checkSoal = LabelSoal::join('soal', 'soal.id_label_soal', '=', 'label_soal.id_label_soal')
        ->join('paket', 'paket.id_paket', '=', 'label_soal.id_paket')
        ->join('kategori', 'kategori.id_kategori', '=', 'label_soal.id_kategori')
        ->where('label_soal.slug', $slug)
        ->groupBy('soal.id_label_soal')
        ->value('paket.id_paket');

        $checkPaket = User::join('paket_aktif', 'paket_aktif.id_user', '=', 'users.id_user')->where('paket_aktif.id_user', Auth::user()->id_user)->value('paket_aktif.id_paket');

        if($checkSoal > $checkPaket){
            return redirect()->route('user.paket')->with('success', 'Upgrade Paket Anda Sebelum Mengakses');
        } else {
            $soal = Soal::join('label_soal', 'label_soal.id_label_soal', '=', 'soal.id_label_soal')->where('label_soal.slug', $slug)->select('soal', 'soal.slug')->get();
            $soal_json = Soal::join('label_soal', 'label_soal.id_label_soal', '=', 'soal.id_label_soal')->where('label_soal.slug', $slug)->inRandomOrder()->get();
            $label = LabelSoal::where('label_soal.slug', $slug)->value('nama_label');
            $id_label = LabelSoal::where('label_soal.slug', $slug)->value('id_label_soal');

            $data = [
                'id_soal' => '',
                'id_label' => '',
                'nomor' => '',
                'soal' => '',
                'a' => '',
                'b' => '',
                'c' => '',
                'd' => '',
                'e' => '',
                'slug' => '',
                'waktu_mengerjakan' => '',
                'jawaban' => '',
            ];

            $data_soal = [];

            $no = 1;

            foreach ($soal_json as $key => $value) {
                $data['id_soal'] = $value['id_soal'];
                $data['id_label'] = $id_label;
                $data['nomor'] = $no++;
                $data['soal'] = $value['soal'];
                $data['a'] = $value['a'];
                $data['b'] = $value['b'];
                $data['c'] = $value['c'];
                $data['d'] = $value['d'];
                $data['e'] = $value['e'];
                $data['slug'] = $value['slug'];
                $data['waktu_mengerjakan'] = Carbon::now()->toDateTimeString();
                $data['jawaban'] = '-';
                array_push($data_soal, $data);
            }

            $newJson = json_encode($data_soal);

            $checkStatusExcept = StatusMengerjakan::join('label_soal', 'label_soal.id_label_soal', '=', 'status_mengerjakan.id_label_soal')->where('label_soal.slug', '!=', $slug)->where('status_mengerjakan.status', 1)->where('id_user', Auth::user()->id_user)->first();

            if(empty($checkStatusExcept)){
                $checkStatusFound = StatusMengerjakan::where('id_user', Auth::user()->id_user)->where('status', 1)->first();
                if(empty($checkStatusFound)){
                    StatusMengerjakan::insert([
                        'id_user' => Auth::user()->id_user,
                        'id_label_soal' => $id_label,
                        'waktu_mengerjakan' => Carbon::now()->toDateTimeString(),
                        'waktu_berakhir' => Carbon::now()->addMinutes(15)->toDateTimeString(),
                        'status' => 1,
                    ]); 
                }
            } else {
                $slug_old = StatusMengerjakan::join('label_soal', 'label_soal.id_label_soal', '=', 'status_mengerjakan.id_label_soal')->where('label_soal.slug', '!=',$slug)->where('status_mengerjakan.status', 1)->where('id_user', Auth::user()->id_user)->value('label_soal.slug');
                return redirect()->route('user.latihan.kerjakan', $slug_old);
            }


            $timer = StatusMengerjakan::join('label_soal', 'label_soal.id_label_soal', '=', 'status_mengerjakan.id_label_soal')->where('label_soal.slug', $slug)->where('id_user', Auth::user()->id_user)->select(DB::raw("TIME_TO_SEC(TIMEDIFF(NOW(), waktu_berakhir)) * -1 AS timer"))->orderBy('id_status_mengerjakan')->limit(1)->value('timer');

            $end = StatusMengerjakan::join('label_soal', 'label_soal.id_label_soal', '=', 'status_mengerjakan.id_label_soal')->where('label_soal.slug', $slug)->where('id_user', Auth::user()->id_user)->where('status', 1)->value('waktu_berakhir');

            if(file_exists(storage_path("app/public/jawaban/latihan/".Auth::user()->email.".json"))){
                $json = File::get(storage_path("app/public/jawaban/latihan/".Auth::user()->email.".json"));
            } else {
                File::put(storage_path("app/public/jawaban/latihan/".Auth::user()->email.".json"), $newJson);   
            }

            return view('user.latihan.single', ['soals' => $soal], compact('label', 'timer', 'end'));
        }
    }

    public function firstSoal($slug){
        $data = Soal::select('soal', 'a', 'b', 'c', 'd', 'e')->where('slug', $slug)->get();
        return response()->json($data);
    }

    public function getSoal($slug){
        $data = Soal::select('soal', 'a', 'b', 'c', 'd', 'e')->where('slug', $slug)->get();
        return response()->json($data);
    }

    public function getJawaban($no){
        $jawaban = '';
        $json = File::get(storage_path("app/public/jawaban/latihan/".Auth::user()->email.".json"));  
        $data = json_decode($json, true);
        foreach ($data as $key => $entry) {
            if ($entry['nomor'] == $no) {
                $jawaban = $data[$key]['jawaban'];
            }
        }   
        return json_encode($jawaban);
    }

    public function getAllJawaban(){
        $jawaban = [];
        $data_jawaban = [];
        $json = File::get(storage_path("app/public/jawaban/latihan/".Auth::user()->email.".json"));
        $data = json_decode($json, true);
        foreach ($data as $key => $entry) {
            $data_jawaban['nomor'] = $data[$key]['nomor'];
            $data_jawaban['jawaban'] = $data[$key]['jawaban'];
            array_push($jawaban, $data_jawaban);
        }   
        return json_encode($jawaban);
    }

    public function store(Request $request){
        $oldJson = File::get(storage_path("app/public/jawaban/latihan/".Auth::user()->email.".json"));
        $data = json_decode($oldJson, true);

        foreach ($data as $key => $entry) {
            if ($entry['nomor'] == $request->no) {
                $data[$key]['jawaban'] = $request->jawaban;
            }
        }

        $newJson = json_encode($data);
        File::put(storage_path("app/public/jawaban/latihan/".Auth::user()->email.".json"), $newJson);
        return json_encode($newJson);
    }

    public function finish(){
        $oldJson = File::get(storage_path("app/public/jawaban/latihan/".Auth::user()->email.".json"));
        $jsonData = json_decode($oldJson, true);

        $id_label = [];
        $id_soal = [];
        $jawaban = [];
        $start = [];
        $skor = 0;

        foreach ($jsonData as $key => $entry) {
            array_push($id_label, $jsonData[$key]['id_label']);
            array_push($id_soal, $jsonData[$key]['id_soal']);
            array_push($jawaban, $jsonData[$key]['jawaban']);
            array_push($start, $jsonData[$key]['waktu_mengerjakan']);
            $kunci = Soal::where('id_soal', $jsonData[$key]['id_soal'])->value('kunci');
            if($jsonData[$key]['jawaban'] == $kunci){
                $skor = $skor + 1;
            } else {
                $skor = $skor + 0;
            }
        }

        $id_label = $id_label[0];
        $start = $start[0];

        $id_soal_imploded = implode(",", $id_soal);
        $jawaban_imploded = implode(",", $jawaban);

        $check = JawabanUser::where('id_user', Auth::user()->id_user)->where('id_label_soal', $id_label)->where('tgl_mengerjakan', $start)->first();

        StatusMengerjakan::where('id_user', Auth::user()->id_user)->update([
            'status' => 2,
        ]);

        $slugs = encrypt(Carbon::now()->timestamp.Str::random(5));

        if(empty($check)){
            $data = JawabanUser::insert([
                'id_user' => Auth::user()->id_user,
                'id_label_soal' => $id_label,
                'tgl_mengerjakan' => $start,
                'jawaban_user' => $jawaban_imploded,
                'id_soal' => $id_soal_imploded,
                'skor' => $skor,
                'slug' => $slugs
            ]);
        }

        File::delete(storage_path("app/public/jawaban/latihan/".Auth::user()->email.".json"));
        // return redirect()->route('user.latihan.pembahasan', $slugs);
        return response()->json($slugs);
    }

    public function report(Request $request){
        $id_soal = '';
        $oldJson = File::get(storage_path("app/public/jawaban/latihan/".Auth::user()->email.".json"));
        $data = json_decode($oldJson, true);

        foreach ($data as $key => $entry) {
            if ($entry['nomor'] == $request->no) {
                $id_soal = $data[$key]['id_soal'];
            }
        }

        $data = LaporanSoal::insert([
            'id_soal' => $id_soal,
            'kategori' => $request->kategori,
            'pesan' => $request->pesan,
        ]);

        return response()->json($data);
    }

    public function reportPembahasan(Request $request){
        $id_soal = '';

        $data = LaporanSoal::insert([
            'id_soal' => $request->no,
            'kategori' => $request->kategori,
            'pesan' => $request->pesan,
        ]);

        return response()->json($data);
    }

    public function cancel(){
        $oldJson = File::get(storage_path("app/public/jawaban/latihan/".Auth::user()->email.".json"));
        $jsonData = json_decode($oldJson, true);
        StatusMengerjakan::where('id_user', Auth::user()->id_user)->update([
            'status' => 2,
        ]);
        return File::delete(storage_path("app/public/jawaban/latihan/".Auth::user()->email.".json"));
    }

    public function cancelAndContinue(Request $request, $slug){
        $slug = $request->slug;
        $this->cancel();
        return redirect()->route('user.latihan.ready', $slug);
    }

    public function pembahasanIndex($slug){
        $label = LabelSoal::join('jawaban_user', 'jawaban_user.id_label_soal', '=', 'label_soal.id_label_soal')->where('jawaban_user.slug', $slug)->value('nama_label');
        $data_soal = array();

        $jawaban_user = JawabanUser::join('label_soal', 'label_soal.id_label_soal', '=', 'jawaban_user.id_label_soal')
        ->where('id_user', Auth::user()->id_user)
        ->where('jawaban_user.slug', $slug)
        ->get();

        $slugs = JawabanUser::join('label_soal', 'label_soal.id_label_soal', '=', 'jawaban_user.id_label_soal')
        ->where('id_user', Auth::user()->id_user)
        ->where('jawaban_user.slug', $slug)
        ->value('jawaban_user.slug');

        $id_soal_exploded = explode(",", $jawaban_user[0]['id_soal']);
        $jawaban_exploded = explode(",", $jawaban_user[0]['jawaban_user']);
        $skor = $jawaban_user[0]['skor'];

        $benar = 0;
        $salah = 0;
        $kosong = 0;

        for ($i=0; $i < count($id_soal_exploded); $i++) { 
            $kunci = Soal::where('id_soal', $id_soal_exploded[$i])->value('kunci');
            $data_soal[$i]['slug'] = Soal::where('id_soal', $id_soal_exploded[$i])->value('slug');
            if($jawaban_exploded[$i] == $kunci){
                $benar = $benar + 1;
            } elseif($jawaban_exploded[$i] != $kunci && $jawaban_exploded[$i] != '-'){
                $salah = $salah + 1;
            } elseif($jawaban_exploded[$i] == '-'){
                $kosong = $kosong + 1;
            }
        }

        return view('user.latihan.pembahasan', compact('label', 'skor', 'benar', 'salah', 'kosong', 'slugs'), ['soals' => $data_soal]);
    }

    public function pembahasan($slug){
        $data_soal = array(); 

        $jawaban_user = JawabanUser::join('label_soal', 'label_soal.id_label_soal', '=', 'jawaban_user.id_label_soal')
        ->where('id_user', Auth::user()->id_user)
        ->orderBy('id_jawaban_user', 'DESC')
        ->limit(1)
        ->get();

        $id_soal_exploded = explode(",", $jawaban_user[0]['id_soal']);
        $jawaban_exploded = explode(",", $jawaban_user[0]['jawaban_user']);

        $data = [
            [
                'nomor' => '',
                'id_soal' => '',
                'soal' => '',
                'a' => '',
                'b' => '',
                'c' => '',
                'd' => '',
                'e' => '',
                'kunci' => '',
                'jawaban' => '',
                'pembahasan' => '',
            ]
        ];

        for ($i=0; $i < count($id_soal_exploded); $i++) { 
            $nomor = $i + 1;
            $soal = Soal::where('id_soal', $id_soal_exploded[$i])->value('soal');
            $kunci = Soal::where('id_soal', $id_soal_exploded[$i])->value('kunci');
            $a = Soal::where('id_soal', $id_soal_exploded[$i])->value('a');
            $b = Soal::where('id_soal', $id_soal_exploded[$i])->value('b');
            $c = Soal::where('id_soal', $id_soal_exploded[$i])->value('c');
            $d = Soal::where('id_soal', $id_soal_exploded[$i])->value('d');
            $e = Soal::where('id_soal', $id_soal_exploded[$i])->value('e');
            $pembahasan = Soal::where('id_soal', $id_soal_exploded[$i])->value('pembahasan');
            $jawaban = $jawaban_exploded[$i];
            $data[$i]['nomor'] = $nomor;
            $data[$i]['id_soal'] = $id_soal_exploded[$i];
            $data[$i]['soal'] = $soal;
            $data[$i]['a'] = $a;
            $data[$i]['b'] = $b;
            $data[$i]['c'] = $c;
            $data[$i]['d'] = $d;
            $data[$i]['e'] = $e;
            $data[$i]['kunci'] = $kunci;
            $data[$i]['jawaban'] = $jawaban;
            $data[$i]['pembahasan'] = $pembahasan;
            $data_soal[$i]['slug'] = Soal::where('id_soal', $id_soal_exploded[$i])->value('slug');
        }

        return response()->json($data);
    }

    public function hasilLatihan(Request $request){
        $data = JawabanUser::join('label_soal', 'label_soal.id_label_soal', '=', 'jawaban_user.id_label_soal')
        ->join('jenis_soal', 'jenis_soal.id_jenis_soal', '=', 'label_soal.id_jenis_soal')
        ->select('jenis_soal', 'nama_label', 'tgl_mengerjakan', 'jawaban_user.slug as slugs')
        ->where('jawaban_user.id_user', Auth::user()->id_user)->orderBy('id_jawaban_user', 'DESC')->get();

        if($request->ajax()){
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('pembahasan', function($row){
                $btn = '<a type="button" href="/user/latihan/pembahasan/'.$row->slugs.'" class="btn btn-primary">Pembahasan</a>';
                return $btn;
            })
            ->rawColumns(['pembahasan'])
            ->make(true);
        }

        return view('user.latihan.hasil');
    }
}
