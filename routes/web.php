<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Semua route untuk prototipe RRI Singaraja
|--------------------------------------------------------------------------
*/

// =================== HOMEPAGE ===================
Route::view('/', 'home')->name('home'); // Landing page / Beranda


// =================== DATA KUNJUNGAN ===================
Route::view('/data-kunjungan', 'form')->name('form.create'); // Form input kunjungan
Route::view('/laporan-kunjungan', 'visit-index')->name('visit.index'); // Laporan kunjungan
Route::view('/laporan-kunjungan/{id}', 'visit-show')->name('visit.show'); // Detail kunjungan
Route::view('/edit-kehadiran/{id}', 'form-edit')->name('form.edit'); // Edit kunjungan


// =================== GRAFIK ===================
Route::view('/grafik', 'charts')->name('charts'); // Grafik umum (misalnya peminjaman)
Route::view('/grafik-operator', 'charts-operator')->name('charts.operator'); // Grafik Operator


// =================== DATA PEMINJAMAN (CRUD) ===================
Route::resource('peminjaman', PeminjamanController::class);



// =================== ARSIP SARPRAS (CRUD) ===================
Route::resource('arsip-sarpras', PengembalianController::class);


// =================== LAPORAN (UNDUH) ===================
Route::get('/laporan/download', function () {
    // TODO: Ganti dengan fungsi export Excel/PDF sesuai kebutuhan
    return "Fitur download laporan belum diimplementasikan.";
})->name('laporan.download');
