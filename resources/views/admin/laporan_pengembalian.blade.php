@extends('layouts.backend.admin')
@section('styles')
    <link href="{{ asset('admin/assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <div class="container">
        <div class="card m-3">
            <div class="card-body p-4">
                <h2>Returned Report</h2>
                <table class="table table-bordered" id="example2">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>User</th>
                            <th>Book Title</th>
                            <th>Return Date</th>
                            <th>Fine</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kembali as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->minjem->user->name }}</td>
                                <td>{{ $p->minjem->buku->judul }}</td>
                                <td>{{ $p->tanggal_kembali }}</td>
                                <td>Rp{{ number_format($p->denda, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('admin/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>

    <script>
       $(document).ready(function() {
    var table = $('#example2').DataTable({
        dom: "<'row'<'col-md-6'B><'col-md-6'f>>" + // Pindahkan search ke kanan
             "<'row'<'col-sm-12'tr>>" +
             "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        lengthChange: false,
        paging: false,
        buttons: [
            // {
            //     text: 'Add Book',
            //     action: function() {
            //         window.location.href = "{{ route('buku.create') }}";
            //     }
            // },
            {
                text: 'Export PDF',
                extend: 'print',
                exportOptions: {
                    columns: ':not(:last-child)' 
                }
            },
            {
                text: 'Export EXCEL',
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':not(:last-child)'
                }
            }
        ]
    });

    // Masukkan tombol export ke dalam wrapper
    table.buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');

    // Buat input search bawaan tetap berfungsi
    $('#searchInput').on('keyup', function() {
        table.search(this.value).draw();
    });

    // Hapus search input duplikat bawaan DataTables
    $('#example2_filter').hide();
});

    </script>
@endpush
