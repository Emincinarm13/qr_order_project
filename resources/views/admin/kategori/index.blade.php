@extends('app')
@section('content')
    <div class="col-md-12">
        @if(session('basarili'))
            <div class="alert alert-success">
                <strong>BAŞARILI!</strong> Kategori   silindi.
            </div>
        @elseif(session('hata')){
        <div class="alert alert-danger">
            <strong>HATA!</strong> Kategori silinemedi.
        </div>}
        @endif
        <div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title">KATEGORİLER</h4>
                            <p class="card-category">Burade eklenen kategorileri bulabilirsiniz.</p>
                        </div>
                        <a href="{{route('admin.kategori.ekle')}}"><button style="background-color: #9368E9" class="align-content-center">YENİ KATEGORİ EKLE</button></a>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                <th>KATEGORİ ADI</th>
                                <th>DÜZENLE</th>
                                <th>SİL</th>

                                </thead>
                                <tbody>
                                @foreach($data as $key=>$value)
                                <tr>
                                    <td>{{$value['isim']}}</td>
                                    <td><a href="{{route('admin.kategori.edit',['id'=>$value['id']])}}">
                                            DÜZENLE</a></td>
                                    <td><a href="{{route('admin.kategori.delete',['id'=>$value['id']])}}">
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
