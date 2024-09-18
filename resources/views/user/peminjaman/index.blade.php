@extends('user.usertemp')
@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.css">
@endsection
@section('content')
    <h6 class="mb-0 text-uppercase"></h6>
    <hr>
    <div class="card m-3">
        <div class="card-body">
            <h4 class="card-title">Peminjaman</h4>
            <div class="table">
                <table class="table mb-0 table-striped" id="example">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Buku</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Tanggal Peminjaman</th>
                            <th scope="col">Batas Peminjaman</th>
                            <th scope="col">Tanggal Pengembalian</th>
                            <th scope="col">Nama Peminjam</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($minjem as $item)
                            <tr>
                                <th scope="row">{{ $loop->index + 1 }}</th>
                                <td>{{ $item->buku->judul }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td>{{ $item->tanggal_minjem }}</td>
                                <td>{{ $item->batas_tanggal }}</td>
                                <td>{{ $item->tanggal_kembali }}</td>
                                <td>{{ $item->nama }}</td>
                                <!-- Pewarnaan Status -->
                                <td>
                                    @if ($item->status == 'diterima')
                                        <span class="badge bg-success">{{ ucfirst($item->status) }}</span>
                                    @elseif ($item->status == 'ditolak')
                                        <span class="badge bg-danger">{{ ucfirst($item->status) }}</span>
                                    @elseif ($item->status == 'dikembalikan')
                                        <span class="badge bg-danger">{{ ucfirst($item->status) }}</span>
                                    @else
                                        <span class="badge bg-warning">{{ ucfirst($item->status) }}</span>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('peminjaman.edit', $item->id) }}"
                                        class="btn btn-grd-warning px-2" style="color: black">Edit</a>
                                    <!-- Button for Delete with SweetAlert Confirmation -->
                                    <a class="btn ripple btn-grd-danger px-3" href="#"
                                        onclick="confirmDelete({{ $item->id }})" style="color: black">
                                        Hapus
                                    </a>

                                    <!-- Form Destroy Dinamis -->
                                    <form id="destroy-form-{{ $item->id }}"
                                        action="{{ route('peminjaman.destroy', $item->id) }}" method="POST"
                                        class="d-none">
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
    </div>
@endsection

{{-- @push('scripts')
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // DataTables Initialization
        new DataTable('#example', {
            dom: 'Bfrtip',
            buttons: [{
                    text: 'Tambah Peminjaman',
                    className: 'btn btn-success px-4 raised',
                    action: function(e, dt, node, config) {
                        window.location.href = "{{ route('peminjaman.create') }}";
                    }
                },
                'pdf', 'excel'
            ]
        });

        // SweetAlert Delete Confirmation
        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak akan bisa mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('destroy-form-' + id).submit();
                }
            })
        }
    </script>
@endpush --}}

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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                        window.location.href = "{{ route('peminjaman.create') }}";
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
