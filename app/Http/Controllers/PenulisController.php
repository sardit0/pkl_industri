<?php

namespace App\Http\Controllers;

use App\Models\Penulis;
use Illuminate\Http\Request;

class PenulisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penulis = penulis::latest()->paginate(5);
        return view('admin.penulis.index', compact('penulis'));
    }

    public function create()
    {
        return view('admin.penulis.create');
    }

    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'nama_penulis' => 'required|min:1|unique:penulis,nama_penulis',
        ],
        [
            'nama_penulis.required' => 'Nama Harus Di isi!',
            'nama_penulis.unique' => 'Penulis dengan Nama tersebut sudah ada!',
        ]
    );
        

        $penulis = new penulis();

        $penulis->nama_penulis = $request->nama_penulis;

        $penulis->save();
        return redirect()->route('penulis.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $penulis = penulis::findOrFail($id);
        return view('admin.penulis.show', compact('penulis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $penulis = penulis::findOrFail($id);
        return view('admin.penulis.edit', compact('penulis'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_penulis' => 'required|min:1|max:1000',
        ]);

        $penulis = penulis::findOrFail($id);
        $penulis->nama_penulis = $request->nama_penulis;

        $penulis->save();
        return redirect()->route('penulis.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penulis = penulis::findOrFail($id);
        $penulis->delete();
        return redirect()->route('penulis.index');
    }
}
