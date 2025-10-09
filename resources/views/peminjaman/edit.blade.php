@extends('layouts.app')
@section('title','Edit Peminjaman')

@section('content')
<section class="hero-gradient min-h-screen">
  <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-10 py-10">
    <h2 class="font-display text-2xl text-brand-900 text-center mb-8">Edit Data Peminjaman</h2>

    <form method="POST" action="{{ route('peminjaman.update', $peminjaman->id) }}" enctype="multipart/form-data"
          class="bg-white shadow-soft rounded-xl p-6 space-y-5">
      @csrf @method('PUT')
      <input type="text" name="nama_lengkap" class="w-full border rounded-lg px-3 py-2" value="{{ $peminjaman->nama_lengkap }}" required>
      <input type="text" name="nama_barang" class="w-full border rounded-lg px-3 py-2" value="{{ $peminjaman->nama_barang }}" required>
      <input type="date" name="tanggal_pinjam" class="w-full border rounded-lg px-3 py-2" value="{{ $peminjaman->tanggal_pinjam }}" required>
      <input type="date" name="tanggal_kembali" class="w-full border rounded-lg px-3 py-2" value="{{ $peminjaman->tanggal_kembali }}">
      <select name="kondisi_barang" class="w-full border rounded-lg px-3 py-2" required>
        <option value="Baik" {{ $peminjaman->kondisi_barang == 'Baik' ? 'selected' : '' }}>Baik</option>
        <option value="Rusak Ringan" {{ $peminjaman->kondisi_barang == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
        <option value="Rusak Berat" {{ $peminjaman->kondisi_barang == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
      </select>
      <textarea name="keterangan" class="w-full border rounded-lg px-3 py-2">{{ $peminjaman->keterangan }}</textarea>
      <button class="px-5 py-2 bg-brand-600 text-white rounded-lg hover:bg-brand-700">Perbarui</button>
    </form>
  </div>
</section>
@endsection
