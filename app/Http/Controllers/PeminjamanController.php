<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::latest()->get();
        return view('peminjaman.index', compact('peminjaman'));
    }

    public function create()
    {
        return view('peminjaman.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_aset' => 'required|string|max:255',
            'tanggal_pinjam' => 'required|date',
            'kondisi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $foto = null;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('peminjaman', 'public');
        }

        Peminjaman::create([
            'nama_aset' => $request->nama_aset,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'kondisi' => $request->kondisi,
            'foto' => $foto,
        ]);

        return redirect()->route('peminjaman.index')->with('success', 'Data berhasil ditambahkan!');
    }
}
