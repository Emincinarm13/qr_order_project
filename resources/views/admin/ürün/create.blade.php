@extends('app')
@section('content')
    <div class="col-md-12">
        @if(session('basarili'))
            <div class="alert alert-success">
                <strong>BAŞARILI!</strong> Ürünü başarıyla eklediniz.
            </div>
        @elseif(session('hata')){
        <div class="alert alert-danger">
            <strong>HATA!</strong> Ürün eklenemedi.
        </div>}
        @endif
        <div>
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">ÜRÜN EKLE</h4>

                </div>
                <div class="card-body">
                    <form action="{{route('admin.ürün.create.post')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating"> Ürün Adı</label>
                                <input style="background-color:#9368E9" type="text" name="isim" class="form-control">
                                <label class="bmd-label-floating"> Ürün Fiyatı</label>
                                <input style="background-color:#9368E9" type="text" name="fiyat" class="form-control">
                                <label class="bmd-label-floating"> Kategori</label>
                                <select name="kategoriid" class="form-control" >
                                    @foreach($kategori as $key=> $value)
                                        <option value="{{$value['id']}}">{{$value['isim']}}</option>


                                    @endforeach
                                </select>
                                <label class="bmd-label-floating"> Ürün  Resmi</label>
                                <input type="file" name="image" class="form-control" style="opacity: 1;position: inherit">

                            </div>

                            <button type="submit" class="btn btn-primary pull-right">Ürün Ekle</button>
                            <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
@endsection
