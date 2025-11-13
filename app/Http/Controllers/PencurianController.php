<?php

namespace App\Http\Controllers;

use App\Models\pencurian;
use App\Models\Desa;
use Illuminate\Http\Request;

class PencurianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desaId = session('desa_id');
        $data = Pencurian::where('desa_id',$desaId)->with(['desa'])->orderBy('tanggal', 'desc')->get();
        return view('pages.perkembangan.keamanandanketertiban.pencurian.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $desas = Desa::orderBy('nama_desa')->get();
        return view('pages.perkembangan.keamanandanketertiban.pencurian.create', compact('desas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'kasus_tahun_ini' => 'nullable|integer|min:0',
            'korban_penduduk_setempat' => 'nullable|integer|min:0',
            'pelaku_penduduk_setempat' => 'nullable|integer|min:0',
            'pencurian_bersenjata_api' => 'nullable|integer|min:0',
            'pelaku_diadili' => 'nullable|integer|min:0',
        ]);
        $validated['desa_id'] = session('desa_id');
        Pencurian::create($validated);
        return redirect()->route('perkembangan.keamanandanketertiban.pencurian.index')->with('success', 'Data Pencurian berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pencurian = Pencurian::with(['desa'])->findOrFail($id);
        $pencurian->load(['desa']);
        return view('pages.perkembangan.keamanandanketertiban.pencurian.show', compact('pencurian'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pencurian = Pencurian::findOrFail($id);
        $desas = Desa::orderBy('nama_desa')->get();
        return view('pages.perkembangan.keamanandanketertiban.pencurian.edit', compact('pencurian', 'desas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'kasus_tahun_ini' => 'nullable|integer|min:0',
            'korban_penduduk_setempat' => 'nullable|integer|min:0',
            'pelaku_penduduk_setempat' => 'nullable|integer|min:0',
            'pencurian_bersenjata_api' => 'nullable|integer|min:0',
            'pelaku_diadili' => 'nullable|integer|min:0',
        ]);
        $pencurian = Pencurian::findOrFail($id);
        $pencurian->update($validated);
        return redirect()->route('perkembangan.keamanandanketertiban.pencurian.index')->with('success', 'Data Pencurian berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $pencurian = Pencurian::findOrFail($id);
        $pencurian->delete();
        return redirect()->route('perkembangan.keamanandanketertiban.pencurian.index')->with('success', 'Data Pencurian berhasil dihapus.');
    }
}
