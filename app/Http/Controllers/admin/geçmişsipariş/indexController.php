<?php

namespace App\Http\Controllers\admin\geçmişsipariş;

use App\Http\Controllers\Controller;
use App\Models\lastorders;
use App\Models\orders;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index(){
        return view('admin.geçmişsiparişler.index');
    }
    public function detay($id){
        $data=lastorders:: where('id','=',$id)->get();
        return view('admin.geçmişsiparişler.detay',['data'=>$data]);
    }
    public function delete(){
        $delete=lastorders::getQuery()->delete();
        if($delete){
            return redirect()->back();
        }
        else{
            return redirect()->back();
        }
    }
}
