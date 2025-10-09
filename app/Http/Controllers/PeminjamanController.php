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
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'instansi' => 'nullable|string|max:255',
            'divisi' => 'nullable|string|max:255',
            'no_hp' => 'nullable|string|max:20',
            'nama_barang' => 'required|string|max:255',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'nullable|date',
            'kondisi_barang' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'foto_pinjam' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto_pinjam')) {
            $validated['foto_pinjam'] = $request->file('foto_pinjam')->store('peminjaman', 'public');
        }

        Peminjaman::create($validated);

        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil ditambahkan!');
    }

    public function edit(Peminjaman $peminjaman)
    {
        return view('peminjaman.edit', compact('peminjaman'));
    }

    public function update(Request $request, Peminjaman $peminjaman)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'instansi' => 'nullable|string|max:255',
            'divisi' => 'nullable|string|max:255',
            'no_hp' => 'nullable|string|max:20',
            'nama_barang' => 'required|string|max:255',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'nullable|date',
            'kondisi_barang' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'foto_pinjam' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto_pinjam')) {
            if ($peminjaman->foto_pinjam && \Storage::disk('public')->exists($peminjaman->foto_pinjam)) {
                \Storage::disk('public')->delete($peminjaman->foto_pinjam);
            }
            $validated['foto_pinjam'] = $request->file('foto_pinjam')->store('peminjaman', 'public');
        }

        $peminjaman->update($validated);

        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil diperbarui!');
    }

    public function destroy(Peminjaman $peminjaman)
    {
        if ($peminjaman->foto_pinjam && \Storage::disk('public')->exists($peminjaman->foto_pinjam)) {
            \Storage::disk('public')->delete($peminjaman->foto_pinjam);
        }

        $peminjaman->delete();

        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil dihapus!');
    }
}
