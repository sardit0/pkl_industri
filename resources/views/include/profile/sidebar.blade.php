<!-- Sidebar Start -->
<aside class="left-sidebar bg-dark">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="{{ route('home') }}" class="text-nowrap logo-img">
                <img src="{{ asset('Admin/assets/images/logo-custom.png') }}" width="100" alt="logo" />
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
                        <span class="hide-menu" style="color: white">Borrower Data</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('kembalian.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-building-bank" style="color: white"></i>
                        </span>
                        <span class="hide-menu" style="color: white">Return Data</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('peminjaman.history') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-history" style="color: white"></i>
                        </span>
                        <span class="hide-menu" style="color: white">History Borrower</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation-->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- Sidebar End -->