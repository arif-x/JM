<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kontak;
use App\Models\SoalTryout;
use App\Models\Materi;
use App\Models\Soal;
use App\Models\SliderBesar;
use App\Models\SliderKecil;

class DashboardController extends Controller
{
    public function index(){
        $kontak = Kontak::get();
        $materi = Materi::count();
        $soal_tryout = SoalTryout::count();
        $soal_latihan = Soal::count();
        $slider_besar = SliderBesar::orderBy('id_slider_besar', 'DESC')->limit(7)->get();
        $slider_kecil = SliderKecil::orderBy('id_slider_kecil', 'DESC')->get();
        return view('user.dashboard', ['kontaks' => $kontak,'slider_besars' => $slider_besar,'slider_kecils' => $slider_kecil], compact('materi', 'soal_tryout', 'soal_latihan'));
    }
}
