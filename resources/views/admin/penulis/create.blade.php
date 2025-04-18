@extends('layouts.backend.admin')
@section('content')
<div class="col-12 col-xl-12">
    <div class="card m-3">
        <div class="card-body p-4">
            <div class="card-header mb-4">
                <h3>Tambah Penulis</h3>
            </div>
            <form class="row g-3" method="POST" action="{{ route('penulis.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12">
                    <label for="input17" class="form-label">Nama Penulis</label>
                    <div class="position-relative input-icon">
                        <input type="text" name="nama_penulis" class="form-control @error('nama_penulis') is-invalid @enderror" id="input17" placeholder="Nama penulis">
                        <span class="position-absolute top-50 translate-middle-y"></span>
                        @error('nama_penulis')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <div class="d-md-flex d-grid align-items-center gap-3">
                        <button type="submit" class="btn btn-success px-4 mr-3">Submit</button>
                        <a type="submit" href="{{route('kategori.index')}}" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection