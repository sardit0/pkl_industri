@extends('user.usertemp')
@section('content')
    <!-- Start Title -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-12 col-xxl-12">
                <div class="card bg">
                    <div class="card-body">
                        <div class="col-lg-12 d-lg-flex d-none">
                            <div class="p-3 bg-grd-primary">
                                <img src="{{ asset('User/assets/images//cat.jpeg') }}" class="img-fluid" alt="">
                            </div>
                            {{-- <div class="text-center mt-5 pt-4">
                            <h5 class="mb-2">{{ $user->name }}</h5>
                                </div> --}}
                            <div class="mt-3">
                                <form class="row g-3" method="POST" action="{{ route('peminjaman.store') }}"
                                    enctype="multipart/form-data">
                                    <div class="col-md-6">
                                        <label for="input13" class="form-label">Username</label>
                                <input class="form-control mb-3" type="text" name="nama_peminjam" placeholder="Nama Peminjam" value="{{ $user->name }}" disabled style="color: black">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="input13" class="form-label">Alamat Rumah</label>
                                <input class="form-control mb-3" type="text" name="nama_peminjam" placeholder="Nama Peminjam" value="{{ $user->alamat }}" disabled style="color: black">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="input13" class="form-label">Email</label>
                                <input class="form-control mb-3" type="text" name="nama_peminjam" placeholder="Nama Peminjam" value="{{ $user->email }}" disabled style="color: black">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="input13" class="form-label">Nomor Telepon</label>
                                        <input class="form-control mb-3" type="text" name="nama_peminjam" placeholder="Nama Peminjam" value="{{ $user->no_hp }}" disabled style="color: black">
                                    </div>

                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-warning mr-2">Edit</button>
                                    </div>

                                  
                                 
                                </form>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Column 1 -->
@endsection
