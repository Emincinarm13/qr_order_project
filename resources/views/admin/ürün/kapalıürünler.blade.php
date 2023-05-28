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
                                    <h4 class="card-title">SATIŞA KAPALI ÜRÜNLER</h4>

                                </div>

                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>

                                        <th>ÜRÜN ADI</th>

                                        <th>AÇIK/KAPALI</th>


                                        </thead>
                                        <tbody>
                                        @foreach($data as $key=>$value)
                                            <tr>

                                                <td>{{$value['isim']}}</td>

                                                <td>@if($value['satış']==0)


                                                        <a style="color: yellowgreen" href="{{route('admin.ürün.aç',['id'=>$value['id']])}}">
                                                            AÇ</a>


                                                    @endif</td>

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
