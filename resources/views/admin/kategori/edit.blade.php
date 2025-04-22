@extends('layouts.backend.admin')
@section('content')
<div class="col-12 col-xl-12">
    <div class="card m-3">
        <div class="card-body p-4">
            <h5 class="mb-4">Edit Kategori {{ $kategori->nama_kategori }}</h5>
            <form class="row g-3" method="POST" action="{{ route('kategori.update', $kategori->id) }}"
                enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="col-md-12">
                    <label for="input17" class="form-label">Nama Kategori</label>
                    <div class="position-relative input-icon">
                        <input type="text" name="nama_kategori" value="{{ $kategori->nama_kategori }}" class="form-control @error('nama_kategori') is-invalid @enderror" id="input17" placeholder="Nama Kategori">
                        <span class="position-absolute top-50 translate-middle-y"></span>
                        @error('nama_kategori')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <a href="{{ route('kategori.index') }}" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
