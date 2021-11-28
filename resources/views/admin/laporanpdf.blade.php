<!DOCTYPE html>
<html>
<head>
	<title>Laporan Kerusakan Rambu Lalu Lintas</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Laporan Kerusakan Rambu Lalu Lintas</h5>
		<h6>Laporan ini berdasarkan tanggal yang sesuai dengan tabel di bawah ini.</h6>
		<hr>
		
	</center>

	<table class='table table-bordered'>
		<thead>
			<tr>
			 <th>Tanggal</th>
                                <th>Nama Pelapor</th>
                                <th>Nomor HP</th>
                                <th>Detail Lokasi</th>
                                <th>Status</th>  
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($laporan as $lap)
			<tr>
				     <td>{{$lap->created_at}}</td>
                            <td>{{$lap->pelapor->nama_pelapor}}</td>
                             <td>{{$lap->pelapor->nomor_hp}}</td>
                             <td>{{ $lap->detail_lokasi }}</td>
                             <td>{{$lap->status}}</td> 
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>