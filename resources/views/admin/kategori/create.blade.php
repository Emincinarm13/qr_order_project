@extends('app')
@section('content')
    <div class="col-md-12">
        @if(session('basarili'))
            <div class="alert alert-success">
                <strong>BAŞARILI!</strong> Kategoriyi başarıyla eklediniz.
            </div>
        @elseif(session('hata')){
        <div class="alert alert-danger">
            <strong>HATA!</strong> Kategori eklenemedi.
        </div>}
        @endif
        <div>
    <div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title">KATEGORİ EKLE</h4>

    </div>
    <div class="card-body">
        <form action="{{route('admin.kategori.ekle.post')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="col-md-12">
                <div class="form-group">
                    <label class="bmd-label-floating"> Kategori Adı</label>
                    <input style="background-color:#9368E9" type="text" name="isim" class="form-control">

                </div>

                <button type="submit" class="btn btn-primary pull-right">Kategori Ekle</button>
                <div class="clearfix"></div>
        </form>
    </div>
    </div>
    </div>
@endsection
