@extends('layouts.admin')
@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.css">
@endsection
@section('content')
<h6 class="mb-0 text-uppercase"></h6>
<hr>
<div class="card m-3">
    <div class="card-body">
        <div class="col-lg-2">
            <a href="{{ route('buku.create') }}" class="btn btn-success px-4 raised">
                <i class="material-icons-outlined"></i>
                Tambah Buku
            </a>
        </div>
        <table class="table mb-0 table-striped" id="example">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Judul Buku</th>
                    <th scope="col">Jumlah Buku</th>
                    <th scope="col">Tahun Penerbit</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Nama Kategori</th>
                    <th scope="col">Nama Penerbit</th>
                    <th scope="col">Nama Penulis</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($buku as $data)
                <tr>
                    @php $no = 1; @endphp 

                    <td>{{ $loop->index+1 }}</td>
                    <td>{{ $data->judul }}</td>
                    <td>{{ $data->jumlah_buku}}</td>
                    <td>{{ $data->tahun_penerbit }}</td>
                    <td><img src="{{ asset('images/buku/' . $data->image) }}" alt="" width="70%"></td>
                    <td>
                        @if ($data->kategori)
                            {{ $data->kategori->nama_kategori }}
                        @else
                            kategori tidak ditemukan
                        @endif
                    </td>
                    <td>
                        @if ($data->penerbit)
                            {{ $data->penerbit->nama_penerbit }}
                        @else
                            penerbit tidak ditemukan
                        @endif
                    </td>
                    <td>
                        @if ($data->penulis)
                            {{ $data->penulis->nama_penulis }}
                        @else
                            penulis tidak ditemukan
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('buku.edit', $data->id) }}" class="btn btn-grd-warning px-2">Edit</a>
                        <a class="btn ripple btn-grd-danger px-3" href="#" onclick="event.preventDefault();
                            document.getElementById('destroy-form').submit();">
                            Hapus
                        </a>

                        <form id="destroy-form" action="{{ route('buku.destroy', $data->id) }}"
                            method="POST" class="d-none">
                            @method('DELETE')
                            @csrf
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script>

<script>
    new DataTable('#example', {
        layout: {
            topStart: {
                buttons: ['pdf', 'excel']
            }
        }
    });
</script>

@endpush