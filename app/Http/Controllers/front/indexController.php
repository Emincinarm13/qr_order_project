<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class indexController extends Controller
{
    public function index(){
        Session::forget('masaid');
        Session::forget('basket');
        return view('front.index');
    }
    public function login(Request $request){
        $request->validate(['masa'=>'required']);
        $all=$request->except('_token');
        Session::put('masaid',$all);
        $data=Session::get('masaid');
        return view('front.menu',['data'=>$data]);

    }

}
