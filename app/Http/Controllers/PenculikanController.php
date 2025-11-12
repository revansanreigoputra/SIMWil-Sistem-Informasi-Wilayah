<?php

namespace App\Http\Controllers;

use App\Models\penculikan;
use App\Models\Desa;
use Illuminate\Http\Request;

class PenculikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desaId = session('desa_id');
        $data = penculikan::with(['desa'])->orderBy('tanggal', 'desc')->get();
        return view('pages.perkembangan.keamanandanketertiban.penculikan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $desas = Desa::orderBy('nama_desa')->get();
        return view('pages.perkembangan.keamanandanketertiban.penculikan.create', compact('desas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'jumlah_kasus_penculikan' => 'nullable|integer|min:0',
            'jumlah_kasus_korban_penduduk' => 'nullable|integer|min:0',
            'jumlah_kasus_pelaku_penduduk' => 'nullable|integer|min:0',
            'jumlah_kasus_diproses_hukum' => 'nullable|integer|min:0',
        ]);
        $validated['desa_id'] = session('desa_id');
        penculikan::create($validated);
        return redirect()->route('perkembangan.keamanandanketertiban.penculikan.index')->with('success', 'Data Penculikan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $penculikan = penculikan::with(['desa'])->findOrFail($id);
        $penculikan->load(['desa']);
        return view('pages.perkembangan.keamanandanketertiban.penculikan.show', compact('penculikan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $penculikan = penculikan::findOrFail($id);
        $desas = Desa::orderBy('nama_desa')->get();
        return view('pages.perkembangan.keamanandanketertiban.penculikan.edit', compact('penculikan', 'desas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'jumlah_kasus_penculikan' => 'nullable|integer|min:0',
            'jumlah_kasus_korban_penduduk' => 'nullable|integer|min:0',
            'jumlah_kasus_pelaku_penduduk' => 'nullable|integer|min:0',
            'jumlah_kasus_diproses_hukum' => 'nullable|integer|min:0',
        ]);
        $penculikan = penculikan::findOrFail($id);
        $penculikan->update($validated);
        return redirect()->route('perkembangan.keamanandanketertiban.penculikan.index')->with('success', 'Data Penculikan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $penculikan = penculikan::findOrFail($id);
        $penculikan->delete();
        return redirect()->route('perkembangan.keamanandanketertiban.penculikan.index')->with('success', 'Data Penculikan berhasil dihapus.');
    }
}
