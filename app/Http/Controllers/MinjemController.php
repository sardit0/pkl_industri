<?php

namespace App\Http\Controllers;

use App\Models\Minjem;
use App\Models\Kembali;
use App\Models\Buku;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MinjemController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $minjem = minjem::latest()->paginate(5);
        return view('admin.peminjaman.index', compact('minjem'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buku = Buku::all();
        $minjem = Minjem::all();
        $kembali = Kembali::all();
        return view('admin.peminjaman.create', compact('minjem','buku','kembali'));
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

        // Create a new instance of minjem
        $minjem = new minjem();
        $minjem->jumlah = $request->jumlah;
        $minjem->tanggal_minjem = $request->tanggal_minjem;
        $minjem->tanggal_kembali = $request->tanggal_kembali;
        $minjem->nama = $request->nama;
        $minjem->status = $request->status;
        $minjem->id_buku = $request->id_buku;

        // Attempt to find the associated Data record
        $buku = Buku::findOrFail($request->id_buku);

        // Check if Data record was found
        if ($buku) {
            // Update stok in Data record
            $buku->jumlah_buku -= $request->jumlah;
            $buku->save();

            // Save the minjem record
            $minjem->save();

            // Redirect to the index route of minjem
            return redirect()->route('peminjaman.index');
        } else {
            // Handle the case where Data record was not found
            // For example, you can redirect back with an error message
            return redirect()->back()->with('error', 'Buku tidak ditemukan');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $minjem = minjem::findOrFail($id);
        return view('admin.peminjaman.show', compact('minjem'));
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
        $minjem = minjem::findOrFail($id);
        return view('admin.peminjaman.edit', compact('minjem','buku'));
    }

    public function update(Request $request, $id)
    {
        $minjem = minjem::findOrFail($id);
        $buku = Buku::findOrFail($minjem->id_buku);

        $minjem->update($request->all());

        if ($buku->jumlah_buku < $request->jumlah) {
            Alert::warning('Warning', 'Jumlah buku Tidak Cukup')->autoClose(1500);
            return redirect()->route('peminjaman.index');
        } else {
            $buku->jumlah_buku += $minjem->jumlah;
            $buku->jumlah_buku -= $request->jumlah;
            $buku->save();
        }

        if ($request->status == "Sudah Dikembalikan") {
            $buku->jumlah_buku += $minjem->jumlah;
            $buku->save();
        }
        $minjem->save();
        Alert::success('Success', 'Data Berhasil Diubah')->autoclose(1500);
        return redirect()->route('peminjaman.index');
    }
    public function destroy($id)
    {
        $minjem = minjem::findOrFail($id);
        $minjem->delete();
        return redirect()->route('admin.peminjaman.index');
    }
}
