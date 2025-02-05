@extends('layouts.backend.usertemp')

@section('js')
    <script src="{{ $chart->cdn() }}"></script>
    {{ $chart->script() }}
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-4 grid-margin">
            <div class="card m-3">
                <div class="card-body">
                    <h5>Amount of loan data</h5>
                    <div class="row">
                        <div class="col-8 col-sm-12 col-xl-8 ">
                            <div class=" d-sm-block d-md-flex align-items-center">
                                <h2 class="mb-0">{{ $minjem }} Data</h2>
                            </div>
                            <a href="{{ route('peminjaman.index') }}" class="btn btn-primary btn-sm mt-2">See</a>

                        </div>
                        <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                            <div class="icon icon-box-danger">
                                <span class="mdi mdi-arrow-bottom-left"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4 grid-margin">
            <div class="card m-3">
                <div class="card-body">
                    <h5>Books you like</h5>
                    <div class="row">
                        <div class="col-8 col-sm-12 col-xl-8 my-auto">
                            <div class="d-sm-block d-md-flex align-items-center">
                                <h2 class="mb-0">{{ $kembali }} Data</h2>

                            </div>
                            <a href="{{ route('kembalian.index') }}" class="btn btn-primary btn-sm mt-2">See</a>

                        </div>
                        <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                            <div class="icon icon-box-primary">
                                <span class="mdi mdi-thumb-up"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4 grid-margin">
            <div class="card m-3">
                <div class="card-body">
                    <h5>Loan history</h5>
                    <div class="row">
                        <div class="col-8 col-sm-12 col-xl-8 my-auto">
                            <div class="d-sm-block d-md-flex align-items-center">
                                <h2 class="mb-0">{{ $minjem }} Data</h2>

                            </div>
                            <a href="{{ route('peminjaman.history') }}" class="btn btn-primary btn-sm mt-2">See</a>

                        </div>
                        <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                            <div class="icon icon-box-primary">
                                <span class="mdi mdi-clock"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-8 col-xl-8">
                <div class="d-flex card m-2" style="width: 96%">
                    <div class="card-body p-4">
                        <div class="d-flex flex-row justify-content-center">
                        </div>
                        <h4>Book borrowing information</h4>
                        <p>The maximum book loan period is <span style="color:red; font-weight:bold;"> 7 DAYS </span> from the date of borrowing. <br>
                            If the book is returned more than the loan period, a <span style="color:red; font-weight:bold;"> FINE </span> of <span style="color:red; font-weight:bold;"> Rp 1.000/DAY </span> will be imposed
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Portfolio Slide</h4>
            
                        <!-- Bootstrap 5 Carousel -->
                        <div id="portfolioCarousel" class="carousel slide" data-bs-ride="carousel">
                            
                            <!-- Indicators -->
                            <div class="carousel-indicators">
                                @foreach ($bukus as $index => $data)
                                <button type="button" data-bs-target="#portfolioCarousel" data-bs-slide-to="{{ $index }}" 
                                    class="{{ $index == 0 ? 'active' : '' }}" aria-current="true" aria-label="Slide {{ $index + 1 }}">
                                </button>
                                @endforeach
                            </div>
            
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                @foreach ($bukus as $index => $data)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <img src="{{ asset('images/buku/' . $data->image) }}" class="d-block w-100" 
                                        alt="Buku" alt="Books" onerror="this.onerror=null; this.src='{{ asset('User/assets/images/available.png') }}';" class="product-item" {{ $index + 1 }} height="350">
                                        <!-- Judul Buku -->
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{ $data->judul }}</h5>
                        </div>
                                </div>
                                @endforeach
                            </div>
            
                            <!-- Left and right controls -->
                            <button class="carousel-control-prev" type="button" data-bs-target="#portfolioCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#portfolioCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

        



    </div>
@endsection
