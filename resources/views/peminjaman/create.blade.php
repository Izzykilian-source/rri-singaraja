@extends('layouts.app')
@section('title','Tambah Data Peminjaman')

@section('content')
<section class="hero-gradient min-h-screen">
  <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-10 py-10">

    <h2 class="font-display text-2xl md:text-3xl text-brand-900 text-center mb-8">
      TAMBAH DATA PEMINJAMAN
    </h2>

    <form method="POST" action="{{ route('peminjaman.store') }}" enctype="multipart/form-data"
          class="bg-white shadow-soft rounded-lg p-6 space-y-5 border">
      @csrf

      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Lengkap</label>
        <input type="text" name="nama_lengkap" required
               class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-brand-500">
      </div>

      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Instansi</label>
        <input type="text" name="instansi"
               class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-brand-500">
      </div>

      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Divisi</label>
        <input type="text" name="divisi"
               class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-brand-500">
      </div>

      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">No. HP</label>
        <input type="text" name="no_hp"
               class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-brand-500">
      </div>

      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Barang</label>
        <input type="text" name="nama_barang" required
               class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-brand-500">
      </div>

      <div class="grid md:grid-cols-2 gap-4">
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-1">Tanggal Pinjam</label>
          <input type="date" name="tanggal_pinjam" required
                 class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-brand-500">
        </div>
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-1">Tanggal Kembali</label>
          <input type="date" name="tanggal_kembali"
                 class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-brand-500">
        </div>
      </div>

      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Kondisi Barang</label>
        <select name="kondisi_barang" required
                class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-brand-500">
          <option value="">-- Pilih Kondisi --</option>
          <option value="Baik">Baik</option>
          <option value="Rusak Ringan">Rusak Ringan</option>
          <option value="Rusak Berat">Rusak Berat</option>
        </select>
      </div>

      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Keterangan</label>
        <textarea name="keterangan"
                  class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-brand-500"></textarea>
      </div>

      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Foto Barang (Opsional)</label>
        <input type="file" name="foto_pinjam"
               class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-brand-500">
      </div>

      <div class="text-right">
        <button type="submit" class="px-6 py-2 bg-brand-600 text-white rounded-lg hover:bg-brand-700">
          Simpan Data
        </button>
      </div>
    </form>

  </div>
</section>
@endsection
