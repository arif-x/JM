<?php

namespace App\Http\Controllers\Admin\Excel\Export;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\Admin\PembayaranExport;

class PembayaranController extends Controller
{
    public function export(){
        return (new PembayaranExport)->download('pembayaran.xlsx');
    }
}
