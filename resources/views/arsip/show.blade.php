@extends('layouts.app')
@section('title','Detail Pengembalian')

@section('content')
<section class="hero-gradient min-h-screen">
  <div class="max-w-5xl mx-auto px-6 py-10">
    <h2 class="text-2xl font-display text-brand-900 mb-8 text-center">DETAIL PENGEMBALIAN</h2>

    <div class="grid md:grid-cols-2 gap-8">
      <div>
        <h3 class="font-bold text-lg mb-2">A. Identitas Peminjam</h3>
        <ul class="text-sm text-gray-700 space-y-1">
          <li><strong>Nama Lengkap:</strong> {{ $data->nama_lengkap }}</li>
          <li><strong>Instansi:</strong> {{ $data->instansi }}</li>
          <li><strong>Divisi:</strong> {{ $data->divisi }}</li>
          <li><strong>No. HP:</strong> {{ $data->no_hp }}</li>
        </ul>
      </div>
      <div>
        <h3 class="font-bold text-lg mb-2">B. Detail Pengembalian</h3>
        <ul class="text-sm text-gray-700 space-y-1">
          <li><strong>Nama Barang:</strong> {{ $data->nama_barang }}</li>
          <li><strong>Tanggal Pinjam:</strong> {{ \Carbon\Carbon::parse($data->tanggal_pinjam)->format('d/m/Y') }}</li>
          <li><strong>Tanggal Kembali:</strong> {{ \Carbon\Carbon::parse($data->tanggal_kembali)->format('d/m/Y') }}</li>
          <li><strong>Kondisi Barang:</strong> {{ $data->kondisi_barang }}</li>
        </ul>
      </div>
    </div>

    <div class="grid md:grid-cols-2 gap-6 mt-10">
      @if($data->foto_pinjam)
      <div>
        <h4 class="font-semibold mb-2">Foto Peminjaman</h4>
        <img src="{{ asset('storage/'.$data->foto_pinjam) }}" class="rounded-xl shadow w-full object-cover">
      </div>
      @endif

      @if($data->foto_kembali)
      <div>
        <h4 class="font-semibold mb-2">Foto Pengembalian</h4>
        <img src="{{ asset('storage/'.$data->foto_kembali) }}" class="rounded-xl shadow w-full object-cover">
      </div>
      @endif
    </div>
  </div>
</section>
@endsection
