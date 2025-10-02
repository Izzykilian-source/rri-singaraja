@extends('layouts.app')
@section('title','Grafik Jumlah Rekaman per Operator')

@section('content')
<section class="hero-gradient">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10 py-10">
    <h2 class="font-display text-2xl md:text-3xl text-brand-900 text-center mb-6">
      GRAFIK JUMLAH REKAMAN PER OPERATOR
    </h2>

    <div class="mb-6 flex items-center justify-end gap-3">
      <a href="{{ route('laporan.download') }}"
         class="rounded-xl bg-brand-600 text-white px-4 py-2.5 font-semibold hover:bg-brand-700">
        Unduh Laporan Lengkap
      </a>
    </div>

    <div class="rounded-2xl bg-white shadow-soft p-4">
      <h4 class="mb-2 font-semibold">Jumlah Rekaman Bulanan per Operator</h4>
      <div class="h-96"><canvas id="chartOperator"></canvas></div>
    </div>
  </div>
</section>

<script>
  // Contoh dummy data (nanti bisa diisi dari controller dengan data asli)
  const operatorData = {
    labels: ['Operator A', 'Operator B', 'Operator C', 'Operator D'],
    datasets: [{
      label: 'Jumlah Rekaman',
      data: [12, 19, 7, 15],
      backgroundColor: ['#6366f1','#10b981','#f59e0b','#ef4444'],
      borderColor: '#4338ca',
      borderWidth: 2,
      borderRadius: 6
    }]
  };

  new Chart(document.getElementById('chartOperator'), {
    type: 'bar', // Bisa diganti "line" kalau mau garis
    data: operatorData,
    options: {
      responsive: true,
      plugins: {
        legend: { display: false },
        tooltip: { enabled: true }
      },
      scales: {
        y: { beginAtZero: true, ticks: { precision: 0 } }
      }
    }
  });
</script>
@endsection
