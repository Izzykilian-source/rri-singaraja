@extends('layouts.app')
@section('title','Detail Rekaman')

@section('content')
<section class="hero-gradient" x-data="visitDetail()">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10 py-10">
    <h2 class="font-display text-2xl md:text-3xl text-brand-900 text-center mb-8">
      DETAIL REKAMAN SIARAN
    </h2>

    <div class="grid gap-8 md:grid-cols-[1fr,1.2fr]">
      <div class="rounded-2xl bg-white shadow-soft overflow-hidden">
        <div class="aspect-[4/3] bg-cover bg-center" :style="`background-image:url(${item.image})`"></div>
      </div>

      <div>
        <h3 class="text-xl font-semibold" x-text="item.title"></h3>
        <p class="text-sm text-gray-600" x-text="item.date"></p>
        <div class="mt-4 space-y-1 text-sm">
          <p><b>Narasumber</b> : <span x-text="item.speaker"></span></p>
          <p><b>Operator</b> : <span x-text="item.operator"></span></p>
          <p><b>Durasi</b> : <span x-text="item.duration + ' Menit'"></span></p>
          <p><b>Genre / Type Rekaman</b> : <span x-text="item.genre"></span></p>
        </div>

        <div class="mt-5 rounded-2xl bg-white shadow-soft p-4">
          <audio controls class="w-full">
            <source src="" type="audio/mpeg">
          </audio>
        </div>

        <div class="mt-6 flex flex-wrap gap-3">
          <button @click="dl=true" class="rounded-xl border border-brand-200/70 bg-white px-4 py-2.5 font-semibold hover:bg-brand-50">
            Unduh File Rekaman
          </button>
          <button @click="dl=true" class="rounded-xl border border-brand-200/70 bg-white px-4 py-2.5 font-semibold hover:bg-brand-50">
            Unduh Laporan Lengkap
          </button>
          <a href="/edit-kehadiran/{{ request()->route('id') }}" class="rounded-xl bg-brand-600 text-white px-4 py-2.5 font-semibold hover:bg-brand-700">
            Edit Format
          </a>
          <button @click="del=true" class="rounded-xl border border-red-200 bg-white px-4 py-2.5 font-semibold text-red-600 hover:bg-red-50">
            Delete Detail
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modals -->
  <div x-show="dl" x-cloak class="fixed inset-0 z-50 grid place-items-center bg-black/40 p-4">
    <div class="w-full max-w-md rounded-3xl bg-white p-6 shadow-2xl text-center">
      <div class="mx-auto mb-4 grid h-16 w-16 place-items-center rounded-full bg-brand-50">
        <i data-lucide="cloud-download" class="w-8 h-8 text-emerald-600"></i>
      </div>
      <p class="text-lg font-semibold text-emerald-600">Berhasil Terunduh</p>
      <div class="mt-5">
        <button @click="dl=false" class="rounded-xl bg-brand-600 text-white px-6 py-2.5 font-semibold hover:bg-brand-700">Continue</button>
      </div>
    </div>
  </div>

  <div x-show="del" x-cloak class="fixed inset-0 z-50 grid place-items-center bg-black/40 p-4">
    <div class="w-full max-w-md rounded-3xl bg-white p-6 shadow-2xl text-center">
      <div class="mx-auto mb-4 grid h-16 w-16 place-items-center rounded-full bg-red-50">
        <i data-lucide="trash-2" class="w-8 h-8 text-red-600"></i>
      </div>
      <p class="text-lg font-semibold text-red-600">Berhasil Terdelete</p>
      <div class="mt-5">
        <button @click="del=false" class="rounded-xl bg-brand-600 text-white px-6 py-2.5 font-semibold hover:bg-brand-700">Continue</button>
      </div>
    </div>
  </div>

  @include('partials.visits-data')
  <script>
    function visitDetail(){
      const id = Number("{{ request()->route('id') }}");
      const data = (window.__VISITS__||[]).find(v=>v.id===id) || (window.__VISITS__||[])[0];
      return { item: data, dl:false, del:false }
    }
  </script>
</section>
@endsection
