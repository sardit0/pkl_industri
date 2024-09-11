<?php

namespace App\Http\Controllers;

use App\Models\Minjem;
use App\Models\Buku;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Penulis;
use App\Models\Penerbit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class MinjemController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $buku = Buku::all();
        $user = Auth::user();
        $kategori = Kategori::all();
        $penulis = Penulis::all();
        $penerbit = Penerbit::all();
        $minjem = Minjem::latest()->paginate(5);
        return view('user.peminjaman.index', compact('buku', 'kategori', 'penulis', 'penerbit', 'minjem','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buku = Buku::all();
        $user = User::all();
        $minjem = Minjem::all();

        $batastanggal = Carbon::now()->addWeek()->format('Y-m-d');
        $sekarang = now()->format('Y-m-d');

        return view('user.peminjaman.create', compact('minjem', 'buku', 'sekarang', 'batastanggal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'jumlah' => 'required|min:1|max:1000',
            'tanggal_minjem' => 'required|date',
            'tanggal_kembali' => 'required|date',
            'nama' => 'required',
            'status' => 'required',
            'id_buku' => 'required',
        ]);

        // Mencari data buku berdasarkan ID yang diberikan
        $buku = Buku::findOrFail($request->id_buku);

        // Cek apakah jumlah yang diminta lebih dari stok buku yang tersedia
        if ($request->jumlah > $buku->jumlah_buku) {
            // Jika lebih, tampilkan SweetAlert dengan pesan error
            Alert::error('Error', 'Jumlah buku yang diminta melebihi stok yang tersedia.')->autoclose(1500);
            return redirect()->back();
        }

        // Jika jumlah cukup, lanjutkan dengan menyimpan data peminjaman
        $minjem = new Minjem();
        $minjem->jumlah = $request->jumlah;
        $minjem->tanggal_minjem = $request->tanggal_minjem;
        $minjem->batas_tanggal = $request->batas_tanggal;
        $minjem->tanggal_kembali = $request->tanggal_kembali;
        $minjem->nama = $request->nama;
        $minjem->status = $request->status;
        $minjem->id_buku = $request->id_buku;
        // $minjem->id_user = $request->id_user;
        

        // Kurangi stok buku sesuai dengan jumlah yang dipinjam
        $buku->jumlah_buku -= $request->jumlah;
        $buku->save();

        // Simpan data peminjaman
        $minjem->save();

        // Tampilkan SweetAlert dengan pesan sukses
        Alert::success('Success', 'Data Berhasil Ditambah')->autoclose(1500);

        // Redirect ke halaman index peminjaman
        return redirect()->route('peminjaman.index');
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $minjem = Minjem::findOrFail($id);
        return view('user.peminjaman.show', compact('minjem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $buku = Buku::all();
        $kategori = Kategori::all();
        $penulis = Penulis::all();
        $user = User::all();
        $penerbit = Penerbit::all();
        $minjem = Minjem::findOrFail($id);
        return view('user.peminjaman.edit', compact('minjem', 'buku', 'kategori', 'penulis', 'penerbit','user'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required',
        ]);

        $minjem = Minjem::findOrFail($id);

        if ($validated['status'] === 'Dikembalikan') {
            $buku = Buku::findOrFail($minjem->id_buku);
    
            $buku->jumlah_buku += $minjem->jumlah;
            $buku->save();
    
            $totalpinjam = Minjem::where('nama')->sum('jumlah');
            $totalpinjam -= $minjem->jumlah;
    
            if ($totalpinjam < 0) {
                $totalpinjam = 0;
            }
        }
    
        $minjem->update($validated);
        $minjem->save();
        Alert::success('Success', 'Data Berhasil Diubah')->autoclose(1500);
        return redirect()->route('peminjaman.index');
    }
    public function destroy($id)
    {
        $minjem = minjem::findOrFail($id);
        $minjem->delete();
        return redirect()->route('peminjaman.index');
    }
}
