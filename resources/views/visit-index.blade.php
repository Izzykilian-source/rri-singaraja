@extends('layouts.app')
@section('title','Data Kunjungan')

@section('content')
<section class="hero-gradient">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10 py-10"
       x-data="visitList()">

    <h2 class="font-display text-2xl md:text-3xl text-brand-900 text-center mb-6">DATA KUNJUNGAN</h2>

    <div class="mb-6 flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
      <div class="relative md:w-96">
        <input x-model="q"
               class="w-full pl-10 rounded-xl border border-brand-200/60 bg-white px-4 py-2.5 focus:border-brand-400 outline-none"
               placeholder="Pencarian data kunjungan…">
        <i data-lucide="search" class="w-5 h-5 text-gray-500 absolute left-3 top-1/2 -translate-y-1/2"></i>
      </div>

      <div class="flex flex-wrap gap-3">
        <select x-model="genre" class="rounded-xl border border-brand-200/60 bg-white px-4 py-2.5 focus:border-brand-400 outline-none">
          <option value="">Genre/Type</option>
          <option>Keagamaan Hindu</option>
          <option>Keagamaan Islam</option>
          <option>Edukasi</option>
          <option>Budaya</option>
          <option>Umum</option>
        </select>

        <select x-model="durasi" class="rounded-xl border border-brand-200/60 bg-white px-4 py-2.5 focus:border-brand-400 outline-none">
          <option value="">Durasi</option>
          <option value="<15">&lt; 15 Menit</option>
          <option value="15-20">15–20 Menit</option>
          <option value=">20">&gt; 20 Menit</option>
        </select>

        <button class="rounded-xl border border-brand-200/70 bg-white px-4 py-2.5 font-semibold text-gray-700 hover:bg-brand-50">
          Grafik Kunjungan Rekaman
        </button>
        <button class="rounded-xl bg-brand-600 text-white px-4 py-2.5 font-semibold hover:bg-brand-700">
          Unduh Laporan Lengkap
        </button>
      </div>
    </div>

    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
      <template x-for="item in filtered" :key="item.id">
        <a :href="`/laporan-kunjungan/${item.id}`" class="rounded-2xl bg-white shadow-soft overflow-hidden hover:shadow-lg transition">
          <div class="aspect-[16/9] bg-gray-200 bg-cover bg-center" :style="`background-image:url(${item.image})`"></div>
          <div class="p-4 space-y-1">
            <h3 class="font-semibold line-clamp-2" x-text="item.title"></h3>
            <p class="text-xs text-gray-500">Operator: <span class="text-brand-700" x-text="item.operator"></span></p>
            <p class="text-xs text-gray-500"><span class="inline-flex items-center rounded-full bg-brand-100 text-brand-700 text-xs px-2 py-1" x-text="item.duration + ' Menit'"></span></p>
            <p class="text-xs text-gray-500">Narasumber: <span class="text-brand-700" x-text="item.speaker"></span></p>
          </div>
        </a>
      </template>
    </div>

  </div>
</section>

@include('partials.visits-data')
<script>
  function visitList(){
    const all = window.__VISITS__ || [];
    return {
      q: '', genre: '', durasi: '',
      get filtered(){
        return all.filter(v=>{
          const matchQ = !this.q || (v.title+v.speaker+v.operator).toLowerCase().includes(this.q.toLowerCase());
          const matchG = !this.genre || v.genre === this.genre;
          const matchD = !this.durasi ||
            (this.durasi==='<15' ? v.duration<15 : this.durasi==='15-20' ? (v.duration>=15 && v.duration<=20) : v.duration>20);
          return matchQ && matchG && matchD;
        });
      }
    }
  }
</script>
@endsection
