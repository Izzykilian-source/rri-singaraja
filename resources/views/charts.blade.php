@extends('layouts.app')
@section('title','Data Peminjaman & Pengembalian')

@section('content')
<section class="hero-gradient min-h-screen">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10 py-10">
    
    <!-- Judul -->
    <h2 class="font-display text-2xl md:text-3xl text-brand-900 text-center mb-8">
      DATA PEMINJAMAN & PENGEMBALIAN
    </h2>

    <!-- Filter & Search -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
      <!-- Filter kiri -->
      <div class="flex gap-3">
        <input type="date" class="px-3 py-2 border rounded-md focus:ring-2 focus:ring-brand-500 text-sm">
        <select class="px-3 py-2 border rounded-md focus:ring-2 focus:ring-brand-500 text-sm">
          <option>Jenis Aset</option>
          <option>Properti</option>
          <option>Audio</option>
          <option>Elektronik</option>
        </select>
      </div>

      <!-- Search -->
      <div class="flex items-center border rounded-md px-3 py-2 bg-white w-full md:w-80">
        <input type="text" placeholder="Pencarian data peminjaman sarpras"
               class="flex-1 text-sm focus:outline-none">
        <i data-lucide="search" class="w-4 h-4 text-gray-500"></i>
      </div>

      <!-- Tambah -->
      <button class="px-4 py-2 bg-brand-600 hover:bg-brand-700 text-white rounded-md shadow-soft text-sm font-semibold">
        Tambah Peminjaman
      </button>
    </div>

    <!-- Grid Data -->
    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
      <!-- Item -->
      <div class="bg-white shadow-soft rounded-lg overflow-hidden border">
        <img src="{{ asset('images/sample1.jpg') }}" alt="Radio Properti" class="w-full h-40 object-cover">
        <div class="p-4">
          <h3 class="font-semibold text-lg">Radio Properti</h3>
          <p class="text-sm text-gray-600">10/05/2025</p>
          <p class="text-sm text-gray-600">Kondisi: Normal</p>
          <div class="flex gap-2 mt-3">
            <button class="px-3 py-1 text-xs bg-blue-600 text-white rounded-md">Detail</button>
            <button class="px-3 py-1 text-xs bg-yellow-500 text-white rounded-md">Edit</button>
            <button class="px-3 py-1 text-xs bg-red-600 text-white rounded-md">Hapus</button>
            <button class="px-3 py-1 text-xs bg-green-600 text-white rounded-md">Kembalikan</button>
          </div>
        </div>
      </div>

      <!-- Copy untuk item lainnya -->
      <div class="bg-white shadow-soft rounded-lg overflow-hidden border">
        <img src="{{ asset('images/sample2.jpg') }}" alt="Mikrofon Wireless" class="w-full h-40 object-cover">
        <div class="p-4">
          <h3 class="font-semibold text-lg">Mikrofon Wireless</h3>
          <p class="text-sm text-gray-600">10/05/2025</p>
          <p class="text-sm text-gray-600">Kondisi: Normal</p>
          <div class="flex gap-2 mt-3">
            <button class="px-3 py-1 text-xs bg-blue-600 text-white rounded-md">Detail</button>
            <button class="px-3 py-1 text-xs bg-yellow-500 text-white rounded-md">Edit</button>
            <button class="px-3 py-1 text-xs bg-red-600 text-white rounded-md">Hapus</button>
            <button class="px-3 py-1 text-xs bg-green-600 text-white rounded-md">Kembalikan</button>
          </div>
        </div>
      </div>

      <!-- Tambahkan item lain sesuai kebutuhan -->
    </div>
  </div>
</section>
@endsection
