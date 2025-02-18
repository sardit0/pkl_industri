@extends('layouts.backend.usertemp')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-xl-12">
                <div class="card m-3">
                    <div class="card-header">
                        <h3>Add Borrower</h3>
                    </div>
                    <div class="card-body">
                        <form class="row" method="POST" action="{{ route('peminjaman.store') }}">
                            @csrf
                            <div class="col-md-12">
                                <label for="judul_buku" class="form-label">Book Title</label>
                                <input type="text" id="judul_buku" class="form-control" value="{{ $buku->first()->judul }}" disabled>
                                <input type="hidden" name="id_buku" value="{{ $buku->first()->id }}">
                            </div>
                            <div class="col-md-12">
                                <label for="input17" class="form-label">Book Amount</label>
                                <div class="position-relative input-icon">
                                    <input type="number" name="jumlah"
                                        class="form-control @error('jumlah') is-invalid @enderror" id="input17"
                                        placeholder="Amount">
                                    <span class="position-absolute top-50 translate-middle-y"></span>
                                    @error('jumlah')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="input13" class="form-label">Date Borrower</label>
                                <input class="form-control mb-3" type="date" name="tanggal_minjem"
                                    value="{{ $sekarang }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="input13" class="form-label">Return Limit</label>
                                <input class="form-control mb-3" type="date" name="batas_tanggal"
                                    value="{{ $batastanggal }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="input13" class="form-label">Borrower name</label>
                                <input class="form-control mb-3" type="text" name="nama" placeholder="Nama Peminjam"
                                    value="{{ Auth::user()->name }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="input13" class="form-label">Return Date</label>
                                <input class="form-control mb-3" type="date" name="tanggal_kembali" id="tanggal_kembali" required>
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

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let today = new Date();
        let maxDate = new Date();
        
        // Tambah 7 hari ke tanggal sekarang
        maxDate.setDate(today.getDate() + 7);

        // Format tanggal ke YYYY-MM-DD
        let formattedToday = today.toISOString().split('T')[0];
        let formattedMaxDate = maxDate.toISOString().split('T')[0];

        // Set atribut min dan max pada input date
        document.getElementById("tanggal_kembali").setAttribute("min", formattedToday);
        document.getElementById("tanggal_kembali").setAttribute("max", formattedMaxDate);
    });
</script>


