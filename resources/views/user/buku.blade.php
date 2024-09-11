@extends('layouts.frontend.user')
@section('content')

<!-- Class Start -->
<div class="container-fluid pt-5">
    <div class="container">
        <div class="text-center pb-2">
            <h1 class="mb-4 mt-5">Selamat datang di halaman Buku</h1>
        </div>
        <div class="row">
            @foreach ($buku as $data )
            <div class="col-lg-3 mb-5">
                <div class="card border-0 bg-light shadow-sm pb-2">
                    <a href="{{ url('show' , $data->id) }}">
                        <img src="{{ asset('images/buku/' . $data->image) }}" alt="" class="card-img-top" alt="..." width="50" height="350">
                    </a>
                    <div class="card-body text-center">
                        <h4 class="card-title">{{$data->judul}}</h4>
                        <p class="card-text">
                            {{-- {{$data->deskripsi}} --}}
                        </p>
                    </div>
                    <a href="{{ url('peminjam/show' , $data->id) }}" type="button" class="btn btn-primary px-4 mx-auto mb-4">Lihat Detail</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Class End -->
@endsection
