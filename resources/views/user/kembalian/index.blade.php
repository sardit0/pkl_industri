@extends('layouts.backend.usertemp')

@section('content')
    <h3 class="m-3 text-uppercase">Return Page</h3>
    <hr>
    <div class="card">
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table mb-0 table-striped" id="example2">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Book Name</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Borrow Date</th>
                        <th scope="col">Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kembalis as $item)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $item->buku->judul }}</td>
                            <td>{{ $item->jumlah }}</td>
                            <td>{{ $item->tanggal_minjem }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                <a href="{{ route('kembalian.edit', $item->id) }}" class="btn btn-grd-warning px-2">Edit</a>
                                <a href="{{ route('kembalian.show', $item->id) }}" class="btn btn-grd-warning px-2">Show</a>
                                <a class="btn ripple btn-grd-danger px-3" href="#" onclick="event.preventDefault();
                                    document.getElementById('destroy-form-{{ $item->id }}').submit();">
                                    Delete
                                </a>

                                <form id="destroy-form-{{ $item->id }}" action="{{ route('kembalian.destroy', $item->id) }}"
                                    method="POST" class="d-none">
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
@endsection