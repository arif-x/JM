<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Universitas;
use App\Models\PaketAktif;
use Auth;
use Hash;
use Crypt;

class ProfilController extends Controller
{
    public function index(){
        $user_data = User::join('universitas', 'universitas.id_universitas', '=', 'users.id_universitas')->select('nama_lengkap', 'email', 'no_hp', 'nama_universitas', 'avatar', 'users.id_universitas')->get();
        $universitas = Universitas::pluck('nama_universitas', 'id_universitas');
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
        return view('user.profil', ['user_datas' => $user_data, 'paket_aktifs' => $paket_aktif], compact('universitas'));
    }

    public function storeProfil(Request $request){
        User::where('id_user', Auth::user()->id_user)->update([
            'nama_lengkap' => $request->nama_lengkap,
            'no_hp' => $request->no_hp,
            'id_universitas' => $request->id_universitas,
        ]);
        return back()->with('success', 'Data Profil Diubah!');
    }

    public function storePassword(Request $request){
        $check = User::where('id_user', Auth::user()->id_user)->value('password');
        if(Hash::check($request->old_password, Auth::user()->password)){
            User::where('id_user', Auth::user()->id_user)->update([
                'password' => Hash::make($request->new_password),
            ]);
            return back()->with('success', 'Password Diubah!');
        } else {
            return back()->with('success', 'Password Gagal Diubah, Periksa Password Lama!');
        }
    }
}
