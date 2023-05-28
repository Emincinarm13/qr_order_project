<?php

namespace App\Http\Controllers\admin\masa;

use App\Http\Controllers\Controller;
use App\Models\masa;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index()
    {
        $data=masa::all();
        return view('admin.masa.index',['data'=>$data]);

    }
    public function create(){
        return view('admin.masa.create');
    }
    public function store(Request $request){
        $all=$request->except('_token');
        $insert=masa::create($all);
        if($insert){
            return redirect()->back()->with('basarili','1');
        }
        else{
            return redirect()->back()->with('hata','0');
        }

    }
    public function delete($masaid){
        $delete=masa::where('masaid','=',$masaid)->delete();
        if($delete){
            return redirect()->back()->with('basarili','1');
        }
        else{
            return redirect()->back()->with('hata','0');
        }
    }
}
