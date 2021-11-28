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
        <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

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
            <div class="container">


            <div class="content">
                <h1 class="text-white mt-5">Selamat Datang <br> Di SI Prambu</h1> 
                   
               
                <h6 class="text-white">SI PRAMBU adalah website yang berguna sebagai sistem informasi pelaporan kerusakan rambu lalu lintas. Laporan anda akan sangat membantu kami dalam memperbaiki rambu yang rusak sehingga terciptanya keamanan dan ketertiban jalan raya. </h6>
                {{-- <h6 class="text-white">Silahkan pilih opsi di bawah ini</h6> --}}
                <br>
                <div class="links">
                    <span style="padding: 1%" class="bg-primary"><a class="text-white text-bold" href="/autentikasi">Lapor Sekarang</a>
                    </span>
                </div>
            </div>

            <br>

        </div>

       
            <div class="container-fluid mt-5 bg-white50">
                <br>
                

                   
           <div class="card shadow mb-4">
                        <div class="card-header py-3">
                           <h4 class="text-dark ">Laporan Terkini</h4>
                        </div>
                        <div class="card-body">

                
                            <div class="table-responsive">

                                <table class="table table-bordered lap" aria-sort="descending" id="dataTable" width="100%" cellspacing="0">
                                   

                        <thead>
                            <tr>
                                 <th>Tanggal</th>
                                <th>Nama Pelapor</th>
                              
                             
                        
                                <th>Detail Lokasi</th>

                                <th>Status</th> 
                                <th>Lihat detail</th>
                                
                         
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laporan as $lap )
                            <tr>
                                 <td>{{$lap->created_at}}</td>
                            <td>{{$lap->pelapor->nama_pelapor}}</td>
                        
                             <td>{{ $lap->detail_lokasi }}</td>
                             <td><p class="text-success"> {{$lap->status}}</p></td> 
                             <td> <a href="/detail/{{$lap->id_laporan}}" class="btn btn-secondary btn-sm"><i class="fa fa-1x fa-info-circle text-white"></i></a> </td>
   
</tr>

                          @endforeach
                                    </tbody>
                                </table>
                            </div>
                      

        </div>

    </div>
            </div>
           


        <div class="footer">

            <strong>Copyright &copy; SI PRambu 2021.</strong> All rights reserved.
        </div>


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
    </body>
</html>
