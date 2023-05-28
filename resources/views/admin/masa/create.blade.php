@extends('app')
@section('content')
    <div class="col-md-12">
        @if(session('basarili'))
            <div class="alert alert-success">
                <strong>BAŞARILI!</strong> Masayı başarıyla eklediniz.
            </div>
        @elseif(session('hata')){
        <div class="alert alert-danger">
            <strong>HATA!</strong> Masa eklenemedi.
        </div>}
        @endif
        <div>
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">MASA EKLE</h4>

                </div>
                <div class="card-body">
                    <form action="{{route('admin.masa.create.post')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating"> Masa Adı</label>
                                <input style="background-color:#9368E9" type="text" name="masa" class="form-control">

                            </div>

                            <button type="submit" class="btn btn-primary pull-right">Masa Ekle</button>
                            <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
@endsection
