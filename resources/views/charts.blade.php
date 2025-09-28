@extends('layouts.app')
@section('title','Grafik Jumlah Rekaman')

@section('content')
<section class="hero-gradient">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10 py-10">
    <h2 class="font-display text-2xl md:text-3xl text-brand-900 text-center mb-6">
      GRAFIK JUMLAH REKAMAN SIARAN
    </h2>

    <div class="mb-6 flex items-center justify-end gap-3">
      <button class="rounded-xl bg-brand-600 text-white px-4 py-2.5 font-semibold hover:bg-brand-700">
        Unduh Laporan Lengkap
      </button>
    </div>

    <div class="grid gap-6 lg:grid-cols-2">
      <div class="rounded-2xl bg-white shadow-soft p-4">
        <h4 class="mb-2 font-semibold">Grafik Kunjungan Bulanan (berdasarkan Genre)</h4>
        <div class="h-72"><canvas id="chartGenre"></canvas></div>
      </div>

      <div class="rounded-2xl bg-white shadow-soft p-4">
        <h4 class="mb-2 font-semibold">Grafik Kunjungan Bulanan (berdasarkan Narasumber)</h4>
        <div class="h-72"><canvas id="chartSpeaker"></canvas></div>
      </div>
    </div>
  </div>
</section>

<script>
  new Chart(document.getElementById('chartGenre'), {
    type: 'line',
    data: {
      labels: ['M1','M2','M3','M4'],
      datasets: [
        { label: 'Keagamaan Hindu', data: [3,4,5,6], borderWidth: 2, tension:.3 },
        { label: 'Keagamaan Islam', data: [2,2,3,4], borderWidth: 2, tension:.3 },
        { label: 'Edukasi', data: [1,2,2,3], borderWidth: 2, tension:.3 },
      ]
    },
    options: { plugins: { legend:{position:'bottom'} }, scales: { y:{ beginAtZero:true, ticks:{ precision:0 } } } }
  });

  new Chart(document.getElementById('chartSpeaker'), {
    type: 'line',
    data: {
      labels: ['M1','M2','M3','M4'],
      datasets: [
        { label: 'Gusti Pradipta', data: [2,3,4,5], borderWidth: 2, tension:.3 },
        { label: 'Desak Dwi Rianti', data: [1,2,2,3], borderWidth: 2, tension:.3 },
        { label: 'Muhammad Rasyid', data: [1,1,2,2], borderWidth: 2, tension:.3 },
      ]
    },
    options: { plugins: { legend:{position:'bottom'} }, scales: { y:{ beginAtZero:true, ticks:{ precision:0 } } } }
  });
</script>
@endsection
