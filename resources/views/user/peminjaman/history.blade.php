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
                                    <th>Book title</th>
                                    <th>Borrrower Name</th>
                                    <th>Amount</th>
                                    <th class="text-center">Book Image</th>
                                    <th>Borrower Date</th>
                                    <th>Return Date</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($minjem as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $item->buku->judul }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td class="text-center">{{ $item->jumlah }}</td>
                                    <td class="text-center">
                                        <img src="{{ asset('images/buku/' . $item->buku->image) }}" width="50%" height="50%" onerror="this.onerror=null; this.src='{{ asset('User/assets/images/available.png') }}';"
                                            alt="">
                                    </td>
                                    <td class="text-center">{{ $item->tanggal_minjem }}</td>
                                    <td class="text-center">{{ $item->tanggal_kembali }}</td>
                                    <td class="text-center">
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
                        <div class="d-flex justify-content-center mt-4">
                            {{ $minjem->links('pagination::bootstrap-5')  }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
