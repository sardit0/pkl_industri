<!-- Start Header/Navigation -->
<nav class="custom-navbar navbar navbar-expand-md navbar-dark bg-dark fixed-top" aria-label="Furni navigation bar">

    <div class="container">
        <a class="navbar-brand" href="">Swiss Library<span>.</span></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
            aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsFurni">
            <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                {{-- <li class="nav-item active">
                    <a class="nav-link" href="#">Home</a>
                </li> --}}

                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @endguest

                <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                    <li><a class="nav-link" href="{{route ('buku')}}">Buku</a></li>
                </ul>
            </ul>
        </div>
    </div>
    <ul class="navbar-nav gap-1 nav-right-links align-items-center">
        <li class="nav-item d-lg-none mobile-search-btn">
            <a class="nav-link" href="javascript:;"></a>
        </li>

        <li class="nav-item dropdown">
            <a href="javascrpt:;" data-bs-toggle="dropdown">
                <img src="{{asset ('User/assets/images/person-1.png')}}" class="rounded-circle p-1 border" width="45"
                    height="45" alt="">
            </a>
            <div class="dropdown-menu dropdown-user dropdown-menu-end shadow">
                <a class="dropdown-item  gap-2 py-2" href="javascript:;">
                    <div class="text-center">
                        <img src="{{asset ('User/assets/images/person-1.png')}}" class="rounded-circle p-1 shadow mb-3"
                            width="90" height="90" alt="">
                        <h5 class="user-name mb-0 fw-bold">Hello, {{ Auth::user()->name }}</h5>
                    </div>
                </a>
                <hr class="dropdown-divider">
                <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="{{ route('dashboarduser') }}">
                    <span class="mdi mdi-power"></span>Profile</a>
                <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="{{ route('login') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="mdi mdi-power"></span>Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
        
    </ul>

</nav>
<!-- End Header/Navigation -->
