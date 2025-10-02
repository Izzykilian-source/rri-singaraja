@extends('layouts.app')
@section('title','Data Peminjaman & Pengembalian')

@section('content')
<section class="hero-gradient min-h-screen">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10 py-10">
    
    <!-- Judul -->
    <h2 class="font-display text-2xl md:text-3xl text-brand-900 text-center mb-8">
      DATA PEMINJAMAN & PENGEMBALIAN
    </h2>

    <!-- Tombol tambah -->
    <div class="flex justify-end mb-6">
      <a href="{{ route('peminjaman.create') }}" 
         class="px-4 py-2 bg-brand-600 hover:bg-brand-700 text-white rounded-md shadow-soft text-sm font-semibold">
        + Tambah Peminjaman
      </a>
    </div>

    <!-- Grid Data -->
    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
      @forelse($peminjaman as $item)
      <div class="bg-white shadow-soft rounded-lg overflow-hidden border">
        <!-- Foto aset -->
        @if($item->foto)
          <img src="{{ asset('storage/'.$item->foto) }}" 
               alt="{{ $item->nama_aset }}" class="w-full h-40 object-cover">
        @else
          <div class="w-full h-40 bg-gray-200 flex items-center justify-center text-gray-500 text-sm">
            Tidak ada foto
          </div>
        @endif

        <!-- Konten -->
        <div class="p-4">
          <h3 class="font-semibold text-lg">{{ $item->nama_aset }}</h3>
          <p class="text-sm text-gray-600">
            {{ \Carbon\Carbon::parse($item->tanggal_pinjam)->format('d/m/Y') }}
          </p>
          <p class="text-sm text-gray-600">Kondisi: {{ $item->kondisi }}</p>

          <!-- Tombol aksi -->
          <div class="flex flex-wrap gap-2 mt-3">
            <a href="{{ route('peminjaman.show', $item->id) }}" 
               class="px-3 py-1 text-xs bg-blue-600 text-white rounded-md">Detail</a>

            <a href="{{ route('peminjaman.edit', $item->id) }}" 
               class="px-3 py-1 text-xs bg-yellow-500 text-white rounded-md">Edit</a>

            <form method="POST" action="{{ route('peminjaman.destroy', $item->id) }}" 
                  onsubmit="return confirm('Yakin ingin menghapus data ini?')">
              @csrf 
              @method('DELETE')
              <button class="px-3 py-1 text-xs bg-red-600 text-white rounded-md">
                Hapus
              </button>
            </form>

            <a href="#" class="px-3 py-1 text-xs bg-green-600 text-white rounded-md">
              Kembalikan
            </a>
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
