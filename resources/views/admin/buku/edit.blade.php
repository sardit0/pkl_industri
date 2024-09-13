@extends('layouts.backend.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-xl-12">
            <div class="card m-3">
                <div class="card-header">
                    <h3>Edit Buku</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('buku.update', $buku->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" id="judul" value="{{ $buku->judul }}" required>
                            @error('judul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="desk" class="form-label">Deskripsi</label>
                            <textarea name="desk" class="form-control @error('desk') is-invalid @enderror" id="desk" required>{{ $buku->desk }}</textarea>
                            @error('desk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tahun_penerbit" class="form-label">Tahun Terbit</label>
                            <input type="date" name="tahun_penerbit" class="form-control @error('tahun_penerbit') is-invalid @enderror" id="tahun_penerbit" value="{{ $buku->tahun_penerbit }}" required>
                            @error('tahun_penerbit')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="jumlah_buku" class="form-label">Jumlah Buku</label>
                            <input type="number" name="jumlah_buku" class="form-control @error('jumlah_buku') is-invalid @enderror" id="jumlah_buku" value="{{ $buku->jumlah_buku }}" required>
                            @error('jumlah_buku')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- <div class="mb-3">
                            <label for="stok" class="form-label">Stok Buku</label> 
                            <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror" id="stok" value="{{ $buku->stok }}" required>
                            @error('stok')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> --}}

                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image">
                            <small>Biarkan kosong jika tidak ingin mengubah gambar.</small>
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="id_kategori" class="form-label">Nama Kategori</label>
                            <select name="id_kategori" id="id_kategori" class="form-control" required>
                                @foreach ($kategori as $item)
                                    <option value="{{ $item->id }}" {{ $item->id == $buku->id_kategori ? 'selected' : '' }}>{{ $item->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="id_penerbit" class="form-label">Nama Penerbit</label>
                            <select name="id_penerbit" id="id_penerbit" class="form-control" required>
                                @foreach ($penerbit as $item)
                                    <option value="{{ $item->id }}" {{ $item->id == $buku->id_penerbit ? 'selected' : '' }}>{{ $item->nama_penerbit }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="id_penulis" class="form-label">Nama Penulis</label>
                            <select name="id_penulis" id="id_penulis" class="form-control" required>
                                @foreach ($penulis as $item)
                                    <option value="{{ $item->id }}" {{ $item->id == $buku->id_penulis ? 'selected' : '' }}>{{ $item->nama_penulis }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-3 d-flex justify-content-between">
                            <button type="submit" class="btn btn-success">Update</button>
                            <a href="{{ route('buku.index') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
    