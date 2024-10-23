@extends('user.usertemp')

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
                        <div class="owl-carousel owl-theme full-width owl-carousel-dash portfolio-carousel"
                            id="owl-carousel-basic">
                            @foreach ($bukus as $data)
                               <div class="item">
                                <img src="{{ asset('images/buku/' . $data->image) }}" alt=""
                                class="card-img-top" class="card-img-top" width="50" height="380">
                            </div>  
                            @endforeach
                           
                        </div>
                        <p class="text-muted">Well, it seems to be working now. </p>
                        <div class="progress progress-md portfolio-progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        



    </div>
@endsection
