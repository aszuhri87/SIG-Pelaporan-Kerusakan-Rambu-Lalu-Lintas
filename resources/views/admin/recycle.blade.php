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

    <div class="row">



        <div class="col-lg-12 order-lg-1">

           <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Laporan Masuk</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                   

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
                            @foreach ($laporan as $r )
                            <tr>
                                 <td>{{$r->created_at}}</td>
                            <td>{{$r->pelapor->nama_pelapor}}</td>
                             <td>{{$r->pelapor->nomor_hp}}</td>
                             <td>{{ $r->detail_lokasi }}</td>
                             <td><p class="text-danger"> {{$r->status}}</p></td> 
                             
                               
                                <td>
                                    <div class="btn-group btn-group-md">
    <a href="/recycle/restore/{{ $r->id_laporan }}" class="btn btn-success btn-sm"><i class="fa fa-1x  fa-trash-restore text-white"></i></a>
    <a href="/recycle/hapus_permanen/{{ $r->id_laporan }}" class="btn btn-danger btn-sm" id="delete"><i class="fa fa-1x fa-trash text-white"></i></a>
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
</div>


<script src="{{asset('/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>

{{-- <script>
    $('button#delete').on('click',function(e){
        e.preventDefault();
        var href = $(this).attr('href');
            Swal.fire({
            title: 'Hapus Data Ini?',
            text: "Perhatian data yang sudah di hapus tidak bisa di kembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText : 'Batal!'
            }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm').action = href;
                document.getElementById('deleteForm').submit();
                Swal.fire(
                'Terhapus!',
                'Data sudah terhapus.',
                'success'
                )
            }
            })
        });
</script> --}}

@endsection
