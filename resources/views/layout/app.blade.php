<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css ') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Selamat Datang</title>
  </head>
  <body>

    <!-- header-menu -->
    <div id="wrapper" class="animate">
       
            <nav class="navbar header-top fixed-top navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="#">SIMPEG NRMetal</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav animate side-nav">
    
                        <li class="nav-item">
                            <a class="nav-link" href="#" title="Absen"> <i class="fa fa-book"></i><span
                                    class="ttip">Absensi</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" title="Gaji"> <i class="fa fa-dollar"></i><span
                                    class="ttip">Gaji</span></a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-md-auto d-md-flex">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ $url = route('home')  }}">Home <i class="fa fa-home"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Logout <i class="fa fa-arrow-right"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
    

   @yield('body')



</div>
</div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{asset('js/jquery-3.3.1.slim.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="h{{asset('js/sweetalert.min.js')}}"></script>
    <script src="{{asset('js/js.js')}}"></script>
    <script src="{{asset('js/clock.js')}}"></script>
    @include('sweet::alert')
  </body>
</html>