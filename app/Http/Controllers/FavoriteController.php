<?php
namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = Auth::user()->favoriteBooks()->get();
        return view('favorite.index', compact('favorites'));
    }

    public function store(Buku $buku)
    {
        $favorite = Favorite::firstOrCreate([
            'id_user' => Auth::id(),
            'id_buku' => $buku->id,
        ]);

        return back()->with('success', 'Buku ditambahkan ke favorit!');
    }

    public function destroy(Buku $buku)
    {
        $favorite = Favorite::where('id_user', Auth::id())->where('id_buku', $buku->id)->first();

        if ($favorite) {
            $favorite->delete();
            return back()->with('success', 'Buku dihapus dari favorit!');
        }

        return back()->with('error', 'Buku tidak ditemukan dalam daftar favorit.');
    }
}