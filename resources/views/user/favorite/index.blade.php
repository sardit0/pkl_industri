@extends('layouts.frontend.user')

@section('content')
<div class="container">
    <h1>Daftar Buku Favorit</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if($favorites->isEmpty())
        <p>Tidak ada buku favorit.</p>
    @else
        <ul>
            @foreach($favorites as $book)
                <li>
                    <p>{{ $book->title }}</p>
                    <form action="{{ route('favorites.destroy', $book) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus dari Favorit</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
