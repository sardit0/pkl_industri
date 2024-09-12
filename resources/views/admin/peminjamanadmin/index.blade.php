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
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($minjem as $item)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $item->buku->judul }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ $item->tanggal_minjem }}</td>
                        <td>
                            @if($item->status == 'diterima')
                                <span class="badge bg-success">Diterima</span>
                            @elseif($item->status == 'ditolak')
                                <span class="badge bg-danger">Ditolak</span>
                            @else
                                <span class="badge bg-warning">Ditahan</span>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('peminjaman.update', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PUT')

                                <select name="status" class="form-control form-control-sm" onchange="this.form.submit()">
                                    <option value="ditahan" {{ $item->status == 'ditahan' ? 'selected' : '' }}>Ditahan</option>
                                    <option value="ditolak" {{ $item->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                                    <option value="diterima" {{ $item->status == 'diterima' ? 'selected' : '' }}>Diterima</option>
                                </select>
                            </form>

                            <form action="{{ route('peminjaman.destroy', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
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
