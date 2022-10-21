<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SoalTryout;
use App\Models\JawabanUserTryout;

class TestController extends Controller
{
    public function index(Request $request){
        $json = '[{"task": "Clean my teeth","date": "today"},{"task": "Jumping Jacks","date": "tomorrow"},{"task": "Call Mom","date": "today"},{"task": "Wash The Dog","date": "2017/03/01"},{"task": "Clean The House","date": "today"}]';

        $array = json_decode($json);
        $res = array();
        foreach ($array as $each) {
            if (isset($res[$each->date]))
                array_push($res[$each->date], $each->task);
            else
                $res[$each->date] = array($each->task);
        }

        foreach ($res as $date => $tasks){
            echo "<h3>{$date}</h3>";
            foreach ($tasks as $task)
                echo "<p>$task</p>";
        }
    }

    public function index2(){
        return view('user.test2');
    }
}
