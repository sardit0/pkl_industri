<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Penerbit;
use App\Models\Penulis;
use App\Models\Kategori;
use App\Models\Minjem;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function markAsDamagedOrLost(Request $request, $id)
    {
        // Validasi input
        $this->validate($request, [
            'status_buku' => 'required|in:damaged,lost',
        ]);

        // Cari buku berdasarkan ID
        $buku = Buku::findOrFail($id);

        // Update status buku
        $buku->kondisi_buku = $request->status_buku;
        $buku->save();

        // Pesan alert untuk sukses
        Alert::success('Success', 'The book has been successfully updated its condition status.')->autoclose(1500);

        return redirect()->route('admin.buku.index');
    }

    public function index()
    {
        $kategori = kategori::all();
        $penerbit = penerbit::all();
        $penulis = penulis::all();
        $buku = Buku::orderBy('jumlah_buku', 'desc')->paginate(5);
        return view('admin.buku.index', compact('kategori', 'penerbit', 'penulis', 'buku'));
    }

    public function indexapi()
    {
        $buku = Buku::all();
        $res = [
            'success' => true,
            'message' => 'Daftar Buku',
            'buku' => $buku,
        ];
        return response()->json($res, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = kategori::all();
        $penerbit = penerbit::all();
        $penulis = penulis::all();
        return view('admin.buku.create', compact('kategori', 'penerbit', 'penulis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate form
        $this->validate(
            $request,
            [
                'judul' => 'required|min:1|unique:bukus,judul',
                'desk' => 'required|min:1|',
                'jumlah_buku' => 'required',
                'tahun_penerbit' => 'required|date',
                'image' => 'required|image|mimes:jpeg,jpg,png|max:2048'

            ],
            [
                'judul.required' => 'Book Title Must be Filled!',
                'judul.unique' => 'Book Title with that Name already exists!',
            ]
        );

        $buku = new buku();
        $buku->judul = $request->judul;
        $buku->desk = $request->desk;
        $buku->jumlah_buku = $request->jumlah_buku;
        $buku->tahun_penerbit = $request->tahun_penerbit;
        $buku->id_kategori = $request->id_kategori;
        $buku->id_penerbit = $request->id_penerbit;
        $buku->id_penulis = $request->id_penulis;

        // update img
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/buku', $name);
            $buku->image = $name;
        }

        $buku->save();
        Alert::success('Success', 'Data Added Successfully')->autoclose(1500);
        return redirect()->route('buku.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $buku = buku::findOrFail($id);
        return view('admin.buku.show', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $buku = buku::findOrFail($id);
        $kategori = kategori::all();
        $penerbit = penerbit::all();
        $penulis = penulis::all();
        return view('admin.buku.edit', compact('kategori', 'penerbit', 'penulis', 'buku'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validate form
        $this->validate(
            $request,
            [
                'judul' => 'required|min:1|unique:bukus,judul',
                'jumlah_buku' => 'required',
                'tahun_penerbit' => 'required|date',
                'image' => 'image|mimes:jpeg,jpg,png|max:2048'
            ],
            [

            ]
        );

        $buku = buku::findOrFail($id);
        $buku->judul = $request->judul;
        $buku->desk = $request->desk;
        $buku->jumlah_buku = $request->jumlah_buku;
        $buku->tahun_penerbit = $request->tahun_penerbit;
        $buku->id_kategori = $request->id_kategori;
        $buku->id_penerbit = $request->id_penerbit;
        $buku->id_penulis = $request->id_penulis;

        // update img
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/buku', $name);
            $buku->image = $name;
        }

        $buku->save();
        Alert::success('Success', 'Data has change')->autoclose(1500);
        return redirect()->route('buku.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku = buku::findOrFail($id);
        $buku->delete();
        return redirect()->route('buku.index');
    }

    /**
     * Show the form for creating a new loan.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createLoan($id)
    {
        $buku = Buku::findOrFail($id);
        $batastanggal = Carbon::now()->addWeek()->format('Y-m-d');
        $sekarang = now()->format('Y-m-d');

        return view('user.peminjaman.create', compact('buku', 'sekarang', 'batastanggal'));
    }

    /**
     * Store a newly created loan in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeLoan(Request $request)
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
