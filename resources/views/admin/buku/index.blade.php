@extends('layouts.backend.admin')
@section('styles')
    <link href="{{ asset('admin/assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <h3 class="m-3 text-uppercase">BOOK PAGE</h3>
    <hr>
    <div class="card p-3">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">
                <div id="example2_wrapper"></div> <!-- Container untuk tombol export -->
                <input type="text" id="searchInput" class="form-control w-25" placeholder="Search...">
            </div>
            <table class="table mb-0 table-striped" id="example2">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">No</th>
                        <th scope="col">Title Book</th>
                        <th scope="col">Amount of Books</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Publiser Name</th>
                        <th scope="col">Writter Name</th>
                        <th scope="col" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($buku as $data)
                        <tr>
                            @php $no = 1; @endphp

                            <th scope="row">{{ ($buku->currentPage() - 1) * $buku->perPage() + $loop->index + 1 }}</th>
                            <td>{{ $data->judul }}</td>
                            <td class="text-center">{{ $data->jumlah_buku }}</td>
                            <td>
                                @if ($data->kategori)
                                    {{ $data->kategori->nama_kategori }}
                                @else
                                    category not found
                                @endif
                            </td>
                            <td>
                                @if ($data->penerbit)
                                    {{ $data->penerbit->nama_penerbit }}
                                @else
                                    publisher not found
                                @endif
                            </td>
                            <td>
                                @if ($data->penulis)
                                    {{ $data->penulis->nama_penulis }}
                                @else
                                    writter not found
                                @endif
                            </td>
                            <td class="text-center">
                                {{-- <a href="{{ route('buku.edit', $data->id) }}"><button type="button"
                                        class="btn btn-sm btn-primary m-1" item-bs-toggle="tooltip" data-bs-placement="left"
                                        title="Editing Book"><i class="ti ti-edit"></i></button></a>
                                <a href="{{ route('buku.show', $data->id) }}"><button type="button"
                                        class="btn btn-sm btn-secondary m-1" item-bs-toggle="tooltip" data-bs-placement="left"
                                        title="Book Detail"><i class="ti ti-eye"></i></button></a>
                                </a>
                                <a href="#"
                                    onclick="event.preventDefault();
    document.getElementById('destroy-form-{{ $data->id }}').submit();">
                                    <button type="button" class="btn btn-sm btn-danger m-1" item-bs-toggle="tooltip"
                                        data-bs-placement="left" title="Delete Book"><i class="ti ti-trash"></i></button>
                                </a>
                                <form id="destroy-form-{{ $data->id }}"
                                    action="{{ route('buku.destroy', $data->id) }}" method="POST" class="d-none">
                                    @method('DELETE')
                                    @csrf
                                </form> --}}
                                <div class="dropdown">
                                    <button class="btn btn-secondary" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ti ti-menu-2"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('buku.edit', $data->id) }}">
                                                <i class="ti ti-edit"></i> Edit 
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href=" route('buku.show', $data->id) }}">
                                                <i class="ti ti-eye"></i> View
                                            </a>
                                        </li>
                                        <li>
                                            <form action="{{ route('buku.destroy', $data->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                @csrf
                                                @method('DELETE')
                                                <button class="dropdown-item" type="submit">
                                                    <i class="ti ti-trash"></i> Delete
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center mt-4">
                {{ $buku->links('pagination::bootstrap-5')  }}
            </div>
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
            {
                text: 'Add Book',
                action: function() {
                    window.location.href = "{{ route('buku.create') }}";
                }
            },
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

