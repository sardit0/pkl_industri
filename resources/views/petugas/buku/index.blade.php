@extends('layouts.backend.petugas')
@section('styles')
    <link href="{{ asset('admin/assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <h3 class="m-3 text-uppercase">BOOK PAGE</h3>
    <hr>
    <div class="card p-3">
        <div class="card-body">
            <div class="row d-flex justify-content-end">
                <div class="col-md-3">
                    <input type="text" id="searchInput" class="form-control" placeholder="Search...">
                </div>
            </div>
            <table class="table mb-0 table-striped" id="example2">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">No</th>
                        <th scope="col">Title Book</th>
                        <th scope="col">Number of Books</th>
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

                            <td>{{ $loop->index + 1 }}</td>
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
                                <a href="{{ route('petugas.buku.edit', $data->id) }}"><button type="button"
                                        class="btn btn-primary m-1" item-bs-toggle="tooltip" data-bs-placement="left"
                                        title="Editing Book"><i class="ti ti-edit"></i></button></a>
                                <a href="{{ route('petugas.buku.show', $data->id) }}"><button type="button"
                                        class="btn btn-secondary m-1" item-bs-toggle="tooltip" data-bs-placement="left"
                                        title="Book Detail"><i class="ti ti-eye"></i></button></a>
                                </a>
                                <a href="#"
                                    onclick="event.preventDefault();
    document.getElementById('destroy-form-{{ $data->id }}').submit();">
                                    <button type="button" class="btn btn-danger m-1" item-bs-toggle="tooltip"
                                        data-bs-placement="left" title="Delete Book"><i class="ti ti-trash"></i></button>
                                </a>
                                <form id="destroy-form-{{ $data->id }}"
                                    action="{{ route('petugas.buku.destroy', $data->id) }}" method="POST" class="d-none">
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

@push('scripts')
    <script src="{{ asset('admin/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            var table = $('#example2').DataTable({
                dom: 'Bfrtip',
                searching: false,
                lengthChange: false,
                buttons: [{
                        text: 'Add Book',
                        action: function(e, dt, node, config) {
                            window.location.href = "{{ route('buku.create') }}";
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
            var items = document.querySelectorAll('.item'); // Ganti '.item' dengan kelas elemen yang ingin dicari

            items.forEach(function(item) {
                var text = item.textContent.toLowerCase();
                item.style.display = text.includes(input) ? '' : 'none';
            });
        });
    </script>


    </script>
@endpush
