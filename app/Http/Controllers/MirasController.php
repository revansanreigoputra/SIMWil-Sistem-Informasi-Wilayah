<?php

namespace App\Http\Controllers;

use App\Models\miras;
use App\Models\Desa;
use Illuminate\Http\Request;

class MirasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desaId = session('desa_id');
        $data = miras::where('desa_id',$desaId)->with(['desa'])->orderBy('tanggal', 'desc')->get();
        return view('pages.perkembangan.keamanandanketertiban.miras.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $desas = Desa::orderBy('nama_desa')->get();
        return view('pages.perkembangan.keamanandanketertiban.miras.create', compact('desas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'jumlah_warung_miras' => 'required|integer|min:0',
            'jumlah_penduduk_miras' => 'required|integer|min:0',
            'jumlah_kasus_mabuk_miras' => 'required|integer|min:0',
            'jumlah_pengedar_narkoba' => 'required|integer|min:0',
            'jumlah_penduduk_narkoba' => 'required|integer|min:0',
            'jumlah_kasus_teler_narkoba' => 'required|integer|min:0',
            'jumlah_kasus_kematian_narkoba' => 'required|integer|min:0',
            'jumlah_pelaku_miras_diadili' => 'required|integer|min:0',
            'jumlah_pelaku_narkoba_diadili' => 'required|integer|min:0',
        ]);
        $validated['desa_id'] = session('desa_id');
        miras::create($validated);
        return redirect()->route('perkembangan.keamanandanketertiban.miras.index')->with('success', 'Data Miras berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $miras = miras::with(['desa'])->findOrFail($id);
        $miras->load(['desa']);
        return view('pages.perkembangan.keamanandanketertiban.miras.show', compact('miras'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $miras = miras::findOrFail($id);
        $desas = Desa::orderBy('nama_desa')->get();
        return view('pages.perkembangan.keamanandanketertiban.miras.edit', compact('miras', 'desas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'jumlah_warung_miras' => 'required|integer|min:0',
            'jumlah_penduduk_miras' => 'required|integer|min:0',
            'jumlah_kasus_mabuk_miras' => 'required|integer|min:0',
            'jumlah_pengedar_narkoba' => 'required|integer|min:0',
            'jumlah_penduduk_narkoba' => 'required|integer|min:0',
            'jumlah_kasus_teler_narkoba' => 'required|integer|min:0',
            'jumlah_kasus_kematian_narkoba' => 'required|integer|min:0',
            'jumlah_pelaku_miras_diadili' => 'required|integer|min:0',
            'jumlah_pelaku_narkoba_diadili' => 'required|integer|min:0',
        ]);
        $miras = miras::findOrFail($id);
        $miras->update($validated);
        return redirect()->route('perkembangan.keamanandanketertiban.miras.index')->with('success', 'Data Miras berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $miras = miras::findOrFail($id);
        $miras->delete();
        return redirect()->route('perkembangan.keamanandanketertiban.miras.index')->with('success', 'Data Miras berhasil dihapus.');
    }
}
