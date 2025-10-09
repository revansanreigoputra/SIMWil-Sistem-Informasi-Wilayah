<?php

namespace App\Http\Controllers;

use App\Models\pembinaankecamatan;
use Illuminate\Http\Request;

class PembinaankecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $data = PembinaanKecamatan::orderBy('tanggal', 'desc')->get();
        return view('pages.perkembangan.pemerintahdesadankelurahan.pembinaankecamatan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.perkembangan.pemerintahdesadankelurahan.pembinaankecamatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'fasilitasi_penyusunan_perdes' => 'nullable|integer|min:0',
            'fasilitasi_administrasi_tata_pemerintahan' => 'nullable|integer|min:0',
            'fasilitasi_pengelolaan_keuangan' => 'nullable|integer|min:0',
            'fasilitasi_urusan_otonomi' => 'nullable|integer|min:0',
            'fasilitasi_penerapan_peraturan' => 'nullable|integer|min:0',
            'fasilitasi_penyediaan_data' => 'nullable|integer|min:0',
            'fasilitasi_pelaksanaan_tugas' => 'nullable|integer|min:0',
            'fasilitasi_ketenteraman' => 'nullable|integer|min:0',
            'fasilitasi_penetapan_penguatan' => 'nullable|integer|min:0',
            'penanggulangan_kemiskinan_apbd' => 'nullable|integer|min:0',
            'fasilitasi_partisipasi_masyarakat' => 'nullable|integer|min:0',
            'fasilitasi_kerjasama_desa' => 'nullable|integer|min:0',
            'fasilitasi_program_pemberdayaan' => 'nullable|integer|min:0',
            'fasilitasi_kerjasama_lembaga' => 'nullable|integer|min:0',
            'fasilitasi_bantuan_teknis' => 'nullable|integer|min:0',
            'fasilitasi_koordinasi_unit_kerja' => 'nullable|integer|min:0',
        ]);
        PembinaanKecamatan::create($validated);
        return redirect()->route('perkembangan.pemerintahdesadankelurahan.pembinaankecamatan.index')->with('success', 'Data Pembinaan Kecamatan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
         $pembinaankecamatan = PembinaanKecamatan::findOrFail($id);
        return view('pages.perkembangan.pemerintahdesadankelurahan.pembinaankecamatan.show', compact('pembinaankecamatan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pembinaankecamatan = PembinaanKecamatan::findOrFail($id);
        return view('pages.perkembangan.pemerintahdesadankelurahan.pembinaankecamatan.edit', compact('pembinaankecamatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
           'tanggal' => 'required|date',
            'fasilitasi_penyusunan_perdes' => 'nullable|integer|min:0',
            'fasilitasi_administrasi_tata_pemerintahan' => 'nullable|integer|min:0',
            'fasilitasi_pengelolaan_keuangan' => 'nullable|integer|min:0',
            'fasilitasi_urusan_otonomi' => 'nullable|integer|min:0',
            'fasilitasi_penerapan_peraturan' => 'nullable|integer|min:0',
            'fasilitasi_penyediaan_data' => 'nullable|integer|min:0',
            'fasilitasi_pelaksanaan_tugas' => 'nullable|integer|min:0',
            'fasilitasi_ketenteraman' => 'nullable|integer|min:0',
            'fasilitasi_penetapan_penguatan' => 'nullable|integer|min:0',
            'penanggulangan_kemiskinan_apbd' => 'nullable|integer|min:0',
            'fasilitasi_partisipasi_masyarakat' => 'nullable|integer|min:0',
            'fasilitasi_kerjasama_desa' => 'nullable|integer|min:0',
            'fasilitasi_program_pemberdayaan' => 'nullable|integer|min:0',
            'fasilitasi_kerjasama_lembaga' => 'nullable|integer|min:0',
            'fasilitasi_bantuan_teknis' => 'nullable|integer|min:0',
            'fasilitasi_koordinasi_unit_kerja' => 'nullable|integer|min:0',
        ]);
        $pembinaankecamatan = PembinaanKecamatan::findOrFail($id);
        $pembinaankecamatan->update($validated);
        return redirect()->route('perkembangan.pemerintahdesadankelurahan.pembinaankecamatan.index')->with('success', 'Data Pembinaan Kecamatan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pembinaankecamatan = Pembinaankecamatan::findOrFail($id);
        $pembinaankecamatan->delete();
        return redirect()->route('perkembangan.pemerintahdesadankelurahan.pembinaankecamatan.index')
        ->with('success', 'Data Pembinaan Kecamatan berhasil dihapus.');    
    }
}
