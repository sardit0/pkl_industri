@extends('layouts.backend.admin')
@section('content')
    <div class="row">
        <div class="col-12 col-xl-12">
            <div class="card m-3">
                <div class="card-body p-4">
                    <div class="d-flex flex-row justify-content-center">
                        <h1 class="card-title mb-1">Data Yang Anda Pilih</h1>
                    </div>
                    <center>
                        <div class="d-flex flex-row justify-content-center">
                            <div class="col-12">
                                <h4 class="card-title mt-5">Nama Buku : {{ $buku->judul }}</h4>
                                <h4 class="card-title mt-5">Jumlah Buku : {{ $buku->jumlah_buku }}</h4>
                                <h4 class="card-title mt-5">Tahun Terbit : {{ $buku->tahun_penerbit }}</h4>
                                {{-- <img src="{{ asset('Admin/images/buku/' . $item->image )}}" alt=""> --}}
                                <td class="card-title mt-5">Gambar : <img src="{{ asset('images/buku/' . $buku->image) }}" alt="" width="17%"> </td>
                                <h4 class="card-title mt-5">Nama Peminjam : {{ $buku->kategori->nama_kategori }}</h4>
                                <h4 class="card-title mt-5">Nama Penerbit : {{ $buku->penerbit->nama_penerbit }}</h4>
                                <h4 class="card-title mt-5">Nama Penulis : {{ $buku->penulis->nama_penulis }}</h4>
                            </div>
                        </div>
                        <a href="{{ route('buku.index') }}" class="btn btn-md btn-info" style="float: right">Kembali</a>
                    </center>
                </div>
            </div>
        </div>
    </div>
@endsection