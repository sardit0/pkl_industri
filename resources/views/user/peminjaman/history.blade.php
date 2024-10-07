@extends('layouts.backend.usertemp')

@section('content')
<h3 class="m-3 text-uppercase">HISTORY PAGE</h3>
<hr>
    <div class="row">
        <div class="col-12 col-xl-12">
            <div class="card p-3">
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
                                        @if ($item->status == 'diterima')
                                            <span class="badge bg-success">{{ ucfirst($item->status) }}</span>
                                        @elseif ($item->status == 'ditolak')
                                            <span class="badge bg-danger">{{ ucfirst($item->status) }}</span>
                                        @elseif ($item->status == 'dikembalikan')
                                            <span class="badge bg-danger">{{ ucfirst($item->status) }}</span>
                                        @else
                                            <span class="badge bg-warning">{{ ucfirst($item->status) }}</span>
                                        @endif
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
@endsection
