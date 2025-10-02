<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_aset',
        'foto',
        'tanggal_pinjam',
        'kondisi',
    ];

    protected $dates = ['tanggal_pinjam'];
}

