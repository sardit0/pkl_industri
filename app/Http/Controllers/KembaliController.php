<?php

namespace App\Http\Controllers;

use App\Models\Kembali;
use App\Models\Minjem;
use App\Models\Buku;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

Carbon::setLocale('id');

class KembaliController extends Controller
{
    /**
     * Tampilkan daftar pengembalian
     */
    public function index()
    {
        $kembalis = Kembali::with('buku', 'user')->get();

        foreach ($kembalis as $data) {
            $data->formatted_tanggal = Carbon::parse($data->tanggal_kembali)->translatedFormat('l, d F Y');
        }

        return view('user.kembalian.index', compact('kembalis'));
    }

    public function indexapi()
    {
        $kembali = kembali::all();
        $res = [
            'success' => true,
            'message' => 'Daftar kembali',
            'kembali' => $kembali,
        ];
        return response()->json($res, 200);
        }

    /**
     * Simpan data pengembalian
     */
    public function store(Request $request)
    {
        // Ambil data peminjaman berdasarkan id_minjem
        $minjem = Minjem::findOrFail($request->id_minjem);

        // Hitung selisih hari antara batas_tanggal dan tanggal_kembali
        $batas_tanggal = Carbon::parse($minjem->batas_tanggal);
        $tanggal_kembali = Carbon::parse($request->tanggal_kembali);

        // Hitung jumlah hari keterlambatan
        $selisih_hari = $tanggal_kembali->diffInDays($batas_tanggal, false); // false untuk mendapatkan hari negatif jika lebih awal

        // Hitung denda (hanya jika terlambat)
        $denda = $selisih_hari > 0 ? $selisih_hari * 1000 : 0;

        // Simpan data pengembalian
        $kembali = new Kembali();
        $kembali->jumlah = $request->jumlah;
        $kembali->tanggal_kembali = $request->tanggal_kembali;
        $kembali->status = 'dikembalikan';
        $kembali->id_minjem = $request->id_minjem;
        $kembali->id_buku = $request->id_buku;
        $kembali->denda = $denda; // Simpan denda
        $kembali->save();

        // Update status peminjaman menjadi dikembalikan
        $minjem->status = 'dikembalikan';
        $minjem->save();

        return redirect()->route('kembalian.index')->with('success', 'Buku berhasil dikembalikan' . ($denda > 0 ? " dengan denda Rp$denda" : ""));
    }

    /**
     * Tampilkan detail pengembalian
     */
    public function show(Kembali $kembali)
    {
        return view('admin.kembalian.show', compact('kembali'));
    }

    /**
     * Form edit pengembalian
     */
    public function edit(Kembali $kembali)
    {
        return view('admin.kembalian.edit', compact('kembali'));
    }

    /**
     * Update data pengembalian
     */
    public function update(Request $request, Kembali $kembali)
    {
        $request->validate([
            'tanggal_kembali' => 'required|date',
            'jumlah' => 'required|integer|min:1',
        ]);

        $kembali->tanggal_kembali = $request->tanggal_kembali;
        $kembali->jumlah = $request->jumlah;
        $kembali->save();

        return redirect()->route('kembalian.index')->with('success', 'Data pengembalian berhasil diperbarui.');
    }

    /**
     * Hapus data pengembalian
     */
    public function destroy(Kembali $kembali)
    {
        $kembali->delete();
        return redirect()->route('kembali.index')->with('success', 'Data pengembalian berhasil dihapus.');
    }
}
