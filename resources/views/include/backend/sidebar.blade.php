{{-- <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="{{ route('home') }}">
            <img
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
        <li class="nav-item menu-items">
            <a class="nav-link" href="">
                <span class="menu-icon">
                    <i class="mdi mdi-library">
                    </i>    <span class="position-absolute top-10 start-100 translate-middle badge bg-danger" style="font-size: 0.6rem; padding: 0.2em 0.4em;">
                        5
                    </span>
                </span>
                <span class="menu-title">Pengajuan Peminjam</span>
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
            <a class="sidebar-link" href="{{ route('home') }}" aria-expanded="false">
              <span>
                <i class="ti ti-layout-dashboard" style="color: white"></i>
              </span>
              <span class="hide-menu" style="color: white">Dashboard</span>
            </a>
          </li>
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu" style="color: white">More Table</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('kategori.index') }}" aria-expanded="false">
              <span>
                <i class="ti ti-category" style="color: white"></i>
              </span>
              <span class="hide-menu" style="color: white">Category</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('penulis.index') }}" aria-expanded="false">
              <span>
                <i class="ti ti-writing" style="color: white"></i>
              </span>
              <span class="hide-menu" style="color: white">Writter</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('penerbit.index') }}" aria-expanded="false">
              <span>
                <i class="ti ti-user" style="color: white"></i>
              </span>
              <span class="hide-menu" style="color: white">Publisher</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('buku.index') }}" aria-expanded="false">
              <span>
                <i class="ti ti-book" style="color: white"></i>
              </span>
              <span class="hide-menu" style="color: white">Book</span>
            </a>
          </li>
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu" style="color: white">Submission</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('peminjamanadmin.index') }}" aria-expanded="false">
              <span>
                <i class="ti ti-building-bank" style="color: white"></i>
              </span>
              <span class="hide-menu" style="color: white">Apply for a loan</span>

              <span id="notification-count" class="badge bg-danger">
                {{ isset($loanNotification) && $loanNotification->count() > 0 ? $loanNotification->count() : 0 }}
              </span>

              <audio id="cuti-notification-sound">
                  <source src="{{ asset('sounds/notif_shopee.mp3') }}" type="audio/mpeg">
              </audio>
            </a>
          </li>
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu" style="color: white">Plus User</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('user.index') }}" aria-expanded="false">
              <span>
                <i class="ti ti-mood-happy" style="color: white"></i>
              </span>
              <span class="hide-menu" style="color: white">User</span>
            </a>
          </li>
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu" style="color: white">Report</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('admin.laporan_peminjaman') }}" aria-expanded="false">
              <span>
                <i class="ti ti-report" style="color: white"></i>
              </span>
              <span class="hide-menu" style="color: white">Borrowing Report</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('admin.laporan_pengembalian') }}" aria-expanded="false">
              <span>
                <i class="ti ti-report" style="color: white"></i>
              </span>
              <span class="hide-menu" style="color: white">Returned Report</span>
            </a>
          </li>
      </nav>
      <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
  </aside>
  <!--  Sidebar End -->

  <script>
    let previousNotificationCount = {{ isset($loanNotification) ? $loanNotification->count() : 0 }};

    function checkNotifications() {
        $.ajax({
            url: '{{ route('minjem.notifications') }}',
            type: 'GET',
            success: function(response) {
                let newCount = response.count;

                $('#notification-count').text(newCount).show();

                if (newCount > previousNotificationCount) {
                    let audio = document.getElementById('loan-notification-sound');
                    audio.play().catch(error => console.log('Gagal memutar audio:', error));
                }

                previousNotificationCount = newCount;
            },
            error: function() {
                console.log('Gagal memuat notifikasi');
            }
        });
    }

    // Memanggil fungsi setiap 5 detik
    setInterval(checkNotifications, 5000);
</script>
