<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="footer-item">
                    <div class="company-brand">
                        <img src="{{ asset('User/assets/images/pl.png') }}" alt="logo"
                            class="footer-logo">
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
                    <h5>My account</h5>
                    <ul class="menu-list">
                        <li class="menu-item">
                            <a href="{{('login')}}">Sign In</a>
                        </li>
                        <li class="menu-item">
                            <a href="{{('register')}}">Sign Up</a>
                        </li>
                        {{-- <li class="menu-item">
                            <a href="#">View Cart</a>
                        </li>
                        <li class="menu-item">
                            <a href="#">My Wishtlist</a>
                        </li>
                        <li class="menu-item">
                            <a href="#">Track My Order</a>
                        </li> --}}
                    </ul>
                </div>
            </div>
            @endguest
        <!-- / row -->

    </div>
</footer>

<div id="footer-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="copyright">
                    <div class="row">

                        <div class="col-md-6">
                            <p>© 2022 All rights reserved. Free HTML Template by <a
                                    href="https://www.templatesjungle.com/" target="_blank">Zzz</a>
                            </p>
                        </div>
                    </div>
                </div><!--grid-->

            </div><!--footer-bottom-content-->
        </div>
    </div>
</div>