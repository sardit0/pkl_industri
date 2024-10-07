@extends('layouts.frontend.user')
@section('content')

<!-- Class Start -->
<div class="container-fluid pt-5">
    <div class="container">
        <div class="text-center pb-2">
            <h1 class="mb-4 mt-5">WELCOME TO THE BOOK PAGE</h1>
        </div>
        <div class="row">
            @foreach ($buku as $hideng)
            <div class="col-md-3">
                <div class="product-item">
                    <figure class="product-style">
                        <img src="{{ asset('images/buku/' . $hideng->image) }}" alt="Books"
                            class="product-item">
                        <button type="button" class="add-to-cart" data-product-tile="add-to-cart"><a
                                href="{{ route('peminjaman.create') }}">Want to borrow?</a></button>
                    </figure>
                    <figcaption>
                        <h3>{{ $hideng->judul }}</h3>
                    </figcaption>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>
<!-- Class End -->
@endsection
