@extends('app')
@section('content')
    <div class="col-md-12">
        @if(session('basarili'))
            <div class="alert alert-success">
                <strong>BAŞARILI!</strong> Ürünü başarıyla güncellediniz.
            </div>
        @elseif(session('hata')){
        <div class="alert alert-danger">
            <strong>HATA!</strong> Ürün güncellenemedi.
        </div>}
        @endif
        <div>
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">ÜRÜN DÜZENLE</h4>

                </div>
                <div class="card-body">
                    <form action="{{route('admin.ürün.edit.post',['id'=>$data[0]['id']])}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating"> Ürün Adı</label>
                                <input style="background-color:#9368E9" type="text" value="{{$data[0]['isim']}}" name="isim" class="form-control">
                                <label class="bmd-label-floating"> Ürün Fiyatı</label>
                                <input style="background-color:#9368E9" type="text" value="{{$data[0]['fiyat']}}" name="fiyat" class="form-control">
                                <label class="bmd-label-floating"> Kategori</label>
                                <select name="kategoriid" class="form-control" >
                                    @foreach(\App\Models\kategori::all() as $key=> $value)
                                        <option @if($value['id']==$data[0]['kategoriid']) selected @endif  value="{{$value['id']}}">{{$value['isim']}}</option>


                                    @endforeach
                                </select>

                                <label class="bmd-label-floating"> Ürün  Resmi</label>
                                <img width="100px" height="100px" src="{{asset($data[0]['image'])}}">
                                <input type="file" name="image" src="{asset($data[0]['image'])}}" class="form-control" style="opacity: 1;position: inherit">

                            </div>

                            <button type="submit" class="btn btn-primary pull-right">Ürün Düzenle</button>
                            <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
@endsection
