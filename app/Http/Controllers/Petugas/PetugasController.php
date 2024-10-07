<?php

namespace App\Http\Controllers\Petugas;;

use App\Http\Controllers\Controller;
use App\Http\Middleware\IsAdmin;
use App\Models\User;
use App\Models\Peminjamens;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class PetugasController extends Controller
{
    public function index()
    {
        // $jumlahpengembalian = Peminjamens::where('status_pengajuan','dikembalikan')->where('notif', false)->count(); 
        // $jumlahpengajuan = Peminjamens::where('status_pengajuan','menunggu pengajuan')->where('notif', false)->count();
        // $users = User::orderBy('id', 'desc')->get();
        // $peminjamannotif = Peminjamens::all();
        $user = Auth::user();
        return view('petugas.dashboard', compact('user'));
    }
}
