@extends('layouts.backend.admin')
@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.css">
@endsection
@section('content')
    <h6 class="mb-0 text-uppercase"></h6>
    <hr>
    <div class="card m-3">
        <div class="table-responsive">
            <div class="card-body position-relative">
                <h4 class="card-title">Buku</h4>
                <table class="table mb-0 table-striped" id="example">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Judul Buku</th>
                            <th scope="col">Jumlah Buku</th>
                            <th scope="col">Tahun Penerbit</th>
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

                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $data->judul }}</td>
                                <td>{{ $data->jumlah_buku }}</td>
                                <td>{{ $data->tahun_penerbit }}</td>
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
                                    <a href="{{ route('buku.edit', $data->id) }}" class="btn btn-grd-warning px-2" style="color: black">Edit</a>
                                    <a href="{{ route('buku.show', $data->id) }}" class="btn btn-grd-primary float-end"
                                        data-bs-toggle="modal" data-bs-target="#insertdata" style="color: black">
                                        Show
                                    </a>
                                    <a class="btn ripple btn-grd-danger px-3" href="#"
                                        onclick="event.preventDefault();
                            document.getElementById('destroy-form').submit();" style="color: black">
                                        Hapus
                                    </a>

                                    <form id="destroy-form" action="{{ route('buku.destroy', $data->id) }}" method="POST"
                                        class="d-none">
                                        @method('DELETE')
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>x
            </div>
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
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/4.3.0/css/fixedColumns.bootstrap5.min.css">
    <script src="https://cdn.datatables.net/fixedcolumns/4.3.0/js/dataTables.fixedColumns.min.js"></script>

    <script>
        new DataTable('#example', {
            dom: 'Bfrtip',
            scrollX: true,
            fixedColumns: {
                right: 1,
                left: 0 
            },
            buttons: [{
                    text: 'Tambah Buku',
                    className: 'btn btn-success px-4 raised',
                    action: function(e, dt, node, config) {
                        window.location.href = "{{ route('buku.create') }}";
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: ':not(:last-child)' // Exclude the last column ("Aksi")
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: ':not(:last-child)' // Exclude the last column ("Aksi")
                    }
                }
            ]
        });
    </script>
@endpush
