<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Minjem;
use App\Models\Kembali;

class LaporanPengembalianController extends Controller
{
    public function index()
    {
        $minjem = Minjem::with(['user', 'buku'])->get();
        $kembali = Kembali::with(['peminjaman.user', 'peminjaman.buku'])->get();

        return view('admin.laporan_pengembalian', compact('kembali'));
    }
}

