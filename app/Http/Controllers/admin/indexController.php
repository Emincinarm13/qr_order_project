<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\lastorders;
use App\Models\orders;
use App\Models\satışlar;
use Illuminate\Http\Request;

class indexController extends Controller
{
        public function index(){
            return view('admin.index');
        }
        public function masadetay($masa){
            $data=orders::where('masa','=',$masa)->get();
            return view('admin.masadetay',['data'=>$data]);

        }
        public function masaödeme($masa){

            for ($i=0;$i<orders::where('masa','=',$masa)->count();$i++){
                $data=orders::where('masa','=',$masa)->get();
                $telefon=$data[$i]['telefon'];
                $masa=$data[$i]['masa'];
                $json=$data[$i]['json'];
                $mesaj=$data[$i]['mesaj'];
                $tutar=$data[$i]['tutar'];
                $durum='ÖDEME YAPILDI';
                $array=[
                    'telefon'=>$telefon,
                    'masa'=>$masa,
                    'json'=>$json,
                    'tutar'=>$tutar,
                    'mesaj'=>$mesaj,
                    'durum'=>$durum

                ];
                $array2=[
                    'masa'=>$masa,
                    'tutar'=>$tutar

                ];
                $satıs=satışlar::create($array2);
                $insert=lastorders::create($array);

            }
            $delete=orders::where('masa','=',$masa)->delete();

            return redirect('/admin');

        }
}
