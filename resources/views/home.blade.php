@extends('layouts.app')

@section('title','RRI Singaraja - Beranda')

@section('content')
<div x-data="carousel()" x-init="start()" class="relative w-full min-h-[80vh] overflow-hidden bg-gradient-to-br from-indigo-50 via-white to-purple-50">

  <!-- Slides -->
  <template x-for="(slide, index) in slides" :key="index">
    <div 
      x-show="active === index" 
      x-transition:enter="transition ease-out duration-700"
      x-transition:enter-start="opacity-0 translate-x-10"
      x-transition:enter-end="opacity-100 translate-x-0"
      x-transition:leave="transition ease-in duration-500"
      x-transition:leave-start="opacity-100 translate-x-0"
      x-transition:leave-end="opacity-0 -translate-x-10"
      class="absolute inset-0 flex flex-col md:flex-row items-center justify-between gap-10 px-10 md:px-20 py-16"
    >
      <!-- Konten teks -->
      <div class="flex-1">
        <p class="text-sm font-semibold text-rose-600 mb-2" x-text="slide.tag"></p>
        <h2 class="text-3xl md:text-4xl font-display font-bold text-gray-900 mb-4" x-text="slide.title"></h2>
        <p class="text-gray-600 mb-6" x-text="slide.text"></p>
        <a :href="slide.link" class="px-6 py-3 bg-indigo-600 text-white rounded-xl shadow hover:bg-indigo-700" x-text="slide.button"></a>
      </div>

      <!-- Gambar -->
      <div class="flex-1 flex justify-center">
        <img :src="slide.image" alt="Slide image" class="w-80 md:w-[420px] drop-shadow-xl">
      </div>
    </div>
  </template>

  <!-- Controls -->
  <div class="absolute bottom-5 left-1/2 transform -translate-x-1/2 flex items-center gap-3">
    <template x-for="(slide, index) in slides" :key="index">
      <button @click="goTo(index)" 
        class="w-3 h-3 rounded-full"
        :class="active===index ? 'bg-indigo-600' : 'bg-gray-300'"></button>
    </template>
  </div>

  <!-- Tombol navigasi -->
  <button @click="prev" class="absolute left-5 top-1/2 -translate-y-1/2 p-2 bg-white rounded-full shadow hover:bg-gray-100">←</button>
  <button @click="next" class="absolute right-5 top-1/2 -translate-y-1/2 p-2 bg-white rounded-full shadow hover:bg-gray-100">→</button>

</div>

<script>
function carousel() {
  return {
    active: 0,
    slides: [
      {
        tag: "Laporan Data Kunjungan",
        title: "Selamat Datang, Sahabat RRI",
        text: "‘Sekali di Udara Tetap di Udara’ - Radio Republik Indonesia -",
        button: "Grafik Kunjungan",
        link: "{{ route('visit.index') }}",
        image: "{{ asset('images/slide1.svg') }}"
      },
      {
        tag: "Data Peminjaman Sarpras",
        title: "Selamat Datang, Sahabat RRI",
        text: "Menciptakan alur tracking peminjaman sarana dan prasarana yang terintegrasi sistem.",
        button: "Konfirmasi Peminjaman",
        link: "{{ route('charts') }}",
        image: "{{ asset('images/slide2.svg') }}"
      },
      {
        tag: "Arsip Sarpras",
        title: "Selamat Datang, Sahabat RRI",
        text: "Mengelola laporan riwayat peminjaman Sarana dan Prasarana.",
        button: "Riwayat Peminjaman",
        link: "{{ route('arsip-sarpras.index') }}",
        image: "{{ asset('images/slide3.svg') }}"
      }
    ],
    start() {
      setInterval(() => { this.next() }, 5000); // auto 5 detik
    },
    next() {
      this.active = (this.active + 1) % this.slides.length;
    },
    prev() {
      this.active = (this.active - 1 + this.slides.length) % this.slides.length;
    },
    goTo(index) {
      this.active = index;
    }
  }
}
</script>
@endsection
