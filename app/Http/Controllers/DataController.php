<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Universitas;

class DataController extends Controller
{
    public function getUniv(Request $request){
        $search = $request->search;

        if($search == ''){
            $universitases = Universitas::orderby('nama_universitas','asc')->select('id_universitas','nama_universitas')->get();
        }else{
            $universitases = Universitas::orderby('nama_universitas','asc')->select('id_universitas','nama_universitas')->where('nama_universitas', 'like', '%' .$search . '%')->get();
        }

        $response = array();
        foreach($universitases as $universitas){
            $response[] = array(
                "id"=>$universitas->id_universitas,
                "text"=>$universitas->nama_universitas
            );
        }

        return response()->json($response);
    }
}
