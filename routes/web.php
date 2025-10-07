<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriSuratController;
use App\Http\Controllers\ArsipSuratController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/kategori-surat', [KategoriSuratController::class, 'index'])->name('kategori.index');
Route::get('/kategori-surat/create', [KategoriSuratController::class, 'create'])->name('kategori.create');
Route::post('/kategori-surat', [KategoriSuratController::class, 'store'])->name('kategori.store');
Route::get('/kategori-surat/{id}/edit', [KategoriSuratController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori-surat/{id}', [KategoriSuratController::class, 'update'])->name('kategori.update');
Route::delete('/kategori-surat/{id}', [KategoriSuratController::class, 'destroy'])->name('kategori.destroy');
// --- Arsip Surat ---
Route::get('/arsip-surat', [ArsipSuratController::class, 'index'])->name('arsip.index');
Route::get('/arsip-surat/create', [ArsipSuratController::class, 'create'])->name('arsip.create');
Route::post('/arsip-surat', [ArsipSuratController::class, 'store'])->name('arsip.store');
Route::get('/arsip-surat/{id}', [ArsipSuratController::class, 'show'])->name('arsip.show');
Route::get('/arsip-surat/{id}/edit', [ArsipSuratController::class, 'edit'])->name('arsip.edit');
Route::put('/arsip-surat/{id}', [ArsipSuratController::class, 'update'])->name('arsip.update');
Route::delete('/arsip-surat/{id}', [ArsipSuratController::class, 'destroy'])->name('arsip.destroy');
Route::get('/arsip-surat/{id}/download', [ArsipSuratController::class, 'download'])
    ->name('arsip.download');
Route::get('/arsip-surat/{id}/lihat', [ArsipSuratController::class, 'show'])->name('arsip.lihat');
Route::put('/arsip-surat/{id}', [ArsipSuratController::class, 'update'])->name('arsip.update');


Route::get('/about', function () {
    return view('about');
})->name('about');