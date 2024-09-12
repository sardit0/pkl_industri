<?php

namespace App\Http\Controllers;

use App\Models\Minjem;
use App\Models\Kembali;
use App\Models\Buku;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KembaliController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, $id)
    {
        // Validasi input
        $this->validate($request, [
            'jumlah' => 'required|integer|min:1',
        ]);

        // Temukan data peminjaman berdasarkan ID
        $minjem = Minjem::findOrFail($id);

        // Pastikan peminjaman statusnya "Dipinjam"
        if ($minjem->status !== 'Dipinjam') {
            Alert::error('Error', 'Status peminjaman tidak valid untuk pengembalian.')->autoclose(1500);
            return redirect()->back();
        }

        // Temukan buku berdasarkan ID dari peminjaman
        $buku = Buku::findOrFail($minjem->id_buku);

        // Tambahkan jumlah buku yang dikembalikan ke stok buku
        $buku->jumlah_buku += $request->jumlah;
        $buku->save();

        // Update status peminjaman menjadi "Dikembalikan"
        $minjem->status = 'Dikembalikan';
        $minjem->save();

        Alert::success('Success', 'Buku berhasil dikembalikan.')->autoclose(1500);

        return redirect()->route('peminjaman.index');
    }
    public function index()
    {
        $kembali = Kembali::all(); // Mengambil semua data pengembalian
        return view('user.kembalian.index', compact('kembali')); // Mengirim data ke tampilan
    }
}
