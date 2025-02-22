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

        $minjem->status = 'dikembalikan';
        $minjem->save();

        Alert::success('Success', 'Book successfully returned')->autoclose(1500);
        return redirect()->route('peminjaman.index');
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

    public function create()
    {
        $buku = Buku::all();
        $user = User::all();
        $minjem = Minjem::all();

        $batastanggal = Carbon::now()->addWeek()->format('Y-m-d');
        $sekarang = now()->format('Y-m-d');

        return view('user.peminjaman.create', compact('minjem', 'buku', 'sekarang', 'batastanggal'));
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
        $minjem = Minjem::findOrFail($id);
        $minjem->alasan = $request->alasan;
        $status = $request->input('status');
        $buku = Buku::findOrFail($minjem->id_buku);

        if ($status === 'diterima') {
            $buku->jumlah_buku -= $minjem->jumlah;
            $buku->save();
            $minjem->status = 'diterima';
            Alert::success('Accepted', 'Your book loan has been approved by the admin')->autoclose(1500);
        } elseif ($status === 'ditahan') {
            $buku->jumlah_buku += $minjem->jumlah;
            $buku->save();
            $minjem->status = 'ditahan';
            Alert::info('On hold', 'Book loan is still in admin submission process')->autoclose(1500);
        } elseif ($status === 'ditolak') {
            $minjem->status = 'ditolak';
            Alert::error('Rejected', 'Book loan rejected by admin')->autoclose(1500);
        } elseif ($status === 'dikembalikan') {
            $buku->jumlah_buku += $minjem->jumlah;
            $buku->save();
            Alert::success('Book returned', 'Borrowed book has been returned')->autoclose(1500);
        } else {
            Alert::info('On hold', 'Book loan is still in admin submission process')->autoclose(1500);
        }

        $minjem->save();

        return redirect()->back()->with('success', 'Loan status successfully updated');
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