<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Keranjang;
use App\Models\PaketAktif;
use Carbon\Carbon;
use DataTables;

class PembayaranController extends Controller
{
    public function index(Request $request){
        $data = Keranjang::join('paket', 'paket.id_paket', '=', 'keranjang.id_paket')
        ->join('kategori', 'kategori.id_kategori', '=', 'keranjang.id_kategori')
        ->join('jenis_kampus', 'jenis_kampus.id_jenis_kampus', '=', 'keranjang.id_jenis_kampus')
        ->join('users', 'users.id_user', '=', 'keranjang.id_user')
        ->orderBy('id_keranjang', 'DESC')->get();
        if($request->ajax()){
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                if($row->status_pembayaran == 4){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_keranjang.'" data-original-title="Edit" class="edit-lihat btn btn-primary btn-sm lihat-data">Lihat</a>';
                    return $btn;   
                } elseif($row->status_pembayaran == 2){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_keranjang.'" data-original-title="Edit" class="edit btn btn-primary btn-sm edit-data">Konfirmasi</a>';
                    $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_keranjang.'" data-original-title="Edit" class="edit-lihat btn btn-primary btn-sm lihat-data">Lihat</a>';
                    return $btn;   
                } elseif($row->status_pembayaran != 2 || $row->status_pembayaran != 4){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_keranjang.'" data-original-title="Edit" class="edit-lihat btn btn-primary btn-sm lihat-data">Lihat</a>';
                    return $btn; 
                }
            })
            ->addColumn('status', function($row){
                $data = '';
                if($row->status_pembayaran == 2){
                    $data = 'Perlu Dikonfirmasi';
                }elseif($row->status_pembayaran == 3){
                    $data = 'Ditolak';
                }elseif($row->status_pembayaran == 4){
                    $data = 'Dikonfirmasi';
                }
                return $data;
            }) 
            ->rawColumns(['action', 'status'])
            ->make(true);
        }
        return view('admin.pembayaran');
    }

    public function show($id){
        $data = Keranjang::join('paket', 'paket.id_paket', '=', 'keranjang.id_paket')
        ->join('kategori', 'kategori.id_kategori', '=', 'keranjang.id_kategori')
        ->join('jenis_kampus', 'jenis_kampus.id_jenis_kampus', '=', 'keranjang.id_jenis_kampus')
        ->join('users', 'users.id_user', '=', 'keranjang.id_user')->find($id);
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $data = Keranjang::updateOrCreate(
            ['id_keranjang' => $request->id_keranjang],
            [
                'status_pembayaran' => $request->status_pembayaran
            ]
        );

        if($request->status_pembayaran == 4){
            $now = Carbon::now();
            $addNow = Carbon::now()->addDays(180);
            $insert = PaketAktif::updateOrCreate(
                ['id_user' => $request->id_user],
                [
                    'id_user' => $request->id_user,
                    'id_paket' => $request->id_paket,
                    'id_kategori' => $request->id_kategori,
                    'id_jenis_kampus' => $request->id_jenis_kampus,
                    'tgl_aktif' => $now->format('d/m/Y'),
                    'tgl_limit' => $addNow->format('d/m/Y'),
                    'status_paket_aktif' => 1,
                ]
            );
        }

        return response()->json($data);
    }

    public function destroy($id){
        $data = Keranjang::find($id)->delete();
        return response()->json($data);
    }
}
