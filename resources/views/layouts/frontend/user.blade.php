<!-- /*
* Bootstrap 5
* Template Name: Furni
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="{{ asset('Admin/assets/images/favicon.png') }}">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4"/>

    <!-- Bootstrap CSS -->
    <link href="{{ asset('User/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link
        href="{{ asset('User/assets/https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('User/assets/css/tiny-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('User/assets/css/style.css') }}" rel="stylesheet">
    <title>Swiss Library</title>
</head>

<body>

    <!-- Start Header/Navigation -->
    @include('include.frontend.navbar')
    <!-- End Header/Navigation -->

    <!-- Start Testimonial Slider -->
    <main class="main-wrapper">
        <div class="main-content">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </main>
    
    <!-- End Testimonial Slider -->


    <!-- Start Footer Section -->
    @include('include.frontend.footer')
    <!-- End Footer Section -->


    <script src="{{ asset('User/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('User/assets/js/tiny-slider.js') }}"></script>
    <script src="{{ asset('User/assets/js/custom.js') }}"></script>
</body>

</html>
