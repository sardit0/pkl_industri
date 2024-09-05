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
    <link rel="shortcut icon" href="{{ asset('User/assets/favicon.png') }}">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />

    <!-- Bootstrap CSS -->
    <link href="{{ asset('User/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link
        href="{{ asset('User/assets/https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('User/assets/css/tiny-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('User/assets/css/style.css') }}" rel="stylesheet">
    <title>Halaman User</title>
</head>

<body>

    <!-- Start Header/Navigation -->
    @include('layouts.frontend.navbar')
    <!-- End Header/Navigation -->

    <!-- Facilities Start -->

    <!-- insert model -->
    <div class="modal fade" id="insertdata" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="insertdataLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="insertdataLabel">Silahkan Dipinjam</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah Yang Ingin Dipinjam?</label>
                        <input min="1" type="number" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" placeholder="Jumlah">
                        @error('jumlah')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                
                    <div class="mb-3">
                        <label for="tanggal_pinjam" class="form-label">Tanggal Peminjaman</label>
                        <input type="date" name="tanggal_pinjam" class="form-control @error('tanggal_pinjam') is-invalid @enderror" id="tanggal_pinjam" placeholder="">
                        @error('tanggal_pinjam')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Peminjam</label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Namaewa?">
                        @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <span><center>Terimakasih Sudah Meminjam di Perpustakaan Kami><</center></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Pinjam</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid pt-5" style="margin-top: 50px ">
        <div class="container pb-3">
            <div class="row">
                <div class="col-lg-12 col-md-12 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4">
                        <div class="pl-4 mt-2 p-5">
                            <h4>Buku {{ $buku->judul }}</h4>
                            <p class="m-0'">
                                Buku {{ $buku->judul }} lengkap. Buku {{ $buku->judul }} yang ditulis oleh
                                {{ $buku->penulis->nama_penulis }}. Informasi selengkapnya mengenai Buku
                                {{ $buku->judul }} ada bawah ini.
                            </p>
                            <div class="row">
                                <div class="col-lg-4 col-md-6 pb-1">
                                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4">
                                        <img src="{{ asset('images/buku/' . $buku->image) }}" alt=""
                                            class="card-img-top" class="card-img-top" width="50" height="450">
                                    </div>
                                </div>
                                <div class="des col-lg-4 col-md-6 pb-1">
                                    <p>Judul : {{ $buku->judul }}</p>
                                    <p>Penulis : {{ $buku->penulis->nama_penulis }}</p>
                                    <p>Penerbit : {{ $buku->penerbit->nama_penerbit }}</p>
                                    <p>Kategori : {{ $buku->kategori->nama_kategori }}</p>
                                    <p>Sinopsis : {{ $buku->desk }}</p>
                                </div>
                            </div>
                            <a href="" type="button" class="btn btn-primary float-end mb-4 mr-5" data-bs-toggle="modal"
                                data-bs-target="#insertdata">
                                Pinjam disini
                        </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- END --}}

    <!-- Start Footer Section -->
    @include('layouts.frontend.footer')
    <!-- End Footer Section -->


    <script src="{{ asset('User/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('User/assets/js/tiny-slider.js') }}"></script>
    <script src="{{ asset('User/assets/js/custom.js') }}"></script>
</body>

</html>
