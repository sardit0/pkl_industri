<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TakaanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\MinjemController;
use App\Http\Controllers\KembaliController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsAdmin;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
|
*/

// Route default untuk halaman depan admin
Route::get('/', function () {
    return view('layouts.backend.admin');
})->middleware('auth');

// Rute yang hanya bisa diakses oleh admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', IsAdmin::class]], function () {
    Route::get('home', [DashboardController::class, 'index'])->name('home');
    Route::resource('kategori', KategoriController::class);
    Route::resource('penerbit', PenerbitController::class);
    Route::resource('penulis', PenulisController::class);
    Route::resource('buku', BukuController::class);
    Route::resource('user', UserController::class);
    Route::get('peminjaman', [MinjemController::class, 'indexadmin'])->name('peminjamanadmin.index');
    Route::get('peminjaman/{id}/detail', [MinjemController::class, 'show'])->name('peminjamanadmin.detail');
});


Route::get('', [TakaanController::class, 'index'])->name('halamanuser');

// Rute untuk pengguna
Route::group(['prefix' => 'peminjam'], function () {
    Route::get('buku', [TakaanController::class, 'buku'])->name('buku');
    Route::get('show/{id}', [TakaanController::class, 'show'])->name('show');
    Route::get('profile', [TakaanController::class, 'profile'])->name('profile');
    Route::get('dashboarduser', [TakaanController::class, 'dashboard'])->name('dashboarduser');
    Route::get('peminjaman/history', [MinjemController::class, 'history'])->name('peminjaman.history');

});

// Rute yang memerlukan middleware umum
Route::group(['prefix' => 'peminjam', 'middleware' => ['auth']], function () {
    Route::resource('peminjaman', MinjemController::class);
    Route::resource('kembalian', KembaliController::class);
    // Route::get('pengajuan/show/{id}',[MinjemController::class, 'showpengajuanuser'])->name('showpengajuanuser');
});

// Rute untuk autentikasi
Auth::routes();
