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

     <!-- Styles -->
    <style>
        .container {
            max-width: 500px;
        }
        .reload {
            font-family: Lucida Sans Unicode
        }

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

     <!-- Favicon -->
     <link href="{{ asset('img/favicon.png') }}" rel="icon" type="image/png">
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

                        <li class="nav-item">
                            <a class="nav-link" href="https://balaibahasadiy.kemdikbud.go.id/laman/index.php/organisasi/visi-misi"> Visi & Misi</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="https://balaibahasadiy.kemdikbud.go.id/laman/index.php/organisasi/tugas-dan-fungsi">Tugas & Fungsi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://balaibahasadiy.kemdikbud.go.id/laman/index.php/saran-kritik">Saran & Kritik</a>
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
<div class="container mt-5">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
    @endif
    <div class="row justify-content-center mb-5 mt-5">
        <div class="col-md-8">

            <div class="card shadow mb-4">

                <div class="card-header py-1">
                    <h6 class="m-0 font-weight-bold text-primary">Autentikasi Captcha</h6>
                </div>

                <div class="card-body">
                    <form method="post" action="{{url('captcha-validation')}}">
                        @csrf

                        <div class="form-group mt-4 mb-4">
                            <div class="captcha">
                                <span>{!! captcha_img() !!}</span>
                                <button type="button" class="btn btn-danger" class="reload" id="reload">
                                    &#x21bb;
                                </button>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>

</div>
 <div class="footer">

            <strong>Copyright &copy; SI PRambu 2021.</strong> All rights reserved.
        </div>



</body>

 <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js')}}"></script>
    <script src="{{ asset('js/jquery-3.3.1.js')}}"></script>

<!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<script type="text/javascript">
    $('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: 'reload-captcha',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });

</script>
</html>
