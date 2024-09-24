{{-- <nav class="sidebar sidebar-offcanvas" id="sidebar">
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
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('kembalian.index') }}">
                <span class="menu-icon">
                    <i class="mdi mdi mdi-autorenew"></i>
                </span>
                <span class="menu-title">Data Pengembalian</span>
            </a>
        </li>
    </ul>
</nav> --}}

<!-- Sidebar Start -->
<aside class="left-sidebar bg-dark">
    <!-- Sidebar scroll-->
    <div>
      <div class="brand-logo d-flex align-items-center justify-content-between">
        <a href="./index.html" class="text-nowrap logo-img">
          <img src="{{asset ('Admin/assets/images/ass.png')}}" width="100" alt="" />
        </a>
        <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
          <i class="ti ti-x fs-8" style="color: white"></i>
        </div>
      </div>
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
        <ul id="sidebarnav">
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu" style="color: white">Home</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('dashboarduser') }}" aria-expanded="false">
              <span>
                <i class="ti ti-layout-dashboard" style="color: white"></i>
              </span>
              <span class="hide-menu" style="color: white">Dashboard</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('profile') }}" aria-expanded="false">
              <span>
                <i class="ti ti-user-circle" style="color: white"></i>
              </span>
              <span class="hide-menu" style="color: white">Profile</span>
            </a>
          </li>
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu" style="color: white">More Table</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('peminjaman.index') }}" aria-expanded="false">
              <span>
                <i class="ti ti-building-bank" style="color: white"></i>
              </span>
              <span class="hide-menu" style="color: white">Borrower data</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('peminjaman.history') }}" aria-expanded="false">
              <span>
                <i class="ti ti-history" style="color: white"></i>
              </span>
              <span class="hide-menu" style="color: white">History borrower</span>
            </a>
          </li>
      </nav>
      <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
  </aside>
  <!--  Sidebar End -->