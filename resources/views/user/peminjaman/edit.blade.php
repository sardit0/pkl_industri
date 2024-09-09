@extends('user.usertemp')
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Data</h4>

            <form action="{{ route('peminjaman.update', $minjem->id) }}" method="POST" enctype="multipart/form-data"
                class="forms-sample">
                @csrf
                @method('PUT')
                <div class="mb-3">  
                    <label for="nama" class="form-label">Nama Buku</label>
                    <select name="id_buku" id="nama" class="form-control" style="color: #ffffff">
                        <option disabled selected ="">Isi Disini</option>
                        @foreach ($buku as $item)
                            <option value="{{ $item->id }}">{{ $item->judul }}</option>
                            {{-- @empty --}}
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">Jumlah</label>
                    <input type="number" class="form-control" id="exampleInputEmail3" placeholder="Jumlah" name="jumlah"
                        value="{{ $minjem->jumlah }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword4">Tanggal Minjem</label>
                    <input type="date" class="form-control" id="exampleInputPassword4" placeholder="Stok"
                        name="tanggal_minjem" value="{{ $minjem->tanggal_minjem }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword4">Nama Peminjam</label>
                    <input type="text" class="form-control" id="exampleInputPassword4" placeholder="Nama Peminjam"
                        name="nama" value="{{ Auth::user()->name }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword4">Status</label>
                    <select name="status" class="form-control" id="" value="{{ $minjem->status }}" style="color: #ffffff;">
                        <option value="Dipinjem">Dipinjem</option>
                        <option value="Dikembalikan">Dikembalikan</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Edit</button>
                <a href="{{ route('peminjaman.index') }}" class="btn btn-dark">Cancel</a>
            </form>
        </div>
    </div>
@endsection