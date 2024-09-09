
<!-- insert model -->
@extends('layouts.frontend.user')
@section('content')
<div class="container-fluid pt-5" style="margin-top: 50px ">
<div class="container pb-3">
    <div class="row">
        <div class="col-lg-12 col-md-12 pb-1">
            <div class="d-flex bg-light shadow-sm border-top rounded mb-4">
                <div class="pl-4 mt-2 p-5">
                    <h4>Buku {{ $buku->judul }}</h4>
                    <p class="m-0">
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
                            <p>Deskripsi : {{ $buku->desk }}</p>
                        </div>
                    </div>
                    <a href="{{route ('peminjaman.create')}}" type="button" class="btn btn-primary">
                        Pinjam disini
                </a>
                    <a href="{{route ('buku')}}" type="button" class="btn btn-primary">
                        Kembali
                </a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
{{-- END --}}
@endsection
    