@extends('layouts.backend.usertemp')
@section('styles')
    <link href="{{ asset('user/assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <h3 class="m-3 text-uppercase">BORROWER PAGE</h3>
    <hr>
    <div class="card m-3">
        <div class="card-body">
            <div class="row d-flex justify-content-end">
                <div class="col-md-3">
                    <input type="text" id="searchInput" class="form-control" placeholder="Search...">
                </div>
            </div>
            {{-- <form action="{{ route('peminjaman.index') }}" method="GET" class="mb-3">
                <select name="status_pengajuan" class="form-select">
                    <option value="">Semua Status</option>
                    <option value="ditahan" {{ request('status') == 'ditahan' ? 'selected' : '' }}>Menunggu Pengajuan
                    </option>
                    <option value="diterima" {{ request('status') == 'diterima' ? 'selected' : '' }}>Pengajuan Diterima
                    </option>
                    <option value="ditolak" {{ request('status') == 'ditolak' ? 'selected' : '' }}>Pengajuan Ditolak
                    </option>
                </select>
                <button type="submit" class="btn btn-primary mt-3">Filter</button>
            </form> --}}
            <table class="table mb-0 table-striped" id="example2">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">No</th>
                        <th scope="col">Book Name</th>
                        <th scope="col" class="text-center">Amount</th>
                        <th scope="col">Borrower Date</th>
                        <th scope="col">Borrower Name</th>
                        {{-- <th scope="col">Return Date</th> --}}
                        <th scope="col">Status</th>
                        <th scope="col" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($minjem as $item)
                        <tr>
                            <th scope="row" class="text-center">{{ $loop->index + 1 }}</th>
                            <td>{{ $item->buku->judul }}</td>
                            <td class="text-center">{{ $item->jumlah }}</td>
                            <td>{{ $item->tanggal_minjem }}</td>
                            <td>{{ $item->nama }}</td>
                            {{-- <td>{{ $item->tanggal_kembali }}</td> --}}
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
                                @if ($item->status === 'ditolak')
                                <a href="{{ route('showpengajuanuser', $item->id) }}" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="left" title="See reasons for rejection">
                                    <i class="ti ti-eye"></i>
                                </a>
                                @elseif($item->status === 'diterima')
                                    <a href="{{ route('peminjaman.edit', $item->id) }}"
                                        class="btn btn-warning text-light btn-sm" item-bs-toggle="tooltip"
                                        data-bs-placement="left" title="Book Returned"><i class="ti ti-repeat"></i></a>
                                    {{--     
                                @elseif($item->status === 'pengajuan ditolak')
                                <a href="{{ route('showpengajuanuser', $item->id) }}" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="left" title="Lihat Alasan Ditolak"> <i class="material-icons-outlined" style="font-size: 18px;">visibility</i></a>
     --}}
                                @elseif($item->status === 'dikembalikan')
                                    <form enctype="multipart/form-data"
                                        action="{{ route('peminjaman.update', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" name="status" value="Success" data-bs-toggle="tooltip"
                                            data-bs-placement="left" title="Hapus Data"
                                            onclick="return confirm('Apakah anda yakin??')"><i
                                                class="ti ti-trash"></i></button>
                                    </form>
                                    {{--                                 
                                @elseif($item->status === 'pengembalian ditolak')
                                <a href="{{ route('showpengembalianuser', $item->id) }}" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="left" title="Lihat Alasan Ditolak"> <i class="material-icons-outlined" style="font-size: 18px;">visibility</i></a>
     --}}
                                    </form>
                                @endif
                            </td>
                            {{-- <td class="text-center">
                                <a href="{{ route('peminjaman.edit', $item->id) }}"><button type="button"
                                        class="btn btn-primary m-1"><i class="ti ti-edit"></i></button></a>
                                <a href="#"
                                    onclick="event.preventDefault();
                        document.getElementById('destroy-form').submit();">
                                    <button type="button" class="btn btn-danger m-1"><i class="ti ti-trash"></i></button>
                                </a>
                                <form id="destroy-form" action="{{ route('peminjaman.destroy', $item->id) }}"
                                    method="POST" class="d-none">
                                    @method('DELETE')
                                    @csrf
                                </form>

                                <!-- Form Destroy Dinamis -->
                                <form id="destroy-form-{{ $item->id }}"
                                    action="{{ route('peminjaman.destroy', $item->id) }}" method="POST" class="d-none">
                                    @method('DELETE')
                                    @csrf
                                </form>
                            </td> --}}
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
                dom: 'Bfrtip',
                searching: false,
                lengthChange: false,
                buttons: [{
                        text: 'Add Borrower',
                        action: function(e, dt, node, config) {
                            window.location.href = "{{ route('peminjaman.create') }}";
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: ':not(:last-child)' // Exclude the last column (Aksi)
                        },
                        customize: function(doc) {
                            var win = window.open('', '_blank');
                            win.document.write(
                                '<iframe width="100%" height="100%" src="data:application/pdf;base64,' +
                                btoa(doc) + '"></iframe>');
                        }

                    },
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: ':not(:last-child)' // Exclude the last column (Aksi)
                        }
                    }
                ]
            });

            table.buttons().container()
                .appendTo('#example2_wrapper .col-md-6:eq(0)');
        });
        $(document).ready(function() {
            $("#searchInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#example2 tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });
        document.getElementById('searchInput').addEventListener('keyup', function() {
            var input = this.value.toLowerCase();
            var items = document.querySelectorAll('.item');

            items.forEach(function(item) {
                var text = item.textContent.toLowerCase();
                item.style.display = text.includes(input) ? '' : 'none';
            });
        });
    </script>
@endpush
