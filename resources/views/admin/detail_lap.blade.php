@extends('layouts.admin')

@section('main-content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    
                        <a href="{{ route('data_laporan') }}" ><i class="fa fa-1x fa-home text-dark"></i></a> Detail laporan
                             
                      
                       
                            
                        
                        
                    </div>
                    
                <div class="card-body">
                    <table class="table">
                        <tbody>

                        
                            <tr><td>Nama Pelapor</td><td>{{ $laporan->pelapor->nama_pelapor }}</td></tr>
                            <tr><td>Nomor HP</td><td>{{ $laporan->pelapor->nomor_hp }}</td></tr>
                            <tr><td>Email</td><td>{{ $laporan->pelapor->email }}</td></tr>
                            <tr><td>Tanggal</td><td>{{$laporan->created_at}}</</td></tr>
                            <tr><td>Latitude</td><td>{{ $laporan->latitude }}</td></tr>
                             <tr><td>Longitude</td><td>{{ $laporan->longitude }}</td></tr>
                            <tr><td>Detail Lokasi</td><td>{{ $laporan->detail_lokasi }}</td></tr>
                            <tr><td>Gambar</td><td><img src="/thumbnail/{{ $laporan->gambar}}"></td></tr>
                       	
                        <td></td>
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


@endsection


