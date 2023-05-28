@extends('app')
@section('content')
    <div class="col-md-12">
        @if(session('basarili'))
            <div class="alert alert-success">
                <strong>BAŞARILI!</strong> Kategori  başarıyla güncellendi.
            </div>
        @elseif(session('hata')){
        <div class="alert alert-danger">
            <strong>HATA!</strong> Kategori güncellenemedi.
        </div>}
        @endif
        <div>
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">KATEGORİ DÜZENLE ({{$data[0]['isim']}})</h4>


                </div>
                <div class="card-body">
                    <form action="{{route('admin.kategori.edit.post',['id'=>$data[0]['id']])}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating"> Kategori Adı</label>
                                <input style="background-color:#9368E9" type="text" name="isim" value="{{$data[0]['isim']}}" class="form-control">

                            </div>

                            <button type="submit" class="btn btn-primary pull-right">Kategori Düzenle</button>
                            <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>

@endsection
