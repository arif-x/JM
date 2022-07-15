<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SoalTryout;
use App\Models\JawabanUserTryout;
use App\Models\User;

class TestController extends Controller
{
    public function index(array $data)
    {
        $checkKode = User::where('referral', $data['referrer'])->first();
        if(empty($checkKode)){
            return redirect(route('register'))->with('success', 'Kode referral tidak valid!');
        } else {
            dd('cok');
        }
    }

    public function index2(){
        return view('user.test2');
    }
}
