<?php

namespace App\Http\Controllers;

use App\Models\sistemkeamanan;
use App\Models\Desa;
use Illuminate\Http\Request;

class SistemkeamananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = sistemkeamanan::with(['desa'])->orderBy('tanggal', 'desc')->get();
        return view('pages.perkembangan.keamanandanketertiban.sistemkeamanan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $desas = Desa::orderBy('nama_desa')->get();
        return view('pages.perkembangan.keamanandanketertiban.sistemkeamanan.create', compact('desas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'id_desa' => 'required|exists:desas,id',
            'organisasi_siskamling' => 'nullable|in:Ada,Tidak Ada',
            'organisasi_pertahanan_sipil' => 'nullable|in:Ada,Tidak Ada',
            'jumlah_rt_atau_pos_ronda' => 'nullable|integer|min:0',
            'jumlah_anggota_hansip_dan_linmas' => 'nullable|integer|min:0',
            'jadwal_kegiatan_siskamling' => 'nullable|in:Ada,Tidak Ada',
            'buku_anggota_hansip_linmas' => 'nullable|in:Ada,Tidak Ada',
            'jumlah_kelompok_satpam_swasta' => 'nullable|integer|min:0',
            'jumlah_pembinaan_siskamling' => 'nullable|integer|min:0',
            'jumlah_pos_jaga_induk_desa' => 'nullable|integer|min:0',
        ]);
        sistemkeamanan::create($validated);
        return redirect()->route('perkembangan.keamanandanketertiban.sistemkeamanan.index')->with('success', 'Data Sistem Keamanan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $sistemkeamanan = sistemkeamanan::findOrFail($id);
        $sistemkeamanan->load(['desa']);
        return view('pages.perkembangan.keamanandanketertiban.sistemkeamanan.show', compact('sistemkeamanan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sistemkeamanan = sistemkeamanan::findOrFail($id);
        $desas = Desa::orderBy('nama_desa')->get();
        return view('pages.perkembangan.keamanandanketertiban.sistemkeamanan.edit', compact('sistemkeamanan', 'desas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'id_desa' => 'required|exists:desas,id',
            'organisasi_siskamling' => 'nullable|in:Ada,Tidak Ada',
            'organisasi_pertahanan_sipil' => 'nullable|in:Ada,Tidak Ada',
            'jumlah_rt_atau_pos_ronda' => 'nullable|integer|min:0',
            'jumlah_anggota_hansip_dan_linmas' => 'nullable|integer|min:0',
            'jadwal_kegiatan_siskamling' => 'nullable|in:Ada,Tidak Ada',
            'buku_anggota_hansip_linmas' => 'nullable|in:Ada,Tidak Ada',
            'jumlah_kelompok_satpam_swasta' => 'nullable|integer|min:0',
            'jumlah_pembinaan_siskamling' => 'nullable|integer|min:0',
            'jumlah_pos_jaga_induk_desa' => 'nullable|integer|min:0',
        ]);
        $sistemkeamanan = sistemkeamanan::findOrFail($id);
        $sistemkeamanan->update($validated);
        return redirect()->route('perkembangan.keamanandanketertiban.sistemkeamanan.index')->with('success', 'Data Sistem Keamanan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $sistemkeamanan = sistemkeamanan::findOrFail($id);
        $sistemkeamanan->delete();
        return redirect()->route('perkembangan.keamanandanketertiban.sistemkeamanan.index')->with('success', 'Data Sistem Keamanan berhasil dihapus.');
    }
}
