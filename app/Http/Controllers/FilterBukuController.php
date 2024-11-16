<?php

namespace App\Http\Controllers;

use App\Models\Minjem;
use App\Models\Buku;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Penulis;
use App\Models\Penerbit;
use Auth;
use Illuminate\Http\Request;

class FilterBukuController extends Controller
{
    public function filterkategori($id = null)
    {
        $kategori = Kategori::all();
        $penerbit = Penerbit::all();
        $penulis = penulis::all();
        $user = Auth::user();
        $minjem = Minjem::all();

        $buku = $id ? Buku::where('id_kategori', $id)->paginate(16) : Buku::paginate(16);
        return view('user.buku', compact('penerbit', 'penulis', 'user', 'minjem', 'buku', 'kategori'));
    }

    public function filterpenerbit($id = null)
    {
        $kategori = Kategori::all();
        $penerbit = Penerbit::all();
        $penulis = penulis::all();
        $user = Auth::user();
        $minjem = Minjem::all();

        $buku = $id ? Buku::where('id_penerbit', $id)->paginate(16) : Buku::paginate(16);
        return view('user.buku', compact('kategori', 'penerbit', 'penulis', 'user', 'minjem', 'buku'));
    }

    public function filterpenulis($id = null)
    {
        $kategori = Kategori::all();
        $penerbit = Penerbit::all();
        $penulis = penulis::all();
        $user = Auth::user();
        $minjem = Minjem::all();

        $buku = $id ? Buku::where('id_penulis', $id)->paginate(16) : Buku::paginate(16);
        return view('user.buku', compact('kategori', 'penerbit', 'penulis', 'user', 'minjem', 'buku'));
    }
}
