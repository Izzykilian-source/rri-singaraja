@extends('layouts.app')
@section('title','RRI Singaraja')

@section('content')
<section class="hero-gradient">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10 py-16 grid md:grid-cols-2 items-center gap-10">
    <div>
      <p class="text-[11px] tracking-[0.25em] text-rose-500 mb-2">Kunjungan Rekaman dan Siaran</p>
      <h1 class="font-display text-4xl md:text-5xl leading-tight text-brand-900">
        Selamat Datang, <br/> Sahabat RRI
      </h1>
      <p class="mt-4 max-w-xl text-[15px] text-gray-700">
        “Bersinergi membangun Informasi terpercaya dari berbagai sumber. Kehadiran Anda sangat kami nantikan untuk memberikan informasi dan hiburan kepada pendengar setia kami.”
      </p>
      <div class="mt-7 flex items-center gap-3">
        <a href="{{ route('form.create') }}" class="rounded-xl bg-brand-600 text-white px-6 py-3 font-semibold shadow-soft hover:bg-brand-700">
          Konfirmasi Kehadiran
        </a>
      </div>
    </div>

    <div class="relative">
      <div class="rounded-[32px] bg-white p-6 shadow-soft">
        <div class="aspect-[4/3] rounded-2xl bg-[url('https://images.unsplash.com/photo-1546447147-3fc2b8181a19?q=80&w=1200&auto=format')] bg-cover bg-center"></div>
      </div>
    </div>
  </div>
</section>
@endsection
