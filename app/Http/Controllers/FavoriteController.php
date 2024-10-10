// app/Http/Controllers/FavoriteController.php
namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = Auth::user()->favoriteBooks()->get(); // Mendapatkan semua buku favorit user
        return view('favorites.index', compact('favorites'));
    }

    public function store(Book $book)
    {
        $favorite = Favorite::firstOrCreate([
            'user_id' => Auth::id(),
            'book_id' => $book->id,
        ]);

        return back()->with('success', 'Buku ditambahkan ke favorit!');
    }

    public function destroy(Book $book)
    {
        $favorite = Favorite::where('user_id', Auth::id())->where('book_id', $book->id)->first();

        if ($favorite) {
            $favorite->delete();
            return back()->with('success', 'Buku dihapus dari favorit!');
        }

        return back()->with('error', 'Buku tidak ditemukan dalam daftar favorit.');
    }
}
