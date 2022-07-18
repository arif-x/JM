<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Keranjang;
use App\Models\PaketAktif;
use App\Models\User;
use App\Models\Paket;
use Carbon\Carbon;
use App\Mail\PembayaranDikonfirmasi;
use App\Mail\PembayaranDitolak;
use App\Models\SaldoKomisi;
use DataTables;
use Mail;

class PembayaranController extends Controller
{
    public function index(Request $request){
        $data = Keranjang::join('paket', 'paket.id_paket', '=', 'keranjang.id_paket')
        ->join('kategori', 'kategori.id_kategori', '=', 'keranjang.id_kategori')
        ->join('jenis_kampus', 'jenis_kampus.id_jenis_kampus', '=', 'keranjang.id_jenis_kampus')
        ->join('users', 'users.id_user', '=', 'keranjang.id_user')
        ->orderBy('id_keranjang', 'DESC')->get();
        if($request->ajax()){
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                if($row->status_pembayaran == 4){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_keranjang.'" data-original-title="Edit" class="edit-lihat btn btn-primary btn-sm lihat-data">Lihat</a>';
                    return $btn;   
                } elseif($row->status_pembayaran == 2){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_keranjang.'" data-original-title="Edit" class="edit btn btn-primary btn-sm edit-data">Konfirmasi</a>';
                    $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_keranjang.'" data-original-title="Edit" class="edit-lihat btn btn-primary btn-sm lihat-data">Lihat</a>';
                    return $btn;   
                }  elseif($row->status_pembayaran == 3){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_keranjang.'" data-original-title="Edit" class="edit btn btn-primary btn-sm edit-data">Konfirmasi</a>';
                    $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_keranjang.'" data-original-title="Edit" class="edit-lihat btn btn-primary btn-sm lihat-data">Lihat</a>';
                    return $btn;   
                } elseif($row->status_pembayaran != 2 || $row->status_pembayaran != 4 || $row->status_pembayaran != 3){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_keranjang.'" data-original-title="Edit" class="edit-lihat btn btn-primary btn-sm lihat-data">Lihat</a>';
                    return $btn; 
                }
            })
            ->addColumn('status', function($row){
                $data = '';
                if($row->status_pembayaran == 1){
                    $data = '<span class="text-danger">Belum Dibayar</span>';
                }elseif($row->status_pembayaran == 2){
                    $data = '<span class="text-danger">Perlu Dikonfirmasi</span>';
                }elseif($row->status_pembayaran == 3){
                    $data = '<span class="text-danger">Ditolak</span>';
                }elseif($row->status_pembayaran == 4){
                    $data = '<span class="text-primary">Dikonfirmasi</span>';
                }
                return $data;
            }) 
            ->addColumn('metode', function($row){
                $data = '';
                if($row->metode_pembayaran == 1){
                    $data = 'Transfer Rekening';
                }elseif($row->metode_pembayaran == 2){
                    $data = 'Saldo Komisi';
                }
                return $data;
            }) 
            ->addColumn('jumlah', function($row){
                $jumlah = $row->harga - ($row->harga * ($row->diskon / 100));
                return "Rp. ".number_format($jumlah, 0);
            }) 
            ->rawColumns(['action', 'status', 'metode'])
            ->make(true);
        }
        return view('admin.pembayaran');
    }

    public function show($id){
        $data = Keranjang::join('paket', 'paket.id_paket', '=', 'keranjang.id_paket')
        ->join('kategori', 'kategori.id_kategori', '=', 'keranjang.id_kategori')
        ->join('jenis_kampus', 'jenis_kampus.id_jenis_kampus', '=', 'keranjang.id_jenis_kampus')
        ->join('users', 'users.id_user', '=', 'keranjang.id_user')->find($id);

        $data->jumlah = "Rp. ".number_format($data->harga - ($data->harga * ($data->diskon / 100)), 0);

        return response()->json($data);
    }

    public function store(Request $request)
    {
        if(!empty($request->file('bukti'))){
            $file = $request->file('bukti');
            $fileName = rand().$file->getClientOriginalName();
            $file->move(storage_path('app/public/bukti-pembayaran/'),$fileName);

            $data = Keranjang::updateOrCreate(
                ['id_keranjang' => $request->id_keranjang],
                [
                    'status_pembayaran' => $request->status_pembayaran,
                    'bukti_pembayaran' => url('/').'/storage/bukti-pembayaran/'.$fileName,
                    'tgl_dikonfirmasi' => Carbon::now()->format('Y-m-d'),
                ]
            );
        } else {
            $data = Keranjang::updateOrCreate(
                ['id_keranjang' => $request->id_keranjang],
                [
                    'status_pembayaran' => $request->status_pembayaran,
                    'tgl_dikonfirmasi' => Carbon::now()->format('Y-m-d'),
                ]
            );
        }


        $email = User::where('id_user', $request->id_user)->value('email');
        $nama_paket = Paket::where('id_paket', $request->id_paket)->value('nama_paket');
        $harga = Paket::where('id_paket', $request->id_paket)->value('harga');
        $kode = Keranjang::where('id_keranjang', $request->id_keranjang)->value('kode');

        if($request->status_pembayaran == 4){
            $mailData = [
                'title' => 'Pembayaran Dikonfirmasi',
                'body' => 'Pembayaran Paket '.$nama_paket.' dengan Harga '.$harga.' Dikonfirmasi.<br/>Kode Transaksi: '.$kode.''
            ];

            Mail::to($email)->send(new PembayaranDikonfirmasi($mailData));

            $checkPaketAktif = PaketAktif::where('id_user', $request->id_user)->first();

            if(empty($checkPaketAktif)){
                $kode_referrer = User::where('id_user', $request->id_user)->value('referrer');
                $kode_referee = User::where('id_user', $request->id_user)->value('referral');
                $email_referrer = User::where('referral', $kode_referrer)->value('email');
                $email_referee = User::where('referral', $kode_referee)->value('email');
                $id_user_referrer = User::where('referral', $kode_referrer)->value('id_user');

                SaldoKomisi::insert([
                    'id_user' => $id_user_referrer,
                    'email_referrer' => $email_referrer,
                    'email_referee' => $email_referee,
                    'referrer' => $kode_referrer,
                    'referee' => $kode_referee,
                    'kode' => $kode,
                    'saldo' => '50000'
                ]);
            }

            $now = Carbon::now();
            $addNow = Carbon::now()->addDays(180);
            $insert = PaketAktif::updateOrCreate(
                ['id_user' => $request->id_user],
                [
                    'id_user' => $request->id_user,
                    'id_paket' => $request->id_paket,
                    'id_kategori' => $request->id_kategori,
                    'id_jenis_kampus' => $request->id_jenis_kampus,
                    'tgl_aktif' => $now->format('d/m/Y'),
                    'tgl_limit' => $addNow->format('d/m/Y'),
                    'status_paket_aktif' => 1,
                ]
            );

        } elseif($request->status_pembayaran == 3){
            $mailData = [
                'title' => 'Pembayaran Ditolak',
                'body' => 'Pembayaran Paket '.$nama_paket.' dengan Harga '.$harga.' Ditolak.<br/>Kode Transaksi: '.$kode.''
            ];
            
            Mail::to($email)->send(new PembayaranDitolak($mailData));
        }


        return response()->json($data);
    }

    public function destroy($id){
        $data = Keranjang::find($id)->delete();
        return response()->json($data);
    }
}
