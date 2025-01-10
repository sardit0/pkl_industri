<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="footer-item">
                    <div class="company-brand">
                        <img src="{{ asset('User/assets/images/pl.png') }}" alt="logo" class="footer-logo" style="width: 100px">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sagittis sed ptibus liberolectus
                            nonet psryroin. Amet sed lorem posuere sit iaculis amet, ac urna. Adipiscing fames
                            semper erat ac in suspendisse iaculis.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="footer-menu">
                    <h5>About Us</h5>
                    <ul class="menu-list">
                        <li class="menu-item">
                            <a href="#">vision</a>
                        </li>
                        <li class="menu-item">
                            <a href="#">articles </a>
                        </li>
                        <li class="menu-item">
                            <a href="#">careers</a>
                        </li>
                        <li class="menu-item">
                            <a href="#">service terms</a>
                        </li>
                        <li class="menu-item">
                            <a href="#">donate</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
                <div class="footer-menu">
                    <h5>Discover</h5>
                    <ul class="menu-list">
                        <li class="menu-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="menu-item">
                            <a href="#">Books</a>
                        </li>
                        <li class="menu-item">
                            <a href="#">Authors</a>
                        </li>
                        <li class="menu-item">
                            <a href="#">Subjects</a>
                        </li>
                        <li class="menu-item">
                            <a href="#">Advanced Search</a>
                        </li>
                    </ul>
                </div>
            </div>
            @guest
            <div class="col-md-2">
                <div class="footer-menu">
                    <h5>Login/Register Account Here</h5>
                    <ul class="menu-list">
                        <li class="menu-item">
                            <a href="{{('login')}}">Sign In</a>
                        </li>
                        <li class="menu-item">
                            <a href="{{('register')}}">Sign Up</a>
                        </li>
                    </ul>
                </div>
            </div>
            @endguest
            <h5>Our Location</h5>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.361157048754!2d107.58974617419356!3d-6.966651668211156!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e8deccecb6f1%3A0x658cc60fbe5017b9!2sSMK%20Assalaam%20Bandung%20(PUSAT%20KEUNGGULAN)!5e0!3m2!1sid!2sid!4v1728531916541!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            {{-- @guest
            <div class="col-md-2">
                <div class="footer-menu">
                    <h5>Login/Register Account Here</h5>
                    <ul class="menu-list">
                        <li class="menu-item">
                            <a href="{{('login')}}">Sign In</a>
                        </li>
                        <li class="menu-item">
                            <a href="{{('register')}}">Sign Up</a>
                        </li>
                    </ul>
                </div>
            </div>
            @endguest --}}
        </div> <!-- / row -->
    </div>
</footer>

<div id="footer-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6">
                            <p>© 2022 All rights reserved. Free HTML Template by <a href="https://www.templatesjungle.com/" target="_blank">Zzz</a>
                            </p>
                        </div>
                    </div>
                </div><!--grid-->
            </div><!--footer-bottom-content-->
        </div>
    </div>
</div>

<!-- Tambahkan script Google Maps -->
{{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>
<script>
    function initMap() {
        var location = { lat: -6.200000, lng: 106.816666 }; 
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: location
        });
        var marker = new google.maps.Marker({
            position: location,
            map: map
        });
    }

    window.onload = initMap;
</script> --}}

