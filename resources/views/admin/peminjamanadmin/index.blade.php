@extends('layouts.backend.admin')
@section('content')
<h3 class="m-3 text-uppercase">BORROWER MANAGEMENT PAGE</h3>
    <hr>
    <div class="card p-3">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="adminPeminjaman">
                    <thead>
                        <tr>
                            <th class="text-center">No</th class="text-center">
                            <th>Title Book</th>
                            <th>Borrower Name</th>
                            <th class="text-center">Amount</th>
                            <th class="text-center">Borrow Date</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($minjem as $item)
                            <tr>
                                <td class="text-center">{{ $loop->index + 1 }}</td>
                                <td>{{ $item->buku->judul }}</td>
                                <td>{{ $item->nama }}</td>
                                <td class="text-center">{{ $item->jumlah }}</td>
                                <td class="text-center">{{ $item->tanggal_minjem }}</td>
                                <td class="text-center">
                                    <a href="{{ route('peminjamanadmin.detail', $item->id) }}"><button type="button"
                                            class="btn btn-secondary m-1"  item-bs-toggle="tooltip" data-bs-placement="left"
                                            title="Detail View"><i class="ti ti-eye"></i></button></a>
                                    </a>
                                    <a href="#"
                                        onclick="event.preventDefault();
    document.getElementById('destroy-form-{{ $item->id }}').submit();">
                                        <button type="button" class="btn btn-danger m-1"  item-bs-toggle="tooltip" data-bs-placement="left"
                                        title="Delete Book"><i
                                                class="ti ti-trash"></i></button>
                                    </a>
                                    <form id="destroy-form-{{ $item->id }}"
                                        action="{{ route('peminjaman.destroy', $item->id) }}" method="POST" class="d-none">
                                        @method('DELETE')
                                        @csrf
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
