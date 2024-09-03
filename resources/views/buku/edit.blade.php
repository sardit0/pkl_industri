@extends('layouts.admin')
@section('content')
<div class="col-12 col-xl-12">
    <div class="card m-3">
        <div class="card-body p-4">
            <h5 class="mb-4">Edit Buku</h5>
            <form class="row g-3" method="POST" action="{{ route('buku.update', $buku->id) }}"
                enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" id="judul" placeholder="Nama penulis">
                    @error('judul')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tahun_penerbit" class="form-label">Nama Penerbit</label>
                    <input type="date" name="tahun_penerbit" class="form-control @error('tahun_penerbit') is-invalid @enderror" id="tahun_penerbit">
                    @error('tahun_penerbit')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="jumlah_buku" class="form-label">Jumlah Buku</label>
                    <input type="number" name="jumlah_buku" class="form-control @error('jumlah_buku') is-invalid @enderror" id="jumlah_buku" placeholder="Jumlah buku">
                    @error('jumlah_buku')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Image</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" required>
                    @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="id_kategori" class="form-label">Nama Kategori</label>
                    <select name="id_kategori" id="id_kategori" class="form-control">
                        <option disabled selected>Penulis</option>
                        @forelse ($kategori as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                        @empty
                            <option value="" disabled>Data Belum Tersedia</option>
                        @endforelse
                    </select>
                </div>

                <div class="mb-3">
                    <label for="id_penerbit" class="form-label">Nama Penerbit</label>
                    <select name="id_penerbit" id="id_penerit" class="form-control">
                        <option disabled selected>Penerbit</option>
                        @forelse ($penerbit as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_penerbit }}</option>
                        @empty
                            <option value="" disabled>Data Belum Tersedia</option>
                        @endforelse
                    </select>
                </div>

                <div class="mb-3">
                    <label for="id_penulis" class="form-label">Nama Penulis</label>
                    <select name="id_penulis" id="id_penulis" class="form-control">
                        <option disabled selected>Penulis</option>
                        @forelse ($penulis as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_penulis }}</option>
                        @empty
                            <option value="" disabled>Data Belum Tersedia</option>
                        @endforelse
                    </select>
                </div>
                <div class="col-md-12">
                    <div class="d-md-flex d-grid align-items-center gap-3">
                        <button type="submit" class="btn btn-success px-4">Submit</button>
                        <a type="submit" href="{{route('buku.index')}}" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection