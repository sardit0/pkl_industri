<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="{{ route('home') }}"><img
                src="{{ asset('Admin/assets/images/logo-custom.png') }}" alt="logo" style="width: 100px;height:80px" /></a>
    </div>
    <ul class="nav">
        <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('profile') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-account"></i>
                </span>
                <span class="menu-title">Profile</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('dashboarduser') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">Daftar Tabel</span>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('peminjaman.index') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-arrow-bottom-left"></i>
                </span>
                <span class="menu-title">Data Peminjaman</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('peminjaman.history') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-clock"></i>
                </span>
                <span class="menu-title">Riwayat Peminjaman</span>
            </a>
        </li>
        {{-- <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('kembalian.index') }}">
                <span class="menu-icon">
                    <i class="mdi mdi mdi-autorenew"></i>
                </span>
                <span class="menu-title">Data Pengembalian</span>
            </a>
        </li> --}}
    </ul>
</nav>