@extends('layouts.backend.admin')
@section('content')
    <div class="card m-3">
        <div class="card-body">
            <h4 class="card-title">Pengelolaan Peminjaman</h4>
            <div class="table-responsive">
                <table class="table table-striped" id="adminPeminjaman">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Buku</th>
                            <th>Nama Peminjam</th>
                            <th>Jumlah</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($minjem as $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $item->buku->judul }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td>{{ $item->tanggal_minjem }}</td>
                                <td>
                                    <a href="{{ route('peminjamanadmin.detail', $item->id) }}" class="btn btn-info btn-sm">Lihat
                                        Detail</a>
                                </td>
                                <td>
                                    <form action="{{ route('peminjaman.destroy', $item->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
