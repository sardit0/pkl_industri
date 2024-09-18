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

                <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                    <li><a class="nav-link" href="{{ route('buku') }}">Buku</a></li>
                </ul>

                @auth
                <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                    <li><a class="nav-link" href="{{ route('dashboarduser') }}">Dashboard</a></li>
                </ul>
                <ul class="navbar-nav gap-1 nav-right-links align-items-center">
                    <!-- Navbar Item untuk Dropdown Profile -->
                    <li class="nav-item dropdown pt-4">
                        <!-- Link untuk membuka dropdown -->
                        <a href="javascript:;" data-bs-toggle="dropdown">
                            <!-- Gambar profil user -->
                            <img src="{{ asset('path/to/profile-picture') }}" class="rounded-circle p-1 border" width="45" height="45" style="object-fit: cover;" alt="Profile Picture">
                        </a>

                        <!-- Dropdown menu -->
                        <div class="dropdown-menu dropdown-user dropdown-menu-end shadow" style="width: 250px; border-radius: 5%;">
                            <a class="dropdown-item d-flex align-items-center gap-2 py-2">
                                <div class="text-center w-100">
                                    <!-- Uncomment line ini dan pastikan path gambar profil benar -->
                                    {{-- <img src="{{ asset('images/user/' . $user->fotoprofile) }}"  class="rounded-circle p-1 shadow mb-3" width="90" height="90" style="object-fit: cover;" alt="User Profile"> --}}
                                    <h5 class="user-name mb-0 fw-bold text-dark">Hello, {{ Auth::user()->name }}</h5>
                                </div>
                            </a>

                            <hr class="dropdown-divider">

                            <!-- Bagian khusus admin -->
                            @auth
                            @if(auth()->user()->isAdmin)
                            <a class="dropdown-item d-flex align-items-center gap-2 py-2" style="color: black;" href="{{ route('home') }}">
                                Admin Dashboard
                            </a>
                            @endif
                            @endauth

                            <!-- Link ke dashboard user/profile -->
                            <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="{{ route('dashboarduser') }}">
                                Profile
                            </a>

                            <hr>

                            <!-- Link untuk logout -->
                            <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="{{ route('login') }}" 
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <!-- Form untuk logout -->
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>

                @endauth
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>

</nav>
<!-- End Header/Navigation -->
