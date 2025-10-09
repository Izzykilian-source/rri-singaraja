@extends('layouts.app')
@section('title','Arsip Sarana & Prasarana')

@section('content')
<section class="hero-gradient min-h-screen">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10 py-10">

    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 text-center md:text-left">
      <div>
        <h2 class="font-display text-3xl text-brand-900 font-bold">
          Arsip Sarana & Prasarana
        </h2>
        <p class="text-gray-600 text-sm mt-2">Riwayat pengembalian barang & fasilitas RRI Singaraja</p>
      </div>

      <a href="{{ route('arsip-sarpras.create') }}" 
         class="mt-4 md:mt-0 px-5 py-2.5 bg-brand-600 hover:bg-brand-700 text-white rounded-lg shadow-soft text-sm font-semibold transition">
        + Tambah Pengembalian
      </a>
    </div>

    <!-- Grid Arsip -->
    @if($pengembalians->count())
      <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @foreach($pengembalians as $item)
          <div class="group bg-white rounded-2xl overflow-hidden border border-gray-200 shadow hover:shadow-lg hover:-translate-y-1 transition-all duration-300">

            <!-- Foto Barang -->
            <div class="relative">
              @if($item->foto_kembali)
                <img src="{{ asset('storage/'.$item->foto_kembali) }}" 
                     alt="Foto {{ $item->nama_barang }}" 
                     class="w-full h-48 object-cover transition duration-300 group-hover:scale-105">
              @else
                <div class="w-full h-48 bg-gray-100 flex items-center justify-center text-gray-400 text-sm italic">
                  Tidak ada foto
                </div>
              @endif
              <span class="absolute top-2 right-2 px-3 py-1 rounded-full text-xs font-semibold
                {{ $item->kondisi_barang == 'Baik' ? 'bg-green-100 text-green-700' : 
                   ($item->kondisi_barang == 'Rusak Ringan' ? 'bg-yellow-100 text-yellow-700' : 'bg-red-100 text-red-700') }}">
                {{ $item->kondisi_barang }}
              </span>
            </div>

            <!-- Detail Barang -->
            <div class="p-5">
              <h3 class="font-semibold text-lg text-gray-800 mb-1 truncate">
                {{ $item->nama_barang }}
              </h3>
              <p class="text-sm text-gray-600 mb-1">
                <span class="font-medium">Peminjam:</span> {{ $item->nama_lengkap }}
              </p>
              <p class="text-sm text-gray-600 mb-1">
                <span class="font-medium">Tanggal Kembali:</span>
                {{ \Carbon\Carbon::parse($item->tanggal_kembali)->translatedFormat('d F Y') }}
              </p>

              @if($item->keterangan)
                <p class="text-sm text-gray-500 italic mt-2 line-clamp-2">
                  “{{ Str::limit($item->keterangan, 70) }}”
                </p>
              @endif

              <div class="flex items-center justify-between mt-4">
                <a href="{{ route('arsip-sarpras.show', $item->id) }}" 
                   class="text-sm text-brand-700 hover:text-brand-900 font-medium transition">
                  Lihat Detail →
                </a>
                <form method="POST" action="{{ route('arsip-sarpras.destroy', $item->id) }}" 
                      onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                  @csrf @method('DELETE')
                  <button type="submit" 
                          class="text-xs bg-red-100 text-red-600 px-3 py-1 rounded-md hover:bg-red-200 transition">
                    Hapus
                  </button>
                </form>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @else
      <!-- Empty State -->
      <div class="text-center py-20">
        <h3 class="text-lg font-semibold text-gray-700 mb-1">Belum Ada Data Arsip</h3>
        <p class="text-gray-500 mb-5 text-sm">Silakan tambahkan data pengembalian untuk mulai mengisi arsip.</p>
        <a href="{{ route('arsip-sarpras.create') }}" 
           class="px-5 py-2.5 bg-brand-600 text-white rounded-lg hover:bg-brand-700 shadow-soft">
          + Tambah Pengembalian
        </a>
      </div>
    @endif

  </div>
</section>
@endsection
