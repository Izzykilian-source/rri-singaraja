@extends('layouts.app')
@section('title', 'Tambah Arsip Sarpras')

@section('content')
<section class="hero-gradient min-h-screen">
  <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-10 py-10">

    <h2 class="font-display text-2xl md:text-3xl text-brand-900 text-center mb-8">
      Tambah Data Pengembalian
    </h2>

    @if(session('success'))
      <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
        {{ session('success') }}
      </div>
    @endif

    <form method="POST" action="{{ route('arsip-sarpras.store') }}" enctype="multipart/form-data"
          class="bg-white shadow-soft rounded-xl p-6 space-y-5">
      @csrf

      <div>
        <label class="block font-semibold mb-1">Nama Lengkap</label>
        <input type="text" name="nama_lengkap" class="w-full border rounded-lg px-3 py-2" required>
      </div>

      <div>
        <label class="block font-semibold mb-1">Nama Barang</label>
        <input type="text" name="nama_barang" class="w-full border rounded-lg px-3 py-2" required>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block font-semibold mb-1">Tanggal Pinjam</label>
          <input type="date" name="tanggal_pinjam" class="w-full border rounded-lg px-3 py-2" required>
        </div>
        <div>
          <label class="block font-semibold mb-1">Tanggal Kembali</label>
          <input type="date" name="tanggal_kembali" class="w-full border rounded-lg px-3 py-2" required>
        </div>
      </div>

      <div>
        <label class="block font-semibold mb-1">Kondisi Barang</label>
        <select name="kondisi_barang" class="w-full border rounded-lg px-3 py-2" required>
          <option value="">-- Pilih Kondisi --</option>
          <option value="Baik">Baik</option>
          <option value="Rusak Ringan">Rusak Ringan</option>
          <option value="Rusak Berat">Rusak Berat</option>
        </select>
      </div>

      <div>
        <label class="block font-semibold mb-1">Keterangan (opsional)</label>
        <textarea name="keterangan" class="w-full border rounded-lg px-3 py-2"></textarea>
      </div>

      <div>
        <label class="block font-semibold mb-1">Foto Barang (opsional)</label>
        <input type="file" name="foto_kembali" class="w-full border rounded-lg px-3 py-2">
      </div>

      <div class="text-right">
        <button type="submit" class="px-5 py-2 bg-brand-600 text-white rounded-lg hover:bg-brand-700">
          Simpan Data
        </button>
      </div>
    </form>
  </div>
</section>
@endsection
