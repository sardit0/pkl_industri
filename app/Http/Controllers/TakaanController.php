<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Penerbit;
use App\Models\Penulis;
use App\Models\Buku;
use App\Models\Minjem;
use App\Models\User;
use App\Models\Kembali;
use App\Charts\BukuChart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;

class TakaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = Buku::all();
        $kategori = Kategori::all();
        $buku = Buku::orderBy('jumlah_buku', 'desc')->paginate(20);
        return view('user.home', compact('buku','kategori'));
    }

    public function dashboard(BukuChart $chart)
    {
        $chartInstance = $chart->build(); // Membuat chart

        $kategori = Kategori::count('id');
        $penulis = Penulis::count('id');
        $penerbit = Penerbit::count('id');
        $buku = Buku::count('id');
        $minjem = Minjem::count('id');
        $kembali = Minjem::where('status', 'Sudah Dikembalikan')->count('id');

        $bukus = Buku::all();
        $user = auth()->user();
        // Kirimkan variabel ke view
        return view('user.dashboarduser', [
            'buku' => $buku,
            'bukus' => $bukus,
            'penerbit' => $penerbit,
            'penulis' => $penulis,
            'kategori' => $kategori,
            'kembali' => $kembali,
            'minjem' => $minjem,
            'chart' => $chartInstance
        ]);
    }

    public function buku()
    {
        $buku = Buku::all();
        $kategori = Kategori::all();
        $buku = Buku::orderBy('jumlah_buku', 'desc')->paginate(20);
        return view('user.buku', compact('buku','kategori'));
    }

    public function show($id)
    {
        $buku = Buku::findOrFail($id);
        return view('user.show',compact('buku'));
    }

    public function profile()
    {
        $user = Auth::user();
        return view('user.profile',['user' => $user]);
    }

    public function createPeminjaman()
    {
        $buku = Buku::all();
        $batastanggal = Carbon::now()->addWeek()->format('Y-m-d');
        $sekarang = now()->format('Y-m-d');

        return view('user.peminjaman.create', compact('buku', 'sekarang', 'batastanggal'));
    }

    public function storePeminjaman(Request $request)
    {
        $this->validate($request, [
            'jumlah' => 'required|min:1|max:1000',
            'id_buku' => 'required',
        ]);

        $buku = Buku::findOrFail($request->id_buku);

        if ($request->jumlah > $buku->jumlah_buku) {
            Alert::error('Error', 'Quantity requested exceeds available stock')->autoclose(1500);
            return redirect()->back();
        }

        $minjem = new Minjem();
        $minjem->jumlah = $request->jumlah;
        $minjem->tanggal_minjem = now();
        $minjem->batas_tanggal = now()->addDays(7);
        $minjem->tanggal_kembali = now()->addDays(7);
        $minjem->alasan = $request->alasan;
        $minjem->nama = Auth::user()->name;
        $minjem->status = 'ditahan';
        $minjem->id_buku = $request->id_buku;
        $minjem->id_user = Auth::id();

        $minjem->save();

        Alert::info('Info!', 'Loan application successfully created and still in hold status')->autoclose(1500);

        return redirect()->route('peminjaman.index');
    }
}