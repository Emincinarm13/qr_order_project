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
                                    <h4 class="card-title">Masalar</h4>
                                    <p class="card-category">Burade eklenen masaları bulabilirsiniz.</p>
                                </div>
                                <a href="{{route('admin.masa.create')}}"><button style="background-color: #9368E9" class="align-content-center">YENİ MASA EKLE</button></a>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                        <th>MASA ADI</th>
                                        <th>SİL</th>

                                        </thead>
                                        <tbody>
                                        @foreach($data as $key=>$value)
                                            <tr>
                                                <td>{{$value['masa']}}</td>

                                                <td><a href="{{route('admin.masa.delete',['masaid'=>$value['masaid']])}}">
                                                        SİL</a></td>

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
