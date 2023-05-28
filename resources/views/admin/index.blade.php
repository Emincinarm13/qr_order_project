@extends('app')
@section('content')
    <div class="col-md-12">
        @if(session('basarili'))
            <div class="alert alert-success">
                <strong>BAŞARILI!</strong> Masa   silindi.
            </div>
        @elseif(session('hata')){
        <div class="alert alert-danger">
            <strong>HATA!</strong> Masa silinemedi.
        </div>}
        @endif
        <div>

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <h4 class="card-title">MASALAR</h4>
                                </div>
                                   <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                        <th>MASA ADI</th>
                                        <th>TOPLAM TUTAR</th>
                                        <th>DETAY</th>

                                        </thead>
                                        <tbody>
                                            @foreach(\App\Models\masa::all() as $key=>$value)
                                            <tr>
                                                <td>{{$value['masa']}}</td>
                                                <td style="color: #721c24">@php
            $tutar=\App\Models\orders::where('masa','=',$value['masa'])->sum('tutar')


@endphp
                                                    {{$tutar}}   TL
</td>
                                                <td><a href="{{route('admin.masadetay',['masa'=>$value['masa']])}}">DETAY</a></td>

                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

@endsection
