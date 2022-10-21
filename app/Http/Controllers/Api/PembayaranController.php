<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Keranjang;

class PembayaranController extends Controller
{
    public function index(){
        return response()->json([
            'status' => true,
            'message' => 'Data Pembayaran yang Belum DiKonfirmasi',
            'data' => Keranjang::where('status_pembayaran', 2)->get()
        ], 200);
    }
}
