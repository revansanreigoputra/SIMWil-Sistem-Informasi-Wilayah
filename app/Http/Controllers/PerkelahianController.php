<?php

namespace App\Http\Controllers;

use App\Models\perkelahian;
use App\Models\Desa;
use Illuminate\Http\Request;

class PerkelahianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desaId = session('desa_id');
        $data = perkelahian::where('desa_id',$desaId)->with(['desa'])->orderBy('tanggal', 'desc')->get();
        return view('pages.perkembangan.keamanandanketertiban.perkelahian.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $desas = Desa::orderBy('nama_desa')->get();
        return view('pages.perkembangan.keamanandanketertiban.perkelahian.create', compact('desas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'kasus_tahun_ini' => 'nullable|integer',
            'kasus_korban_jiwa' => 'nullable|integer',
            'kasus_luka_parah' => 'nullable|integer',
            'kasus_kerugian_material' => 'nullable|integer',
            'pelaku_diadili' => 'nullable|integer',
        ]);
        $validated['desa_id'] = session('desa_id');
        perkelahian::create($validated);
        return redirect()->route('perkembangan.keamanandanketertiban.perkelahian.index')->with('success', 'Data Perkelahian berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $perkelahian = perkelahian::with(['desa'])->findOrFail($id);
        $perkelahian->load(['desa']);
        return view('pages.perkembangan.keamanandanketertiban.perkelahian.show', compact('perkelahian'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $perkelahian = perkelahian::findOrFail($id);
        $desas = Desa::orderBy('nama_desa')->get();
        return view('pages.perkembangan.keamanandanketertiban.perkelahian.edit', compact('perkelahian', 'desas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'kasus_tahun_ini' => 'nullable|integer',
            'kasus_korban_jiwa' => 'nullable|integer',
            'kasus_luka_parah' => 'nullable|integer',
            'kasus_kerugian_material' => 'nullable|integer',
            'pelaku_diadili' => 'nullable|integer',
        ]);

        $perkelahian = perkelahian::findOrFail($id);
        $perkelahian->update($validated);

        return redirect()->route('perkembangan.keamanandanketertiban.perkelahian.index')->with('success', 'Data Perkelahian berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $perkelahian = perkelahian::findOrFail($id);
        $perkelahian->delete();
        return redirect()->route('perkembangan.keamanandanketertiban.perkelahian.index')->with('success', 'Data Perkelahian berhasil dihapus.');
    }
}
