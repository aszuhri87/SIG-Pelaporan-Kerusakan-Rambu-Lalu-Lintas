<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Pelapor</title>

     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
     <meta name="description" content="Laravel SB Admin 2">
     <meta name="author" content="Alejandro RH">

     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">

     <title>{{ config('app.name', 'Laravel') }}</title>

     <!-- Fonts -->
     <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

     <!-- Styles -->
     <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
     {{-- leaflet search --}}
{{-- end seacrh --}}
     <!-- Favicon -->
     <link href="{{ asset('img/favicon.png') }}" rel="icon" type="image/png"> 

 <link rel="stylesheet" href="https://labs.easyblog.it/maps/leaflet-search/src/leaflet-search.css">
 <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

      @notifyCss
    @notifyJs
    @yield('styles')


      <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
      integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
      crossorigin=""/> 


    <style>
      #map { min-height: 500px; }

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

            #mapSearchContainer{
              position:fixed;
              top:20px;
              right: 40px;
              height:30px;
              width:180px;
              z-index:110;
              font-size:10pt;
              color:#5d5d5d;
              border:solid 1px #bbb;
              background-color:#f8f8f8;
            }


           .search-input {
    font-family:Courier
}
.search-input,
.leaflet-control-search {
    max-width:400px;
}

    </style>
</head>
<body >

     <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">


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
                            <a class="nav-link" href="https://balaibahasadiy.kemdikbud.go.id/laman/index.php/saran-kritik">Saran & Kritik</a>
                        </li> -->
                         <li class="nav-item">
                            <a class="nav-link" href="https://balaibahasadiy.kemdikbud.go.id/laman/index.php/saran-kritik">Tentang Kami</a>
                        </li>


                    </ul>

                    <!-- Right Side Of Navbar -->
           
                </div>
            </div>
        </nav>
<div class="container py-8">

 <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
  
           
        <!-- Main Content -->
        <div id="content">

     <div class="row justify-content-center">
        
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Form Pelapor
                        
                    </div> 
                <div class="card-body">
<form action="{{ route('simpan_laporan') }}" method="post" enctype="multipart/form-data">
	@csrf
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama_pelapor">
                        </div>

                        <div class="form-group">
                            <label>No. Handphone</label>
                            <input type="text" class="form-control" value="{{old('nomor_hp')}}" name="nomor_hp">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email">
                        </div>
                 <!--    <div class="form-group focused">
                        <label class="form-control-label" for="nama_rambu">Nama Rambu</label>
                        <select name="id_rambu" class="form-control">

                    </div> -->
                 <!--    <div class="form-group focused">
                        <label class="form-control-label" for="jenis_kerusakan">Jenis Kerusakan</label>
                        <input type="text" id="jenis_kerusakan" class="form-control" name="jenis_kerusakan" placeholder="Jenis Kerusakan">
                    </div> -->
                 
                        </div>
                        <div class="col-md-6">
                      
                        <input type="hidden" id="longitude" class="form-control" name="longitude" placeholder="longitude ">
               
                        <input type="hidden" id="latitude" class="form-control" name="latitude" placeholder="Latitude">
                   
                     <div class="form-group focused">
                        <label class="form-control-label" for="detail_lokasi">Detail_lokasi</label>
                        <textarea id="detail_lokasi" class="form-control" name="detail_lokasi" placeholder="Detail Lokasi"></textarea>
                    </div>
                    <div class="form-group">
                            <label>Gambar</label>
                            <input type="file" class="form-control" name="gambar">
                        </div>

                        </div>

                        </div>
                    </div> 
            </div>
            <div class="btn btn-group">
 <button type="submit" class="btn btn-success">Tambah Laporan</button>
 </div>

            </div>
        </div>
        <br> <br>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                <div class="row">
                     
        
                    <div class="col-md-6">
                         <div id='actions'><a href='#' class="btn"><i class="fas fa-map-marker text-primary"></i> Lokasi saya</a></div>
                    </div>
                    
                </div>
                </div>
                  
                      <div class="container" id="map"></div>

            </div>
        </div>
    </div>
</div>
                       
                  


                    
{{-- maps --}}

</form>
        
       
        </div>
   

</div>

<div class="modal fade" id="modal-rambu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Daftar Rambu</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                     <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Rambu</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    
                                   

                        <thead>
                            <tr>
                              
                               
                            </tr>
                        </thead>
                        <tbody>
                             <tr>
                          
                        </tbody>
                                </table>
                   
                        </div>


                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>



                </div>

            </div>

        </div>
         <!-- Footer -->
       <footer class="sticky-footer bg-transparent">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <strong class="text-light">Copyright &copy; SI PRambu 2021</strong>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>

 <x:notify-messages/>



</body>


<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
<script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js')}}"></script>

<!-- Leaflet JavaScript -->
      <!-- Make sure you put this AFTER Leaflet's CSS -->
      <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
          integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
          crossorigin="">
      </script>

      <script src="https://labs.easyblog.it/maps/leaflet-search/src/leaflet-search.js"></script>

 <!-- <script src="https://labs.easyblog.it/maps/leaflet-search/src/leaflet-search.js"></script> -->


<script>
    var mapCenter = [
            {{ config('leafletsetup.map_center_latitude') }},
            {{ config('leafletsetup.map_center_longitude') }},
    ];




    var map = L.map('map').setView(mapCenter,{{ config('leafletsetup.zoom_level') }});
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);


 var current_position, current_accuracy;

    function onLocationFound(e) {
      // if position defined, then remove the existing position marker and accuracy circle from the map
      if (current_position) {
          map.removeLayer(current_position);
          map.removeLayer(current_accuracy);
      }

      var radius = e.accuracy/2;

      current_position = L.marker(e.latlng).addTo(map)
        .bindPopup("Lokasi anda" + radius + " meter dari pin").openPopup();

      current_accuracy = L.circle(e.latlng, radius).addTo(map);
           
    }

    function onLocationError(e) {
      alert(e.message);
    }

    map.on('locationfound', onLocationFound);
    map.on('locationerror', onLocationError);

 
    function locate() {
        this.map.locate({setView : true,maxZoom: 12, desiredAccuracy: 30 });

    }


$('#actions').find('a').on('click', function() {
   locate();
});

    var marker = L.marker(mapCenter).addTo(map);
    function updateMarker(lat,lng){
        marker
        .setLatLng([lat,lng])
        .bindPopup("Lokasi dipilih :" + marker.getLatLng().toString())
        .openPopup();
        return false;
    };


    map.on('click',function(e) {
        let latitude  = e.latlng.lat.toString().substring(0,15);
        let longitude = e.latlng.lng.toString().substring(0,15);
        $('#latitude').val(latitude);
        $('#longitude').val(longitude);
        updateMarker(latitude,longitude);
    });
    var updateMarkerByInputs = function () {
        return updateMarker( $('#latitude').val(), $('#longitude').val());
    }
    $('#latitude').on('input',updateMarkerByInputs);
    $('#longitude').on('input',updateMarkerByInputs);


    map.addControl( new L.Control.Search({
    url: 'https://nominatim.openstreetmap.org/search?format=json&q={s}',
    jsonpParam: 'json_callback',
    propertyName: 'display_name',
    propertyLoc: ['lat','lon'],
    marker: L.circleMarker([0,0],{radius:30}),
    autoCollapse: true,
    autoType: false,
    minLength: 2
  }) );

 // Control 2: This add a scale to the map
            L.control.scale().addTo(map);




//searchLayer is a L.LayerGroup contains searched markers

</script>

</html>
{{-- 944 1148 7561 Pass : 181905 --}}