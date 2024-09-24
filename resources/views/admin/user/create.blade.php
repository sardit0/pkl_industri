@extends('layouts.backend.admin')
@section('content')
<h3 class="m-3 text-uppercase">Add User</h3>
<hr>
<div class="col-12 col-xl-12">
    <div class="card">
        <div class="card-body p-4">
            <form class="row g-3" method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
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
                    <label for="input16" class="form-label">Email (Make sure the email you entered is active!)</label>
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
                    <label for="input13" class="form-label">Image</label>
                    <div class="position-relative ">
                        <input class="form-control mb-3" type="file" name="fotoprofile" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="input16" class="form-label">Address</label>
                    <div class="position-relative input-icon">
                        <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}" id="input16" placeholder="Addrees" required>
                        <span class="position-absolute top-50 translate-middle-y"></span>
                        @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="input17" class="form-label">Number Phone</label>
                    <div class="position-relative input-icon">
                        <input type="number" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" id="input17" placeholder="Your Number">
                        <span class="position-absolute top-50 translate-middle-y"></span>
                        @error('no_hp')
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
                    <label for="input17" class="form-label">Role ?</label>
                    <select id="input17" name="isAdmin" class="form-control">
                        <option selected="">Choose...</option>
                        <option value="0" class="">Borrower</option>
                        <option value="1" class="">Admin</option>
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