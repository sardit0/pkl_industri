<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::paginate(5);
        return view('admin.kategori.index', compact('kategori'));
    }

    public function indexapi()
    {
        $kategori = kategori::all();
        $res = [
            'success' => true,
            'message' => 'Daftar kategori',
            'kategori' => $kategori,
        ];
        return response()->json($res, 200);
    }

    public function create()
    {
        return view('admin.kategori.create');
    }

    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'nama_kategori' => 'required|min:1|unique:kategoris,nama_kategori',
        ],
    [
        'nama_kategori.required' => 'Nama Harus Di isi!',
        'nama_kategori.unique' => 'Kategori dengan Nama tersebut sudah ada!',
    ]);
        

        $kategori = new kategori();

        $kategori->nama_kategori = $request->nama_kategori;

        $kategori->save();
        Alert::success('Success', 'Data Berhasil Ditambah')->autoclose(1500);
        return redirect()->route('kategori.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategori.show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('admin.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_kategori' => 'required|min:1|max:1000',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->nama_kategori = $request->nama_kategori;

        $kategori->save();
        Alert::success('Success', 'Data Berhasil Diubah')->autoclose(1500);
        return redirect()->route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        return redirect()->route('kategori.index');
    }
}
