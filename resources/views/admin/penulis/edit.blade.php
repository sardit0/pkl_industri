@extends('layouts.admin')
@section('content')
<div class="col-12 col-xl-12">
    <div class="card m-3">
        <div class="card-body p-4">
            <h5 class="mb-4">Edit Penulis {{ $penulis->nama_penulis }}</h5>
            <form class="row g-3" method="POST" action="{{ route('penulis.update', $penulis->id) }}"
                enctype="multipart/form-data">
                @method('put')
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
                <div class="mt-3">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <a href="{{ route('penulis.index') }}" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection