<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penerbit = penerbit::latest()->paginate(5);
        return view('admin.penerbit.index', compact('penerbit'));
    }

    public function create()
    {
        return view('admin.penerbit.create');
    }

    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'nama_penerbit' => 'required|min:1|unique:penerbits,nama_penerbit',
        ],  
        [
            'nama_penerbit.required' => 'Nama Harus Di isi!',
            'nama_penerbit.unique' => 'Penerbit dengan Nama tersebut sudah ada!',
        ]);
        

        $penerbit = new penerbit();

        $penerbit->nama_penerbit = $request->nama_penerbit;

        $penerbit->save();
        return redirect()->route('penerbit.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $penerbit = penerbit::findOrFail($id);
        return view('admin.penerbit.show', compact('penerbit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $penerbit = penerbit::findOrFail($id);
        return view('admin.penerbit.edit', compact('penerbit'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_penerbit' => 'required|min:1|max:1000',
        ]);

        $penerbit = penerbit::findOrFail($id);
        $penerbit->nama_penerbit = $request->nama_penerbit;

        $penerbit->save();
        return redirect()->route('penerbit.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penerbit = penerbit::findOrFail($id);
        $penerbit->delete();
        return redirect()->route('penerbit.index');
    }
}
