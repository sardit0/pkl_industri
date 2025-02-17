@extends('layouts.backend.admin')

@section('content')
    <div class="container">
        <div class="card m-3">
            <div class="card-body p-4">
                <h2>Borrowing Report</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>User</th>
                            <th>Buku</th>
                            <th>Tanggal Pinjam</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($minjem as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->user->name }}</td>
                                <td>{{ $p->buku->judul }}</td>
                                <td>{{ $p->tanggal_minjem }}</td>
                                <td>{{ $p->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <h2>Returned Report</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>User</th>
                            <th>Buku</th>
                            <th>Tanggal Kembali</th>
                            <th>Denda</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kembali as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->minjem->user->name }}</td>
                                <td>{{ $p->minjem->buku->judul }}</td>
                                <td>{{ $p->tanggal_kembali }}</td>
                                <td>Rp{{ number_format($p->denda, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
