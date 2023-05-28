<?php

namespace App\Http\Controllers\admin\satıslar;

use App\Http\Controllers\Controller;
use App\Models\ciro;
use App\Models\satışlar;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function günsonu(){
        $tutar=satışlar::all()->sum('tutar');
        $array=[
            'tutar'=>$tutar
        ];
        $insert=ciro::insert($array);
        $delete=satışlar::getQuery()->delete();
        return redirect()->back();
    }
}
