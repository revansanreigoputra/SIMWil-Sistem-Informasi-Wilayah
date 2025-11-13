<?php

namespace App\Http\Controllers;

use App\Models\penjarahan;
use App\Models\Desa;
use Illuminate\Http\Request;

class PenjarahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desaId = session('desa_id');
        $data = Penjarahan::where('desa_id',$desaId)->with(['desa'])->orderBy('tanggal', 'desc')->get();
        return view('pages.perkembangan.keamanandanketertiban.penjarahan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $desas = Desa::orderBy('nama_desa')->get();
        return view('pages.perkembangan.keamanandanketertiban.penjarahan.create', compact('desas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'korban_dan_pelaku_penduduk_setempat' => 'nullable|numeric',
            'korban_penduduk_setempat_pelaku_bukan_setempat' => 'nullable|numeric',
            'korban_bukan_setempat_pelaku_penduduk_setempat' => 'nullable|numeric',
            'pelaku_diadili_atau_diproses_hukum' => 'nullable|numeric',
        ]);
        $validated['desa_id'] = session('desa_id');
        Penjarahan::create($validated);
        return redirect()->route('perkembangan.keamanandanketertiban.penjarahan.index')->with('success', 'Data Penjarahan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $penjarahan = Penjarahan::with(['desa'])->findOrFail($id);
        $penjarahan->load(['desa']);
        return view('pages.perkembangan.keamanandanketertiban.penjarahan.show', compact('penjarahan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $penjarahan = Penjarahan::findOrFail($id);
        $desas = Desa::orderBy('nama_desa')->get();
        return view('pages.perkembangan.keamanandanketertiban.penjarahan.edit', compact('penjarahan', 'desas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'korban_dan_pelaku_penduduk_setempat' => 'nullable|numeric',
            'korban_penduduk_setempat_pelaku_bukan_setempat' => 'nullable|numeric',
            'korban_bukan_setempat_pelaku_penduduk_setempat' => 'nullable|numeric',
            'pelaku_diadili_atau_diproses_hukum' => 'nullable|numeric',
        ]);

        $penjarahan = Penjarahan::findOrFail($id);
        $penjarahan->update($validated);

        return redirect()->route('perkembangan.keamanandanketertiban.penjarahan.index')->with('success', 'Data Penjarahan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $penjarahan = Penjarahan::findOrFail($id);
        $penjarahan->delete();
        return redirect()->route('perkembangan.keamanandanketertiban.penjarahan.index')->with('success', 'Data Penjarahan berhasil dihapus.');
    }
}
