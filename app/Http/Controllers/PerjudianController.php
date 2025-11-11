<?php

namespace App\Http\Controllers;

use App\Models\perjudian;
use App\Models\Desa;
use Illuminate\Http\Request;

class PerjudianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desaId = session('desa_id');
        $data = Perjudian::where('desa_id',$desaId)->with(['desa'])->orderBy('tanggal', 'desc')->get();
        return view('pages.perkembangan.keamanandanketertiban.perjudian.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $desas = Desa::orderBy('nama_desa')->get();
        return view('pages.perkembangan.keamanandanketertiban.perjudian.create', compact('desas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'jumlah_penduduk_berjudi' => 'nullable|numeric',
            'jenis_perjudian' => 'nullable|string',
            'jumlah_kasus_penipuan_penggelapan' => 'nullable|numeric',
            'jumlah_kasus_sengketa_warisan_jualbeli_utangpiutang' => 'nullable|numeric',
        ]);
        $validated['desa_id'] = session('desa_id');
        Perjudian::create($validated);
        return redirect()->route('perkembangan.keamanandanketertiban.perjudian.index')->with('success', 'Data Perjudian berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $perjudian = Perjudian::with(['desa'])->findOrFail($id);
        $perjudian->load(['desa']);
        return view('pages.perkembangan.keamanandanketertiban.perjudian.show', compact('perjudian'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $perjudian = Perjudian::findOrFail($id);
        $desas = Desa::orderBy('nama_desa')->get();
        return view('pages.perkembangan.keamanandanketertiban.perjudian.edit', compact('perjudian', 'desas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'jumlah_penduduk_berjudi' => 'nullable|numeric',
            'jenis_perjudian' => 'nullable|string',
            'jumlah_kasus_penipuan_penggelapan' => 'nullable|numeric',
            'jumlah_kasus_sengketa_warisan_jualbeli_utangpiutang' => 'nullable|numeric',
        ]);

        $perjudian = Perjudian::findOrFail($id);
        $perjudian->update($validated);

        return redirect()->route('perkembangan.keamanandanketertiban.perjudian.index')->with('success', 'Data Perjudian berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $perjudian = Perjudian::findOrFail($id);
        $perjudian->delete();
        return redirect()->route('perkembangan.keamanandanketertiban.perjudian.index')->with('success', 'Data Perjudian berhasil dihapus.');
    }
}
