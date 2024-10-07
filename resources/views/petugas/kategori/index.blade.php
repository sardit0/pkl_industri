@extends('layouts.backend.admin')
@section('content')
<h3 class="m-3 text-uppercase">CATEGORY PAGE</h3>
    <hr>
        <div class="row">
            <div class="col-6 col-xl-6">
                <div class="card p-3">
                    <div class="card-body">
                        <div class="card-header mb-4">
                            <h4>Add Kategori</h4>
                        </div>
                        <form class="row g-3" method="POST" action="{{ route('petugas.kategori.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                                <label for="input17" class="form-label">Category Name</label>
                                <div class="position-relative input-icon">
                                    <input type="text" name="nama_kategori"
                                        class="form-control @error('nama_kategori') is-invalid @enderror" id="input17"
                                        placeholder="Name">
                                    <span class="position-absolute top-50 translate-middle-y"></span>
                                    @error('nama_kategori')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-7 mt-3">
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
                                <th scope="col">Category Name</th>
                                <th scope="col" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategori as $data)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $data->nama_kategori }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('kategori.edit', $data->id) }}"><button type="button"
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
                                        <form id="destroy-form" action="{{ route('kategori.destroy', $data->id) }}"
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
        </div>
    </div>
@endsection
