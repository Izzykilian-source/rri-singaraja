@extends('layouts.app')
@section('title','Formulir Kehadiran')

@section('content')
<section class="hero-gradient">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10 py-10"
       x-data="{ saved:false, fotoName:'No File Chosen', rekamanName:'No File Chosen' }">

    <h2 class="text-center font-display text-2xl md:text-3xl text-brand-900">
      FORMULIR KEHADIRAN DAN REKAMAN SIARAN
    </h2>

    <div class="mt-8 grid md:grid-cols-2 gap-8">
      <!-- Kiri -->
      <div class="space-y-5">
        <div>
          <label class="text-sm font-semibold">Judul rekaman</label>
          <input type="text" placeholder="Judul rekaman siaran"
                 class="w-full mt-1 rounded-xl border border-brand-200/60 bg-white px-4 py-2.5 focus:border-brand-400 outline-none">
        </div>

        <div>
          <label class="text-sm font-semibold">Nama Narasumber</label>
          <input type="text" placeholder="Nama Narasumber"
                 class="w-full mt-1 rounded-xl border border-brand-200/60 bg-white px-4 py-2.5 focus:border-brand-400 outline-none">
        </div>

        <div>
          <label class="text-sm font-semibold">Nama Penanggungjawab Rekaman</label>
          <input type="text" placeholder="Nama Penanggungjawab Rekaman"
                 class="w-full mt-1 rounded-xl border border-brand-200/60 bg-white px-4 py-2.5 focus:border-brand-400 outline-none">
        </div>

        <div>
          <p class="text-sm font-semibold">Unggah bukti foto</p>
          <p class="text-[11px] text-gray-500 mb-2">Please upload square image, size less than 1MB</p>
          <div class="flex items-center gap-3">
            <label class="inline-flex items-center gap-2 rounded-xl border border-brand-200/70 bg-white px-4 py-2 cursor-pointer">
              <i data-lucide="image" class="w-4 h-4 text-brand-700"></i>
              <span class="text-sm font-semibold">Choose File</span>
              <input type="file" class="hidden" accept="image/*"
                     @change="fotoName = $event.target.files[0]?.name || 'No File Chosen'">
            </label>
            <span class="text-sm text-gray-600" x-text="fotoName"></span>
          </div>
        </div>
      </div>

      <!-- Kanan -->
      <div class="space-y-5">
        <div>
          <label class="text-sm font-semibold">Tanggal</label>
          <input type="date"
                 class="w-full mt-1 rounded-xl border border-brand-200/60 bg-white px-4 py-2.5 focus:border-brand-400 outline-none">
        </div>

        <div>
          <label class="text-sm font-semibold">Durasi rekaman</label>
          <input type="text" placeholder="Durasi rekaman"
                 class="w-full mt-1 rounded-xl border border-brand-200/60 bg-white px-4 py-2.5 focus:border-brand-400 outline-none">
        </div>

        <div>
          <label class="text-sm font-semibold">Genre/Type Siaran</label>
          <select class="w-full mt-1 rounded-xl border border-brand-200/60 bg-white px-4 py-2.5 focus:border-brand-400 outline-none">
            <option>Genre/Type Siaran</option>
            <option>Keagamaan Hindu</option>
            <option>Keagamaan Islam</option>
            <option>Edukasi</option>
            <option>Budaya</option>
            <option>Umum</option>
          </select>
        </div>

        <div>
          <p class="text-sm font-semibold">Unggah hasil rekaman</p>
          <p class="text-[11px] text-gray-500 mb-2">Please upload recording, size less than 30MB</p>
          <div class="flex items-center gap-3">
            <label class="inline-flex items-center gap-2 rounded-xl border border-brand-200/70 bg-white px-4 py-2 cursor-pointer">
              <i data-lucide="upload-cloud" class="w-4 h-4 text-brand-700"></i>
              <span class="text-sm font-semibold">Choose File</span>
              <input type="file" class="hidden" accept="audio/*,video/*"
                     @change="rekamanName = $event.target.files[0]?.name || 'No File Chosen'">
            </label>
            <span class="text-sm text-gray-600" x-text="rekamanName"></span>
          </div>
        </div>
      </div>
    </div>

    <div class="mt-8 flex justify-end">
      <button @click="saved=true"
              class="rounded-xl bg-brand-600 text-white px-6 py-3 font-semibold shadow-soft hover:bg-brand-700">
        Submit Kehadiran
      </button>
    </div>

    <!-- Modal Berhasil Tersimpan -->
    <div x-show="saved" x-cloak
         class="fixed inset-0 z-50 grid place-items-center bg-black/40 p-4">
      <div class="w-full max-w-md rounded-3xl bg-white p-6 shadow-2xl text-center">
        <div class="mx-auto mb-4 grid h-16 w-16 place-items-center rounded-full bg-brand-50">
          <i data-lucide="cloud" class="w-8 h-8 text-emerald-600"></i>
        </div>
        <p class="text-lg font-semibold text-emerald-600">Berhasil Tersimpan</p>
        <div class="mt-5">
          <button @click="saved=false"
                  class="rounded-xl bg-brand-600 text-white px-6 py-2.5 font-semibold hover:bg-brand-700">
            Continue
          </button>
        </div>
      </div>
    </div>

  </div>
</section>
@endsection
