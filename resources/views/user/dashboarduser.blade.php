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
                    <h5>Jumlah Data di Peminjaman</h5>
                    <div class="row">
                        <div class="col-8 col-sm-12 col-xl-8 ">
                            <div class=" d-sm-block d-md-flex align-items-center">
                                <h2 class="mb-0">{{ $minjem }} Data</h2>
                            </div>
                            <a href="{{ route('peminjaman.index') }}" class="btn btn-primary btn-sm mt-2">Lihat</a>

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
                    <h5>Buku Yang Anda Sukai</h5>
                    <div class="row">
                        <div class="col-8 col-sm-12 col-xl-8 my-auto">
                            <div class="d-sm-block d-md-flex align-items-center">
                                <h2 class="mb-0">{{ $kembali }} Data</h2>

                            </div>
                            <a href="{{ route('kembalian.index') }}" class="btn btn-primary btn-sm mt-2">Lihat</a>

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
                    <h5>Buku Yang Anda Sukai</h5>
                    <div class="row">
                        <div class="col-8 col-sm-12 col-xl-8 my-auto">
                            <div class="d-sm-block d-md-flex align-items-center">
                                <h2 class="mb-0">{{ $kembali }} Data</h2>

                            </div>
                            <a href="{{ route('kembalian.index') }}" class="btn btn-primary btn-sm mt-2">Lihat</a>

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

        <div class="row">
            <div class="col-12 col-xl-12">
                <div class="d-flex card m-2" style="width: 96%">
                    <div class="card-body p-4">
                        <div class="d-flex flex-row justify-content-center">
                        </div>
                        <h4>Informasi Peminjaman Buku</h4>
                        <p>Masa peminjaman buku maksimal <span style="color:red; font-weight:bold;"> 7 HARI </span> dari tanggal peminjaman. <br>
                            Jika buku dikembalikan lebih dari masa peminjaman, maka akan di <span style="color:red; font-weight:bold;"> DENDA </span> sebesar <span style="color:red; font-weight:bold;"> Rp 1.000/HARI </span>
                        </p>
                    </div>
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
@endsection
