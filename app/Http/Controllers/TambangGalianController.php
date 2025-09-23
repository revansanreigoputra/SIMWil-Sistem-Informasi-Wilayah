<?php
// app/Http/Controllers/TambangGalianController.php

namespace App\Http\Controllers;

use App\Models\TambangGalian;
use Illuminate\Http\Request;

class TambangGalianController extends Controller
{
    public function index()
    {
        $tambangGalian = TambangGalian::orderBy('tanggal', 'desc')->get();
        return view('pages.perkembangan.produkdomestikdesa.tambang-galian.index', compact('tambangGalian'));
    }

    public function create()
    {
        return view('pages.perkembangan.produkdomestikdesa.tambang-galian.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'total_nilai_produksi' => 'required|numeric|min:0',
            'total_nilai_bahan_baku' => 'required|numeric|min:0',
            'total_nilai_bahan_penolong' => 'required|numeric|min:0',
            'total_biaya_antara' => 'required|numeric|min:0',
            'jumlah_jenis_bahan_tambang' => 'required|integer|min:0'
        ]);

        TambangGalian::create($validated);

        return redirect()->route('tambang-galian.index')
            ->with('success', 'Data tambang dan galian berhasil ditambahkan');
    }

    public function show(TambangGalian $tambangGalian)
    {
        return view('pages.perkembangan.produkdomestikdesa.tambang-galian.show', compact('tambangGalian'));
    }

    public function edit(TambangGalian $tambangGalian)
    {
        return view('pages.perkembangan.produkdomestikdesa.tambang-galian.edit', compact('tambangGalian'));
    }

    public function update(Request $request, TambangGalian $tambangGalian)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'total_nilai_produksi' => 'required|numeric|min:0',
            'total_nilai_bahan_baku' => 'required|numeric|min:0',
            'total_nilai_bahan_penolong' => 'required|numeric|min:0',
            'total_biaya_antara' => 'required|numeric|min:0',
            'jumlah_jenis_bahan_tambang' => 'required|integer|min:0'
        ]);

        $tambangGalian->update($validated);

        return redirect()->route('tambang-galian.index')
            ->with('success', 'Data tambang dan galian berhasil diperbarui');
    }

    public function destroy(TambangGalian $tambangGalian)
    {
        $tambangGalian->delete();

        return redirect()->route('tambang-galian.index')
            ->with('success', 'Data tambang dan galian berhasil dihapus');
    }
}