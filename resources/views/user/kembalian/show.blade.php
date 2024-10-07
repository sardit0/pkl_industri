@extends('layouts.backend.usertemp')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Detail Pengembalian Buku</h4>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label"><strong>Judul Buku:</strong></label>
                <p>{{ $kembali->minjem->buku->judul }}</p>
            </div>
            <div class="mb-3">
                <label class="form-label"><strong>Nama Peminjam:</strong></label>
                <p>{{ $kembali->minjem->nama }}</p>
            </div>
            <div class="mb-3">
                <label class="form-label"><strong>Jumlah Buku yang Dipinjam:</strong></label>
                <p>{{ $kembali->minjem->jumlah }}</p>
            </div>
            <div class="mb-3">
                <label class="form-label"><strong>Tanggal Peminjaman:</strong></label>
                <p>{{ $kembali->minjem->tanggal_minjem }}</p>
            </div>
            <div class="mb-3">
                <label class="form-label"><strong>Tanggal Pengembalian:</strong></label>
                <p>{{ $kembali->tanggal_kembali }}</p>
            </div>
            <a href="{{ route('kembalian.index') }}" class="btn btn-secondary">Kembali ke Daftar Pengembalian</a>
        </div>
    </div>
@endsection
