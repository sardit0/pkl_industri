@extends('layouts.frontend.user')
@section('content')
    <section id="billboard">

        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <button class="prev slick-arrow">
                        <i class="icon icon-arrow-left"></i>
                    </button>

                    <div class="main-slider pattern-overlay">
                        <div class="slider-item">
                            <div class="banner-content">
                                <h2 class="banner-title">Life of the Wild</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero
                                    ipsum enim pharetra hac. Urna commodo, lacus ut magna velit eleifend. Amet, quis
                                    urna, a eu.</p>
                            </div><!--banner-content-->
                            <img src="{{ asset('User/assets/images/main-banner1.jpg') }}" alt="banner"
                                class="banner-image">
                        </div><!--slider-item-->

                        <div class="slider-item">
                            <div class="banner-content">
                                <h2 class="banner-title">Birds gonna be Happy</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero
                                    ipsum enim pharetra hac. Urna commodo, lacus ut magna velit eleifend. Amet, quis
                                    urna, a eu.</p>
                            </div><!--banner-content-->
                            <img src="{{ asset('User/assets/images/main-banner2.jpg') }}" alt="banner"
                                class="banner-image">
                        </div><!--slider-item-->

                    </div><!--slider-->

                    <button class="next slick-arrow">
                        <i class="icon icon-arrow-right"></i>
                    </button>

                </div>
            </div>
        </div>

    </section>

    <section id="client-holder" data-aos="fade-up">
        <div class="container">
            <div class="row">
                <div class="inner-content">
                    <div class="logo-wrap">
                        <div class="grid">
                            <a href="#"><img src="{{ asset('User/assets/images/client-image1.png') }}"
                                    alt="client"></a>
                            <a href="#"><img src="{{ asset('User/assets/images/client-image2.png') }}"
                                    alt="client"></a>
                            <a href="#"><img src="{{ asset('User/assets/images/client-image3.png') }}"
                                    alt="client"></a>
                            <a href="#"><img src="{{ asset('User/assets/images/client-image4.png') }}"
                                    alt="client"></a>
                            <a href="#"><img src="{{ asset('User/assets/images/client-image5.png') }}"
                                    alt="client"></a>
                        </div>
                    </div><!--image-holder-->
                </div>
            </div>
        </div>
    </section>

    <section id="featured-books" class="py-5 my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="section-header align-center">
                        <div class="title">
                            <span>Some quality items</span>
                        </div>
                        <h2 class="section-title">Featured Books</h2>
                    </div>

                    <div class="product-list" data-aos="fade-up">
                        <div class="row">
                            @php
                                $limitedbuku = $buku->take(4);
                            @endphp
                            @foreach ($limitedbuku as $hideng)
                                <div class="col-md-3">
                                    <div class="product-item">
                                        <figure class="product-style">
                                            <img src="{{ asset('images/buku/' . $hideng->image) }}" alt="Books" onerror="this.onerror=null; this.src='{{ asset('User/assets/images/available.png') }}';"
                                                class="product-item">
                                            <button type="button" class="add-to-cart" data-product-tile="add-to-cart"><a
                                                    href="{{ route('peminjaman.create') }}">Want to borrow?</a></button>
                                        </figure>
                                        <figcaption>
                                            <h3>{{ $hideng->judul }}</h3>
                                        </figcaption>
                                    </div>
                                </div>
                            @endforeach
                        </div><!--ft-books-slider-->
                    </div><!--grid-->


                </div><!--inner-content-->
            </div>

            <div class="row">
                <div class="col-md-12">

                    <div class="btn-wrap align-right">
                        <a href="{{ route('buku') }}" class="btn-accent-arrow">View all products <i
                                class="icon icon-ns-arrow-right"></i></a>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section id="best-selling" class="leaf-pattern-overlay">
        <div class="corner-pattern-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-md-8">

                    <div class="row">

                        <div class="col-md-6">
                            @php
                                $limitedbuku = $buku->take(1);
                            @endphp
                            @foreach ($limitedbuku as $item)
                                <figure class="products-thumb">
                                    {{-- <img src="images/single-image.jpg" alt="book" class="single-image"> --}}
                                    <img src="{{ asset('images/buku/' . $item->image) }}" alt="Books" onerror="this.onerror=null; this.src='{{ asset('User/assets/images/available.png') }}';"
                                        class="product-item">
                                </figure>
                        </div>
                        <div class="col-md-6">
                            <div class="product-entry">
                                <h2 class="section-title divider">Most borrowed books</h2>
                                <div class="products-content">
                                    <div class="author-name">{{ $item->penulis->nama_penulis }}</div>
                                    <h3 class="item-title">{{ $item->judul }}</h3>
                                    <p>{{ $item->desk }}</p>
                                    <div class="btn-wrap">
                                        <a href="{{ route('peminjaman.create') }}" class="btn-accent-arrow">Borrow
                                            Now!<i class="icon icon-ns-arrow-right"></i></a>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>

                    </div>
                    <!-- / row -->

                </div>

            </div>
        </div>
    </section>

    <section id="popular-books" class="bookshelf py-5 my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="section-header align-center">
                        <div class="title">
                            <span>Some quality items</span>
                        </div>
                        <h2 class="section-title">Popular Books</h2>
                    </div>
                    <div class="tab-content">
                        <div id="all-genre" data-tab-content class="active">
                            <div class="row">
                                @php
                                    $limitedbuku = $buku->take(8);
                                @endphp
                                @foreach ($limitedbuku as $item)
                                    <div class="col-md-3">
                                        <div class="product-item">
                                            <figure class="product-style">
                                                <img src="images/tab-item1.jpg" alt="Books" onerror="this.onerror=null; this.src='{{ asset('User/assets/images/available.png') }}';" class="product-item">
                                                <button type="button" class="add-to-cart"
                                                    data-product-tile="add-to-cart"><a
                                                        href="{{ route('peminjaman.create') }}">Want to
                                                        borrow?</a></button>
                                            </figure>
                                            <figcaption>
                                                <h3>{{ $item->judul }}</h3>
                                                <span>{{ $item->penulis->nama_penulis }}</span>
                                            </figcaption>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div><!--inner-tabs-->

                    </div>
                </div>
    </section>

    <section id="quotation" class="align-center pb-5 mb-5">
        <div class="inner-content">
            <h2 class="section-title divider">Quote of the day</h2>
            <blockquote data-aos="fade-up">
                <q>“The more that you read, the more things you will know. The more that you learn, the more places
                    you’ll go.”</q>
                <div class="author-name">Dr. Seuss</div>
            </blockquote>
        </div>
    </section>
    <section id="latest-blog" class="py-5 my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="section-header align-center">
                        <div class="title">
                            <span>Read our articles</span>
                        </div>
                        <h2 class="section-title">Latest Articles</h2>
                    </div>

                    <div class="row">

                        <div class="col-md-4">

                            <article class="column" data-aos="fade-up">

                                <figure>
                                    <a href="#" class="image-hvr-effect">
                                        <img src="{{ asset('User/assets/images/post-img1.jpg') }}" alt="post"
                                            class="post-image">
                                    </a>
                                </figure>

                                <div class="post-item">
                                    <div class="meta-date">Mar 30, 2021</div>
                                    <h3><a href="#">Reading books always makes the moments happy</a></h3>

                                    <div class="links-element">
                                        <div class="categories">inspiration</div>
                                        <div class="social-links">
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="icon icon-facebook"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="icon icon-twitter"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="icon icon-behance-square"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div><!--links-element-->

                                </div>
                            </article>

                        </div>
                        <div class="col-md-4">

                            <article class="column" data-aos="fade-up" data-aos-delay="200">
                                <figure>
                                    <a href="#" class="image-hvr-effect">
                                        <img src="{{ asset('User/assets/images/post-img2.jpg') }}" alt="post"
                                            class="post-image">
                                    </a>
                                </figure>
                                <div class="post-item">
                                    <div class="meta-date">Mar 29, 2021</div>
                                    <h3><a href="#">Reading books always makes the moments happy</a></h3>

                                    <div class="links-element">
                                        <div class="categories">inspiration</div>
                                        <div class="social-links">
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="icon icon-facebook"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="icon icon-twitter"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="icon icon-behance-square"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div><!--links-element-->

                                </div>
                            </article>

                        </div>
                        <div class="col-md-4">

                            <article class="column" data-aos="fade-up" data-aos-delay="400">
                                <figure>
                                    <a href="#" class="image-hvr-effect">
                                        <img src="{{ asset('User/assets/images/post-img3.jpg') }}" alt="post"
                                            class="post-image">
                                    </a>
                                </figure>
                                <div class="post-item">
                                    <div class="meta-date">Feb 27, 2021</div>
                                    <h3><a href="#">Reading books always makes the moments happy</a></h3>

                                    <div class="links-element">
                                        <div class="categories">inspiration</div>
                                        <div class="social-links">
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="icon icon-facebook"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="icon icon-twitter"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="icon icon-behance-square"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div><!--links-element-->

                                </div>
                            </article>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
