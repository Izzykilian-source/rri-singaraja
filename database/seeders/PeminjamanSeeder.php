<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Peminjaman;
class PeminjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run()
{
    Peminjaman::create([
        'nama_aset' => 'Radio Properti',
        'foto' => 'sample1.jpg',
        'tanggal_pinjam' => '2025-10-01',
        'kondisi' => 'Normal',
    ]);

    Peminjaman::create([
        'nama_aset' => 'Mikrofon Wireless',
        'foto' => 'sample2.jpg',
        'tanggal_pinjam' => '2025-10-01',
        'kondisi' => 'Normal',
    ]);
}
}
