<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'instansi',
        'divisi',
        'no_hp',
        'nama_barang',
        'tanggal_pinjam',
        'tanggal_kembali',
        'kondisi_barang',
        'foto_pinjam',
        'keterangan',
    ];
}

