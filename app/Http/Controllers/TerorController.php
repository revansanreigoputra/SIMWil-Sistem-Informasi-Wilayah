<?php

namespace App\Http\Controllers;

use App\Models\teror;
use App\Models\Desa;
use Illuminate\Http\Request;

class TerorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desaId = session('desa_id');
        $data = teror::where('desa_id',$desaId)->with(['desa'])->orderBy('tanggal', 'desc')->get();
        return view('pages.perkembangan.keamanandanketertiban.teror.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $desas = Desa::orderBy('nama_desa')->get();
        return view('pages.perkembangan.keamanandanketertiban.teror.create', compact('desas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'jumlah_kasus_intimidasi_dalam_desa' => 'nullable|integer|min:0',
            'jumlah_kasus_intimidasi_luar_desa' => 'nullable|integer|min:0',
            'jumlah_kasus_selebaran_gelap' => 'nullable|integer|min:0',
            'jumlah_kasus_terorisme' => 'nullable|integer|min:0',
            'jumlah_kasus_hasutan_pemaksaan' => 'nullable|integer|min:0',
            'jumlah_penyelesaian_kasus' => 'nullable|integer|min:0',
        ]);
        $validated['desa_id'] = session('desa_id');
        teror::create($validated);
        return redirect()->route('perkembangan.keamanandanketertiban.teror.index')->with('success', 'Data Teror dan Intimidasi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $teror = teror::with(['desa'])->findOrFail($id);
        $teror->load(['desa']);
        return view('pages.perkembangan.keamanandanketertiban.teror.show', compact('teror'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $teror = teror::findOrFail($id);
        $desas = Desa::orderBy('nama_desa')->get();
        return view('pages.perkembangan.keamanandanketertiban.teror.edit', compact('teror', 'desas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'jumlah_kasus_intimidasi_dalam_desa' => 'nullable|integer|min:0',
            'jumlah_kasus_intimidasi_luar_desa' => 'nullable|integer|min:0',
            'jumlah_kasus_selebaran_gelap' => 'nullable|integer|min:0',
            'jumlah_kasus_terorisme' => 'nullable|integer|min:0',
            'jumlah_kasus_hasutan_pemaksaan' => 'nullable|integer|min:0',
            'jumlah_penyelesaian_kasus' => 'nullable|integer|min:0',
        ]);
        $teror = teror::findOrFail($id);
        $teror->update($validated);
        return redirect()->route('perkembangan.keamanandanketertiban.teror.index')->with('success', 'Data Teror dan Intimidasi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $teror = teror::findOrFail($id);
        $teror->delete();
        return redirect()->route('perkembangan.keamanandanketertiban.teror.index')->with('success', 'Data Teror dan Intimidasi berhasil dihapus.');
    }
}
