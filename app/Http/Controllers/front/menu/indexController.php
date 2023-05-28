<?php

namespace App\Http\Controllers\front\menu;

use App\Http\Controllers\Controller;
use App\Models\kategori;
use App\Models\orders;
use App\Models\ürünler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;



class indexController extends Controller
{
    public function index(){

        $data=ürünler::all();
        return view('front.menu',['data'=>$data]);
    }
    public function sepeteekle($id){
        $w=ürünler::where('id','=',$id)->get();
        $array=[
            'id'=>$w[0]['id'],
            'isim'=>$w[0]['isim'],
            'fiyat'=>$w[0]['fiyat']  ,
            'image'=>$w[0]['image'],
        ];

        Session::put('basket.'.rand(1,1000),$array);
        return redirect()->back();

    }
    static function allList(){
        $x=Session::get('basket');
        return($x);
    }
    public function sepet(){
        return view('front.sepet');
    }
    public function remove($id){
        $s=Session::get('basket');
        Session::forget('basket.'.$id);
        return redirect()->back();
    }
    public function complete(){
        $x=count(Session::get('basket'));
        if($x>0){
            return view('front.complete');



        }
        else{
            return redirect()->back();
        }
    }
    public function completestore(Request $request)
    {
        $request->validate(['telefon'=>'required']);
        $data = Session::get('basket');

        $x = collect($data)->sum('fiyat');
        $json = json_encode(indexController::allList());
        $telefon = $request->input('telefon');
        $mesaj=$request->input('not');
        $m = Session::get('masaid');

        $array =
            [
                'masa' => $m['masa'],
                'tutar' => $x,
                'telefon' => $telefon,
                'mesaj'=>$mesaj,
                'json' => $json


            ];
        $insert = orders::create($array);
        if ($insert) {

            return redirect('/masa')->with('basarılı', '1');




        }
    }
    public function listele($kategoriid){
        $a=kategori::where('id','=',$kategoriid)->get();


        $w=ürünler::where('kategoriid','=',$kategoriid)->where('satış','=','1')->get();
        return view('front.menüdetay',['w'=>$w,'a'=>$a]);

    }


}
