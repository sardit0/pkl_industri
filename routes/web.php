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
use App\Http\Controllers\LaporanController;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\FilterBukuController;
use App\Http\Controllers\FavoriteController;
use App\Http\Middleware\IsPetugas;

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
Route::get('filter/kategori/{id}', [FilterBukuController::class, 'filterkategori'])->name('kategori.filter');
Route::get('filter/penerbit/{id}', [FilterBukuController::class, 'filterpenerbit'])->name('penerbit.filter');
Route::get('filter/penulis/{id}', [FilterBukuController::class, 'filterpenulis'])->name('penulis.filter');
Route::get('/admin/laporan', [LaporanController::class, 'index'])->name('admin.laporan');


Route::group(['prefix' => 'peminjam'], function () {
    Route::get('buku', [TakaanController::class, 'buku'])->name('buku');
    // Route::get('/dashboard', [TakaanController::class, 'dashboard'])->name('dashboard');
    Route::get('show/{id}', [TakaanController::class, 'show'])->name('show');
    Route::get('profile', [TakaanController::class, 'profile'])->name('profile');
    Route::get('dashboarduser', [TakaanController::class, 'dashboard'])->name('dashboarduser');
    Route::get('peminjaman/history', [MinjemController::class, 'history'])->name('peminjaman.history');

});

Route::group(['prefix' => 'petugas', 'middleware' => ['auth', isPetugas::class]], function () {
    Route::get('', [App\Http\Controllers\Petugas\PetugasController::class, 'index'])->name('petugasdashboard');
    Route::resource('kategori', App\Http\Controllers\Petugas\KategoriController::class, ['as' => 'petugas']);
    Route::resource('penerbit', App\Http\Controllers\Petugas\PenerbitController::class, ['as' => 'petugas']);
    Route::resource('penulis', App\Http\Controllers\Petugas\PenulisController::class, ['as' => 'petugas']);
    Route::resource('buku', App\Http\Controllers\Petugas\BukuController::class, ['as' => 'petugas']);
});

Route::group(['prefix' => 'peminjam', 'middleware' => ['auth']], function () {
    Route::resource('peminjaman', MinjemController::class);
    Route::resource('kembalian', KembaliController::class);
    Route::get('pengajuan/show/{id}', [MinjemController::class, 'showpengajuanuser'])->name('showpengajuanuser');
    Route::resource('favorite', FavoriteController::class);
    // Route::get('favorites', [FavoriteController::class, 'index'])->name('favorites.index');
    // Route::post('/favorites/{book}', [FavoriteController::class, 'store'])->name('favorites.store');
    // Route::get('pengajuan/show/{id}',[MinjemController::class, 'showpengajuanuser'])->name('showpengajuanuser');
});


Auth::routes();

Route::get('/send-email', [EmailController::class, 'sendEmail']);