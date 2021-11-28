@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->


@if ($errors->any())
<div class="alert alert-danger border-left-danger" role="alert">
    <ul class="pl-4 my-2">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if (session('success'))
<div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if (session('failed'))
<div class="alert alert-danger border-left-danger alert-dismissible fade show" role="alert">
    {{ session('failed') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif


<div class="row">
    <div class="col-md-12 order-lg-1">
        <div class="card">
            <div class="card-header">
               <h6 class="m-0 font-weight-bold text-primary">Filter dan Export Laporan</h6>
               <div class="card-body">
                <form action="data_perbaikan" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row mt-3">
                        <label for="from" class="col-form-label">Dari</label>
                        <div class="col-md-2">
                            <input type="date" class="form-control input-sm" id="from" name="from">
                        </div>
                        <label for="from" class="col-form-label">Sampai</label>
                        <div class="col-md-2">
                            <input type="date" class="form-control input-sm" id="to" name="to">
                        </div>

                        <div class="col-md-4">
                           <div class="btn-group btn-group-md">
                            <button type="submit" class="btn btn-primary btn-md" name="search" >Filter Tanggal</button>
                            <button type="submit" class="btn btn-success btn-md" name="exportExcel" >Export Excel</button>
                            <button type="submit" class="btn btn-danger btn-md" name="exportPDF" >Export PDF</button>
                        </div>
                    </div>
                    
                </div>



            </form>
        </div>
        
    </div>
    
</div>



</div>
<div class="col-lg-12 order-lg-1 mt-2">


    <!-- endexport -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Laporan Masuk</h6>
        </div>
        <div class="card-body">

            
            <div class="table-responsive">

                <table class="table table-bordered lap" aria-sort="descending" id="dataTable" width="100%" cellspacing="0">
                 

                    <thead>
                        <tr>
                           <th>Tanggal</th>
                           <th>Nama Pelapor</th>
                           
                           
                           <th>Nomor HP</th>
                           <th>Detail Lokasi</th>
                           <th>Status</th> 
                           
                           <th>Aksi</th>
                       </tr>
                   </thead>
                   <tbody>
                    @foreach ($laporan as $lap )
                    <tr>
                       <td>{{$lap->created_at}}</td>
                       <td>{{$lap->pelapor->nama_pelapor}}</td>
                       <td>{{$lap->pelapor->nomor_hp}}</td>
                       <td>{{$lap->detail_lokasi}}</td>

                       <td><p class="text-success"> {{$lap->status}}</p></td> 
                       
                       <td>
                        <div class="btn-group btn-group-md">
                         
                            <a href="{{ route('laporan.show',$lap->id_laporan) }}" class="btn btn-secondary btn-sm"><i class="fa fa-1x fa-info-circle text-white"></i></a> 
                            <a href="hapus_laporan/{{$lap->id_laporan}}" class="btn btn-danger btn-sm" id="hapus"><i class="fa fa-1x fa-trash text-white"></i></a>
                        </div>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
    

</div>

</div>
</div>





@endsection
