<?php

namespace App\Http\Controllers;

use App\Models\pembinaankabupaten;
use Illuminate\Http\Request;

class PembinaankabupatenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $data = Pembinaankabupaten::orderBy('tanggal', 'desc')->get();
        return view('pages.perkembangan.pemerintahdesadankelurahan.pembinaankabupaten.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.perkembangan.pemerintahdesadankelurahan.pembinaankabupaten.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
            'tanggal' => 'required|date',
            'pelimpahan_tugas' => 'required|in:Ada,Tidak Ada',
            'pengaturan_kewenangan' => 'required|in:Ada,Tidak Ada',
            'pedoman_pelaksanaan_tugas' => 'required|in:Ada,Tidak Ada',
            'pedoman_penyusunan_peraturan' => 'required|in:Ada,Tidak Ada',
            'pedoman_penyusunan_perencanaan' => 'required|in:Ada,Tidak Ada',
            'kegiatan_fasilitasi_keberadaan' => 'required|in:Ada,Tidak Ada',
            'penetapan_pembiayaan' => 'required|in:Ada,Tidak Ada',
            'fasilitasi_pelaksanaan_pedoman' => 'required|in:Ada,Tidak Ada',
            'jumlah_kegiatan_pendidikan' => 'nullable|integer|min:0',
            'kegiatan_penanggulangan_kemiskinan' => 'nullable|integer|min:0',
            'kegiatan_penanganan_bencana' => 'nullable|integer|min:0',
            'kegiatan_peningkatan_pendapatan' => 'nullable|integer|min:0',
            'fasilitasi_penetapan_pedoman' => 'required|in:Ada,Tidak Ada',
            'kegiatan_fasilitasi_lanjutan' => 'required|in:Ada,Tidak Ada',
            'pedoman_pendataan' => 'required|in:Ada,Tidak Ada',
            'program_pemeliharaan_motivasi' => 'required|in:Ada,Tidak Ada',
            'pemberian_penghargaan' => 'required|in:Ada,Tidak Ada',
            'pemberian_sanksi' => 'required|in:Ada,Tidak Ada',
            'pengawasan_keuangan' => 'required|in:Ada,Tidak Ada',
        ]);
         Pembinaankabupaten::create($validated);
        return redirect()->route('perkembangan.pemerintahdesadankelurahan.pembinaankabupaten.index')->with('success', 'Data Pembinaan Kabupaten berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pembinaankabupaten = PembinaanKabupaten::findOrFail($id);
        return view('pages.perkembangan.pemerintahdesadankelurahan.pembinaankabupaten.show', compact('pembinaankabupaten'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pembinaankabupaten = PembinaanKabupaten::findOrFail($id);
        return view('pages.perkembangan.pemerintahdesadankelurahan.pembinaankabupaten.edit', compact('pembinaankabupaten'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'pelimpahan_tugas' => 'required|in:Ada,Tidak Ada',
            'pengaturan_kewenangan' => 'required|in:Ada,Tidak Ada',
            'pedoman_pelaksanaan_tugas' => 'required|in:Ada,Tidak Ada',
            'pedoman_penyusunan_peraturan' => 'required|in:Ada,Tidak Ada',
            'pedoman_penyusunan_perencanaan' => 'required|in:Ada,Tidak Ada',
            'kegiatan_fasilitasi_keberadaan' => 'required|in:Ada,Tidak Ada',
            'penetapan_pembiayaan' => 'required|in:Ada,Tidak Ada',
            'fasilitasi_pelaksanaan_pedoman' => 'required|in:Ada,Tidak Ada',
            'jumlah_kegiatan_pendidikan' => 'nullable|integer|min:0',
            'kegiatan_penanggulangan_kemiskinan' => 'nullable|integer|min:0',
            'kegiatan_penanganan_bencana' => 'nullable|integer|min:0',
            'kegiatan_peningkatan_pendapatan' => 'nullable|integer|min:0',
            'fasilitasi_penetapan_pedoman' => 'required|in:Ada,Tidak Ada',
            'kegiatan_fasilitasi_lanjutan' => 'required|in:Ada,Tidak Ada',
            'pedoman_pendataan' => 'required|in:Ada,Tidak Ada',
            'program_pemeliharaan_motivasi' => 'required|in:Ada,Tidak Ada',
            'pemberian_penghargaan' => 'required|in:Ada,Tidak Ada',
            'pemberian_sanksi' => 'required|in:Ada,Tidak Ada',
            'pengawasan_keuangan' => 'required|in:Ada,Tidak Ada',
        ]);
        $pembinaankabupaten = pembinaankabupaten::findOrFail($id);
        $pembinaankabupaten->update($validated);
        return redirect()->route('perkembangan.pemerintahdesadankelurahan.pembinaankabupaten.index')->with('success', 'Data Pembinaan Kabupaten berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pembinaankabupaten = Pembinaankabupaten::findOrFail($id);
        $pembinaankabupaten->delete();

        return redirect()->route('perkembangan.pemerintahdesadankelurahan.pembinaankabupaten.index')
            ->with('success', 'Data Pembinaan Kabupaten berhasil dihapus.');
    }
}
