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
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.backend.admin');

})->middleware('auth');


Route::group(['prefix' => 'admin', 'middleware' => ['auth', IsAdmin::class]], function () {
    Route::get('home', [DashboardController::class, 'index'])->name('home');
    Route::resource('kategori', KategoriController::class);
    Route::resource('penerbit', PenerbitController::class);
    Route::resource('penulis', PenulisController::class);
    Route::resource('buku', BukuController::class);
    Route::resource('user', UserController::class);

});

Route::get('', [TakaanController::class, 'index'])->name('halamanuser');

Route::group(['prefix' => 'peminjam'], function () {
Route::get('buku', [TakaanController::class, 'buku'])->name('buku');
Route::get('show/{id}', [TakaanController::class, 'show']);
Route::get('profile', [TakaanController::class, 'profile'])->name('profile');
Route::get('dashboarduser', [TakaanController::class, 'dashboard'])->name('dashboarduser');
});

Route::group(['prefix' => 'middleware'], function () {
    Route::resource('peminjaman', MinjemController::class);
    Route::resource('kembalian', KembaliController::class);
});
Auth::routes();




