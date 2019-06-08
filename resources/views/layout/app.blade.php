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
                 <!-- Right Side Of Navbar -->
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
                        @if(Auth::user()->admin == 1)
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('register') }}" title="Operator"> <i class="fa fa-user"></i><span
                                  class="ttip">Operator</span></a>
                        </li>
                      @endif

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" title="Logout"> <i class="fa fa-arrow-right"></i><span
                                    class="ttip">Logout</span></a>
                        </li>
                    </ul>

                    <ul class="navbar-nav ml-md-auto d-md-flex">
                      <!-- Authentication Links -->
                      @guest
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                          </li>
                          @if (Route::has('register'))
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                              </li>
                          @endif
                      @else
                          <li class="nav-item dropdown">
                              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  {{ Auth::user()->name }} <span class="caret"></span>
                              </a>
    
                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="{{ route('logout') }}"
                                     onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                      {{ __('Logout') }}
                                  </a>
    
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      @csrf
                                  </form>
                              </div>
                          </li>
                      @endguest
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