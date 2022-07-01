<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;

class TestController extends Controller
{
    public function index(Request $request){
        if(Auth::check()){
            echo "string";
        } else {
            echo "cok";
        }
    }

    public function index2(){
        return view('user.test2');
    }
}
