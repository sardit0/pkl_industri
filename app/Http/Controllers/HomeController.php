<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Penerbit;
use App\Models\Penulis;
use App\Models\Buku;
use App\Models\Minjem;
use App\Models\Kembali;
use App\Charts\BukuChart;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(BukuChart $chart)
    {
        $chartInstance = $chart->build(); // Membuat chart

        // BUAT KE CHART
        // $masukPemasukan = Pemasukan::select('jumlah_pemasukan')->get();
        // $totalPemasukan = $masukPemasukan->sum('jumlah_pemasukan');
        // $hasilPemasukan = $masukPemasukan->pluck('jumlah_pemasukan');

        // Ambil data lain
        $kategori = Kategori::count('id');
        $penulis = Penulis::count('id');
        $penerbit = Penerbit::count('id');
        $buku = Buku::count('id');
        $minjem = Minjem::count('id');
        $kembali = Minjem::where('status', 'Sudah Dikembalikan')->count('id');
        
        // Kirimkan variabel ke view
        return view('home', [
            'buku' => $buku,
            'penerbit' => $penerbit,
            'penulis' => $penulis,
            'kategori' => $kategori,
            'kembali' => $kembali,
            'minjem' => $minjem,
            'chart' => $chartInstance // Pastikan ini adalah objek chart
        ]);
    }
}