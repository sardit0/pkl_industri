@extends('user.usertemp')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Daftar Pengembalian</h4>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Buku</th>
                            <th>Nama Peminjam</th>
                            <th>Jumlah</th>
                            <th>Tanggal Kembali</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kembali as $item)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $item->buku->judul }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->jumlah }}</td>
                            <td>{{ $item->tanggal_kembali }}</td>
                            <td>
                                <a href="{{ route('kembalian.show', $item->id) }}" class="btn btn-info">Detail</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
