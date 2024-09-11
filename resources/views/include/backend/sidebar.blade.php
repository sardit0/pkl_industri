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
            <a class="nav-link" href="{{ route('home') }}">
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
            <a class="nav-link" href="{{ route('kategori.index') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-table-large"></i>
                </span>
                <span class="menu-title">Data Kategori</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('penulis.index') }}">
                <span class="menu-icon">
                    <i class="mdi  mdi-border-color icon-item"></i>
                </span>
                <span class="menu-title">Data Penulis</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('penerbit.index') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-account"></i>
                </span>
                <span class="menu-title">Data Penerbit</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('buku.index') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-book"></i>
                </span>
                <span class="menu-title">Data Buku</span>
            </a>
        </li>
        <li class="nav-item nav-category">
            <hr>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('user.index') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-account-multiple-plus"></i>
                </span>
                <span class="menu-title">User</span>
            </a>
        </li>
    </ul>
</nav>