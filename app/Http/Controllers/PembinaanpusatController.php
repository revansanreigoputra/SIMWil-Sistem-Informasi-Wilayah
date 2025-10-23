<?php

namespace App\Http\Controllers;

use App\Models\pembinaanpusat;
use App\Models\Desa;
use Illuminate\Http\Request;

class PembinaanpusatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $data = PembinaanPusat::with(['desa'])->orderBy('tanggal', 'desc')->get();
        return view('pages.perkembangan.pemerintahdesadankelurahan.pembinaanpusat.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $desas = Desa::orderBy('nama_desa')->get();
        return view('pages.perkembangan.pemerintahdesadankelurahan.pembinaanpusat.create', compact('desas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'id_desa' => 'required|exists:desas,id',
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
    public function show($id)
    {
        $pembinaan = PembinaanPusat::findOrFail($id);
        $pembinaan->load(['desa']);
        return view('pages.perkembangan.pemerintahdesadankelurahan.pembinaanpusat.show', compact('pembinaan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pembinaan = PembinaanPusat::findOrFail($id);
        $desas = Desa::orderBy('nama_desa')->get();
        return view('pages.perkembangan.pemerintahdesadankelurahan.pembinaanpusat.edit', compact('pembinaan', 'desas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'id_desa' => 'required|exists:desas,id',
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
    public function getDesasByKecamatan($id_kecamatan)
    {
        $desas = Desa::where('id_kecamatan', $id_kecamatan)->get();
        return response()->json($desas);
    }
}
