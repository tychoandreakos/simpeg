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