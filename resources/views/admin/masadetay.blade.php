@extends('app')
@section('content')

    <h3>SİPARİŞ DETAYI({{$data[0]['masa']}})</h3>
    @for($i=0;$i<\App\Models\orders::where('masa','=',$data[0]['masa'])->count();$i++)





    <p>TELEFON NUMARASI: {{$data[$i]['telefon']}}</p>
    <p>MESAJ: {{$data[$i]['mesaj']}}</p>
    @foreach(json_decode($data[$i]['json'],true) as $key=>$value)
        <p>+ÜRÜN:{{$value['isim']}} ({{$value['fiyat']}} TL) </p>
    @endforeach
    <p>TUTAR: {{$data[$i]['tutar']}} TL</p>
        ----------------------------------------------------------------
    @endfor
@php
    $tutar=\App\Models\orders::where('masa','=',$data[0]['masa'])->sum('tutar')
    @endphp


    <br> <p style="color: #721c24;font-size: 20px">TOPLAM TUTAR:   {{$tutar}}  TL</p>
    <a style="color: #1e7e34" href="{{route('admin.masaödeme',['masa'=>$data[0]['masa']])}}">ÖDEME YAP</a>



@endsection
