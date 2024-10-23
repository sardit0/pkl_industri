<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Library Admin</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('Admin/assets/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('Admin/assets/css/styles.min.css') }}" />
</head>

<body style="overflow-x:hidden">
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        {{-- header --}}
        @include('include.backend.header')

        {{-- start sidebar --}}
        @include('include.backend.sidebar') 
        <div class="body-wrapper"> 
         
             <div class="row">
              @yield('content')
             </div>
            
        </div>
    </div>
    <script src="{{ asset('Admin/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('Admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('Admin/assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('Admin/assets/js/app.min.js') }}"></script>
    <script src="{{ asset('Admin/assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('Admin/assets/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ asset('Admin/assets/js/dashboard.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @include('sweetalert::alert')
    @stack('scripts')
    @yield('js')
</body>

</html>
