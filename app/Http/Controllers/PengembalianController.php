<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengembalian;

class PengembalianController extends Controller
{
    public function index()
    {
        $pengembalians = Pengembalian::latest()->get();
        return view('arsip-sarpras.index', compact('pengembalians'));
    }

    public function create()
    {
        return view('arsip-sarpras.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nama_barang' => 'required|string|max:255',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date',
            'kondisi_barang' => 'required|string',
            'foto_pinjam' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'foto_kembali' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $fotoPinjam = $request->file('foto_pinjam')?->store('pengembalian', 'public');
        $fotoKembali = $request->file('foto_kembali')?->store('pengembalian', 'public');

        Pengembalian::create([
            'nama_lengkap' => $request->nama_lengkap,
            'instansi' => $request->instansi,
            'divisi' => $request->divisi,
            'no_hp' => $request->no_hp,
            'nama_barang' => $request->nama_barang,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'kondisi_barang' => $request->kondisi_barang,
            'foto_pinjam' => $fotoPinjam,
            'foto_kembali' => $fotoKembali,
        ]);

        return redirect()->route('arsip.index')->with('success', 'Data pengembalian berhasil ditambahkan!');
    }

    public function show($id)
    {
        $data = Pengembalian::findOrFail($id);
        return view('arsip.show', compact('data'));
    }
}

