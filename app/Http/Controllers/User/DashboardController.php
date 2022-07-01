<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kontak;

class DashboardController extends Controller
{
    public function index(){
        $kontak = Kontak::get();
        return view('user.dashboard', ['kontaks' => $kontak]);
    }
}
