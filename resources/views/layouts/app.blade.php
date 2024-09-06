<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>My Application</title>
</head>
<body>
    <nav>
        <!-- Tombol Login dan Register -->
        @guest
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        @endguest

        <!-- Konten yang hanya terlihat jika pengguna sudah login -->
        @auth
            <a href="{{ route('logout') }}" 
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
               Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endauth
    </nav>
    <div>
        @yield('content')
    </div>
</body>
</html>