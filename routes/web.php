<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriProdukController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'welcome']);



//get kategori
// Rute untuk menampilkan halaman indeks
Route::get('/kategori', [KategoriProdukController::class, 'index'])->name('kategori.index');
// Rute untuk menampilkan halaman tambah kategori
Route::get('/kategori/create', [KategoriProdukController::class, 'create'])->name('kategori.create');
// Rute untuk menampilkan halaman edit kategori
Route::get('/kategori/{kategori}/edit', [KategoriProdukController::class, 'edit'])->name('kategori.edit');
Route::get('kategori/{kategori}/confirm', [KategoriProdukController::class, 'confirm'])->name('kategori.confirm');

//dll kategori
// Rute untuk menyimpan kategori baru
Route::post('/kategori', [KategoriProdukController::class, 'store'])->name('kategori.store');
// Rute untuk mengupdate kategori
Route::put('/kategori/{kategori}', [KategoriProdukController::class, 'update'])->name('kategori.update');
// Rute untuk menghapus kategori
Route::delete('/kategori/{kategori}', [KategoriProdukController::class, 'destroy'])->name('kategori.destroy');

//Get Produk
// Route untuk menampilkan form tambah produk
Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
// Route untuk menampilkan daftar produk
Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
// Route untuk menampilkan form edit produk
Route::get('/produk/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
Route::get('/produk/{id}', [ProdukController::class, 'show'])->name('produk.show');

//DLL Produk
// Route untuk menyimpan produk baru
Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');
// Route untuk update produk yang diedit
Route::put('/produk/{id}', [ProdukController::class, 'update'])->name('produk.update');
// Route untuk menghapus produk
Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');
