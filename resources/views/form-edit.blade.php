@extends('layouts.app')
@section('title','Edit Kehadiran')

@section('content')
<section class="hero-gradient">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10 py-10">
    <h2 class="text-center font-display text-2xl md:text-3xl text-brand-900">FORMULIR EDIT KEHADIRAN</h2>

    <div class="mt-8 grid md:grid-cols-2 gap-8">
      <div class="space-y-5">
        <div>
          <label class="text-sm font-semibold">Judul rekaman</label>
          <input value="Mimbar Agama Hindu: Bhakti Srada dan Karma Pala"
                 class="w-full mt-1 rounded-xl border border-brand-200/60 bg-white px-4 py-2.5 focus:border-brand-400 outline-none">
        </div>
        <div>
          <label class="text-sm font-semibold">Nama Narasumber</label>
          <input value="Desak Dwi Rianti"
                 class="w-full mt-1 rounded-xl border border-brand-200/60 bg-white px-4 py-2.5 focus:border-brand-400 outline-none">
        </div>
        <div>
          <label class="text-sm font-semibold">Nama Penanggungjawab Rekaman</label>
          <input value="Gede Suta"
                 class="w-full mt-1 rounded-xl border border-brand-200/60 bg-white px-4 py-2.5 focus:border-brand-400 outline-none">
        </div>
        <div>
          <p class="text-sm font-semibold">Unggah bukti foto</p>
          <div class="flex items-center gap-3">
            <label class="inline-flex items-center gap-2 rounded-xl border border-brand-200/70 bg-white px-4 py-2 cursor-pointer">
              <i data-lucide="image" class="w-4 h-4 text-brand-700"></i>
              <span class="text-sm font-semibold">Choose File</span>
              <input type="file" class="hidden">
            </label>
            <span class="text-sm text-gray-600">WhatsApp4642G.png</span>
          </div>
        </div>
      </div>

      <div class="space-y-5">
        <div>
          <label class="text-sm font-semibold">Tanggal</label>
          <input type="text" value="17/05/2025"
                 class="w-full mt-1 rounded-xl border border-brand-200/60 bg-white px-4 py-2.5 focus:border-brand-400 outline-none">
        </div>
        <div>
          <label class="text-sm font-semibold">Durasi rekaman</label>
          <input value="15 Menit"
                 class="w-full mt-1 rounded-xl border border-brand-200/60 bg-white px-4 py-2.5 focus:border-brand-400 outline-none">
        </div>
        <div>
          <label class="text-sm font-semibold">Genre/Type Siaran</label>
          <select class="w-full mt-1 rounded-xl border border-brand-200/60 bg-white px-4 py-2.5 focus:border-brand-400 outline-none">
            <option selected>Keagamaan Hindu</option>
            <option>Keagamaan Islam</option>
            <option>Edukasi</option>
            <option>Budaya</option>
            <option>Umum</option>
          </select>
        </div>
        <div>
          <p class="text-sm font-semibold">Unggah hasil rekaman</p>
          <div class="flex items-center gap-3">
            <label class="inline-flex items-center gap-2 rounded-xl border border-brand-200/70 bg-white px-4 py-2 cursor-pointer">
              <i data-lucide="upload-cloud" class="w-4 h-4 text-brand-700"></i>
              <span class="text-sm font-semibold">Choose File</span>
              <input type="file" class="hidden">
            </label>
            <span class="text-sm text-gray-600">WhatsApp4642G.mp3</span>
          </div>
        </div>
      </div>
    </div>

    <div class="mt-8 flex justify-end">
      <button class="rounded-xl bg-brand-600 text-white px-6 py-3 font-semibold shadow-soft hover:bg-brand-700">
        Update Kehadiran
      </button>
    </div>
  </div>
</section>
@endsection
