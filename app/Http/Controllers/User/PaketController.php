<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paket;
use App\Models\Kategori;
use App\Models\User;
use App\Models\Keranjang;
use App\Models\PaketAktif;
use Carbon\Carbon;
use Auth;

class PaketController extends Controller
{
    public function index(){
        $data = Paket::get();
        $kategori = Kategori::pluck('nama_kategori', 'id_kategori');
        $cek = PaketAktif::where('id_user', Auth::user()->id_user)->first();
        if(empty($cek)){
            $paket_aktif = [
                [
                    'nama_paket' => 'Gratis',
                    'tgl_limit' => '-'
                ]
            ];
        } else {
            $paket_aktif = PaketAktif::join('paket', 'paket.id_paket', '=', 'paket_aktif.id_paket')->where('id_user', Auth::user()->id_user)->get();
        }

        return view('user.paket', ['pakets' => $data, 'paket_aktifs' => $paket_aktif], compact('kategori'));
    }

    public function getPaket($id){
        $data = Paket::find($id);
        return response()->json($data);
    }

    public function store(Request $request){
        $jenis_kampus = User::join('universitas', 'universitas.id_universitas', '=', 'users.id_universitas')->join('jenis_kampus', 'jenis_kampus.id_jenis_kampus', '=', 'universitas.id_jenis_kampus')->value('universitas.id_jenis_kampus');

        Keranjang::insert([
            'id_user' => Auth::user()->id_user,
            'id_jenis_kampus' => $jenis_kampus,
            'id_kategori' => $request->id_kategori,
            'id_paket' => $request->id_paket,
            'tgl_pesan' => Carbon::now()->format('d-m-Y'),
            'tgl_limit_bayar' => Carbon::now()->addDays(7)->format('d-m-Y'),
            'status_pembayaran' => 1,
        ]);

        return redirect(route('user.invoice'));
    }
}
