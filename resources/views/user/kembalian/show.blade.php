@extends('user.usertemp')

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Detail Peminjaman</h4>
        <p><strong>Judul Buku:</strong> {{ $minjem->buku->judul }}</p>
        <p><strong>Nama Peminjam:</strong> {{ $minjem->nama }}</p>
        <p><strong>Jumlah:</strong> {{ $minjem->jumlah }}</p>
        <p><strong>Tanggal Peminjaman:</strong> {{ $minjem->tanggal_minjem }}</p>
        <p><strong>Status:</strong> {{ $minjem->status }}</p>

        @if($minjem->status == 'Dipinjam')
        <form action="{{ route('kembalian.store', $minjem->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="jumlah">Jumlah Buku yang Dikembalikan</label>
                <input type="number" name="jumlah" id="jumlah" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success mt-3">Kembalikan Buku</button>
        </form>
        @endif
    </div>
</div>
@endsection
