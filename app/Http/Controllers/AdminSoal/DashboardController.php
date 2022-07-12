<?php

namespace App\Http\Controllers\AdminSoal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('admin-soal.dashboard');
    }
}
