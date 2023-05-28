<?php

namespace App\Http\Controllers\admin\ürün;



use App\Http\Controllers\Controller;
use App\Models\kategori;
use App\Models\ürünler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class indexController extends Controller
{
    public function index($id){
        $data=ürünler::where('kategoriid','=',$id)->get();
        return view('admin.ürün.index',['data'=>$data]);


    }
    public function kapalıürünler(){
        $data=ürünler::where('satış','=',0)->get();
        return view('admin.ürün.kapalıürünler',['data'=>$data]);

    }
    public function create(){
        $kategori=kategori::all();
        return view('admin.ürün.create',['kategori'=>$kategori]);
    }
    public function store(Request $request){
        $all=$request->except('_token');
        $resimadı=rand(0,10000).'.'.$all['image']->getClientOriginalExtension();
        $yukle=$request->image->move(public_path('images'),$resimadı);
        $all['image']='images/'.$resimadı;

         $insert=ürünler::create($all);
        if($insert){
            return redirect()->back()->with('basarili','1');
        }
        else{
            return redirect()->back()->with('hata','0');
        }
    }
    public function edit($id){
        $data=ürünler::where('id','=',$id)->get();
        return view('admin.ürün.edit',['data'=>$data]);


    }
    public function update(Request $request){
        if ($request->has('image')){
        $id=$request->route('id');

        $all=$request->except('_token');

        $resimadı=rand(0,10000).'.'.$all['image']->getClientOriginalExtension();
        $yukle=$request->image->move(public_path('images'),$resimadı);
        $all['image']='images/'.$resimadı;
        $ürün=ürünler::select('image')->where('id','=',$id)->get();
        $resimadı=$ürün[0]['image'];
        File::delete(public_path($resimadı));
        $update=ürünler::where('id','=',$id)->update($all);
        if($update){
            return redirect()->back()->with('basarili','1');


        }
        else{
            return redirect()->back()->with('hata','0');
        }}
        else{
            return redirect()->back()->with('hata','0');
        }


    }
    public function delete($id){
        $ürün=ürünler::select('image')->where('id','=',$id)->get();
        $resimadı=$ürün[0]['image'];
        $delete=ürünler::where('id','=',$id)->delete();
        if($delete){

            File::delete(public_path($resimadı));

            return redirect()->back()->with('basarili','1');

        }
   }
   public function aç($id){
       $update=ürünler::where('id','=',$id)->update(['satış'=>1]);
       if($update){
           return redirect()->back()->with('açıldı','1');


       }
       else{
           return redirect()->back()->with('açılmadı','0');
       }
   }
    public function kapat($id){
        $update=ürünler::where('id','=',$id)->update(['satış'=>0]);
        if($update){
            return redirect()->back()->with('kapatıldı','1');


        }
        else{
            return redirect()->back()->with('kapatılmadı','0');
        }
    }

}
