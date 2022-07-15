<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SoalTryout;
use App\Models\User;
use App\Models\LabelSoalTryout;
use App\Models\StatusMengerjakanTryout;
use App\Models\JawabanUserTryout;
use App\Models\LaporanSoalTryout;
use Auth;
use File;
use DB;
use Str;
use Carbon\Carbon;
use DataTables;

class TryoutController extends Controller
{
    public function index(){
        $tps = LabelSoalTryout::join('soal_tryout', 'soal_tryout.id_label_soal_tryout', '=', 'label_soal_tryout.id_label_soal_tryout')
        ->join('paket', 'paket.id_paket', '=', 'label_soal_tryout.id_paket')
        ->select('label_soal_tryout.id_label_soal_tryout', 'nama_paket', 'label_soal_tryout.slug' , 'label_soal_tryout.nama_label', DB::raw("count(soal_tryout.id_label_soal_tryout) as counts"))
        ->groupBy('soal_tryout.id_label_soal_tryout')
        ->get();

        $slug = StatusMengerjakanTryout::join('label_soal_tryout', 'label_soal_tryout.id_label_soal_tryout', '=', 'status_mengerjakan_tryout.id_label_soal_tryout')->where('status_mengerjakan_tryout.status', 1)->where('id_user', Auth::user()->id_user)->value('label_soal_tryout.slug');

        $modal = '';

        $checkStatus = StatusMengerjakanTryout::where('status_mengerjakan_tryout.status', 1)->where('id_user', Auth::user()->id_user)->first();

        if(!empty($checkStatus)){
            $slug_old = LabelSoalTryout::where('slug', $slug)->value('label_soal_tryout.nama_label');
            $modal = '
            <div class="modal fade" id="warningModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-body text-center">
            <i class="mdi mdi-information-outline" style="font-size: 75px;"></i>
            <p class="mb-3">Anda Masih Mengerjakan <strong>'.$slug_old.'</strong>, Ingin Batalkan Tryout?</p>
            <div class="d-flex flex-wrap justify-content-center mb-3">
            <form method="POST" id="formId">
            '.csrf_field().'
            <input type"hidden" id="kerjakanInput" name="slug">
            <button type="submit" class="btn btn-inverse-danger btn-fw ml-0 ml-sm-1 font-weight-bold" id="batalBtn" value="create">Batalkan</button>
            </form>
            <a href="'.route('user.tryout.kerjakan', $slug).'" class="btn btn-inverse-primary btn-fw ml-0 ml-sm-1 font-weight-bold" id="lanjutBtn" value="create">Lanjutkan</a>
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
            <h4 class="modal-title" id="warningModalHeading">Mulai Tryout</h4>
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

        return view('user.tryout.tryout', ['tps' => $tps], compact('modal'));
    }

    public function ready($slug){
        $checkSoal = LabelSoalTryout::join('soal_tryout', 'soal_tryout.id_label_soal_tryout', '=', 'label_soal_tryout.id_label_soal_tryout')
        ->join('paket', 'paket.id_paket', '=', 'label_soal_tryout.id_paket')
        ->join('kategori', 'kategori.id_kategori', '=', 'label_soal_tryout.id_kategori')
        ->where('label_soal_tryout.slug', $slug)
        ->groupBy('soal_tryout.id_label_soal_tryout')
        ->value('paket.id_paket');

        $checkPaket = User::join('paket_aktif', 'paket_aktif.id_user', '=', 'users.id_user')->where('paket_aktif.id_user', Auth::user()->id_user)->where('status_paket_aktif', 1)->value('paket_aktif.id_paket');

        if($checkSoal > $checkPaket){
            return redirect()->route('user.paket')->with('upgrade', 'Upgrade Paket Anda Sebelum Mengakses');
        } else {
            $soal = LabelSoalTryout::join('soal_tryout', 'soal_tryout.id_label_soal_tryout', '=', 'label_soal_tryout.id_label_soal_tryout')
            ->join('paket', 'paket.id_paket', '=', 'label_soal_tryout.id_paket')
            ->join('kategori', 'kategori.id_kategori', '=', 'label_soal_tryout.id_kategori')
            ->select('label_soal_tryout.id_label_soal_tryout', 'nama_paket', 'label_soal_tryout.slug' , 'label_soal_tryout.nama_label', 'kategori.nama_kategori', DB::raw("count(soal_tryout.id_label_soal_tryout) as counts"))
            ->where('label_soal_tryout.slug', $slug)
            ->groupBy('soal_tryout.id_label_soal_tryout')
            ->get();
            return view('user.tryout.persiapan', ['soals' => $soal]);
        }
    }

    public function kerjakan($slug){
        $checkSoal = LabelSoalTryout::join('soal_tryout', 'soal_tryout.id_label_soal_tryout', '=', 'label_soal_tryout.id_label_soal_tryout')
        ->join('paket', 'paket.id_paket', '=', 'label_soal_tryout.id_paket')
        ->join('kategori', 'kategori.id_kategori', '=', 'label_soal_tryout.id_kategori')
        ->where('label_soal_tryout.slug', $slug)
        ->groupBy('soal_tryout.id_label_soal_tryout')
        ->value('paket.id_paket');

        $checkPaket = User::join('paket_aktif', 'paket_aktif.id_user', '=', 'users.id_user')->where('paket_aktif.id_user', Auth::user()->id_user)->where('status_paket_aktif', 1)->value('paket_aktif.id_paket');

        if($checkSoal > $checkPaket){
            return redirect()->route('user.paket')->with('upgrade', 'Upgrade Paket Anda Sebelum Mengakses');
        } else {
            $soal = SoalTryout::join('label_soal_tryout', 'label_soal_tryout.id_label_soal_tryout', '=', 'soal_tryout.id_label_soal_tryout')->where('label_soal_tryout.slug', $slug)->select('soal_tryout', 'soal_tryout.slug')->get();
            $soal_json = SoalTryout::join('label_soal_tryout', 'label_soal_tryout.id_label_soal_tryout', '=', 'soal_tryout.id_label_soal_tryout')->where('label_soal_tryout.slug', $slug)->orderBy('id_sub_jenis_soal')->inRandomOrder()->get();
            $label = LabelSoalTryout::where('label_soal_tryout.slug', $slug)->value('nama_label');
            $id_label = LabelSoalTryout::where('label_soal_tryout.slug', $slug)->value('id_label_soal_tryout');

            $data = [
                'id_soal_tryout' => '',
                'id_label' => '',
                'nomor' => '',
                'soal_tryout' => '',
                'a' => '',
                'b' => '',
                'c' => '',
                'd' => '',
                'e' => '',
                'slug' => '',
                'id_jenis_soal' => '',
                'id_sub_jenis_soal' => '',
                'waktu_mengerjakan' => '',
                'jawaban' => '',
            ];

            $data_soal = [];

            $no = 1;

            foreach ($soal_json as $key => $value) {
                $data['id_soal_tryout'] = $value['id_soal_tryout'];
                $data['id_label'] = $id_label;
                $data['nomor'] = $no++;
                $data['soal_tryout'] = $value['soal_tryout'];
                $data['a'] = $value['a'];
                $data['b'] = $value['b'];
                $data['c'] = $value['c'];
                $data['d'] = $value['d'];
                $data['e'] = $value['e'];
                $data['slug'] = $value['slug'];
                $data['id_jenis_soal'] = $value['id_jenis_soal'];
                $data['id_sub_jenis_soal'] = $value['id_sub_jenis_soal'];
                $data['waktu_mengerjakan'] = Carbon::now()->toDateTimeString();
                $data['jawaban'] = '-';
                array_push($data_soal, $data);
            }

            $newJson = json_encode($data_soal);

            $checkStatusExcept = StatusMengerjakanTryout::join('label_soal_tryout', 'label_soal_tryout.id_label_soal_tryout', '=', 'status_mengerjakan_tryout.id_label_soal_tryout')->where('label_soal_tryout.slug', '!=', $slug)->where('status_mengerjakan_tryout.status', 1)->where('id_user', Auth::user()->id_user)->first();

            if(empty($checkStatusExcept)){
                $checkStatusFound = StatusMengerjakanTryout::where('id_user', Auth::user()->id_user)->where('status', 1)->first();
                if(empty($checkStatusFound)){
                    StatusMengerjakanTryout::insert([
                        'id_user' => Auth::user()->id_user,
                        'id_label_soal_tryout' => $id_label,
                        'waktu_mengerjakan' => Carbon::now()->toDateTimeString(),
                        'waktu_berakhir' => Carbon::now()->addMinutes(50)->toDateTimeString(),
                        'status' => 1,
                    ]); 
                }
            } else {
                $slug_old = StatusMengerjakanTryout::join('label_soal_tryout', 'label_soal_tryout.id_label_soal_tryout', '=', 'status_mengerjakan_tryout.id_label_soal_tryout')->where('label_soal_tryout.slug', '!=',$slug)->where('status_mengerjakan_tryout.status', 1)->where('id_user', Auth::user()->id_user)->value('label_soal_tryout.slug');
                return redirect()->route('user.tryout.kerjakan', $slug_old);
            }


            $timer = StatusMengerjakanTryout::join('label_soal_tryout', 'label_soal_tryout.id_label_soal_tryout', '=', 'status_mengerjakan_tryout.id_label_soal_tryout')->where('label_soal_tryout.slug', $slug)->where('id_user', Auth::user()->id_user)->select(DB::raw("TIME_TO_SEC(TIMEDIFF(NOW(), waktu_berakhir)) * -1 AS timer"))->orderBy('id_status_mengerjakan_tryout')->limit(1)->value('timer');

            $end = StatusMengerjakanTryout::join('label_soal_tryout', 'label_soal_tryout.id_label_soal_tryout', '=', 'status_mengerjakan_tryout.id_label_soal_tryout')->where('label_soal_tryout.slug', $slug)->where('id_user', Auth::user()->id_user)->where('status', 1)->value('waktu_berakhir');

            if(file_exists(storage_path("app/public/jawaban/tryout/".Auth::user()->email.".json"))){
                $json = File::get(storage_path("app/public/jawaban/tryout/".Auth::user()->email.".json"));
            } else {
                File::put(storage_path("app/public/jawaban/tryout/".Auth::user()->email.".json"), $newJson);   
            }

            return view('user.tryout.single', ['soals' => $soal], compact('label', 'timer', 'end'));
        }
    }

    public function firstSoal($slug){
        $data = SoalTryout::select('soal_tryout', 'a', 'b', 'c', 'd', 'e')->where('slug', $slug)->get();
        return response()->json($data);
    }

    public function getSoal($slug){
        $data = SoalTryout::select('soal_tryout', 'a', 'b', 'c', 'd', 'e')->where('slug', $slug)->get();
        return response()->json($data);
    }

    public function getJawaban($no){
        $jawaban = '';
        $json = File::get(storage_path("app/public/jawaban/tryout/".Auth::user()->email.".json"));  
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
        $json = File::get(storage_path("app/public/jawaban/tryout/".Auth::user()->email.".json"));
        $data = json_decode($json, true);
        foreach ($data as $key => $entry) {
            $data_jawaban['nomor'] = $data[$key]['nomor'];
            $data_jawaban['jawaban'] = $data[$key]['jawaban'];
            array_push($jawaban, $data_jawaban);
        }   
        return json_encode($jawaban);
    }

    public function store(Request $request){
        $oldJson = File::get(storage_path("app/public/jawaban/tryout/".Auth::user()->email.".json"));
        $data = json_decode($oldJson, true);

        foreach ($data as $key => $entry) {
            if ($entry['nomor'] == $request->no) {
                $data[$key]['jawaban'] = $request->jawaban;
            }
        }

        $newJson = json_encode($data);
        File::put(storage_path("app/public/jawaban/tryout/".Auth::user()->email.".json"), $newJson);
        return json_encode($newJson);
    }

    public function finish(){
        $oldJson = File::get(storage_path("app/public/jawaban/tryout/".Auth::user()->email.".json"));
        $jsonData = json_decode($oldJson, true);
        $jsonSubJenis = json_decode($oldJson);

        $id_label = [];
        $id_soal_tryout = [];
        $jawaban = [];
        $start = [];
        $skor = [0,0,0,0,0,0,0];
        $array_sub_jenis = array();
        foreach ($jsonSubJenis as $each) {
            if (isset($array_sub_jenis[$each->id_sub_jenis_soal]))
                array_push($array_sub_jenis[$each->id_sub_jenis_soal], $each->id_sub_jenis_soal);
            else
                $array_sub_jenis[$each->id_sub_jenis_soal] = array($each->id_sub_jenis_soal);
        }

        $sub_jenis = array_keys($array_sub_jenis);

        foreach ($jsonData as $key => $entry) {
            for ($i=0; $i < count($sub_jenis); $i++) { 
                if ($entry['id_sub_jenis_soal'] == $sub_jenis[$i]) {
                    array_push($id_label, $jsonData[$key]['id_label']);
                    array_push($id_soal_tryout, $jsonData[$key]['id_soal_tryout']);
                    array_push($jawaban, $jsonData[$key]['jawaban']);
                    array_push($start, $jsonData[$key]['waktu_mengerjakan']);
                    $kunci = SoalTryout::where('id_soal_tryout', $jsonData[$key]['id_soal_tryout'])->value('kunci');
                    $kunci_exploded = explode(',', $kunci);
                    if($jsonData[$key]['jawaban'] == 'a'){
                        $skor[$i] = $skor[$i] + $kunci_exploded[0];
                    } elseif($jsonData[$key]['jawaban'] == 'b'){
                        $skor[$i] = $skor[$i] + $kunci_exploded[1];
                    } elseif($jsonData[$key]['jawaban'] == 'c'){
                        $skor[$i] = $skor[$i] + $kunci_exploded[2];
                    } elseif($jsonData[$key]['jawaban'] == 'd'){
                        $skor[$i] = $skor[$i] + $kunci_exploded[3];
                    } elseif($jsonData[$key]['jawaban'] == 'e'){
                        $skor[$i] = $skor[$i] + $kunci_exploded[4];
                    } else {
                        $skor[$i] = $skor[$i] + 0;
                    }
                }
            }
        }

        $id_label = $id_label[0];
        $start = $start[0];

        $id_soal_tryout_imploded = implode(",", $id_soal_tryout);
        $jawaban_imploded = implode(",", $jawaban);

        $check = JawabanUserTryout::where('id_user', Auth::user()->id_user)->where('id_label_soal_tryout', $id_label)->where('tgl_mengerjakan', $start)->first();

        StatusMengerjakanTryout::where('id_user', Auth::user()->id_user)->update([
            'status' => 2,
        ]);

        $slugs = encrypt(Carbon::now()->timestamp.Str::random(5));

        if(empty($check)){
            $data = JawabanUserTryout::insert([
                'id_user' => Auth::user()->id_user,
                'id_label_soal_tryout' => $id_label,
                'tgl_mengerjakan' => $start,
                'jawaban_user_tryout' => $jawaban_imploded,
                'id_soal_tryout' => $id_soal_tryout_imploded,
                'skor' => implode(",", $skor),
                'slug' => $slugs
            ]);
        }

        File::delete(storage_path("app/public/jawaban/tryout/".Auth::user()->email.".json"));
        return response()->json($slugs);
    }

    public function report(Request $request){
        $id_soal = '';
        $oldJson = File::get(storage_path("app/public/jawaban/tryout/".Auth::user()->email.".json"));
        $data = json_decode($oldJson, true);

        foreach ($data as $key => $entry) {
            if ($entry['nomor'] == $request->no) {
                $id_soal = $data[$key]['id_soal'];
            }
        }

        $data = LaporanSoalTryout::insert([
            'id_soal' => $id_soal,
            'kategori' => $request->kategori,
            'pesan' => $request->pesan,
        ]);

        return response()->json($data);
    }

    public function reportPembahasan(Request $request){
        $id_soal = '';

        $data = LaporanSoalTryout::insert([
            'id_soal' => $request->no,
            'kategori' => $request->kategori,
            'pesan' => $request->pesan,
        ]);

        return response()->json($data);
    }

    public function cancel(){
        $oldJson = File::get(storage_path("app/public/jawaban/tryout/".Auth::user()->email.".json"));
        $jsonData = json_decode($oldJson, true);
        StatusMengerjakanTryout::where('id_user', Auth::user()->id_user)->update([
            'status' => 2,
        ]);
        return File::delete(storage_path("app/public/jawaban/tryout/".Auth::user()->email.".json"));
    }

    public function cancelAndContinue(Request $request, $slug){
        $slug = $request->slug;
        $this->cancel();
        return redirect()->route('user.tryout.ready', $slug);
    }

    public function pembahasanIndex($slug){
        $label = LabelSoalTryout::join('jawaban_user_tryout', 'jawaban_user_tryout.id_label_soal_tryout', '=', 'label_soal_tryout.id_label_soal_tryout')->where('jawaban_user_tryout.slug', $slug)->value('nama_label');
        $data_soal = array();

        $jawaban_user_tryout = JawabanUserTryout::join('label_soal_tryout', 'label_soal_tryout.id_label_soal_tryout', '=', 'jawaban_user_tryout.id_label_soal_tryout')
        ->where('id_user', Auth::user()->id_user)
        ->where('jawaban_user_tryout.slug', $slug)
        ->get();

        $slugs = JawabanUserTryout::join('label_soal_tryout', 'label_soal_tryout.id_label_soal_tryout', '=', 'jawaban_user_tryout.id_label_soal_tryout')
        ->where('id_user', Auth::user()->id_user)
        ->where('jawaban_user_tryout.slug', $slug)
        ->value('jawaban_user_tryout.slug');

        $id_soal_exploded = explode(",", $jawaban_user_tryout[0]['id_soal_tryout']);
        $jawaban_exploded = explode(",", $jawaban_user_tryout[0]['jawaban_user_tryout']);
        $skor = '';

        $kategori = JawabanUserTryout::join('label_soal_tryout', 'label_soal_tryout.id_label_soal_tryout', '=', 'jawaban_user_tryout.id_label_soal_tryout')->where('jawaban_user_tryout.slug', $slug)->value('id_kategori');
        $skoring_exploded = explode(',', JawabanUserTryout::where('slug', $slug)->value('skor'));

        for ($i=0; $i < 9; $i++) { 
            if(!isset($skoring_exploded[$i])){
                $skoring_exploded[$i] = 0;
            }
        }


        if($kategori == 1){
            $skor = '<div class="table-responsive"><table class="table"><tr><th colspan="2">TPS</th><th colspan="2">TKA</th></tr><tr><td>Matematika Saintek</td><td>'.$skoring_exploded[0].'</td><td>Kemampuan Penalaran Umum</td><td>'.$skoring_exploded[4].'</td></tr><tr><td>Fisika</td><td>'.$skoring_exploded[1].'</td><td>Kemampuan Memahami Bacaan & menulis</td><td>'.$skoring_exploded[5].'</td></tr><tr><td>Kimia</td><td>'.$skoring_exploded[2].'</td><td>Pengetahuan & Pemahaman Umum</td><td>'.$skoring_exploded[6].'</td></tr><tr><td>Biologi</td><td>'.$skoring_exploded[3].'</td><td>Pengetahuan Kuantitatif</td><td>'.$skoring_exploded[7].'</td></tr></table></div>';
        } elseif($kategori == 2){
            $skor = '<div class="table-responsive"><table class="table"><tr><th colspan="2">TPS</th><th colspan="2">TKA</th></tr><tr><td>Matematika Soshum</td><td>'.$skoring_exploded[0].'</td><td>Kemampuan Penalaran Umum</td><td>'.$skoring_exploded[4].'</td></tr><tr><td>Geografi</td><td>'.$skoring_exploded[1].'</td><td>Kemampuan Memahami Bacaan & menulis</td><td>'.$skoring_exploded[5].'</td></tr><tr><td>Sejarah</td><td>'.$skoring_exploded[2].'</td><td>Pengetahuan & Pemahaman Umum</td><td>'.$skoring_exploded[6].'</td></tr><tr><td>Ekonomi</td><td>'.$skoring_exploded[3].'</td><td>Pengetahuan Kuantitatif</td><td>'.$skoring_exploded[7].'</td></tr></table></div>';
        } 

        $dijawab = 0;
        $kosong = 0;
        $jumlah = 0;

        for ($i=0; $i < count($skoring_exploded); $i++) { 
            $jumlah = $jumlah + $skoring_exploded[$i];
        }

        for ($i=0; $i < count($id_soal_exploded); $i++) { 
            $data_soal[$i]['slug'] = SoalTryout::where('id_soal_tryout', $id_soal_exploded[$i])->value('slug');

            $kunci_jawaban = SoalTryout::where('id_soal_tryout', $id_soal_exploded[$i])->value('kunci');
            $kunci_exploded = explode(',', $kunci_jawaban);
            $kunci = '';
            if($kunci_exploded[0] == 50){
                $kunci = 'a';
            }elseif($kunci_exploded[1] == 50){
                $kunci = 'b';
            }elseif($kunci_exploded[2] == 50){
                $kunci = 'c';
            }elseif($kunci_exploded[3] == 50){
                $kunci = 'd';
            }elseif($kunci_exploded[4] == 50){
                $kunci = 'e';
            }

            if($jawaban_exploded[$i] != '-'){
                $dijawab = $dijawab + 1;
            } elseif($jawaban_exploded[$i] == '-'){
                $kosong = $kosong + 1;
            }

        }

        return view('user.tryout.pembahasan', compact('label', 'skor', 'dijawab', 'kosong', 'slugs', 'jumlah'), ['soals' => $data_soal]);
    }

    public function pembahasan($slug){
        $data_soal = array(); 

        $jawaban_user_tryout = JawabanUserTryout::join('label_soal_tryout', 'label_soal_tryout.id_label_soal_tryout', '=', 'jawaban_user_tryout.id_label_soal_tryout')
        ->select('jawaban_user_tryout.slug', 'jawaban_user_tryout.id_soal_tryout', 'jawaban_user_tryout.jawaban_user_tryout')
        ->where('id_user', Auth::user()->id_user)
        ->where('jawaban_user_tryout.slug', $slug)
        ->get();

        $id_soal_exploded = explode(",", $jawaban_user_tryout[0]['id_soal_tryout']);
        $jawaban_exploded = explode(",", $jawaban_user_tryout[0]['jawaban_user_tryout']);

        $data = [
            [
                'nomor' => '',
                'id_soal_tryout' => '',
                'soal_tryout' => '',
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
            $soal = SoalTryout::where('id_soal_tryout', $id_soal_exploded[$i])->value('soal_tryout');
            $kunci_jawaban = SoalTryout::where('id_soal_tryout', $id_soal_exploded[$i])->value('kunci');
            $kunci_exploded = explode(',', $kunci_jawaban);
            $kunci = '';
            $a = SoalTryout::where('id_soal_tryout', $id_soal_exploded[$i])->value('a');
            $b = SoalTryout::where('id_soal_tryout', $id_soal_exploded[$i])->value('b');
            $c = SoalTryout::where('id_soal_tryout', $id_soal_exploded[$i])->value('c');
            $d = SoalTryout::where('id_soal_tryout', $id_soal_exploded[$i])->value('d');
            $e = SoalTryout::where('id_soal_tryout', $id_soal_exploded[$i])->value('e');

            $data_skoring = SoalTryout::where('id_soal_tryout', $id_soal_exploded[$i])->value('kunci');
            $skoring_exploded = explode(',', $data_skoring);

            $kunci = 'Opsi A = ' . $skoring_exploded[0].'<br>'.'Opsi B = ' . $skoring_exploded[1].'<br>'.'Opsi C = ' . $skoring_exploded[2].'<br>'.'Opsi D = ' . $skoring_exploded[3].'<br>'.'Opsi E = ' . $skoring_exploded[4];

            $pembahasan = SoalTryout::where('id_soal_tryout', $id_soal_exploded[$i])->value('pembahasan');
            $jawaban = $jawaban_exploded[$i];
            $data[$i]['nomor'] = $nomor;
            $data[$i]['id_soal_tryout'] = $id_soal_exploded[$i];
            $data[$i]['soal_tryout'] = $soal;
            $data[$i]['a'] = $a;
            $data[$i]['b'] = $b;
            $data[$i]['c'] = $c;
            $data[$i]['d'] = $d;
            $data[$i]['e'] = $e;
            $data[$i]['kunci'] = $kunci;
            $data[$i]['jawaban'] = $jawaban;
            $data[$i]['pembahasan'] = $pembahasan;
            $data_soal[$i]['slug'] = SoalTryout::where('id_soal_tryout', $id_soal_exploded[$i])->value('slug');
        }

        return response()->json($data);
    }

    public function hasilTryout(Request $request){
        $data = JawabanUserTryout::join('label_soal_tryout', 'label_soal_tryout.id_label_soal_tryout', '=', 'jawaban_user_tryout.id_label_soal_tryout')
        ->select('nama_label', 'tgl_mengerjakan', 'jawaban_user_tryout.slug as slugs')
        ->where('jawaban_user_tryout.id_user', Auth::user()->id_user)->orderBy('id_jawaban_user_tryout', 'DESC')->get();

        if($request->ajax()){
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('pembahasan', function($row){
                $btn = '<a type="button" href="/user/tryout/pembahasan/'.$row->slugs.'" class="btn btn-primary">Pembahasan</a>';
                return $btn;
            })
            ->rawColumns(['pembahasan'])
            ->make(true);
        }

        return view('user.tryout.hasil');
    }
}
