<?php

namespace App\Http\Controllers;

use App\Models\prostitusi;
use App\Models\Desa;
use Illuminate\Http\Request;

class ProstitusiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desaId = session('desa_id');
        $data = Prostitusi::where('desa_id',$desaId)->with(['desa'])->orderBy('tanggal', 'desc')->get();
        return view('pages.perkembangan.keamanandanketertiban.prostitusi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $desas = Desa::orderBy('nama_desa')->get();
        return view('pages.perkembangan.keamanandanketertiban.prostitusi.create', compact('desas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'jumlah_penduduk_pramu_nikmat' => 'nullable|integer|min:0',
            'lokalisasi_prostitusi' => 'required|in:Ada,Tidak Ada',
            'jumlah_tempat_pramunikmat' => 'nullable|integer|min:0',
            'jumlah_kasus_prostitusi' => 'nullable|integer|min:0',
            'jumlah_pembinaan_pelaku' => 'nullable|integer|min:0',
            'jumlah_penertiban_tempat' => 'nullable|integer|min:0',
        ]);
        $validated['desa_id'] = session('desa_id');
        Prostitusi::create($validated);
        return redirect()->route('perkembangan.keamanandanketertiban.prostitusi.index')->with('success', 'Data Prostitusi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $prostitusi = prostitusi::with(['desa'])->findOrFail($id);
        $prostitusi->load(['desa']);
        return view('pages.perkembangan.keamanandanketertiban.prostitusi.show', compact('prostitusi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $prostitusi = prostitusi::findOrFail($id);
        $desas = Desa::orderBy('nama_desa')->get();
        return view('pages.perkembangan.keamanandanketertiban.prostitusi.edit', compact('prostitusi', 'desas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'jumlah_penduduk_pramu_nikmat' => 'nullable|integer|min:0',
            'lokalisasi_prostitusi' => 'required|in:Ada,Tidak Ada',
            'jumlah_tempat_pramunikmat' => 'nullable|integer|min:0',
            'jumlah_kasus_prostitusi' => 'nullable|integer|min:0',
            'jumlah_pembinaan_pelaku' => 'nullable|integer|min:0',
            'jumlah_penertiban_tempat' => 'nullable|integer|min:0',
        ]);
        $prostitusi = Prostitusi::findOrFail($id);
        $prostitusi->update($validated);
        return redirect()->route('perkembangan.keamanandanketertiban.prostitusi.index')->with('success', 'Data Prostitusi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $prostitusi = Prostitusi::findOrFail($id);
        $prostitusi->delete();
        return redirect()->route('perkembangan.keamanandanketertiban.prostitusi.index')->with('success', 'Data Prostitusi berhasil dihapus.');
    }
}
