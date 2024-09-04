@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-xl-12">
            <div class="card m-3">
                <div class="card-header">
                    <h3>Tambah Peminjam</h3>
                </div>
                <div class="card-body">
                    <form class="row" method="POST" action="{{ route('peminjaman.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="id_buku" class="form-label">Judul Buku</label>
                            <select name="id_buku" id="id_buku" class="form-control">
                                <option disabled selected>Judul Buku</option>
                                @forelse ($buku as $item)
                                    <option value="{{ $item->id }}">{{ $item->judul }}</option>
                                @empty
                                    <option value="" disabled>Data Belum Tersedia</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="input17" class="form-label">Jumlah Barang</label>
                            <div class="position-relative input-icon">
                                <input type="number" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" id="input17" placeholder="Stock">
                                <span class="position-absolute top-50 translate-middle-y"></span>
                                @error('jumlah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="input17" class="form-label">Tanggal Pinjam</label>
                            <div class="position-relative input-icon">
                                <input type="date" name="tanggal_minjem" class="form-control" id="input17">
                                <span class="position-absolute top-50 translate-middle-y"></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="input17" class="form-label">Nama Peminjam</label>
                            <div class="position-relative input-icon">
                                <input type="text" name="nama" class="form-control" id="input17">
                                <span class="position-absolute top-50 translate-middle-y"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword4">Status</label>
                            <select name="status" class="form-control" id="" style="color: #ffffff;">
                                <option value="Sedang Diminjem">Sedang Diminjem</option>
                                <option value="Sudah Dikembalikan">Sudah Dikembalikan</option>
                            </select>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <a href="{{ route('buku.index') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
