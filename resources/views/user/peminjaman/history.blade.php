@extends('user.usertemp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-xl-12">
            <div class="card m-3">
                <div class="card-header">
                    <h3>Riwayat Peminjaman</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul Buku</th>
                                    <th>Nama Peminjam</th>
                                    <th>Jumlah</th>
                                    <th>Foto Buku</th>
                                    <th>Tanggal Peminjaman</th>
                                    <th>Tanggal Pengembalian</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($minjem as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->buku->judul }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->jumlah }}</td>
                                    <td>
                                        <img src="{{ asset('images/buku/' . $item->buku->image) }}" width="100%" height="100%"
                                            alt="">
                                    </td>
                                    <td>{{ $item->tanggal_minjem }}</td>
                                    <td>{{ $item->tanggal_kembali }}</td>
                                    <td>
                                        {{-- @if($item->status == 'Dikembalikan')
                                            <span class="badge bg-success">Dikembalikan</span>
                                        @elseif($item->status == 'Ditolak')
                                            <span class="badge bg-danger">Ditolak</span>
                                        @else
                                            <span class="badge bg-warning">Ditahan</span>
                                        @endif --}}
                                        {{ $item->status}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $minjem->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
