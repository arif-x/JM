<?php

namespace App\Exports\Admin;

use App\Models\Keranjang;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class PembayaranExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public function view(): View
    {
        $input = request()->all();
        if(!empty($input['tgl_awal']) && !empty($input['tgl_akhir'])){
            $data = Keranjang::join('paket', 'paket.id_paket', '=', 'keranjang.id_paket')
            ->join('kategori', 'kategori.id_kategori', '=', 'keranjang.id_kategori')
            ->join('jenis_kampus', 'jenis_kampus.id_jenis_kampus', '=', 'keranjang.id_jenis_kampus')
            ->join('users', 'users.id_user', '=', 'keranjang.id_user')
            ->where('status_pembayaran', 4)
            ->where('tgl_dikonfirmasi', '>=', $input['tgl_awal'])
            ->where('tgl_dikonfirmasi', '<=', $input['tgl_akhir'])
            ->orderBy('id_keranjang', 'DESC')
            ->get();

            $sum = 0;

            for ($i=0; $i < count($data); $i++) { 
                $data[$i]->jumlah = $data[$i]->harga - ($data[$i]->harga * ($data[$i]->diskon / 100));
                $sum = $sum + $data[$i]->jumlah;
            }

            return view('admin.excel.pembayaran', [           
                'datas' => $data
            ], compact('sum'));
        } else {
            $data = Keranjang::join('paket', 'paket.id_paket', '=', 'keranjang.id_paket')
            ->join('kategori', 'kategori.id_kategori', '=', 'keranjang.id_kategori')
            ->join('jenis_kampus', 'jenis_kampus.id_jenis_kampus', '=', 'keranjang.id_jenis_kampus')
            ->join('users', 'users.id_user', '=', 'keranjang.id_user')
            ->where('status_pembayaran', 4)
            ->whereMonth('tgl_dikonfirmasi', $input['bulan'])
            ->orderBy('id_keranjang', 'DESC')
            ->get();

            $sum = 0;

            for ($i=0; $i < count($data); $i++) { 
                $data[$i]->jumlah = $data[$i]->harga - ($data[$i]->harga * ($data[$i]->diskon / 100));
                $sum = $sum + $data[$i]->jumlah;
            }
            
            return view('admin.excel.pembayaran', [           
                'datas' => $data
            ], compact('sum'));
        }
    }
}
