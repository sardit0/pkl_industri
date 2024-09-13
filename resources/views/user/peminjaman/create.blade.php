@extends('user.usertemp')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-xl-12">
                <div class="card m-3">
                    <div class="card-header">
                        <h3>Tambah Peminjam</h3>
                    </div>
                    <div class="card-body">
                        <form class="row" method="POST" action="{{ route('peminjaman.store') }}">
                            @csrf
                            <div class="col-md-12">
                                <label for="id_buku" class="form-label">Judul Buku</label>
                                <select name="id_buku" id="id_buku" class="form-control" style="color: #ffffff;">
                                    @foreach ($buku as $data)
                                    <option value="{{ $data->id }}">{{ $data->judul }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="input17" class="form-label">Jumlah Buku</label>
                                <div class="position-relative input-icon">
                                    <input type="number" name="jumlah"
                                        class="form-control @error('jumlah') is-invalid @enderror" id="input17"
                                        placeholder="Jumlah">
                                    <span class="position-absolute top-50 translate-middle-y"></span>
                                    @error('jumlah')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="input13" class="form-label">Tanggal Peminjaman</label>
                                <input class="form-control mb-3" type="date" name="tanggal_minjem"
                                    value="{{ $sekarang }}" required>
                            </div>

                            <div class="col-md-6">
                                <label for="input13" class="form-label">Batas Pengembalian</label>
                                <input class="form-control mb-3" type="date" name="batas_tanggal"
                                    value="{{ $batastanggal }}" required>
                            </div>

                            <div class="col-md-6">
                                <label for="input13" class="form-label">Nama Peminjam</label>
                                <input class="form-control mb-3" type="text" name="nama" placeholder="Nama Peminjam"
                                    value="{{ Auth::user()->name }}" required>
                            </div>

                            <div class="col-md-6">
                                <label for="input13" class="form-label">Tanggal Pengembalian</label>
                                <input class="form-control mb-3" type="date" name="tanggal_kembali" required>
                            </div>

                            <div class="col-md-12">
                                <label for="input17" class="form-label">Status</label>
                                <select name="status" class="form-control" id="" style="color: #ffffff;">
                                    <option value="Dipinjam">Dipinjam</option>
                                    <option value="Dikembalikan">Dikembalikan</option>
                                </select>
                            </div>
                            <div class="col-md-12 mt-5">
                                <button type="submit" class="btn btn-success">Submit</button>
                                <a href="{{ route('peminjaman.index') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
