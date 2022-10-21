<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LabelMateri;
use App\Models\Materi;
use App\Models\User;
use Auth;
use DB;

class MateriController extends Controller
{
    public function indexText(){
        $tps = LabelMateri::join('materi', 'materi.id_label_materi', '=', 'label_materi.id_label_materi')
        ->join('paket', 'paket.id_paket', '=', 'label_materi.id_paket')
        ->where('label_materi.jenis_materi', 1)
        ->select('label_materi.id_label_materi', 'nama_paket', 'label_materi.slug', 'materi.slug as slug_materi', 'label_materi.nama_label', 'materi.judul_materi', 'materi.deskripsi')
        ->get();
        
        $tka = LabelMateri::join('materi', 'materi.id_label_materi', '=', 'label_materi.id_label_materi')
        ->join('paket', 'paket.id_paket', '=', 'label_materi.id_paket')
        ->where('label_materi.jenis_materi', 2)
        ->select('label_materi.id_label_materi', 'nama_paket', 'label_materi.slug', 'materi.slug as slug_materi', 'label_materi.nama_label', 'materi.judul_materi', 'materi.deskripsi')
        ->get();

        $inggris = LabelMateri::join('materi', 'materi.id_label_materi', '=', 'label_materi.id_label_materi')
        ->join('paket', 'paket.id_paket', '=', 'label_materi.id_paket')
        ->where('label_materi.jenis_materi', 3)
        ->select('label_materi.id_label_materi', 'nama_paket', 'label_materi.slug', 'materi.slug as slug_materi', 'label_materi.nama_label', 'materi.judul_materi', 'materi.deskripsi')
        ->get();

        return view('user.materi.text', ['tps' => $tps, 'tka' => $tka, 'inggris' => $inggris]);
    }

    public function singleText($slug){
        $checkPaket = User::join('paket_aktif', 'paket_aktif.id_user', '=', 'users.id_user')->where('paket_aktif.id_user', Auth::user()->id_user)->where('status_paket_aktif', 1)->value('paket_aktif.id_paket');

        if($checkPaket < 2){
            return redirect()->route('user.paket')->with('upgrade', 'Upgrade Paket Anda Sebelum Mengakses');
        } else {
            $materi = Materi::join('label_materi', 'label_materi.id_label_materi', '=', 'materi.id_label_materi')
            ->select('materi.*', 'label_materi.jenis_materi')
            ->where('materi.slug', $slug)->get();

            if($materi[0]->jenis_materi == 1){
                $materi[0]->jenis = 'TPS';
            } elseif($materi[0]->jenis_materi == 2){
                $materi[0]->jenis = 'TKA';
            } elseif($materi[0]->jenis_materi == 3){
                $materi[0]->jenis = 'Bahasa Inggris';
            }

            return view('user.materi.text-single', ['materis' => $materi]);
        }
    }

    public function indexVideo(){
        $tps = LabelMateri::join('materi', 'materi.id_label_materi', '=', 'label_materi.id_label_materi')
        ->join('paket', 'paket.id_paket', '=', 'label_materi.id_paket')
        ->where('label_materi.jenis_materi', 4)
        ->select('label_materi.id_label_materi', 'nama_paket', 'label_materi.slug', 'materi.slug as slug_materi', 'label_materi.nama_label', 'materi.judul_materi', 'materi.deskripsi')
        ->get();
        
        $tka = LabelMateri::join('materi', 'materi.id_label_materi', '=', 'label_materi.id_label_materi')
        ->join('paket', 'paket.id_paket', '=', 'label_materi.id_paket')
        ->where('label_materi.jenis_materi', 5)
        ->select('label_materi.id_label_materi', 'nama_paket', 'label_materi.slug', 'materi.slug as slug_materi', 'label_materi.nama_label', 'materi.judul_materi', 'materi.deskripsi')
        ->get();

        $inggris = LabelMateri::join('materi', 'materi.id_label_materi', '=', 'label_materi.id_label_materi')
        ->join('paket', 'paket.id_paket', '=', 'label_materi.id_paket')
        ->where('label_materi.jenis_materi', 6)
        ->select('label_materi.id_label_materi', 'nama_paket', 'label_materi.slug', 'materi.slug as slug_materi', 'label_materi.nama_label', 'materi.judul_materi', 'materi.deskripsi')
        ->get();

        return view('user.materi.video', ['tps' => $tps, 'tka' => $tka, 'inggris' => $inggris]);
    }

    public function singleVideo($slug){
        $checkPaket = User::join('paket_aktif', 'paket_aktif.id_user', '=', 'users.id_user')->where('paket_aktif.id_user', Auth::user()->id_user)->where('status_paket_aktif', 1)->value('paket_aktif.id_paket');

        if($checkPaket < 2){
            return redirect()->route('user.paket')->with('upgrade', 'Upgrade Paket Anda Sebelum Mengakses');
        } else {
            $materi = Materi::join('label_materi', 'label_materi.id_label_materi', '=', 'materi.id_label_materi')
            ->select('materi.*', 'label_materi.jenis_materi')
            ->where('materi.slug', $slug)->get();

            if($materi[0]->jenis_materi == 4){
                $materi[0]->jenis = 'TPS';
            } elseif($materi[0]->jenis_materi == 5){
                $materi[0]->jenis = 'TKA';
            } elseif($materi[0]->jenis_materi == 6){
                $materi[0]->jenis = 'Bahasa Inggris';
            }

            return view('user.materi.video-single', ['materis' => $materi]);
        }
    }
}
