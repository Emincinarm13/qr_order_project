
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('/assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('/assets/img/favicon.ico')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>YÖNETİCİ PANELİ</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css')}}" />
    <!-- CSS Files -->
    <link href="{{asset('/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/assets/css/light-bootstrap-dashboard.css?v=2.0.0 ')}}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{asset('/assets/css/demo.css')}}" rel="stylesheet" />
</head>

<body>
<div class="wrapper">
    <div class="sidebar" data-image="{{asset('/assets/img/sidebar-5.jpg')}}">
        <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

    Tip 2: you can also add an image using data-image tag
-->
        <div class="sidebar-wrapper">
            <div class="logo">
              @auth()
                    {{\Illuminate\Support\Facades\Auth::user()->name}}
                @endauth
            </div>
            <ul class="nav">
                ------------------------------------------
                <li>
                    <a class="nav-link" href="{{route('admin.index')}}">

                        <p>ANASAYFA</p>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="{{route('admin.siparis.index')}}">

                        <p>SİPARİŞLER</p>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="{{route('admin.oldorder.index')}}">

                        <p>GEÇMİŞ SİPARİŞLER</p>
                    </a>
                </li>
                    ------------------------------------------
                <li>

                    <ul class="nav-item kategori ">

                        <li class="nav-item "><a href="">ÜRÜNLER</a>

                            <ul >
                                @foreach(\App\Models\kategori::all() as $key =>$value)

                                <li ><a href="{{route('admin.ürün.index',['kategoriid'=>$value['id']])}}">{{$value['isim']}}</a></li>
                                @endforeach

                                    <li ><a href="{{route('admin.kapalıürünler')}}">SATIŞTA OLMAYAN ÜRÜNLER</a>  </li>
                            </ul>
                        </li>

                            </ul>
                        </li>




                </li>
                <li>
                    <a class="nav-link" href="{{route('admin.kategori.index')}}">

                        <p>KATEGORİLER</p>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="{{route('admin.masa.index')}}">

                        <p>MASALAR</p>
                    </a>
                </li>
                ------------------------------------------
                <li>
                    <a class="nav-link" href="{{route('admin.satıslar.index')}}">

                        <p>SATIŞLAR</p>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="{{route('admin.ciro')}}">

                        <p>CİRO</p>
                    </a>
                </li>
                ------------------------------------------

                <li class="nav-item active active-pro">
                    <a class="nav-link active" href="{{route('logout')}}">

                        <p>ÇIKIŞ YAP</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-panel">

        @yield('content')

    </div>
</div>

</body>
<!--   Core JS Files   -->
<script src="{{asset('/assets/js/core/jquery.3.2.1.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/assets/js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/assets/js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="{{asset('/assets/js/plugins/bootstrap-switch.js')}}"></script>
<!--  Google Maps Plugin    -->


<script type="text/javascript">
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

        demo.showNotification();

    });
</script>

<style>.kategori { margin:0px; padding:0px; list-style-type: square; }
    .kategori li a { display:block; padding:3px; margin-left: 20px;  color:white; list-style-type: square; }
    .kategori li ul { display:none; margin:0px; padding:0px;  list-style-type: square; }
    .kategori li ul a { color:lightgoldenrodyellow; list-style-type: square;}
    .kategori li:hover ul { display:block;}

</style>

</html>
