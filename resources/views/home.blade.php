@extends('layouts.backend.admin')

@section('js')
    <script src="{{ $chart->cdn() }}"></script>
    {{ $chart->script() }}

    
@endsection
@section('content')
    <div class="row">
        <div class="col-12 col-xl-12">
            <div class="card m-3">
                <div class="card-body p-4">
                    <div class="d-flex flex-row justify-content-center">
                    </div>
                    <center>
                        <div class="d-flex flex-row justify-content-center">
                            <div class="col-6">
                                <h4 class="card-title mt-5">Welcome to Library website</h4>
                                <h4 class="card-title mt-2">This is the admin dashboard page</h4>
                                <div class="col-sm-6 grid-margin">
                                    <div class="card m-3">
                                        <div class="card">
                                            <div class="card-body">
                                                {!! $chart->container() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </center>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4 grid-margin">
            <div class="card m-3">
                <div class="card-body">
                    <h5>Number of Category data</h5>
                    <div class="row">
                        <div class="col-8 col-sm-12 col-xl-8 my-auto">
                            <div class="d-flex d-sm-block d-md-flex align-items-center">
                                <h2 class="mb-0">{{ $kategori }} Data</h2>
                            </div>
                            <a href="{{ route('kategori.index') }}" class="btn btn-primary btn-sm mt-2">Lihat</a>
                        </div>
                        <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                            <div class="icon icon-box-primary">
                                <span class="mdi mdi-table-large"></span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4 grid-margin">
            <div class="card m-3">
                <div class="card-body">
                    <h5>Number of Publisher data</h5>
                    <div class="row">
                        <div class="col-8 col-sm-12 col-xl-8 my-auto">
                            <div class="d-flex d-sm-block d-md-flex align-items-center">
                                <h2 class="mb-0">{{ $penerbit }} Data</h2>
                            </div>
                            <a href="{{ route('penerbit.index') }}" class="btn btn-primary btn-sm mt-2">Lihat</a>

                        </div>
                        <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                            <div class="icon icon-box-primary">
                                <span class="mdi mdi-account icon-item"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4 grid-margin">
            <div class="card m-3">
                <div class="card-body">
                    <h5>Number of Author data</h5>
                    <div class="row">
                        <div class="col-8 col-sm-12 col-xl-8 my-auto">
                            <div class="d-flex d-sm-block d-md-flex align-items-center">
                                <h2 class="mb-0">{{ $penulis }} Data</h2>

                            </div>
                            <a href="{{ route('penulis.index') }}" class="btn btn-primary btn-sm mt-2">Lihat</a>

                        </div>
                        <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                            <div class="icon icon-box-primary">
                                <span class="mdi mdi-border-color icon-item"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 grid-margin">
            <div class="card m-3">
                <div class="card-body">
                    <h5>Number of Book data</h5>
                    <div class="row">
                        <div class="col-8 col-sm-12 col-xl-8 my-auto">
                            <div class="d-flex d-sm-block d-md-flex align-items-center">
                                <h2 class="mb-0">{{ $buku }} Data</h2>

                            </div>
                            <a href="{{ route('buku.index') }}" class="btn btn-primary btn-sm mt-2">Lihat</a>

                        </div>
                        <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                            <div class="icon icon-box-primary">
                                <span class="mdi mdi-book icon-item"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4 grid-margin">
            <div class="card m-3">
                <div class="card-body">
                    <h5>Amount of loan data</h5>
                    <div class="row">
                        <div class="col-8 col-sm-12 col-xl-8 my-auto">
                            <div class="d-flex d-sm-block d-md-flex align-items-center">
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
                    <h5>Number of return data</h5>
                    <div class="row">
                        <div class="col-8 col-sm-12 col-xl-8 my-auto">
                            <div class="d-flex d-sm-block d-md-flex align-items-center">
                                <h2 class="mb-0">{{ $kembali }} Data</h2>

                            </div>
                            <a href="{{ route('kembalian.index') }}" class="btn btn-primary btn-sm mt-2">Lihat</a>

                        </div>
                        <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                            <div class="icon icon-box-success">
                                <span class="mdi mdi-arrow-top-right"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
