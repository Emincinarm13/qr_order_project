@extends('app')
@section('content')
    <h3>SİPARİŞ DETAYI({{$data[0]['masa']}})</h3>

    <p>ZAMAN: {{$data[0]['created_at']}}</p>
    <p>MASA ADI: {{$data[0]['masa']}}</p>
    <p>TELEFON NUMARASI: {{$data[0]['telefon']}}</p>
    <p>MESAJ: {{$data[0]['mesaj']}}</p>
    @foreach(json_decode($data[0]['json'],true) as $key=>$value)
        <p>ÜRÜN:{{$value['isim']}} ({{$value['fiyat']}} TL) </p>
    @endforeach
    <p>TUTAR: {{$data[0]['tutar']}} TL</p>
    <p>DURUM: {{$data[0]['durum']}} </p>

@endsection
