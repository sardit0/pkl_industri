@extends('layouts.backend.admin')
@section('content')
<h3 class="m-3 text-uppercase">WRITTER PAGE</h3>
    <hr>
        <div class="row">
            <div class="col-6 col-xl-6">
                <div class="card p-3">
                    <div class="card-body">
                        <div class="card-header mb-4">
                            <h4>Add Writter</h4>
                        </div>
                        <form class="row g-3" method="POST" action="{{ route('penulis.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                                <label for="input17" class="form-label">Writter Name</label>
                                <div class="position-relative input-icon">
                                    <input type="text" name="nama_penulis"
                                        class="form-control @error('nama_penulis') is-invalid @enderror" id="input17"
                                        placeholder="Name">
                                    <span class="position-absolute top-50 translate-middle-y"></span>
                                    @error('nama_penulis')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="d-md-flex d-grid align-items-center gap-3">
                                    <button type="submit" class="btn btn-success px-4 mr-3">Submit</button>
                                    <a type="submit" href="{{ route('kategori.index') }}" class="btn btn-danger">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-6 col-xl-6">
                <div class="card-body position-relative">
                    <table class="table mb-0 table-striped" id="example">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Writter Name</th>
                                <th scope="col" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penulis as $data)
                                <tr>
                                    <th scope="row">{{ ($penulis->currentPage() - 1) * $penulis->perPage() + $loop->index + 1 }}</th>
                                    <td>{{ $data->nama_penulis }}</td>
                                    <td class="text-center">
                                        {{-- <a href="{{ route('penulis.edit', $data->id) }}"><button type="button"
                                                class="btn btn-primary m-1" item-bs-toggle="tooltip"
                                                data-bs-placement="left" title="Editing Book"><i class="ti ti-edit"></i></button></a>
                                        </a>
                                        <a href="#"
                                            onclick="event.preventDefault();
                            document.getElementById('destroy-form').submit();">
                                            <button type="button" class="btn btn-danger m-1" item-bs-toggle="tooltip"
                                            data-bs-placement="left" title="Delete Book"><i
                                                    class="ti ti-trash"></i></button>
                                        </a>
                                        <form id="destroy-form" action="{{ route('penulis.destroy', $data->id) }}"
                                            method="POST" class="d-none">
                                            @method('DELETE')
                                            @csrf
                                        </form> --}}

                                        <div class="dropdown">
                                            <button class="btn btn-secondary" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ti ti-menu-2"></i>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('penulis.edit', $data->id) }}">
                                                        <i class="ti ti-edit"></i> Edit 
                                                    </a>
                                                </li>
                                                {{-- <li>
                                                    <a class="dropdown-item" href=" route('buku.show', $data->id) }}">
                                                        <i class="ti ti-eye"></i> View
                                                    </a>
                                                </li> --}}
                                                <li>
                                                    <form action="{{ route('penulis.destroy', $data->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
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
                        {{ $penulis->links('pagination::bootstrap-5')  }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
