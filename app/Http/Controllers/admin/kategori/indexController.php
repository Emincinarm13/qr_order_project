<?php

namespace App\Http\Controllers\admin\kategori;

use App\Http\Controllers\Controller;
use App\Models\kategori;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index(){
        $data=kategori::all();
        return view('admin.kategori.index',['data'=>$data]);
    }
    public function ekle(){
        return view('admin.kategori.create');

    }
    public function create(Request $request){
        $all=$request->except('_token');
        $insert=kategori::create($all);
        if($insert){
            return redirect()->back()->with('basarili','1');

        }
        else{
            return redirect()->back()->with('hata','0');

        }


    }
    public function edit($id){
        $data=kategori::where('id','=',$id)->get();
        return view('admin.kategori.edit',['data'=>$data]);
    }
    public function update(Request $request){
        $id=$request->route('id');

        $all=$request->except('_token');
        $update=kategori::where('id','=',$id)->update($all);
        if($update){
            return redirect()->with('basarili','1');


        }
        else{
            return redirect()->back()->with('hata','0');
        }

    }
    public function delete($id){
        $delete=kategori::where('id','=',$id)->delete();
        if($delete){
            return redirect()->back()->with('basarili','1');
        }

    }
}
