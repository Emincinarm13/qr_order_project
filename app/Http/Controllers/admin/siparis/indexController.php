<?php

namespace App\Http\Controllers\admin\siparis;

use App\Http\Controllers\Controller;
use App\Models\lastorders;
use App\Models\orders;
use App\Models\satışlar;
use Illuminate\Http\Request;
use function MongoDB\Driver\Monitoring\removeSubscriber;

class indexController extends Controller
{
    public function index(){

        return view('admin.siparişler.index');

    }
    public function iptal($id){
        $data=orders::where('id','=',$id)->get();
        $telefon=$data[0]['telefon'];
        $masa=$data[0]['masa'];
        $mesaj=$data[0]['mesaj'];
        $json=$data[0]['json'];
        $tutar=$data[0]['tutar'];
        $durum='İPTAL EDİLEN SİPARİŞ';
        $array=[
            'telefon'=>$telefon,
            'masa'=>$masa,
            'json'=>$json,
            'mesaj'=>$mesaj,
            'tutar'=>$tutar,
            'durum'=>$durum
        ];
        $insert=lastorders::create($array);
        $delete=orders::where('id','=',$id)->delete();
        if($delete){
            return redirect()->back()->with('sil','1');

        }
        else{
            return redirect()->back()->with('hata','0');
        }
    }
    public function detay($id){
        $data=orders::where('id','=',$id)->get();
        return view('admin.siparişler.detay',['data'=>$data]);
    }

    public function ödemeyap($id){
        $data=orders::where('id','=',$id)->get();
        $telefon=$data[0]['telefon'];
        $masa=$data[0]['masa'];
        $json=$data[0]['json'];
        $mesaj=$data[0]['mesaj'];
        $tutar=$data[0]['tutar'];
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
        $delete=orders::where('id','=',$id)->delete();
        return redirect()->back();
    }
}
