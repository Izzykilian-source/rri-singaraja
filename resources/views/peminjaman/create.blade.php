@extends('layouts.app')
@section('title','Tambah Peminjaman')

@section('content')
<div class="max-w-3xl mx-auto py-10">
  <h2 class="text-2xl font-bold mb-6">Tambah Data Peminjaman</h2>

  <form action="{{ route('peminjaman.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf

    <div>
      <label class="block text-sm font-medium">Nama Aset</label>
      <input type="text" name="nama_aset" class="w-full border rounded-md px-3 py-2 focus:ring focus:ring-brand-500" required>
    </div>

    <div>
      <label class="block text-sm font-medium">Tanggal Pinjam</label>
      <input type="date" name="tanggal_pinjam" class="w-full border rounded-md px-3 py-2 focus:ring focus:ring-brand-500" required>
    </div>

    <div>
      <label class="block text-sm font-medium">Kondisi</label>
      <select name="kondisi" class="w-full border rounded-md px-3 py-2 focus:ring focus:ring-brand-500" required>
        <option value="Normal">Normal</option>
        <option value="Rusak">Rusak</option>
      </select>
    </div>

    <div>
      <label class="block text-sm font-medium">Foto (opsional)</label>
      <input type="file" name="foto" accept="image/*" class="w-full border rounded-md px-3 py-2">
    </div>

    <div class="flex justify-end">
      <a href="{{ route('peminjaman.index') }}" class="px-4 py-2 bg-gray-300 rounded-md mr-2">Batal</a>
      <button type="submit" class="px-4 py-2 bg-brand-600 text-white rounded-md hover:bg-brand-700">
        Simpan
      </button>
    </div>
  </form>
</div>
@endsection
