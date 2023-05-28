@extends('app')
@section('content')


    <div class="content">
      <p id="x"></p>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title">SİPARİŞLER</h4>
                            <p class="card-category">Burade Siparişleri Bulabilirsiniz</p>
                        </div>

                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                <th>MASA ADI</th>
                                <th>TELEFON NUMARASI</th>
                                <th>TUTAR</th>
                                <th>DETAY</th>
                                <th>SİPARİŞ İPTALİ</th>
                                <th>ÖDEME YAPILDI</th>

                                </thead>
                                <tbody>
                                @foreach(\App\Models\orders::all() as $key=>$value)
                                    <tr>
                                        <td>{{$value['masa']}}</td>
                                        <td>{{$value['telefon']}}</td>
                                        <td>{{$value['tutar']}} TL</td>
                                        <td><a style="color: #0f69c6" href="{{route('admin.siparis.detay',['id'=>$value['id']])}}">DETAY</a></td>
                                        <td><a style="color: #721c24" href="{{route('admin.siparis.iptal',['id'=>$value['id']])}}">SİPARİŞİ İPTAL ET</a></td>
                                        <td><a style="color: #1e7e34" href="{{route('admin.siparis.ödemeyap',['id'=>$value['id']])}}">ÖDEME YAPILDI</a></td>

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


