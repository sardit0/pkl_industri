<!DOCTYPE html>
<html lang="en">
<head>
    <title>Assalaam Library</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('Admin/assets/images/logos/favicon.png') }}" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content=  "width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="{{ asset('User/assets/css/normalize.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('User/assets/icomoon/icomoon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('User/assets/css/vendor.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('User/assets/style.css') }}">

</head>

<body data-bs-spy="scroll" data-bs-target="#header" tabindex="0" style="overflow-x: hidden">

    <div id="header-wrap">

        <div class="top-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        {{-- <div class="social-links">
                            <ul>
                                <li>
                                    <a href="#"><i class="icon icon-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon icon-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon icon-youtube-play"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon icon-behance-square"></i></a>
                                </li>
                            </ul>
                        </div><!--social-links--> --}}
                    </div>
                    <div class="col-md-6">
                        <div class="right-element">
                            <div class="action-menu">
                                {{-- <div class="search-bar">
                                    <a href="#" class="search-button search-toggle" data-selector="#header-wrap">
                                        <i class="icon icon-search"></i>
                                    </a>
                                    <form role="search" method="get" class="search-box">
                                        <input class="search-field text search-input" placeholder="Search"
                                            type="search">
                                    </form>
                                </div> --}}
                            </div>

                        </div><!--top-right-->
                    </div>

                </div>
            </div>
        </div><!--top-content-->

        <header id="header">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-2">
                        <div class="main-logo">
                            <a href="index.html"><img src="{{ asset('User/assets/images/pl.png') }}"
                                    style="width: 50px" alt="logo"></a>
                        </div>
                    </div>
                    <div class="col-md-10">

                        <!-- Start Header/Navigation -->
                        @include('include.frontend.navbar')
                        <!-- End Header/Navigation -->

                    </div>

                </div>
            </div>
        </header>

    </div>

    <main class="main-wrapper">
        <div class="main-content">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </main>

    <!-- Start Footer Section -->
    @include('include.frontend.footer')
    <!-- End Footer Section -->

    <script src="{{ asset('User/assets/js/jquery-1.11.0.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script src="{{ asset('User/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('User/assets/js/script.js') }}"></script>


    <!-- Tambahkan di dalam <head> atau sebelum </body> -->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function() {
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/YOUR_PROPERTY_ID/default'; // Ganti YOUR_PROPERTY_ID dengan ID properti kamu
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>

</body>

</html>
