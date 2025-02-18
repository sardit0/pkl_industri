@extends('layouts.backend.admin')

@section('content')
<div class="container">
    <h3 class="m-3 text-uppercase">ADD BOOK</h3>
    <hr>
        <div class="row">
            <div class="col-12 col-xl-12">
                <div class="card p-3">
                    <div class="card-body">
                <div class="card-body">
                    <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="judul" class="form-label">Title</label>
                            <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" id="judul" placeholder="Name" required>
                            @error('judul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="desk" class="form-label">Descripstion</label>
                            <textarea name="desk" class="form-control @error('desk') is-invalid @enderror" id="desk" placeholder="Descriptions" required></textarea>
                            @error('desk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tahun_penerbit" class="form-label">Date Publisher</label>
                            <input type="date" name="tahun_penerbit" class="form-control @error('tahun_penerbit') is-invalid @enderror" id="tahun_penerbit" required>
                            @error('tahun_penerbit')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="jumlah_buku" class="form-label">Amount Book</label>
                            <input type="number" name="jumlah_buku" class="form-control @error('jumlah_buku') is-invalid @enderror" id="jumlah_buku" placeholder="Amount" required>
                            @error('jumlah_buku')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- <div class="mb-3">
                            <label for="stok" class="form-label">Stok Buku</label>
                            <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror" id="stok" placeholder="Stok buku" required>
                            @error('stok')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> --}}

                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="id_kategori" class="form-label">Category Name</label>
                            <select name="id_kategori" id="id_kategori" class="form-control" required>
                                <option disabled selected>Name</option>
                                @forelse ($kategori as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                @empty
                                    <option value="" disabled>Data not yet available</option>
                                @endforelse
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="id_penerbit" class="form-label">Publisher Name</label>
                            <select name="id_penerbit" id="id_penerbit" class="form-control" required>
                                <option disabled selected>Name</option>
                                @forelse ($penerbit as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_penerbit }}</option>
                                @empty
                                    <option value="" disabled>Data not yet available</option>
                                @endforelse
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="id_penulis" class="form-label">Writter</label>
                            <select name="id_penulis" id="id_penulis" class="form-control" required>
                                <option disabled selected>Name</option>
                                @forelse ($penulis as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_penulis }}</option>
                                @empty
                                    <option value="" disabled>Data not yet available</option>
                                @endforelse
                            </select>
                        </div>

                        <div class="mt-3 d-flex justify-content-between">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <a href="{{ route('buku.index') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
