@extends('layouts.admin')
@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.css">
@endsection
@section('content')
    <h6 class="mb-0 text-uppercase"></h6>
    <hr>
    <div class="card m-3">
        <div class="card-body position-relative">
            <table class="table mb-0 table-striped" id="example">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Penerbit</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penerbit as $data)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $data->nama_penerbit }}</td>
                            <td>
                                <a href="{{ route('penerbit.edit', $data->id) }}" class="btn btn-grd-warning px-2">Edit</a>
                                <a class="btn ripple btn-grd-danger px-3" href="#"
                                    onclick="event.preventDefault();
                            document.getElementById('destroy-form').submit();">
                                    Hapus
                                </a>

                                <form id="destroy-form" action="{{ route('penerbit.destroy', $data->id) }}" method="POST"
                                    class="d-none">
                                    @method('DELETE')
                                    @csrf
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="tambah-buku">
                <div class="col-lg-2">
                    <a href="{{ route('penerbit.create') }}" class="btn btn-success px-4 raised ">
                        <i class="material-icons-outlined"></i>
                        Tambah Penerbit
                    </a>
                </div>
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

    <script>
        new DataTable('#example', {
            dom: 'Bfrtip',
            buttons: [
                {
                    text: 'Tambah Penerbit',
                    className: 'btn btn-success px-4 raised',
                    action: function (e, dt, node, config) {
                        window.location.href = "{{ route('penerbit.create') }}";
                    }
                },
                'pdf', 'excel'
            ]
        });
    </script>
@endpush
