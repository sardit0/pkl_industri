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
        // Validasi input jumlah buku yang dikembalikan
        $this->validate($request, [
            // 'jumlah' => 'required|integer|min:1',
        ]);

        // Ambil data peminjaman berdasarkan ID
        $minjem = Minjem::findOrFail($id);

        // Cek apakah status peminjaman masih "diterima" (belum dikembalikan)
        if ($minjem->status !== 'diterima') {
            Alert::error('Error', 'book not received or returned')->autoclose(1500);
            return redirect()->back();
        }

        // Ambil data buku yang dipinjam
        $buku = Buku::findOrFail($minjem->id_buku);

        // Validasi jumlah buku yang dikembalikan tidak lebih dari jumlah yang dipinjam
        if ($request->jumlah > $minjem->jumlah) {
            Alert::error('error', 'the books returned exceed the amount borrowed')->autoclose(1500);
            return redirect()->back();
        }

        // Tambahkan kembali stok buku yang dikembalikan
        $buku->jumlah_buku += $request->jumlah;
        $buku->save();

        // Update status peminjaman menjadi "Dikembalikan"
        $minjem->status = 'dikembalikan';
        $minjem->save();

        Alert::success('Berhasil', 'Buku berhasil dikembalikan.')->autoclose(1500);
        return redirect()->route('peminjaman.index');
    }


    public function history()
    {
        $minjem = Minjem::latest()->paginate(10); // Ambil data dengan paginasi
        return view('user.peminjaman.history', compact('minjem'));
    }



    public function index(Request $request)
    {
        $minjem = Buku::orderBy('jumlah_buku', 'desc')->paginate(5);
        $user = Auth::user();

        // Query dasar
        $query = Minjem::where('nama_peminjam', $user->name)
            ->whereIn('status', ['ditahan', 'diterima', 'ditolak']);

        // Filter berdasarkan status jika ada
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $buku = Buku::all();
        $kategori = Kategori::all();
        $penulis = Penulis::all();
        $penerbit = Penerbit::all();
        $minjem = Minjem::where('nama', $user->name)->latest()->paginate(10);
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
            // 'nama' => 'required',
            // 'status' => 'required',
            'id_buku' => 'required',
        ]);

        // Mencari data buku berdasarkan ID yang diberikan
        $buku = Buku::findOrFail($request->id_buku);

        // Cek apakah jumlah yang diminta lebih dari stok buku yang tersedia
        if ($request->jumlah > $buku->jumlah_buku) {
            // Jika lebih, tampilkan SweetAlert dengan pesan error
            Alert::error('Error', 'Quantity requested exceeds available stock')->autoclose(1500);
            return redirect()->back();
        }

        // Jika jumlah cukup, lanjutkan dengan menyimpan data peminjaman
        $minjem = new Minjem();
        $minjem->jumlah = $request->jumlah;
        $minjem->tanggal_minjem = $request->tanggal_minjem;
        $minjem->batas_tanggal = $request->batas_tanggal;
        $minjem->tanggal_kembali = $request->tanggal_kembali;
        $minjem->alasan = $request->alasan;
        $minjem->nama = Auth::user()->name;
        $minjem->status = 'ditahan';
        $minjem->id_buku = $request->id_buku;
        $minjem->id_user = Auth::id();;


        // Kurangi stok buku sesuai dengan jumlah yang dipinjam
        // $buku->jumlah_buku -= $request->jumlah;
        // $buku->save();

        // Simpan data peminjaman
        $minjem->save();

        // Tampilkan SweetAlert dengan pesan sukses
        Alert::info('Info!', 'Loan application successfully created and still in hold status')->autoclose(1500);

        // Redirect ke halaman index peminjaman
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
        return view('user.peminjaman.edit', compact('minjem', 'buku', 'kategori', 'penulis', 'penerbit', 'user'));
    }


    public function update(Request $request, $id)
    {
        // Temukan objek Minjem berdasarkan ID
        $minjem = Minjem::findOrFail($id);
        $minjem->alasan = $request->alasan;
        $status = $request->input('status');
        $buku = Buku::findOrFail($minjem->id_buku);

        // Terapkan logika berdasarkan status
        if ($status === 'diterima') {
            // Kurangi stok buku jika diterima
            $buku->jumlah_buku -= $minjem->jumlah;
            $buku->save();
            $minjem->status = 'diterima';
            Alert::success('Accepted', 'your book loan has been approved by the admin')->autoclose(1500);

        } elseif ($status === 'ditahan') {
            // Tambah stok buku jika ditahan
            $buku->jumlah_buku += $minjem->jumlah;
            $buku->save();
            $minjem->status = 'ditahan';
            Alert::info('On hold', 'Book loan is still in admin submission process')->autoclose(1500);

        } elseif ($status === 'ditolak') {
            // Tidak ada perubahan pada stok buku jika ditolak
            $minjem->status = 'ditolak';
            Alert::error('Rejected', 'Book loan rejected by admin')->autoclose(1500);

        } elseif ($status === 'dikembalikan') {
            // Tambah stok buku jika dikembalikan
            $buku->jumlah_buku += $minjem->jumlah;
            $buku->save();
            Alert::success('Book returned', 'borrowed book has been returned')->autoclose(1500);

        } else {
            // Jika status tidak dikenal
            Alert::info('On hold', 'Book loan is still in admin submission process')->autoclose(1500);
        }

        // Simpan perubahan pada objek minjem
        $minjem->save();

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Loan status successfully updated');
    }


    public function destroy($id)
    {
        $minjem = minjem::findOrFail($id);
        $minjem->delete();
        return redirect()->route('peminjamanadmin.index');
    }
}