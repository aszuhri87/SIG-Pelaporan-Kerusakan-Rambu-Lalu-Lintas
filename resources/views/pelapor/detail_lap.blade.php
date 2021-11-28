<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Selamat Datang Di SI PRAMBU</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('lte/plugins/fontawesome-free/css/all.min.css')}}">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
            <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Laravel SB Admin 2">
    <meta name="author" content="Alejandro RH">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
   
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
      integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
      crossorigin=""/>
      <link rel="stylesheet" href="https://labs.easyblog.it/maps/leaflet-search/src/leaflet-search.css">

    <!-- Styles -->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.png') }}" rel="icon" type="image/png">




        <!-- Styles -->
        <style>
            html, body {

                background-image: linear-gradient( rgba(0, 0, 0, 0.609), rgba(0, 0, 0, 0.609) ), url("/img/bacground.jpg");
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: auto;
                width:100%;
                margin: 0;
            }


            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            img.tengah {
                    display: block;
                    margin-left: auto;
                    margin-right: auto;
                     padding-top:2%;
                    height: 40%;
                    width:40%;
                }

            .footer {
            position: fixed;
            left: 0;
            bottom: 5%;
            width: 100%;
            background-color: transparent;
            color: white;
            text-align: center;
            }
                  #mapid { min-height: 500px; }
</style>

    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">


                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                        <li class="nav-item">
                            <a class="nav-link" href="/welcome"> SI Prambu</a>
                        </li> 
<!-- 
                        <li class="nav-item">
                            <a class="nav-link" href="https://balaibahasadiy.kemdikbud.go.id/laman/index.php/organisasi/visi-misi"> Visi & Misi</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="https://balaibahasadiy.kemdikbud.go.id/laman/index.php/organisasi/tugas-dan-fungsi">Tugas & Fungsi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://balaibahasadiy.kemdikbud.go.id/laman/index.php/saran-kritik">Saran & Kritik</a> -->
                        </li>
                         <li class="nav-item">
                            <a class="nav-link" href="/tentang_kami">Tentang Kami</a>
                        </li>


                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->

                        {{-- <i class="fa fa-mail-bulk nav-link"> <i style="font-family: 'Nunito', sans-serif;">balaibahasadiy@kemdikbud.go.id</i></i> --}}



                            <li class="nav-item dropdown">
                                <li class="nav-item">


                                        @csrf
                                    </form>
                                </div>
                            </li>

                    </ul>
                </div>
            </div>
        </nav>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    
                       Detail laporan

                    </div>
                    
                <div class="card-body">
                    <table class="table table-responsive">
                        <tbody>

                        
                            <tr><td>Nama Pelapor</td><td>{{ $laporan->pelapor->nama_pelapor }}</td></tr>
                           {{--  <tr><td>Nomor HP</td><td>{{ $laporan->pelapor->nomor_hp }}</td></tr>
                            <tr><td>Email</td><td>{{ $laporan->pelapor->email }}</td></tr> --}}
                            <tr><td>Tanggal</td><td>{{$laporan->created_at}}</</td></tr>
                      <!--     <tr><td>Nama Rambu</td><td>{{ $laporan->rambu->nama_rambu }} <img src="/thumbnail/{{ $laporan->rambu->gambar}}"></td></tr>
                            <tr><td>Jenis Kerusakan</td><td>{{ $laporan->jenis_kerusakan }}</td></tr> -->
                            <tr><td>Latitude</td><td>{{ $laporan->latitude }}</td></tr>
                             <tr><td>Longitude</td><td>{{ $laporan->longitude }}</td></tr>
                            <tr><td>Detail Lokasi</td><td>{{ $laporan->detail_lokasi }}</td></tr>
                            <tr><td>Gambar</td><td><img src="/thumbnail/{{ $laporan->gambar}}"></td></tr>
                       	
        </tbody>
                
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Detail Peta </div>
                <div class="card-body" id="mapid"></div>
            </div>
        </div>
    </div>
</div>
<div class="footer">

            <strong>Copyright &copy; SI PRambu 2021.</strong> All rights reserved.
        </div>







</body>
<!-- Scripts -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js')}}"></script>

    <script src="{{asset('/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
          integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
          crossorigin="">
      </script>
       <script src="https://labs.easyblog.it/maps/leaflet-search/src/leaflet-search.js"></script>


<script>
   var map = L.map('mapid').setView([{{ $laporan->latitude }},{{ $laporan->longitude }}],{{ config('leafletsetup.detail_zoom_level') }});
   L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
   L.marker([{{ $laporan->latitude }},{{ $laporan->longitude }}]).addTo(map)
   
    axios.get('{{ route('api.laporan.index') }}')
    .then(function (response) {
        //console.log(response.data);
        L.geoJSON(response.data,{
            pointToLayer: function(geoJsonPoint,latlng) {
                return L.marker(latlng);
            }
        })
        .bindPopup(function(layer) {
            return ('<div class="my-2"><strong>Detail Lokasi</strong> :<br>'+layer.feature.properties.detail_lokasi+'</div>');
        }).addTo(map);
        console.log(response.data);
    })
    .catch(function (error) {
        console.log(error);
    });
</script>





<!-- Leaflet JavaScript -->
      <!-- Make sure you put this AFTER Leaflet's CSS -->
      


</html>