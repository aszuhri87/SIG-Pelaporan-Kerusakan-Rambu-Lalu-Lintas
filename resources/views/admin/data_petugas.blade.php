@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Master Data Petugas') }}</h1>

@if ($errors->any())
<div class="alert alert-danger border-left-danger" role="alert">
  <ul class="pl-4 my-2">
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

@if ($message = Session::get('status'))
<div class="alert alert-success alert-block">
  <button type="button" class="close" data-dismiss="alert">×</button> 
  <strong>{{ $message }}</strong>
</div>
@endif
<div class="btn-group btn-group-md">
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTbhPetugas">
   
    <i class="fa fa-1x fa-plus text-white"></i>
  </button>
  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalTbhUser"><i class="fa fa-1x fa-user-plus text-white"></i></button>
</div>
   <!--   <a class="btn btn-primary" href="{{ route('register') }}">
    Jadikan User
  </a> -->
  <div class="row mt-3">

    {{-- modal tambah--}}
    <div class="modal fade" id="modalTbhPetugas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Petugas</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post" action="{{route('simpanpetugas')}}">
              @csrf

              <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama_petugas">
              </div>

              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email">
              </div>

              <div class="form-group">
                <label>Jabatan</label>
                <!--  <input type="text" class="form-control" name="jabatan"> -->
                <select name="jabatan" class="form-control">
                  <option value="admin">{{ 'Admin'}}</option>
                  <option value="karyawan">{{ 'Karyawan'}}</option>
                </select>
              </div>


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Simpan</button></form>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-12 order-lg-1">


       <div class="card shadow mb-4">
        <div class="card-header py-3">
         
          <h6 class="m-0 font-weight-bold text-primary">Data Petugas</h6>
          
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              

              <thead>
                <tr>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Jabatan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                 @foreach ($petugas as $p )
                 <td>{{ $p->nama_petugas }}</td>
                 <td>{{ $p->email }}</td>
                 <td>{{ $p->jabatan }}</td>
                 <td>
                  
                  <div class="btn-group btn-group-md">
                    <button type="button" class="btn btn-xs btn-success edit" data-id="{{$p->id_petugas}}"><i class="fa fa-1x fa-edit text-white"></i></button>
                    
                               <button type="button" class="btn btn-xs btn-danger hapus" data-idx="{{$p->id_petugas}}"><i class="fa fa-1x fa-trash text-white"></i></button>
{{-- 
                    <a href="hapuspetugas/{{$p->id_petugas }}" class="btn btn-xs btn-danger"  ><i class="fa fa-1x fa-trash text-white"></i></a>
                     --}}

                  </div>
                </td>
              </tr>

              @endforeach
            </tbody>
          </table>
        </div>
        
        

        
        

        
        <!-- modal edit data -->
        <div class="modal inmodal fade" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-xs">
            <form name="frm_edit" id="frm_edit" class="form-horizontal" action="{{route('updatepetugas')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Edit Data</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <input type="text" name="nama_petugas" id="nama_petugas" placeholder="Nama Petugas" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" id="email">
                  </div>

                  <div class="form-group">
                    <label>Jabatan</label>
                    <select name="jabatan" class="form-control">
                      <option value="admin">{{ 'Admin'}}</option>
                      <option value="karyawan">{{ 'Karyawan'}}</option>
                    </select>
                  </div>
                </div>
                <div class="modal-footer">
                  <input type="hidden" name="id" id="id">
                  <button type="button" class="btn btn-white" data-dismiss="modal">Tutup</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </div>
            </form>
          </div>
        </div>

         <!-- modal hapus data -->
        <div class="modal inmodal fade" id="modal-hapus" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-xs">
            <form name="frm_hapus" id="frm_hapus" class="form-horizontal" action="{{route('hapuspetugas')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">hapus Data</h4>
                </div>
                <div class="modal-body">
                  
                     <input type="hidden" name="idh" id="idh">
                 
                   Apakah anda ingin Menghapus Petugas ini :
                   <b> <input type="text" name="nama_petugas" id="nama_petugas_h" placeholder="Nama Petugas"></b>
                 
                </div>
                <div class="modal-footer">
                 
                  <button type="button" class="btn btn-white" data-dismiss="modal">Tutup</button>
                  <button type="submit" class="btn btn-danger" >Hapus</button>
                </div>
              </div>
            </form>
          </div>
        </div>


        <!-- moda akun -->

        {{-- modal tambah user--}}
        <div class="modal fade" id="modalTbhUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post" action="{{route('tambah_akun')}}">
                  @csrf
                  <div class="form-group">
                   <label>Nama</label>
                   <input type="text" class="form-control form-control" name="name" id="name" placeholder="Nama Akun" required>
                 </div>

                 <div class="form-group">
                  <label>Petugas</label>
                  <select name="id_petugas" id="id_petugas" class="form-control">
                   @foreach ($petugas as $p)
                   <option value="{{$p->id_petugas}}">{{ $p->nama_petugas}}</option>
                   @endforeach
                 </select>
               </div>
{{-- 
                            <input type="email" class="form-control form-control-user" name="email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required>
                          </div> --}}
                          <div class="form-group">
                           <label>Email</label>
                           <select name="email" id="email" class="form-control">
                             @foreach ($petugas as $p)
                             <option value="{{$p->email}}">{{ $p->email}}</option>
                             @endforeach
                           </select>
                         </div>
                         <div class="form-group">
                           <label>Password</label>
                           <input type="password" class="form-control form-control-user" name="password" placeholder="{{ __('Password') }}" required>
                         </div>

                         <div class="form-group">
                           <label>Ulangi Password</label>
                           <input type="password" class="form-control form-control-user" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" required> </div>

                         </div>
                         
                         <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Simpan</button></form>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>




                <div class="modal inmodal fade" id="modal-akun" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-xs">
                    <form name="frm_edit" id="frm_edit" class="form-horizontal" action="{{route('tambah_akun')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Jadikan User</h4>
                        </div>
                        <div class="modal-body">
                          <div class="form-group">
                            <input type="hidden" name="id_petugas" id="id_petugas" placeholder="" class="form-control">
                            <input type="text" name="name" id="name" placeholder="Nama Petugas" class="form-control">
                          </div>
                          <div class="form-group">
                            <div class="form-group">
                              <input type="email" class="form-control form-control-user" name="email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required>
                            </div>

                            <div class="form-group">
                              <input type="password" class="form-control form-control-user" name="password" placeholder="{{ __('Password') }}" required>
                            </div>

                            <div class="form-group">
                              <input type="password" class="form-control form-control-user" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" required> </div>

                            </div>
                            <div class="modal-footer">
                              <input type="hidden" name="id" id="id">
                              <button type="button" class="btn btn-white" data-dismiss="modal">Tutup</button>
                              <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>

                  </div>

                </div>

              </div>

            </div>
            <script src="{{ asset('js/jquery-3.3.1.js')}}"></script>

            <script>
              $(document).ready(function() {
//edit data
$('.edit').on("click",function() {
  var id = $(this).attr('data-id');
  $.ajax({
    url : "{{route('editpetugas')}}?id="+id,
    type: "GET",
    dataType: "JSON",
    success: function(data)
    {
      $('#id').val(data.id_petugas);
      $('#nama_petugas').val(data.nama_petugas);
      $('#email').val(data.email);
      $('#jabatan').val(data.jabatan);
      $('#modal-edit').modal('show');
    }
  });
});


$(document).ready(function() {
//edit data
$('.hapus').on("click",function() {
  var idh = $(this).attr('data-idx');
  $.ajax({
    url : "{{route('hapetugas')}}?id="+idh,
    type: "GET",
    dataType: "JSON",
    success: function(data)
    {
      $('#idh').val(data.id_petugas);
      $('#nama_petugas_h').val(data.nama_petugas);
      $('#modal-hapus').modal('show');
    }
  });
});

});

});
</script>

<script>
  
</script>
{{--     <script>
$(document).ready(function() {
//edit data
$('.akun').on("click",function() {
var id = $(this).attr('data-id');
$.ajax({
url : "{{route('petugas_akun')}}?id="+id,
type: "GET",
dataType: "JSON",
success: function(data)
{
$('#id').val(data.id_petugas);
$('#name').val(data.name);
$('#email').val(data.email);
$('#password').val(data.password);
$('#modal-akun').modal('show');
}
});
});

});
</script> --}}
@endsection
@push('script')

<!-- Bootstrap core JavaScript-->
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('js/sb-admin-2.min.js')}}"></script>


<!-- Page level plugins -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/datatables-demo.js')}}"></script>

<script src="{{ asset('js/jquery-3.3.1.js')}}"></script>


@endpush 