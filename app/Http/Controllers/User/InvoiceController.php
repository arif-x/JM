<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Keranjang;
use App\Models\Kontak;
use App\Models\Rekening;
use Auth;
use Validator;
use Carbon\Carbon;

class InvoiceController extends Controller
{
    public function index(){
        $reject = Keranjang::join('paket', 'paket.id_paket', '=', 'keranjang.id_paket')->join('jenis_kampus', 'jenis_kampus.id_jenis_kampus', '=', 'keranjang.id_jenis_kampus')->where('status_pembayaran', 3)->where('id_user', Auth::user()->id_user)->get();

        $wait = Keranjang::join('paket', 'paket.id_paket', '=', 'keranjang.id_paket')->join('jenis_kampus', 'jenis_kampus.id_jenis_kampus', '=', 'keranjang.id_jenis_kampus')->where('status_pembayaran', 1)->where('id_user', Auth::user()->id_user)->get();

        $pending = Keranjang::join('paket', 'paket.id_paket', '=', 'keranjang.id_paket')->join('jenis_kampus', 'jenis_kampus.id_jenis_kampus', '=', 'keranjang.id_jenis_kampus')->where('status_pembayaran', 2)->where('id_user', Auth::user()->id_user)->get();

        $success = Keranjang::join('paket', 'paket.id_paket', '=', 'keranjang.id_paket')->join('jenis_kampus', 'jenis_kampus.id_jenis_kampus', '=', 'keranjang.id_jenis_kampus')->where('status_pembayaran', 4)->where('id_user', Auth::user()->id_user)->get();

        $rekening = Rekening::get();
        $kontak = Kontak::get();

        return view('user.invoice', ['rekenings' => $rekening, 'kontaks' => $kontak, 'rejects' => $reject, 'waits' => $wait, 'pendings' => $pending, 'successes' => $success]);
    }

    public function getKeranjang($id){
        $data = Keranjang::join('paket', 'paket.id_paket', '=', 'keranjang.id_paket')->join('jenis_kampus', 'jenis_kampus.id_jenis_kampus', '=', 'keranjang.id_jenis_kampus')->where('status_pembayaran', 1)->where('id_user', Auth::user()->id_user)->find($id);
        return response()->json($data);
    }

    public function store(Request $request){
        $validation = Validator::make($request->all(), [
            'bukti_pembayaran' => "required|mimes:jpg,png,jpeg|max:10000",
        ]);

        if($validation->passes()){
            $files = $request->file('bukti_pembayaran');
            $new_name = url('/storage/bukti-pembayaran') . '/' . Auth::user()->id_user . '-' .Carbon::now()->format('d-m-Y'). '-' .Carbon::now()->format('H-i-s') . '.' . $files->getClientOriginalExtension();
            $file_name = Auth::user()->id_user . '-' .Carbon::now()->format('d-m-Y'). '-' .Carbon::now()->format('H-i-s') . '.' . $files->getClientOriginalExtension();
            $file_val = Auth::user()->id_user . '-' .Carbon::now()->format('d-m-Y'). '-' .Carbon::now()->format('H-i-s');
            $files->move(storage_path('app/public/bukti-pembayaran'), $file_name);
            $type = $files->getClientOriginalExtension();

            Keranjang::where('id_keranjang', $request->id_keranjang)->where('id_user', Auth::user()->id_user)->update([
                'bukti_pembayaran' => $new_name,
                'status_pembayaran' => 2
            ]); 

            return back()->with('success', 'Berhasil Mengunggah Bukti Pembayaran');    
        } else {
            return back()->with('success', 'Mohon Periksa File Anda');
        }
    }
}
