<?php

namespace App\Http\Controllers;

use App\Models\Minjem;
use App\Models\Buku;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Penulis;
use App\Models\Penerbit;
use App\Models\Kembali;
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

    public function kembalikan(Request $request, $id)
    {
        $this->validate($request, [
            'jumlah' => 'required|integer|min:1',
        ]);

        $minjem = Minjem::findOrFail($id);

        if ($minjem->status !== 'diterima') {
            Alert::error('Error', 'Book not received or returned')->autoclose(1500);
            return redirect()->back();
        }

        $buku = Buku::findOrFail($minjem->id_buku);

        if ($request->jumlah > $minjem->jumlah) {
            Alert::error('Error', 'The books returned exceed the amount borrowed')->autoclose(1500);
            return redirect()->back();
        }

        $buku->jumlah_buku += $request->jumlah;
        $buku->save();

        // Simpan data pengembalian
        $kembali = new Kembali();
        $kembali->jumlah = $request->jumlah;
        $kembali->tanggal_kembali = now();
        $kembali->status = 'dikembalikan';
        $kembali->id_minjem = $minjem->id;
        $kembali->id_buku = $minjem->id_buku;
        $kembali->nama = $minjem->nama;
        $kembali->id_user = $minjem->id_user;
        $kembali->save();

        // Update status peminjaman menjadi dikembalikan
        $minjem->status = 'dikembalikan';
        $minjem->save();

        Alert::success('Success', 'Book successfully returned')->autoclose(1500);
        return redirect()->route('kembalian.index');
    }

    public function history()
    {
        $minjem = Minjem::latest()->paginate(10);
        return view('user.peminjaman.history', compact('minjem'));
    }

    public function index(Request $request)
    {
        $user = Auth::user();
        $query = Minjem::where('nama', $user->name)
            ->whereIn('status', ['ditahan', 'diterima', 'ditolak']);

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $buku = Buku::all();
        $kategori = Kategori::all();
        $penulis = Penulis::all();
        $penerbit = Penerbit::all();
        $minjem = $query->latest()->paginate(10);

        return view('user.peminjaman.index', compact('buku', 'kategori', 'penulis', 'penerbit', 'minjem', 'user'));
    }

    public function indexAdmin()
    {
        $buku = Buku::all();
        $user = Auth::user();
        $kategori = Kategori::all();
        $penulis = Penulis::all();
        $penerbit = Penerbit::all();
        $minjem = Minjem::with('user', 'buku')->latest()->paginate(10);

        return view('admin.peminjamanadmin.index', compact('buku', 'kategori', 'penulis', 'penerbit', 'minjem', 'user'));
    }

    public function indexapi()
    {
        $minjem = minjem::all();
        $res = [
            'success' => true,
            'message' => 'Daftar Minjem',
            'minjem' => $minjem,
        ];
        return response()->json($res, 200);
    }

    public function create(Request $request)
    {
        $buku = Buku::all();
        $user = Auth::user();
        $selectedBuku = $request->input('id_buku', $buku->first()->id); // Ambil buku yang dipilih atau buku pertama

        $batastanggal = Carbon::now()->addWeek()->format('Y-m-d');
        $sekarang = now()->format('Y-m-d');

        return view('user.peminjaman.create', compact('buku', 'sekarang', 'batastanggal', 'selectedBuku'));
    }

    public function store(Request $request)
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

    public function showpengajuanuser($id)
    {
        $minjem = Minjem::findOrFail($id);
        $buku = Buku::all();
        $user = Auth::user();
        return view('user.peminjaman.showpengajuan', compact('user', 'buku', 'minjem'));
    }

    public function show($id)
    {
        $minjem = Minjem::with('buku')->findOrFail($id);
        return view('admin.peminjamanadmin.detail', compact('minjem'));
    }

    public function edit($id)
    {
        $buku = Buku::all();
        $kategori = Kategori::all();
        $penulis = Penulis::all();
        $user = User::all();
        $penerbit = Penerbit::all();
        $minjem = Minjem::findOrFail($id);
        return view('user.peminjaman.edit', compact('minjem', 'buku', 'kategori', 'penulis', 'penerbit', 'user'));
    }

    public function update(Request $request, $id)
    {
        $peminjaman = Minjem::findOrFail($id);

        // Validasi jika user tidak ditemukan
        if (!$peminjaman->id_user) {
            return redirect()->route('peminjamanadmin.index')->with('error', 'ID user tidak ditemukan pada peminjaman.');
        }

        if ($request->status === 'diterima') {
            $peminjaman->status = 'diterima';
            $peminjaman->save();

            Alert::success('Success!', 'Successful loan received by Admin!')->autoclose(1500);
            return redirect()->route('peminjamanadmin.index')->with('success', 'Peminjaman diterima.');
        }

        if ($request->status === 'ditolak') {
            $peminjaman->status = 'ditolak';
            $peminjaman->alasan = $request->alasan ?? null;
            $peminjaman->save();

            Alert::error('Rejected!', 'Too bad, Your book was rejected by the admin')->autoclose(1500);
            return redirect()->route('peminjamanadmin.index')->with('success', 'Peminjaman ditolak.');
        }

        // Cek untuk pengembalian (jika ada logika tersebut)
        if ($request->status == 1) {
            $kembali = new Kembali();
            $kembali->jumlah = $peminjaman->jumlah;
            $kembali->tanggal_kembali = now();
            $kembali->status = 'ditahan';
            $kembali->denda = 0;
            $kembali->id_minjem = $peminjaman->id;
            $kembali->id_buku = $peminjaman->id_buku;
            $kembali->id_user = $peminjaman->id_user;
            $kembali->save();

            $peminjaman->status = 'disetujui';
            $peminjaman->save();

            return redirect()->route('peminjamanadmin.index')->with('success', 'Proses pengembalian berhasil.');
        }

        return redirect()->route('peminjamanadmin.index')->with('info', 'Tidak ada perubahan status dilakukan.');
    }



    public function destroy($id)
    {
        $minjem = Minjem::findOrFail($id);
        $minjem->delete();
        return redirect()->route('peminjamanadmin.index');
    }

    public function menu()
    {
        $minjem = Minjem::latest()->get();
        $minjemNotifications = Minjem::where('status', 'ditahan')->get();

        return view('admin.peminjamanadmin.index', compact('minjem', 'minjemNotifications'));
    }
}
