<?php

namespace App\Http\Controllers;

use App\Models\pembinaanpusat;
use Illuminate\Http\Request;

class PembinaanpusatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $data = PembinaanPusat::orderBy('tanggal', 'desc')->get();
        return view('pages.perkembangan.pemerintahdesadankelurahan.pembinaanpusat.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.perkembangan.pemerintahdesadankelurahan.pembinaanpusat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'pedoman_pelaksanaan_urusan' => 'nullable|in:Ada,Tidak Ada',
            'pedoman_bantuan_pembiayaan' => 'nullable|in:Ada,Tidak Ada',
            'pedoman_administrasi' => 'nullable|in:Ada,Tidak Ada',
            'pedoman_tanda_jabatan' => 'nullable|in:Ada,Tidak Ada',
            'pedoman_pendidikan_pelatihan' => 'nullable|in:Ada,Tidak Ada',
            'jumlah_bimbingan' => 'nullable|numeric',
            'jumlah_kegiatan_pendidikan' => 'nullable|numeric',
            'jumlah_penelitian_pengkajian' => 'nullable|numeric',
            'jumlah_kegiatan_terkait_apbn' => 'nullable|numeric',
            'jumlah_penghargaan' => 'nullable|numeric',
            'jumlah_sanksi' => 'nullable|numeric', 
        ]);

        PembinaanPusat::create($validated);

        return redirect()->route('perkembangan.pemerintahdesadankelurahan.pembinaanpusat.index')->with('success', 'Data Pembinaan Pusat berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(pembinaanpusat $pembinaanpusat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pembinaan = PembinaanPusat::findOrFail($id);
        return view('pages.perkembangan.pemerintahdesadankelurahan.pembinaanpusat.edit', compact('pembinaan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'pedoman_pelaksanaan_urusan' => 'nullable|in:Ada,Tidak Ada',
            'pedoman_bantuan_pembiayaan' => 'nullable|in:Ada,Tidak Ada',
            'pedoman_administrasi' => 'nullable|in:Ada,Tidak Ada',
            'pedoman_tanda_jabatan' => 'nullable|in:Ada,Tidak Ada',
            'pedoman_pendidikan_pelatihan' => 'nullable|in:Ada,Tidak Ada',
            'jumlah_bimbingan' => 'nullable|numeric',
            'jumlah_kegiatan_pendidikan' => 'nullable|numeric',
            'jumlah_penelitian_pengkajian' => 'nullable|numeric',
            'jumlah_kegiatan_terkait_apbn' => 'nullable|numeric',
            'jumlah_penghargaan' => 'nullable|numeric',
            'jumlah_sanksi' => 'nullable|numeric',
        ]);

        $pembinaan = PembinaanPusat::findOrFail($id);
        $pembinaan->update($validated);

        return redirect()->route('perkembangan.pemerintahdesadankelurahan.pembinaanpusat.index')->with('success', 'Data Pembinaan Pusat berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pembinaan = PembinaanPusat::findOrFail($id);
        $pembinaan->delete();

        return redirect()->route('perkembangan.pemerintahdesadankelurahan.pembinaanpusat.index')->with('success', 'Data Pembinaan Pusat berhasil dihapus.');
    }
}
