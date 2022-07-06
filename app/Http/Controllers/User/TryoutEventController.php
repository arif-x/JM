<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SoalTryoutEvent;
use App\Models\User;
use App\Models\LabelSoalTryoutEvent;
use App\Models\StatusMengerjakanTryoutEvent;
use App\Models\JawabanUserTryoutEvent;
use App\Models\LaporanSoalTryoutEvent;
use Auth;
use File;
use DB;
use Str;
use Carbon\Carbon;
use DataTables;

class TryoutEventController extends Controller
{
    public function index(){
        $tps = LabelSoalTryoutEvent::join('soal_tryout_event', 'soal_tryout_event.id_label_soal_tryout_event', '=', 'label_soal_tryout_event.id_label_soal_tryout_event')
        ->join('paket', 'paket.id_paket', '=', 'label_soal_tryout_event.id_paket')
        // ->where('label_soal_tryout_event.id_jenis_soal', 1)
        ->select('label_soal_tryout_event.id_label_soal_tryout_event', 'nama_paket', 'label_soal_tryout_event.slug' , 'label_soal_tryout_event.nama_label', 'label_soal_tryout_event.tgl_mulai', 'label_soal_tryout_event.tgl_end', DB::raw("count(soal_tryout_event.id_label_soal_tryout_event) as counts"))
        ->groupBy('soal_tryout_event.id_label_soal_tryout_event')
        ->orderBy('label_soal_tryout_event.id_label_soal_tryout_event')
        ->get();

        // $tka = LabelSoalTryoutEvent::join('soal_tryout_event', 'soal_tryout_event.id_label_soal_tryout_event', '=', 'label_soal_tryout_event.id_label_soal_tryout_event')
        // ->join('paket', 'paket.id_paket', '=', 'label_soal_tryout_event.id_paket')
        // ->where('label_soal_tryout_event.id_jenis_soal', 2)
        // ->select('label_soal_tryout_event.id_label_soal_tryout_event', 'nama_paket', 'label_soal_tryout_event.slug' , 'label_soal_tryout_event.nama_label', DB::raw("count(soal_tryout_event.id_label_soal_tryout_event) as counts"))
        // ->groupBy('soal_tryout_event.id_label_soal_tryout_event')
        // ->get();

        // $inggris = LabelSoalTryoutEvent::join('soal_tryout_event', 'soal_tryout_event.id_label_soal_tryout_event', '=', 'label_soal_tryout_event.id_label_soal_tryout_event')
        // ->join('paket', 'paket.id_paket', '=', 'label_soal_tryout_event.id_paket')
        // ->where('label_soal_tryout_event.id_jenis_soal', 3)
        // ->select('label_soal_tryout_event.id_label_soal_tryout_event', 'nama_paket', 'label_soal_tryout_event.slug' , 'label_soal_tryout_event.nama_label', DB::raw("count(soal_tryout_event.id_label_soal_tryout_event) as counts"))
        // ->groupBy('soal_tryout_event.id_label_soal_tryout_event')
        // ->get();

        $slug = StatusMengerjakanTryoutEvent::join('label_soal_tryout_event', 'label_soal_tryout_event.id_label_soal_tryout_event', '=', 'status_mengerjakan_tryout_event.id_label_soal_tryout_event')->where('status_mengerjakan_tryout_event.status', 1)->where('id_user', Auth::user()->id_user)->value('label_soal_tryout_event.slug');

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

        return view('user.tryout-event.tryout-event', ['tps' => $tps], compact('modal'));
    }

    public function ready($slug){
        $checkSoal = LabelSoalTryoutEvent::join('soal_tryout_event', 'soal_tryout_event.id_label_soal_tryout_event', '=', 'label_soal_tryout_event.id_label_soal_tryout_event')
        ->join('paket', 'paket.id_paket', '=', 'label_soal_tryout_event.id_paket')
        ->join('kategori', 'kategori.id_kategori', '=', 'label_soal_tryout_event.id_kategori')
        ->where('label_soal_tryout_event.slug', $slug)
        ->groupBy('soal_tryout_event.id_label_soal_tryout_event')
        ->value('paket.id_paket');

        $checkPaket = User::join('paket_aktif', 'paket_aktif.id_user', '=', 'users.id_user')->where('paket_aktif.id_user', Auth::user()->id_user)->value('paket_aktif.id_paket');

        if($checkSoal > $checkPaket){
            return redirect()->route('user.paket')->with('success', 'Upgrade Paket Anda Sebelum Mengakses');
        } else {
            $soal = LabelSoalTryoutEvent::join('soal_tryout_event', 'soal_tryout_event.id_label_soal_tryout_event', '=', 'label_soal_tryout_event.id_label_soal_tryout_event')
            ->join('paket', 'paket.id_paket', '=', 'label_soal_tryout_event.id_paket')
            ->join('kategori', 'kategori.id_kategori', '=', 'label_soal_tryout_event.id_kategori')
            ->select('label_soal_tryout_event.id_label_soal_tryout_event', 'nama_paket', 'label_soal_tryout_event.slug' , 'label_soal_tryout_event.nama_label', 'kategori.nama_kategori', DB::raw("count(soal_tryout_event.id_label_soal_tryout_event) as counts"))
            ->where('label_soal_tryout_event.slug', $slug)
            ->groupBy('soal_tryout_event.id_label_soal_tryout_event')
            ->get();
            return view('user.tryout-event.persiapan', ['soals' => $soal]);
        }
    }

    public function kerjakan(Request $request, $slug){
        $checkKupon = LabelSoalTryoutEvent::join('soal_tryout_event', 'soal_tryout_event.id_label_soal_tryout_event', '=', 'label_soal_tryout_event.id_label_soal_tryout_event')
        ->join('paket', 'paket.id_paket', '=', 'label_soal_tryout_event.id_paket')
        ->join('kategori', 'kategori.id_kategori', '=', 'label_soal_tryout_event.id_kategori')
        ->where('label_soal_tryout_event.slug', $slug)
        ->groupBy('soal_tryout_event.id_label_soal_tryout_event')
        ->value('label_soal_tryout_event.kupon');

        $start = LabelSoalTryoutEvent::join('soal_tryout_event', 'soal_tryout_event.id_label_soal_tryout_event', '=', 'label_soal_tryout_event.id_label_soal_tryout_event')
        ->join('paket', 'paket.id_paket', '=', 'label_soal_tryout_event.id_paket')
        ->join('kategori', 'kategori.id_kategori', '=', 'label_soal_tryout_event.id_kategori')
        ->where('label_soal_tryout_event.slug', $slug)
        ->groupBy('soal_tryout_event.id_label_soal_tryout_event')
        ->value('label_soal_tryout_event.tgl_mulai');

        $end = LabelSoalTryoutEvent::join('soal_tryout_event', 'soal_tryout_event.id_label_soal_tryout_event', '=', 'label_soal_tryout_event.id_label_soal_tryout_event')
        ->join('paket', 'paket.id_paket', '=', 'label_soal_tryout_event.id_paket')
        ->join('kategori', 'kategori.id_kategori', '=', 'label_soal_tryout_event.id_kategori')
        ->where('label_soal_tryout_event.slug', $slug)
        ->groupBy('soal_tryout_event.id_label_soal_tryout_event')
        ->value('label_soal_tryout_event.tgl_end');

        if($request->kupon != $checkKupon){
            return redirect()->back()->with('success', 'Kode Kupon Salah!');
        } elseif (!Carbon::now()->between($start, $end)){
            return redirect()->back()->with('success', 'Event Tryout Belum Dimulai atau Sudah Berkahir!');
        } elseif ($request->kupon == $checkKupon && Carbon::now()->between($start, $end)){
            $checkSoal = LabelSoalTryoutEvent::join('soal_tryout_event', 'soal_tryout_event.id_label_soal_tryout_event', '=', 'label_soal_tryout_event.id_label_soal_tryout_event')
            ->join('paket', 'paket.id_paket', '=', 'label_soal_tryout_event.id_paket')
            ->join('kategori', 'kategori.id_kategori', '=', 'label_soal_tryout_event.id_kategori')
            ->where('label_soal_tryout_event.slug', $slug)
            ->groupBy('soal_tryout_event.id_label_soal_tryout_event')
            ->value('paket.id_paket');

            $checkPaket = User::join('paket_aktif', 'paket_aktif.id_user', '=', 'users.id_user')->where('paket_aktif.id_user', Auth::user()->id_user)->value('paket_aktif.id_paket');

            if($checkSoal > $checkPaket){
                return redirect()->route('user.paket')->with('success', 'Upgrade Paket Anda Sebelum Mengakses');
            } else {
                $soal = SoalTryoutEvent::join('label_soal_tryout_event', 'label_soal_tryout_event.id_label_soal_tryout_event', '=', 'soal_tryout_event.id_label_soal_tryout_event')->where('label_soal_tryout_event.slug', $slug)->select('soal_tryout_event', 'soal_tryout_event.slug')->get();
                $soal_json = SoalTryoutEvent::join('label_soal_tryout_event', 'label_soal_tryout_event.id_label_soal_tryout_event', '=', 'soal_tryout_event.id_label_soal_tryout_event')->where('label_soal_tryout_event.slug', $slug)->inRandomOrder()->get();
                $label = LabelSoalTryoutEvent::where('label_soal_tryout_event.slug', $slug)->value('nama_label');
                $id_label = LabelSoalTryoutEvent::where('label_soal_tryout_event.slug', $slug)->value('id_label_soal_tryout_event');

                $data = [
                    'id_soal_tryout_event' => '',
                    'id_label' => '',
                    'nomor' => '',
                    'soal_tryout_event' => '',
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
                    $data['id_soal_tryout_event'] = $value['id_soal_tryout_event'];
                    $data['id_label'] = $id_label;
                    $data['nomor'] = $no++;
                    $data['soal_tryout_event'] = $value['soal_tryout_event'];
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

                $checkStatusExcept = StatusMengerjakanTryoutEvent::join('label_soal_tryout_event', 'label_soal_tryout_event.id_label_soal_tryout_event', '=', 'status_mengerjakan_tryout_event.id_label_soal_tryout_event')->where('label_soal_tryout_event.slug', '!=', $slug)->where('status_mengerjakan_tryout_event.status', 1)->where('id_user', Auth::user()->id_user)->first();

                if(empty($checkStatusExcept)){
                    $checkStatusFound = StatusMengerjakanTryoutEvent::where('id_user', Auth::user()->id_user)->where('status', 1)->first();
                    if(empty($checkStatusFound)){
                        StatusMengerjakanTryoutEvent::insert([
                            'id_user' => Auth::user()->id_user,
                            'id_label_soal_tryout_event' => $id_label,
                            'waktu_mengerjakan' => Carbon::now()->toDateTimeString(),
                            'waktu_berakhir' => Carbon::now()->addMinutes(50)->toDateTimeString(),
                            'status' => 1,
                        ]); 
                    }
                } else {
                    $slug_old = StatusMengerjakanTryoutEvent::join('label_soal_tryout_event', 'label_soal_tryout_event.id_label_soal_tryout_event', '=', 'status_mengerjakan_tryout_event.id_label_soal_tryout_event')->where('label_soal_tryout_event.slug', '!=',$slug)->where('status_mengerjakan_tryout_event.status', 1)->where('id_user', Auth::user()->id_user)->value('label_soal_tryout_event.slug');
                    return redirect()->route('user.tryout.kerjakan', $slug_old);
                }


                $timer = StatusMengerjakanTryoutEvent::join('label_soal_tryout_event', 'label_soal_tryout_event.id_label_soal_tryout_event', '=', 'status_mengerjakan_tryout_event.id_label_soal_tryout_event')->where('label_soal_tryout_event.slug', $slug)->where('id_user', Auth::user()->id_user)->select(DB::raw("TIME_TO_SEC(TIMEDIFF(NOW(), waktu_berakhir)) * -1 AS timer"))->orderBy('id_status_mengerjakan_tryout_event')->limit(1)->value('timer');

                $end = StatusMengerjakanTryoutEvent::join('label_soal_tryout_event', 'label_soal_tryout_event.id_label_soal_tryout_event', '=', 'status_mengerjakan_tryout_event.id_label_soal_tryout_event')->where('label_soal_tryout_event.slug', $slug)->where('id_user', Auth::user()->id_user)->where('status', 1)->value('waktu_berakhir');

                if(file_exists(storage_path("app/public/jawaban/tryout-event/".Auth::user()->email.".json"))){
                    $json = File::get(storage_path("app/public/jawaban/tryout-event/".Auth::user()->email.".json"));
                } else {
                    File::put(storage_path("app/public/jawaban/tryout-event/".Auth::user()->email.".json"), $newJson);   
                }

                return view('user.tryout-event.single', ['soals' => $soal], compact('label', 'timer', 'end'));
            }
        }
    }

    public function firstSoal($slug){
        $data = SoalTryoutEvent::select('soal_tryout_event', 'a', 'b', 'c', 'd', 'e')->where('slug', $slug)->get();
        return response()->json($data);
    }

    public function getSoal($slug){
        $data = SoalTryoutEvent::select('soal_tryout', 'a', 'b', 'c', 'd', 'e')->where('slug', $slug)->get();
        return response()->json($data);
    }

    public function getJawaban($no){
        $jawaban = '';
        $json = File::get(storage_path("app/public/jawaban/tryout-event/".Auth::user()->email.".json"));  
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
        $json = File::get(storage_path("app/public/jawaban/tryout-event/".Auth::user()->email.".json"));
        $data = json_decode($json, true);
        foreach ($data as $key => $entry) {
            $data_jawaban['nomor'] = $data[$key]['nomor'];
            $data_jawaban['jawaban'] = $data[$key]['jawaban'];
            array_push($jawaban, $data_jawaban);
        }   
        return json_encode($jawaban);
    }

    public function store(Request $request){
        $oldJson = File::get(storage_path("app/public/jawaban/tryout-event/".Auth::user()->email.".json"));
        $data = json_decode($oldJson, true);

        foreach ($data as $key => $entry) {
            if ($entry['nomor'] == $request->no) {
                $data[$key]['jawaban'] = $request->jawaban;
            }
        }

        $newJson = json_encode($data);
        File::put(storage_path("app/public/jawaban/tryout-event/".Auth::user()->email.".json"), $newJson);
        return json_encode($newJson);
    }

    public function finish(){
        $oldJson = File::get(storage_path("app/public/jawaban/tryout-event/".Auth::user()->email.".json"));
        $jsonData = json_decode($oldJson, true);

        $id_label = [];
        $id_soal_tryout_event = [];
        $jawaban = [];
        $start = [];
        $skor = 0;

        foreach ($jsonData as $key => $entry) {
            array_push($id_label, $jsonData[$key]['id_label']);
            array_push($id_soal_tryout_event, $jsonData[$key]['id_soal_tryout_event']);
            array_push($jawaban, $jsonData[$key]['jawaban']);
            array_push($start, $jsonData[$key]['waktu_mengerjakan']);
            $kunci = SoalTryoutEvent::where('id_soal_tryout_event', $jsonData[$key]['id_soal_tryout_event'])->value('kunci');
            if($jsonData[$key]['jawaban'] == $kunci){
                $skor = $skor + 1;
            } else {
                $skor = $skor + 0;
            }
        }

        $id_label = $id_label[0];
        $start = $start[0];

        $id_soal_tryout_event_imploded = implode(",", $id_soal_tryout_event);
        $jawaban_imploded = implode(",", $jawaban);

        $check = JawabanUserTryoutEvent::where('id_user', Auth::user()->id_user)->where('id_label_soal_tryout_event', $id_label)->where('tgl_mengerjakan', $start)->first();

        StatusMengerjakanTryoutEvent::where('id_user', Auth::user()->id_user)->update([
            'status' => 2,
        ]);

        $slugs = encrypt(Carbon::now()->timestamp.Str::random(5));

        if(empty($check)){
            $data = JawabanUserTryoutEvent::insert([
                'id_user' => Auth::user()->id_user,
                'id_label_soal_tryout_event' => $id_label,
                'tgl_mengerjakan' => $start,
                'jawaban_user_tryout_event' => $jawaban_imploded,
                'id_soal_tryout_event' => $id_soal_tryout_event_imploded,
                'skor' => $skor,
                'slug' => $slugs
            ]);
        }

        File::delete(storage_path("app/public/jawaban/tryout-event/".Auth::user()->email.".json"));
        // return redirect()->route('user.tryout.pembahasan', $slugs);
        return response()->json($slugs);
    }

    public function report(Request $request){
        $id_soal = '';
        $oldJson = File::get(storage_path("app/public/jawaban/tryout-event/".Auth::user()->email.".json"));
        $data = json_decode($oldJson, true);

        foreach ($data as $key => $entry) {
            if ($entry['nomor'] == $request->no) {
                $id_soal = $data[$key]['id_soal'];
            }
        }

        $data = LaporanSoalTryoutEvent::insert([
            'id_soal' => $id_soal,
            'kategori' => $request->kategori,
            'pesan' => $request->pesan,
        ]);

        return response()->json($data);
    }

    public function reportPembahasan(Request $request){
        $id_soal = '';

        $data = LaporanSoalTryoutEvent::insert([
            'id_soal' => $request->no,
            'kategori' => $request->kategori,
            'pesan' => $request->pesan,
        ]);

        return response()->json($data);
    }

    public function cancel(){
        $oldJson = File::get(storage_path("app/public/jawaban/tryout-event/".Auth::user()->email.".json"));
        $jsonData = json_decode($oldJson, true);
        StatusMengerjakanTryoutEvent::where('id_user', Auth::user()->id_user)->update([
            'status' => 2,
        ]);
        return File::delete(storage_path("app/public/jawaban/tryout-event/".Auth::user()->email.".json"));
    }

    public function cancelAndContinue(Request $request, $slug){
        $slug = $request->slug;
        $this->cancel();
        return redirect()->route('user.tryout.ready', $slug);
    }

    public function pembahasanIndex($slug){
        $label = LabelSoalTryoutEvent::join('jawaban_user_tryout_event', 'jawaban_user_tryout_event.id_label_soal_tryout_event', '=', 'label_soal_tryout_event.id_label_soal_tryout_event')->where('jawaban_user_tryout_event.slug', $slug)->value('nama_label');
        $data_soal = array();

        $jawaban_user_tryout_event = JawabanUserTryoutEvent::join('label_soal_tryout_event', 'label_soal_tryout_event.id_label_soal_tryout_event', '=', 'jawaban_user_tryout_event.id_label_soal_tryout_event')
        ->where('id_user', Auth::user()->id_user)
        ->where('jawaban_user_tryout_event.slug', $slug)
        ->get();

        $slugs = JawabanUserTryoutEvent::join('label_soal_tryout_event', 'label_soal_tryout_event.id_label_soal_tryout_event', '=', 'jawaban_user_tryout_event.id_label_soal_tryout_event')
        ->where('id_user', Auth::user()->id_user)
        ->where('jawaban_user_tryout_event.slug', $slug)
        ->value('jawaban_user_tryout_event.slug');

        $id_soal_exploded = explode(",", $jawaban_user_tryout_event[0]['id_soal_tryout_event']);
        $jawaban_exploded = explode(",", $jawaban_user_tryout_event[0]['jawaban_user_tryout_event']);
        $skor = $jawaban_user_tryout_event[0]['skor'];

        $benar = 0;
        $salah = 0;
        $kosong = 0;

        for ($i=0; $i < count($id_soal_exploded); $i++) { 
            $kunci = SoalTryoutEvent::where('id_soal_tryout_event', $id_soal_exploded[$i])->value('kunci');
            $data_soal[$i]['slug'] = SoalTryoutEvent::where('id_soal_tryout_event', $id_soal_exploded[$i])->value('slug');
            if($jawaban_exploded[$i] == $kunci){
                $benar = $benar + 1;
            } elseif($jawaban_exploded[$i] != $kunci && $jawaban_exploded[$i] != '-'){
                $salah = $salah + 1;
            } elseif($jawaban_exploded[$i] == '-'){
                $kosong = $kosong + 1;
            }
        }

        return view('user.tryout-event.pembahasan', compact('label', 'skor', 'benar', 'salah', 'kosong', 'slugs'), ['soals' => $data_soal]);
    }

    public function pembahasan($slug){
        $data_soal = array(); 

        $jawaban_user_tryout_event = JawabanUserTryoutEvent::join('label_soal_tryout_event', 'label_soal_tryout_event.id_label_soal_tryout_event', '=', 'jawaban_user_tryout_event.id_label_soal_tryout_event')
        ->where('id_user', Auth::user()->id_user)
        ->orderBy('id_jawaban_user_tryout_event', 'DESC')
        ->limit(1)
        ->get();

        $id_soal_exploded = explode(",", $jawaban_user_tryout_event[0]['id_soal_tryout_event']);
        $jawaban_exploded = explode(",", $jawaban_user_tryout_event[0]['jawaban_user_tryout_event']);

        $data = [
            [
                'nomor' => '',
                'id_soal_tryout_event' => '',
                'soal_tryout_event' => '',
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
            $soal = SoalTryoutEvent::where('id_soal_tryout_event', $id_soal_exploded[$i])->value('soal_tryout_event');
            $kunci = SoalTryoutEvent::where('id_soal_tryout_event', $id_soal_exploded[$i])->value('kunci');
            $a = SoalTryoutEvent::where('id_soal_tryout_event', $id_soal_exploded[$i])->value('a');
            $b = SoalTryoutEvent::where('id_soal_tryout_event', $id_soal_exploded[$i])->value('b');
            $c = SoalTryoutEvent::where('id_soal_tryout_event', $id_soal_exploded[$i])->value('c');
            $d = SoalTryoutEvent::where('id_soal_tryout_event', $id_soal_exploded[$i])->value('d');
            $e = SoalTryoutEvent::where('id_soal_tryout_event', $id_soal_exploded[$i])->value('e');
            $pembahasan = SoalTryoutEvent::where('id_soal_tryout_event', $id_soal_exploded[$i])->value('pembahasan');
            $jawaban = $jawaban_exploded[$i];
            $data[$i]['nomor'] = $nomor;
            $data[$i]['id_soal_tryout_event'] = $id_soal_exploded[$i];
            $data[$i]['soal_tryout_event'] = $soal;
            $data[$i]['a'] = $a;
            $data[$i]['b'] = $b;
            $data[$i]['c'] = $c;
            $data[$i]['d'] = $d;
            $data[$i]['e'] = $e;
            $data[$i]['kunci'] = $kunci;
            $data[$i]['jawaban'] = $jawaban;
            $data[$i]['pembahasan'] = $pembahasan;
            $data_soal[$i]['slug'] = SoalTryoutEvent::where('id_soal_tryout_event', $id_soal_exploded[$i])->value('slug');
        }

        return response()->json($data);
    }

    public function hasilTryout(Request $request, $slug){
        $data = JawabanUserTryoutEvent::join('label_soal_tryout_event', 'label_soal_tryout_event.id_label_soal_tryout_event', '=', 'jawaban_user_tryout_event.id_label_soal_tryout_event')
        ->join('jenis_soal', 'jenis_soal.id_jenis_soal', '=', 'label_soal_tryout_event.id_jenis_soal')
        ->select('jenis_soal', 'nama_label', 'tgl_mengerjakan', 'jawaban_user_tryout_event.slug as slugs', 'skor')
        ->groupBy('id_user')->where('label_soal_tryout_event.slug', $slug)->orderBy('skor', 'DESC')->get();

        $slugs = LabelSoalTryoutEvent::where('slug', $slug)->value('slug');
        $label = LabelSoalTryoutEvent::where('slug', $slug)->value('nama_label');

        if($request->ajax()){
            return Datatables::of($data)
            ->addIndexColumn()
            ->make(true);
        }

        return view('user.tryout-event.hasil', compact('slugs', 'label'));
    }
}
