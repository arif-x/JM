<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kebijakan;
use DataTables;

class KebijakanController extends Controller
{
    public function index(Request $request){
        $data = Kebijakan::get();
        if($request->ajax()){
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_kebijakan.'" data-original-title="Edit" class="edit btn btn-primary btn-sm edit-data">Edit</a>';
                return $btn;
            })
            ->addColumn('kebijakans', function($row){
                $data = substr($row->kebijakan, 0, 200);
                return $data;
            })
            ->rawColumns(['action', 'kebijakans'])
            ->make(true);
        }
        return view('admin.kebijakan');
    }

    public function show($id){
        return response()->json(Kebijakan::find($id));
    }

    public function store(Request $request){
        $data = Kebijakan::where('id_kebijakan', $request->id_kebijakan)->update(
            [
                'kebijakan' => $request->kebijakan,
            ]
        );

        return response()->json($data);
    }
}
