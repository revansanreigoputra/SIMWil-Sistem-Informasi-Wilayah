<?php

namespace App\Http\Controllers;

use App\Models\pembinaanprovinsi;
use App\Models\Desa;
use Illuminate\Http\Request;

class PembinaanprovinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desaId = session('desa_id');
        $data = PembinaanProvinsi::where('desa_id',$desaId)->with(['desa'])->orderBy('tanggal', 'desc')->get();
        return view('pages.perkembangan.pemerintahdesadankelurahan.pembinaanprovinsi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $desas = Desa::orderBy('nama_desa')->get();
        return view('pages.perkembangan.pemerintahdesadankelurahan.pembinaanprovinsi.create', compact('desas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'pedoman_pelaksanaan_tugas' => 'required|in:Ada,Tidak Ada',
            'pedoman_bantuan_keuangan' => 'required|in:Ada,Tidak Ada',
            'kegiatan_fasilitasi_keberadaan' => 'required|in:Ada,Tidak Ada',
            'fasilitasi_pelaksanaan_pedoman' => 'required|in:Ada,Tidak Ada',
            'jumlah_kegiatan_pendidikan' => 'nullable|integer|min:0',
            'kegiatan_penanggulangan_kemiskinan' => 'nullable|integer|min:0',
            'kegiatan_penanganan_bencana' => 'nullable|integer|min:0',
            'kegiatan_peningkatan_pendapatan' => 'nullable|integer|min:0',
            'kegiatan_penyediaan_sarana' => 'nullable|integer|min:0',
            'kegiatan_pemanfaatan_sda' => 'nullable|integer|min:0',
            'kegiatan_pengembangan_sosial' => 'nullable|integer|min:0',
            'pedoman_pendataan' => 'nullable|integer|min:0',
            'pemberian_sanksi' => 'nullable|integer|min:0',
        ]);
        $validated['desa_id'] = session('desa_id');
        PembinaanProvinsi::create($validated);
        return redirect()->route('perkembangan.pemerintahdesadankelurahan.pembinaanprovinsi.index')->with('success', 'Data Pembinaan Pusat berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pembinaan = pembinaanprovinsi::with(['desa'])->findOrFail($id);
        $pembinaan->load(['desa']);
        return view('pages.perkembangan.pemerintahdesadankelurahan.pembinaanprovinsi.show', compact('pembinaan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pembinaan = PembinaanProvinsi::findOrFail($id);
        $desas = Desa::orderBy('nama_desa')->get();
        return view('pages.perkembangan.pemerintahdesadankelurahan.pembinaanprovinsi.edit', compact('pembinaan', 'desas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
         $validated = $request->validate([
            'tanggal' => 'required|date',
            'pedoman_pelaksanaan_tugas' => 'required|in:Ada,Tidak Ada',
            'pedoman_bantuan_keuangan' => 'required|in:Ada,Tidak Ada',
            'kegiatan_fasilitasi_keberadaan' => 'required|in:Ada,Tidak Ada',
            'fasilitasi_pelaksanaan_pedoman' => 'required|in:Ada,Tidak Ada',
            'jumlah_kegiatan_pendidikan' => 'nullable|integer|min:0',
            'kegiatan_penanggulangan_kemiskinan' => 'nullable|integer|min:0',
            'kegiatan_penanganan_bencana' => 'nullable|integer|min:0',
            'kegiatan_peningkatan_pendapatan' => 'nullable|integer|min:0',
            'kegiatan_penyediaan_sarana' => 'nullable|integer|min:0',
            'kegiatan_pemanfaatan_sda' => 'nullable|integer|min:0',
            'kegiatan_pengembangan_sosial' => 'nullable|integer|min:0',
            'pedoman_pendataan' => 'nullable|integer|min:0',
            'pemberian_sanksi' => 'nullable|integer|min:0',
        ]);

        $pembinaan = PembinaanProvinsi::findOrFail($id);
        $pembinaan->update($validated);
        return redirect()->route('perkembangan.pemerintahdesadankelurahan.pembinaanprovinsi.index')->with('success', 'Data Pembinaan Provinsi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pembinaan = PembinaanProvinsi::findOrFail($id);
        $pembinaan->delete();

        return redirect()->route('perkembangan.pemerintahdesadankelurahan.pembinaanprovinsi.index')->with('success', 'Data Pembinaan Provinsi berhasil dihapus.');
    }
}
