@extends('app')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title">SİPARİŞLER</h4>
                            <p class="card-category">Burade Siparişleri Bulabilirsiniz</p>
                            <button><a href="{{route('admin.oldorder.delete')}}"> LİSTEYİ SIFIRLA</a></button>
                        </div>

                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                <th>ZAMAN</th>
                                <th>MASA ADI</th>
                                <th>TELEFON NUMARASI</th>
                                <th>TUTAR</th>
                                <th>DETAY</th>
                                <th>DURUM</th>


                                </thead>
                                <tbody>
                                @foreach(\App\Models\lastorders::all() as $key=>$value)
                                    <tr>
                                        <td>{{$value['created_at']}} </td>
                                        <td>{{$value['masa']}}</td>
                                        <td>{{$value['telefon']}}</td>
                                        <td>{{$value['tutar']}} TL</td>
                                       <td><a style="color: #0f69c6" href="{{route('admin.oldorder.detay',['id'=>$value['id']])}}">DETAY</a></td>
                                       <td>{{$value['durum']}} </td>

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



    <script>
        setInterval(function(){

            window.location.reload(false);
        },30000);
    </script>
@endsection


