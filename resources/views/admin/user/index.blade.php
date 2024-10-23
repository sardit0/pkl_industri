@extends('layouts.backend.admin')
@section('content')
<h3 class="m-3 text-uppercase">ACCESS CONTROLL LIST</h3>
<hr>
    <div class="card">
        <div class="card-body">
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
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->no_hp }}</td>
                            <td>{{ $item->isAdmin ? 'Admin' : 'Peminjam' }}</td>
                            <td>
                                <img src="{{ asset('images/user/' . $item->fotoprofile) }}"
                                    class="rounded-circle p-1 border mb-4" width="80" height="80"
                                    style="object-fit: cover;" alt="">
                            </td>
                            <td class="text-center">
                                <a href="{{ route('user.edit', $item->id) }}"><button type="button"
                                        class="btn btn-primary m-1" item-bs-toggle="tooltip" data-bs-placement="left"
                                        title="Editing User"><i class="ti ti-edit"></i></button></a>
                                <a href="{{ route('user.show', $item->id) }}"><button type="button"
                                        class="btn btn-secondary m-1" item-bs-toggle="tooltip" data-bs-placement="left"
                                        title="User Detail"><i class="ti ti-eye"></i></button></a>
                                </a>
                                <a href="#"
                                    onclick="event.preventDefault();
document.getElementById('destroy-form-{{ $item->id }}').submit();">
                                    <button type="button" class="btn btn-danger m-1" item-bs-toggle="tooltip"
                                        data-bs-placement="left" title="Delete User"><i class="ti ti-trash"></i></button>
                                </a>
                                <form id="destroy-form-{{ $item->id }}"
                                    action="{{ route('user.destroy', $item->id) }}" method="POST" class="d-none">
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
