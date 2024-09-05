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
  <link rel="shortcut icon" href="{{ asset('User/assets/favicon.png')}}">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

		<!-- Bootstrap CSS -->
		<link href="{{ asset('User/assets/css/bootstrap.min.css')}}" rel="stylesheet">
		<link href="{{ asset('User/assets/https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css')}}" rel="stylesheet">
		<link href="{{ asset('User/assets/css/tiny-slider.css')}}" rel="stylesheet">
		<link href="{{ asset('User/assets/css/style.css')}}" rel="stylesheet">
		<title>Halaman User</title>
	</head>

	<body>

		<!-- Start Header/Navigation -->
        @include('layouts.frontend.navbar')
		<!-- End Header/Navigation -->

		<!-- Start Product Section -->
		<div class="product-section">
			<div class="container">
				<div class="row justify-content-center">

					<!-- Title -->
                    <div class="row">
                        <div class="col-lg-7 mx-auto text-center">
                            <h2 class="section-title mb-5"><p class="fst-italic"> Rating Terbaik </p></h2>
                        </div>
                    </div>
					<!-- End End Title -->

					<!-- Start Column 1 -->
					<div class="row">
						@php
						$limitedBuku = $buku->take(4);
						@endphp
			@foreach ($limitedBuku as $data)
                <div class="col-lg-3 mb-5">
                    <div class="card border-0 bg-light shadow-sm pb-2">
                        <a href="{{ url('show' , $data->id) }}">
                            <img src="{{ asset('images/buku/' . $data->image) }}" alt=""
                                1class="card-img-top" alt="..." width="100%" height="380" >
                        </a>
                        <div class="card-body text-center">
                            <h4 class="card-title">{{$data->judul}}</h4>
                            {{-- <p class="card-text">
                                Justo ea diam stet diam ipsum no sit, ipsum vero et et diam
                                ipsum duo et no et, ipsum ipsum erat duo amet clita duo
                            </p> --}}
                        </div>
                        <a href="{{ url('show' , $data->id) }}" type="button" class="btn btn-primary px-4 mx-auto mb-4" >Lihat Sini!</a>
                    </div>
                </div>
            @endforeach
		</div>
		<div class="col-12 col-xl-6">
			<!-- Modal -->
			<div class="modal fade" id="ScrollableModal" aria-hidden="true" style="display: none;">
				<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
					<div class="modal-content">
						<div class="modal-header border-bottom-0 bg-grd-primary py-2">
							<h5 class="modal-title">Detail</h5>
							<a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="modal">
								<i class="material-icons-outlined"></i>
							</a>
						</div>
						<div class="modal-body">

						</div>
						<div class="modal-footer border-top-0">
							<button type="button" class="btn btn-primary" data-bs-dismiss="modal">Batal</button>
							<button type="button" class="btn btn-primary">Pinjam buku</button>
						</div>
					</div>
				</div>
			</div>
		</div>
					<!-- End Column 1 -->

				</div>
			</div>
		</div>
		<!-- End Product Section -->

		<!-- Start Why Choose Us Section -->
		{{-- <div class="why-choose-section">
			<div class="container">
				<div class="row justify-content-between">
					<div class="col-lg-6">
						<h2 class="section-title">Why Choose Us</h2>
						<p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique.</p>

						<div class="row my-5">
							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="{{ asset('User/assets/images/truck.svg')}}" alt="Image" class="imf-fluid">
									</div>
									<h3>Fast &amp; Free Seen Book</h3>
									<p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate.</p>
								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="{{ asset('User/assets/images/bag.svg')}}" alt="Image" class="imf-fluid">
									</div>
									<h3>Easy for Book</h3>
									<p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate.</p>
								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="{{ asset('User/assets/images/support.svg')}}" alt="Image" class="imf-fluid">
									</div>
									<h3>24/7 Support</h3>
									<p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate.</p>
								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="{{ asset('User/assets/images/return.svg')}}" alt="Image" class="imf-fluid">
									</div>
									<h3>Hassle Free Book</h3>
									<p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate.</p>
								</div>
							</div>

						</div>
					</div>

					<div class="col-lg-5">
						<div class="img-wrap">
							<img src="{{ asset('User/assets/images/mantri.jpeg')}}" alt="Image" class="img-fluid">
						</div>
					</div>

				</div>
			</div>
		</div> --}}
		<!-- End Why Choose Us Section -->

		<!-- Start We Help Section -->
		{{-- <div class="we-help-section">
			<div class="container">
				<div class="row justify-content-between">
					<div class="col-lg-7 mb-5 mb-lg-0">
						<div class="imgs-grid">
							<div class="grid grid-1"><img src="{{ asset('User/assets/images/img-grid-1.jpg')}}" alt="Untree.co"></div>
							<div class="grid grid-2"><img src="{{ asset('User/assets/images/img-grid-2.jpg')}}" alt="Untree.co"></div>
							<div class="grid grid-3"><img src="{{ asset('User/assets/images/img-grid-3.jpg')}}" alt="Untree.co"></div>
						</div>
					</div>
					<div class="col-lg-5 ps-lg-5">
						<h2 class="section-title mb-4">We Help You Make Modern Story Language</h2>
						<p>Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant morbi tristique senectus et netus et malesuada</p>

						<ul class="list-unstyled custom-list my-4">
							<li>Donec vitae odio quis nisl dapibus malesuada</li>
							<li>Donec vitae odio quis nisl dapibus malesuada</li>
							<li>Donec vitae odio quis nisl dapibus malesuada</li>
							<li>Donec vitae odio quis nisl dapibus malesuada</li>
						</ul>
					</div>
				</div>
			</div>
		</div> --}}
		<!-- End We Help Section -->

		<!-- Start Popular Product -->
		{{-- <div class="popular-product">
			<div class="container">
				<div class="row">

					<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
						<div class="product-item-sm d-flex">
							<div class="thumbnail">
								<img src="{{ asset('User/assets/images/product-1.png')}}" alt="Image" class="img-fluid">
							</div>
							<div class="pt-3">
								<h3>Upin & Ipin</h3>
								<p>Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio </p>
								<p><a href="#">Read More</a></p>
							</div>
						</div>
					</div>

					<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
						<div class="product-item-sm d-flex">
							<div class="thumbnail">
								<img src="{{ asset('User/assets/images/product-2.png')}}" alt="Image" class="img-fluid">
							</div>
							<div class="pt-3">
								<h3>Doraemon</h3>
								<p>Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio </p>
								<p><a href="#">Read More</a></p>
							</div>
						</div>
					</div>

					<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
						<div class="product-item-sm d-flex">
							<div class="thumbnail">
								<img src="{{ asset('User/assets/images/product-3.png')}}" alt="Image" class="img-fluid">
							</div>
							<div class="pt-3">
								<h3>Shincan</h3>
								<p>Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio </p>
								<p><a href="#">Read More</a></p>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div> --}}
		<!-- End Popular Product -->

		<!-- Start Testimonial Slider -->
		<div class="testimonial-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 mx-auto text-center">
						<h2 class="section-title">Testimoni</h2>
					</div>
				</div>

				<div class="row justify-content-center">
					<div class="col-lg-12">
						<div class="testimonial-slider-wrap text-center">
							<div id="testimonial-nav">
								<span class="prev" data-controls="prev"><span class="fa fa-chevron-left"></span></span>
								<span class="next" data-controls="next"><span class="fa fa-chevron-right"></span></span>
							</div>

							<div class="testimonial-slider">
								
								<div class="item">
									<div class="row justify-content-center">
										<div class="col-lg-8 mx-auto">

											<div class="testimonial-block text-center">
												<blockquote class="mb-5">
													<p>&ldquo;Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer convallis volutpat dui quis scelerisque.&rdquo;</p>
												</blockquote>

												<div class="author-info">
													<div class="author-pic">
														<img src="{{ asset('User/assets/images/person-1.png')}}" alt="Indiana Jones" class="img-fluid">
													</div>
													<h3 class="font-weight-bold">Indiana Jones</h3>
													<span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span>
												</div>
											</div>

										</div>
									</div>
								</div> 
								<!-- END item -->

								<div class="item">
									<div class="row justify-content-center">
										<div class="col-lg-8 mx-auto">

											<div class="testimonial-block text-center">
												<blockquote class="mb-5">
													<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Omnis nobis, soluta doloremque quo nihil rem veniam a ab architecto tenetur hic maiores quia molestias harum commodi fuga aspernatur totam enim.</p>
												</blockquote>
                                                <div class="author-info">
													<div class="author-pic">
														<img src="{{ asset('User/assets/images/person-1.png')}}" alt="Indiana Jones" class="img-fluid">
													</div>
													<h3 class="font-weight-bold">Indiana Jones</h3>
													<span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span>
												</div>
											</div>
										</div>
									</div>
								</div> 
								<!-- END item -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Testimonial Slider -->


		<!-- Start Footer Section -->
		@include('layouts.frontend.footer')
		<!-- End Footer Section -->	


		<script src="{{ asset('User/assets/js/bootstrap.bundle.min.js')}}"></script>
		<script src="{{ asset('User/assets/js/tiny-slider.js')}}"></script>
		<script src="{{ asset('User/assets/js/custom.js')}}"></script>
	</body>

</html>
