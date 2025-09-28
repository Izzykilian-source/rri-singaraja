<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');                                // Landing
Route::view('/data-kunjungan', 'form')->name('form.create');           // Form input
Route::view('/laporan-kunjungan', 'visit-index')->name('visit.index'); // Grid kunjungan
Route::view('/laporan-kunjungan/{id}', 'visit-show')->name('visit.show'); // Detail rekaman
Route::view('/grafik', 'charts')->name('charts');                      // Grafik
Route::view('/edit-kehadiran/{id}', 'form-edit')->name('form.edit');   // Edit form
Route::view('/arsip-sarpras', 'arsip')->name('arsip');                 // Arsip sarpras
