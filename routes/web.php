<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Semua route untuk prototipe RRI Singaraja
|--------------------------------------------------------------------------
*/

// =================== HOMEPAGE ===================
Route::view('/', 'home')->name('home');   // Landing page / Beranda


// =================== DATA KUNJUNGAN ===================
Route::view('/data-kunjungan', 'form')->name('form.create');  // Form input kunjungan

// Data kunjungan / laporan grid
Route::view('/laporan-kunjungan', 'visit-index')->name('visit.index');  

// Detail rekaman kunjungan
Route::view('/laporan-kunjungan/{id}', 'visit-show')->name('visit.show');  

// Edit form kunjungan
Route::view('/edit-kehadiran/{id}', 'form-edit')->name('form.edit');   


// =================== GRAFIK ===================
Route::view('/grafik', 'charts')->name('charts');   // Grafik umum (misalnya peminjaman)

// Grafik Operator (baru, sesuai permintaan client)
Route::view('/grafik-operator', 'charts-operator')->name('charts.operator');


// =================== ARSIP SARPRAS ===================
Route::view('/arsip-sarpras', 'arsip')->name('arsip');   // Arsip sarpras


// =================== LAPORAN (UNDUH) ===================
Route::get('/laporan/download', function () {
    // TODO: Ganti dengan fungsi export Excel/PDF sesuai kebutuhan
    return "Fitur download laporan belum diimplementasikan.";
})->name('laporan.download');
