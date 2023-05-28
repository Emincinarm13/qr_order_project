<?php

use App\Models\satışlar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/',[\App\Http\Controllers\site\indexController::class,'index'])->name('site');
Route::get('/menu/sepet',[\App\Http\Controllers\front\menu\indexController::class,'sepet'])->name('sepet');

Route::get('/masa',[\App\Http\Controllers\front\indexController::class,'index'])->name('anasayfa');
Route::post('/menu',[\App\Http\Controllers\front\indexController::class,'login'])->name('masalogin');

Route::get('/menu',[\App\Http\Controllers\front\menu\indexController::class,'index'])->name('menuindex');

Route::get('/sepeteekle/{id}',[\App\Http\Controllers\front\menu\indexController::class,'sepeteekle'])->name('sepeteekle');
Route::get('/sepetten-cıkar/{id}',[\App\Http\Controllers\front\menu\indexController::class,'remove'])->name('sepettencikar');
Route::get('/menu/sepet/complete',[\App\Http\Controllers\front\menu\indexController::class,'complete'])->name('basket.complete');
Route::post('/menu/sepet/complete',[\App\Http\Controllers\front\menu\indexController::class,'completestore'])->name('basket.completestore');
Route::get('/logout',function (){
    Session::flush();

    Auth::logout();

    return redirect('/');
})->name('logout');


Route::group(['namespace'=>'admin','prefix'=>'admin','as'=>'admin.','middleware'=>['auth','AdminCtrl']],function(){
    Route::get('/kapalı-ürünler',[\App\Http\Controllers\admin\ürün\indexController::class,'kapalıürünler'])->name('kapalıürünler');
    Route::get('/',function (){
        return view('admin.index');
    })->name('index');
    Route::get('/masadetay/{masa}',[\App\Http\Controllers\admin\indexController::class,'masadetay'])->name('masadetay');
    Route::get('/masaödeme/{masa}',[\App\Http\Controllers\admin\indexController::class,'masaödeme'])->name('masaödeme');
    Route::get('/ciro',function (){
        return view('admin.ciro.index');
    })->name('ciro');
    Route::get('/cirosıfırla',function (){
        $delete=\App\Models\ciro::getQuery()->delete();
        return redirect()->back();
    })->name('cirosıfırla');
    Route::group(['namespace'=>'kategori','prefix'=>'kategori','as'=>'kategori.'],function(){
        Route::get('/',[\App\Http\Controllers\admin\kategori\indexController::class,'index'])->name('index');
        Route::get('/ekle',[\App\Http\Controllers\admin\kategori\indexController::class,'ekle'])->name('ekle');
        Route::post('/ekle',[\App\Http\Controllers\admin\kategori\indexController::class,'create'])->name('ekle.post');
        Route::get('/düzenle/{id}',[\App\Http\Controllers\admin\kategori\indexController::class,'edit'])->name('edit');
        Route::post('/düzenle/{id}',[\App\Http\Controllers\admin\kategori\indexController::class,'update'])->name('edit.post');
        Route::get('/delete/{id}',[\App\Http\Controllers\admin\kategori\indexController::class,'delete'])->name('delete');

    });
    Route::group(['namespace'=>'ürün','prefix'=>'ürün','as'=>'ürün.'],function(){
        Route::get('/ekle',[\App\Http\Controllers\admin\ürün\indexController::class,'create'])->name('create');
        Route::get('/ekle',[\App\Http\Controllers\admin\ürün\indexController::class,'create'])->name('create');
        Route::get('/{kategoriid}',[\App\Http\Controllers\admin\ürün\indexController::class,'index'])->name('index');

        Route::post('/ekle',[\App\Http\Controllers\admin\ürün\indexController::class,'store'])->name('create.post');
        Route::get('/düzenle/{id}',[\App\Http\Controllers\admin\ürün\indexController::class,'edit'])->name('edit');
        Route::post('/düzenle/{id}',[\App\Http\Controllers\admin\ürün\indexController::class,'update'])->name('edit.post');
        Route::get('/sil/{id}',[\App\Http\Controllers\admin\ürün\indexController::class,'delete'])->name('delete');
        Route::get('/aç/{id}' ,[\App\Http\Controllers\admin\ürün\indexController::class,'aç'])->name('aç');
        Route::get('/kapat/{id}',[\App\Http\Controllers\admin\ürün\indexController::class,'kapat'])->name('kapat');




    });
    Route::group(['namespace'=>'masa','prefix'=>'masa','as'=>'masa.'],function(){
        Route::get('/',[\App\Http\Controllers\admin\masa\indexController::class,'index'])->name('index');
        Route::get('/ekle',[\App\Http\Controllers\admin\masa\indexController::class,'create'])->name('create');
        Route::post('/ekle',[\App\Http\Controllers\admin\masa\indexController::class,'store'])->name('create.post');
        Route::get('/sil/{masaid}',[\App\Http\Controllers\admin\masa\indexController::class,'delete'])->name('delete');


    });
    Route::group(['namespace'=>'siparis','prefix'=>'siparis','as'=>'siparis.'],function(){
        Route::get('/',[\App\Http\Controllers\admin\siparis\indexController::class,'index'])->name('index');
        Route::get('/detay/{id}',[\App\Http\Controllers\admin\siparis\indexController::class,'detay'])->name('detay');
        Route::get('/iptal/{id}',[\App\Http\Controllers\admin\siparis\indexController::class,'iptal'])->name('iptal');
        Route::get('/ödemeyap/{id}',[\App\Http\Controllers\admin\siparis\indexController::class,'ödemeyap'])->name('ödemeyap');



    });
    Route::group(['namespace'=>'oldorder','prefix'=>'oldorder','as'=>'oldorder.'],function(){
        Route::get('/',[\App\Http\Controllers\admin\geçmişsipariş\indexController::class,'index'])->name('index');
        Route::get('/detay/{id}',[\App\Http\Controllers\admin\geçmişsipariş\indexController::class,'detay'])->name('detay');
        Route::get('/delete',[\App\Http\Controllers\admin\geçmişsipariş\indexController::class,'delete'])->name('delete');




    });
    Route::group(['namespace'=>'satıslar','prefix'=>'satıslar','as'=>'satıslar.'],function(){
        Route::get('/',function (){
            return view('admin.satışlar.index');
        })->name('index');
        Route::get('/günsonual',[\App\Http\Controllers\admin\satıslar\indexController::class,'günsonu'])->name('günsonu');




    });
});

Auth::routes();


