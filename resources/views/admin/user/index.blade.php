@extends('layouts.backend.admin')
@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.css">
@endsection
@section('content')
{{-- <h6 class="mb-0 text-uppercase">ACCESS CONTROL LIST</h6> --}}
<hr>
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Access Controller List</h4>
        <table class="table mb-0 table-striped" id="example">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No HandPhone</th>
                    <th scope="col">Is Admin ?</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $item)
                <tr>
                    <th scope="row">{{ $loop->index+1 }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->no_hp }}</td>
                    <td>{{ $item->isAdmin ? 'Admin' : 'Peminjam' }}</td>
                    <td>
                        <img src="{{ asset('images/user/' . $item->fotoprofile) }}"  class="rounded-circle p-1 border mb-4" width="80" height="80" style="object-fit: cover;" alt="">
                    </td>
                    <td>
                        <a href="{{ route('user.show', $item->id) }}" class="btn btn-grd-primary gap-2">Show</a>
                        <a href="{{ route('user.edit', $item->id) }}" class="btn btn-grd-warning px-2">Edit</a>
                        <a class="btn ripple btn-grd-danger px-3" href="#" onclick="event.preventDefault();
                            document.getElementById('destroy-form').submit();">
                            Hapus
                        </a>

                        <form id="destroy-form" action="{{ route('user.destroy', $item->id) }}"
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
            dom: 'Bfrtip',
            buttons: [
                {
                    text: 'Tambah Admin/Peminjam?',
                    className: 'btn btn-success px-4 raised',
                    action: function (e, dt, node, config) {
                        window.location.href = "{{ route('user.create') }}";
                    }
                },
                'pdf', 'excel'
            ]
        });
    </script>
@endpush