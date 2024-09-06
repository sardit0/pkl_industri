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
                    <h5>Jumlah Data di Data Kategori</h5>
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
                    <h5>Jumlah Data di Penerbit</h5>
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
                    <h5>Jumlah Data di Penulis</h5>
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
@endsection
