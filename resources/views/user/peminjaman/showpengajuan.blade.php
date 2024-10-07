
@extends('layouts.backend.usertemp')
@section('content')
<div class="col-12 col-xl-12">
    <div class="card">
        <div class="card-body p-4">
            <h4 class="mb-4">Detail apply book</h4>
            <hr>
            <form class="row g-3" enctype="multipart/form-data">
                <div class="col-md-6">
                    <label for="input13" class="form-label">Borrowed name</label>
                    <div class="position-relative">
                        <input class="form-control mb-3" type="text" name="nama" placeholder="Name" value="{{ Auth::user()->name }}" readonly>
                        <input type="hidden" name="nama" value="{{ Auth::user()->name }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="input13" class="form-label">Book name</label>
                    <select class="form-control" name="id_buku" required>
                        @foreach($buku as $data)
                        <option value="{{ $data->id }}">{{ $data->judul }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="input13" class="form-label">Loaasn date</label>
                    <input class="form-control mb-3" type="date" name="tanggal_minjem" value="{{ $minjem->tanggal_minjem }}" readonly>
                </div>

                <div class="col-md-6">
                    <label for="input13" class="form-label">Loan deadline</label>
                    <input class="form-control mb-3" type="date" name="batas_tanggal" value="{{ $minjem->batas_tanggal }}" readonly>
                </div>

                <div class="col-md-6">
                    <label for="input13" class="form-label">Return date</label>
                    <input class="form-control mb-3" type="date" name="tanggal_kembali" value="{{ $minjem->tanggal_kembali }}" readonly>
                </div>

                <div class="col-md-6">
                    <label for="input13" class="form-label">Amount</label>
                    <div class="position-relative">
                        <input class="form-control mb-3" type="number" name="jumlah" placeholder="Jumlah" value="{{$minjem->jumlah}}" required>
                    </div>
                </div>

                <div class="col-md-12">
                    <label for="input13" class="form-label">Reason for rejection</label>
                    <textarea class="form-control mb-3" id="reasonTextarea" type="text" name="alasan" readonly>{{ $minjem->alasan }}</textarea>
                </div>

                <div class="col-md-12">
                    <div class="d-md-flex d-grid align-items-center gap-3">
                        <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">Back</a>
                        <form action="{{ route('peminjaman.destroy', $data->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger bts-sm" onclick="return confirm('Delete book rejection submission?')">Delete</button>
                        </form>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
