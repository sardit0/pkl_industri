@extends('layouts.admin')
@section('content')
<div class="col-12 col-xl-12">
    <div class="card m-3">
        <div class="card-body p-4">
            <h5 class="mb-4">Edit Penerbit {{ $penerbit->nama_penerbit }}</h5>
            <form class="row g-3" method="POST" action="{{ route('penerbit.update', $penerbit->id) }}"
                enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="col-md-12">
                    <label for="input17" class="form-label">Nama Penerbit</label>
                    <div class="position-relative input-icon">
                        <input type="text" name="nama_penerbit" class="form-control @error('nama_penerbit') is-invalid @enderror" id="input17" placeholder="Nama penerbit">
                        <span class="position-absolute top-50 translate-middle-y"></span>
                        @error('nama_penerbit')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <a href="{{ route('penerbit.index') }}" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection