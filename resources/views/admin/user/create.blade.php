@extends('layouts.backend.admin')
@section('content')
<div class="col-12 col-xl-12">
    <div class="card">
        <div class="card-body p-4">
            <h5 class="mb-4">Add User</h5>
            <form class="row g-3" method="POST" action="{{ route('user.store') }}">
                @csrf
                <div class="col-md-12">
                    <label for="input16" class="form-label">Full Name</label>
                    <div class="position-relative input-icon">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="input13" value="{{ old('name') }}" placeholder="Full Name" required>
                        <span class="position-absolute top-50 translate-middle-y"></span>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="input16" class="form-label">Email</label>
                    <div class="position-relative input-icon">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="input16" placeholder="Email" required>
                        <span class="position-absolute top-50 translate-middle-y"></span>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="input16" class="form-label">Alamat</label>
                    <div class="position-relative input-icon">
                        <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}" id="input16" placeholder="Alamat" required>
                        <span class="position-absolute top-50 translate-middle-y"></span>
                        @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="input17" class="form-label">Password</label>
                    <div class="position-relative input-icon">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="input17" placeholder="Password">
                        <span class="position-absolute top-50 translate-middle-y"></span>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="input17" class="form-label">Confirm Password</label>
                    <div class="position-relative input-icon">
                        <input type="password" name="password_confirmation" class="form-control" id="input17" placeholder="Password">
                        <span class="position-absolute top-50 translate-middle-y"></span>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="input17" class="form-label">Is Admin ?</label>
                    <select id="input17" name="isAdmin" class="form-control text-light">
                        <option selected="">Choose...</option>
                        <option value="0" class="text-light">No</option>
                        <option value="1" class="text-light">Yes</option>
                    </select>
                </div>
                <div class="col-md-12 mt-3">
                    <div class="d-md-flex d-grid align-items-center gap-3">
                        <button type="submit" class="btn btn-success px-4 mr-3">Submit</button>
                        <a type="submit" href="{{route('user.index')}}" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection