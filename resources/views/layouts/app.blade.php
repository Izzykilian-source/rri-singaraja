<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','RRI Singaraja')</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: { display: ['"Playfair Display"', 'serif'], sans: ['Inter', 'ui-sans-serif'] },
          colors: {
            brand: {
              50:'#eef2ff',100:'#e0e7ff',200:'#c7d2fe',300:'#a5b4fc',
              400:'#818cf8',500:'#6366f1',600:'#4f46e5',700:'#4338ca',800:'#3730a3',900:'#312e81'
            },
          },
          boxShadow: { soft: "0 12px 30px -10px rgba(79,70,229,.25)" }
        }
      }
    }
  </script>

  <!-- AlpineJS -->
  <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

  <!-- Lucide icons & Chart.js -->
  <script src="https://unpkg.com/lucide@latest"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <style>
    .hero-gradient{ background: linear-gradient(135deg,#f8f7ff 0%,#eee8ff 38%,#e7eeff 100%); }
  </style>
</head>
<body class="flex flex-col min-h-screen bg-white text-gray-800">

  <!-- NAVBAR -->
  <header class="flex items-center justify-between px-6 py-4 bg-white shadow">
    <!-- LOGO + TEKS (Clickable) -->
    <a href="{{ url('/') }}" class="flex items-center space-x-3 hover:opacity-90 cursor-pointer transition">
      <img src="{{ asset('images/logo-rri.png') }}" alt="Logo RRI Singaraja" class="h-12">
      <div>
        <p class="text-xs font-bold">RADIO REPUBLIK INDONESIA</p>
        <p class="text-blue-600 font-extrabold -mt-1">SINGARAJA</p>
      </div>
    </a>

    <!-- MENU DESKTOP -->
    <nav class="hidden md:flex items-center gap-8 text-sm font-medium">
      <!-- Beranda -->
      <a href="{{ url('/') }}"
         class="{{ request()->is('/') ? 'text-brand-700 underline underline-offset-8 decoration-2' : 'text-gray-700 hover:text-brand-700' }}">
        Beranda
      </a>

      <!-- Data Kunjungan (submenu AlpineJS) -->
      <div x-data="{ open: false, timeout: null }" class="relative"
           @mouseenter="clearTimeout(timeout); open = true"
           @mouseleave="timeout = setTimeout(() => open = false, 200)">
        <button class="text-gray-700 hover:text-brand-700 flex items-center gap-1">
          Data Kunjungan
          <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
               viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round"
               d="M19 9l-7 7-7-7" /></svg>
        </button>
        <!-- SUBMENU -->
        <div x-show="open"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 translate-y-1"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 translate-y-1"
             class="absolute left-0 mt-2 w-48 bg-white border rounded-md shadow-lg z-50 py-2"
             @mouseenter="clearTimeout(timeout); open = true"
             @mouseleave="timeout = setTimeout(() => open = false, 200)">
          <a href="{{ route('visit.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Semua Data</a>
          <a href="{{ route('charts.operator') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Grafik Operator</a>
          <a href="{{ route('laporan.download') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Unduh Laporan</a>
        </div>
      </div>

      <!-- Data Peminjaman -->
      <a href="{{ route('peminjaman.index') }}"
         class="{{ request()->is('grafik') ? 'text-brand-700 underline underline-offset-8 decoration-2' : 'text-gray-700 hover:text-brand-700' }}">
        Data Peminjaman
      </a>

      <!-- Arsip -->
      <a href="{{ route('arsip-sarpras.index') }}"
         class="{{ request()->is('arsip-sarpras.index') ? 'text-brand-700 underline underline-offset-8 decoration-2' : 'text-gray-700 hover:text-brand-700' }}">
        Arsip Sarpras
      </a>
    </nav>

    <!-- MENU MOBILE -->
    <button class="md:hidden px-4 py-2 rounded-xl border border-gray-200 text-gray-700"
            @click="document.getElementById('mnav').classList.toggle('hidden')">
      <i data-lucide="menu" class="w-5 h-5"></i>
    </button>
  </header>

  <!-- MOBILE NAV -->
  <div id="mnav" class="md:hidden hidden border-t bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10 py-3 flex flex-col gap-3 text-sm font-medium">
      <a href="{{ url('/') }}" class="text-gray-700">Beranda</a>
      <a href="{{ route('visit.index') }}" class="text-gray-700">Data Kunjungan</a>
      <a href="{{ route('charts') }}" class="text-gray-700">Data Peminjaman</a>
      <a href="{{ route('arsip-sarpras.index') }}" class="text-gray-700">Arsip Sarpras</a>
    </div>
  </div>

  <!-- CONTENT -->
  <main class="flex-grow">
    @yield('content')
  </main>

  <!-- FOOTER -->
  <footer class="border-t bg-white/70 mt-auto">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10 py-6 text-center text-sm text-gray-600">
      © {{ date('Y') }} RRI Singaraja • Prototype UI
    </div>
  </footer>

  <script>lucide.createIcons()</script>
</body>
</html>
