@extends('layouts.app')
@section('title','Data Peminjaman')

@section('content')
<section class="hero-gradient min-h-screen">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10 py-10">

    <h2 class="font-display text-2xl md:text-3xl text-brand-900 text-center mb-8">
      DATA PEMINJAMAN SARANA & PRASARANA
    </h2>

    <div class="flex justify-end mb-6">
      <a href="{{ route('peminjaman.create') }}" 
         class="px-4 py-2 bg-brand-600 hover:bg-brand-700 text-white rounded-md shadow-soft text-sm font-semibold">
        + Tambah Peminjaman
      </a>
    </div>

    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
      @forelse($peminjaman as $item)
      <div class="bg-white shadow-soft rounded-lg overflow-hidden border">
        @if($item->foto_pinjam)
          <img src="{{ asset('storage/'.$item->foto_pinjam) }}" alt="Foto Peminjaman" class="w-full h-40 object-cover">
        @endif

        <div class="p-4">
          <h3 class="font-semibold text-lg">{{ $item->nama_barang }}</h3>
          <p class="text-sm text-gray-600">Peminjam: {{ $item->nama_lengkap }}</p>
          <p class="text-sm text-gray-600">Tanggal Pinjam: {{ \Carbon\Carbon::parse($item->tanggal_pinjam)->format('d/m/Y') }}</p>
          <p class="text-sm text-gray-600">Kondisi: {{ $item->kondisi_barang }}</p>

          <div class="flex gap-2 mt-3">
            <a href="{{ route('peminjaman.edit', $item->id) }}" class="px-3 py-1 text-xs bg-yellow-500 text-white rounded-md">Edit</a>
            <form method="POST" action="{{ route('peminjaman.destroy', $item->id) }}">
              @csrf @method('DELETE')
              <button class="px-3 py-1 text-xs bg-red-600 text-white rounded-md">Hapus</button>
            </form>
          </div>
        </div>
      </div>
      @empty
        <p class="col-span-full text-center text-gray-500">Belum ada data peminjaman.</p>
      @endforelse
    </div>

  </div>
</section>
@endsection
