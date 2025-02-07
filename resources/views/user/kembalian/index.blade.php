@extends('layouts.backend.usertemp')
@section('content')
<h3 class="mb-0 text-uppercase pb-3">TABLE RETURN BOOK</h3>
<hr>
<div class="card">
    <div class="card-body">
        @if (session('success'))
        {{ session('success') }}
        <div class="alert alert-success">
        </div>
        @endif
        <a href="{{ route('peminjaman.create') }}" class="btn btn-grd btn-primary px-5 mb-2">+</a>
        <table class="table mb-0 table-striped" id="example2">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Buku</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Tanggal Peminjaman</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kembali as $item)
                <tr>
                    <th scope="row">{{ $loop->index+1 }}</th>
                    <td>{{ $item->buku->judul }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ $item->tanggal_minjem }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->status }}</td>
                    <td>
                        <a href="{{ route('peminjaman.edit', $item->id) }}" class="btn btn-grd-warning px-2">Edit</a>
                        <a href="{{ route('peminjaman.show', $item->id) }}" class="btn btn-grd-warning px-2">Show</a>
                        <a class="btn ripple btn-grd-danger px-3" href="#" onclick="event.preventDefault();
                            document.getElementById('destroy-form').submit();">
                            Hapus
                        </a>

                        <form id="destroy-form" action="{{ route('peminjaman.destroy', $item->id) }}"
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