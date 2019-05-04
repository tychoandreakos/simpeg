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
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
  <title>Simpeg NRMETAL @isset($title)
    {{'- '. $title}}
    @endisset</title>
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
                            <a class="nav-link" href="{{ $url = route('pegawai.index') }}" title="Home"> <i class="fa fa-home"></i><span
                                    class="ttip">Home</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" title="Logout"> <i class="fa fa-arrow-right"></i><span
                                    class="ttip">Logout</span></a>
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
    <script src="{{asset('js/sweetalert.min.js')}}"></script>
    <script src="{{asset('js/js.js')}}"></script>
    <script src="{{asset('js/clock.js')}}"></script>
    @include('sweet::alert')
  </body>
</html>