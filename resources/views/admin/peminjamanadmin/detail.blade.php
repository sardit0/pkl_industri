@extends('layouts.backend.admin')
@section('content')
    <div class="card m-3">
        <div class="card-body">
            <h4 class="card-title">Detail Peminjaman</h4>
            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>Nama Buku:</strong>
                    <p>{{ $minjem->buku->judul }}</p>
                </div>
                <div class="col-md-6">
                    <strong>Nama Peminjam:</strong>
                    <p>{{ $minjem->nama }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>Jumlah:</strong>
                    <p>{{ $minjem->jumlah }}</p>
                </div>
                <div class="col-md-6">
                    <strong>Tanggal Peminjaman:</strong>
                    <p>{{ $minjem->tanggal_minjem }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>Status:</strong>
                    <form action="{{ route('peminjaman.update', $minjem->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <select name="status" class="form-control" onchange="this.form.submit()" style="color: white">
                            <option value="ditahan" {{ $minjem->status == 'ditahan' ? 'selected' : '' }}>Ditahan</option>
                            <option value="ditolak" {{ $minjem->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                            <option value="diterima" {{ $minjem->status == 'diterima' ? 'selected' : '' }}>Diterima</option>
                        </select>
                    </form>
                </div>
            </div>


            <a href="{{ route('peminjamanadmin.index') }}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
@endsection
