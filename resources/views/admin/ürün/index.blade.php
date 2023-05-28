@extends('app')
@section('content')
    <div class="col-md-12">
        @if(session('basarili'))
            <div class="alert alert-success">
                <strong>BAŞARILI!</strong> Ürün   silindi.
            </div>
        @elseif(session('hata'))
        <div class="alert alert-danger">
            <strong>HATA!</strong> Ürün silinemedi.
        </div>
        @elseif(session('kapatıldı'))
        <div class="alert alert-success">
            <strong>BAŞARILI!</strong> Ürün Satışa Kapatıldı.
        </div>
        @elseif(session('kapatılmadı'))
        <div class="alert alert-danger">
            <strong>HATA!</strong> Başarısız İşlem.
        </div>
        @elseif(session('açıldı'))
        <div class="alert alert-success">
            <strong>BAŞARILI!</strong> Ürün Satışa Açıldı.
        </div>
        @elseif(session('açılmadı'))
        <div class="alert alert-danger">
            <strong>HATA!</strong> Başarısız işlem.
        </div>

        @endif

        <div>

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <h4 class="card-title">ÜRÜNLER</h4>
                                    <p class="card-category">Burade eklenen ürünleri bulabilirsiniz.</p>
                                </div>
                                <a href="{{route('admin.ürün.create')}}"><button style="background-color: #9368E9" class="align-content-center">YENİ ÜRÜN EKLE</button></a>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                        <th>ÜRÜN RESMİ</th>
                                        <th>ÜRÜN ADI</th>
                                        <th>FİYAT</th>
                                        <th>AÇIK/KAPALI</th>
                                        <th>DÜZENLE</th>
                                        <th>SİL</th>

                                        </thead>
                                        <tbody>
                                        @foreach($data as $key=>$value)
                                            <tr>
                                                <td><img width="100px" height="100px" src="{{asset($value['image'])}}"></td>
                                                <td>{{$value['isim']}}</td>
                                                <td>{{$value['fiyat']}}</td>
                                                <td>@if($value['satış']==0)
                                                        (ÜRÜN SATIŞA KAPALI)<br>
                                                        <a style="color: yellowgreen" href="{{route('admin.ürün.aç',['id'=>$value['id']])}}">
                                                            AÇ</a>
                                                    @else
                                                        (ÜRÜN SATIŞA AÇIK)<br>
                                                        <a style="color: red" href="{{route('admin.ürün.kapat',['id'=>$value['id']])}}">
                                                            KAPAT</a>

                                                    @endif</td>
                                                <td><a href="{{route('admin.ürün.edit',['id'=>$value['id']])}}">
                                                        DÜZENLE</a></td>
                                                <td ><a href="{{route('admin.ürün.delete',['id'=>$value['id']])}}">
                                                        <p  style="margin-top:35px;color: red">SİL</p></a></td>

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
