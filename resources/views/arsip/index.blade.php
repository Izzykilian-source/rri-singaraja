@extends('layouts.app')
@section('title','Arsip Sarana & Prasarana')

@section('content')
<section class="hero-gradient min-h-screen">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10 py-10">

    <h2 class="font-display text-2xl md:text-3xl text-brand-900 text-center mb-8">
      DATA PENGEMBALIAN SARANA & PRASARANA
    </h2>

    <div class="flex justify-end mb-6">
      <a href="{{ route('arsip-sarpras.create') }}" 
         class="px-4 py-2 bg-brand-600 hover:bg-brand-700 text-white rounded-md shadow-soft text-sm font-semibold">
        + Tambah Pengembalian
      </a>
    </div>

    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
      @forelse($pengembalians as $item)
      <div class="bg-white shadow-soft rounded-lg overflow-hidden border">
        @if($item->foto_kembali)
          <img src="{{ asset('storage/'.$item->foto_kembali) }}" alt="Foto Pengembalian" class="w-full h-40 object-cover">
        @endif

        <div class="p-4">
          <h3 class="font-semibold text-lg">{{ $item->nama_barang }}</h3>
          <p class="text-sm text-gray-600">Peminjam: {{ $item->nama_lengkap }}</p>
          <p class="text-sm text-gray-600">Tgl Kembali: {{ \Carbon\Carbon::parse($item->tanggal_kembali)->format('d/m/Y') }}</p>
          <a href="{{ route('arsip-sarpras.show', $item->id) }}" class="mt-3 inline-block px-3 py-1 text-xs bg-blue-600 text-white rounded-md">Detail</a>
        </div>
      </div>
      @empty
        <p class="col-span-full text-center text-gray-500">Belum ada data pengembalian.</p>
      @endforelse
    </div>

  </div>
</section>
@endsection
