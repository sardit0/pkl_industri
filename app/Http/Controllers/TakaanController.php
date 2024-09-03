<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;



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
        return view('layouts.user', compact('buku'));
    }
}