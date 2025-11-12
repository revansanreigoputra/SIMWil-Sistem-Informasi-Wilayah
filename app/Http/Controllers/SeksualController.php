<?php

namespace App\Http\Controllers;

use App\Models\seksual;
use App\Models\Desa;
use Illuminate\Http\Request;

class SeksualController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Seksual::with(['desa'])->orderBy('tanggal', 'desc')->get();
        return view('pages.perkembangan.keamanandanketertiban.seksual.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $desas = Desa::orderBy('nama_desa')->get();
        return view('pages.perkembangan.keamanandanketertiban.seksual.create', compact('desas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'id_desa' => 'required|exists:desas,id',
            'jumlah_kasus_perkosaan' => 'nullable|integer|min:0',
            'jumlah_kasus_perkosaan_anak' => 'nullable|integer|min:0',
            'jumlah_kasus_hamil_luar_nikah_hukum_negara' => 'nullable|integer|min:0',
            'jumlah_kasus_hamil_luar_nikah_hukum_adat' => 'nullable|integer|min:0',
            'jumlah_tempat_penampungan_pekerja_seks' => 'nullable|integer|min:0',
        ]);
        Seksual::create($validated);
        return redirect()->route('perkembangan.keamanandanketertiban.seksual.index')->with('success', 'Data Seksual berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $seksual = seksual::findOrFail($id);
        $seksual->load(['desa']);
        return view('pages.perkembangan.keamanandanketertiban.seksual.show', compact('seksual'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $seksual = seksual::findOrFail($id);
        $desas = Desa::orderBy('nama_desa')->get();
        return view('pages.perkembangan.keamanandanketertiban.seksual.edit', compact('seksual', 'desas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'id_desa' => 'required|exists:desas,id',
            'jumlah_kasus_perkosaan' => 'nullable|integer|min:0',
            'jumlah_kasus_perkosaan_anak' => 'nullable|integer|min:0',
            'jumlah_kasus_hamil_luar_nikah_hukum_negara' => 'nullable|integer|min:0',
            'jumlah_kasus_hamil_luar_nikah_hukum_adat' => 'nullable|integer|min:0',
            'jumlah_tempat_penampungan_pekerja_seks' => 'nullable|integer|min:0',
        ]);
        $seksual = seksual::findOrFail($id);
        $seksual->update($validated);
        return redirect()->route('perkembangan.keamanandanketertiban.seksual.index')->with('success', 'Data Seksual berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $seksual = seksual::findOrFail($id);
        $seksual->delete();
        return redirect()->route('perkembangan.keamanandanketertiban.seksual.index')->with('success', 'Data Seksual berhasil dihapus.');
    }
}
