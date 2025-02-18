@extends('layouts.backend.usertemp')

@section('styles')
    <link href="{{ asset('user/assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <h3 class="m-3 text-uppercase">Borrower Page</h3>
    <hr>
    <div class="card m-3">
        <div class="card-body">
            <div class="row d-flex justify-content-end">
                <div class="col-md-3">
                    {{-- <input type="text" id="searchInput" class="form-control" placeholder="Search..."> --}}
                    {{-- @foreach ($buku as $data)
                        <button class="btn btn-primary" data-id="{{ $data->id }}">Add Borrower</button>
                    @endforeach --}}
                </div>
            </div>

            <table class="table mb-0 table-striped" id="example2">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>Book Name</th>
                        <th class="text-center">Amount</th>
                        <th>Borrow Date</th>
                        <th>Borrower Name</th>
                        <th>Fine (Rp)</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($minjem as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->buku->judul }}</td>
                            <td class="text-center">{{ $item->jumlah }}</td>
                            <td>{{ $item->tanggal_minjem }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>Rp. {{ number_format($item->denda) }}</td>
                            <td class="text-center">
                                @php
                                    $statusColor = [
                                        'diterima' => 'success',
                                        'ditolak' => 'danger',
                                        'dikembalikan' => 'primary',
                                        'ditahan' => 'warning',
                                    ];
                                @endphp
                                <span class="badge bg-{{ $statusColor[$item->status] ?? 'secondary' }}">
                                    {{ ucfirst($item->status) }}
                                </span>
                            </td>
                            <td class="text-center">
                                @if ($item->status === 'ditolak')
                                    <a href="{{ route('showpengajuanuser', $item->id) }}" class="btn btn-primary btn-sm"
                                        title="See reasons for rejection">
                                        <i class="ti ti-eye"></i>
                                    </a>
                                @elseif($item->status === 'diterima')
                                    <a href="{{ route('peminjaman.edit', $item->id) }}"
                                        class="btn btn-warning text-light btn-sm" title="Book Returned">
                                        <i class="ti ti-repeat"></i>
                                    </a>
                                @elseif($item->status === 'dikembalikan')
                                    <form action="{{ route('peminjaman.update', $item->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" name="status" value="Success" class="btn btn-danger btn-sm"
                                            title="Delete Data" onclick="return confirm('Are you sure?')">
                                            <i class="ti ti-trash"></i>
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('user/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            var table = $('#example2').DataTable({
                dom: "<'row'<'col-md-6'B><'col-md-6'f>>" + // Pindahkan search ke kanan
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                searching: true,
                lengthChange: false,
                buttons: [
                    {
                        text: 'Add Borrower',
                        action: function() {
                            window.location.href = "{{ route('peminjaman.create') }}";
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: ':not(:last-child)'
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: ':not(:last-child)'
                        }
                    }
                ]
            });

            $('#searchInput').on("keyup", function() {
                table.search($(this).val()).draw();
            });

            table.buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
        });
    </script>
@endpush
