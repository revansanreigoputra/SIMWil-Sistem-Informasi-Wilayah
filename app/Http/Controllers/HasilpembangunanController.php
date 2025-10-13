<?php

namespace App\Http\Controllers;

use App\Models\hasilpembangunan;
use App\Models\Desa;
use Illuminate\Http\Request;

class HasilpembangunanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = hasilpembangunan::with(['desa'])->orderBy('tanggal', 'desc')->get();
        return view('pages.perkembangan.peransertamasyarakat.hasilpembangunan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $desas = Desa::orderBy('nama_desa')->get();
        return view('pages.perkembangan.peransertamasyarakat.hasilpembangunan.create', compact('desas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'id_desa' => 'required|exists:desas,id',
            'jumlah_masyarakat_terlibat' => 'nullable|integer',
            'jumlah_penduduk_dilibatkan' => 'nullable|integer',
            'jumlah_kegiatan_masyarakat' => 'nullable|integer',
            'jumlah_kegiatan_pihak_ketiga' => 'nullable|integer',
            'jumlah_kegiatan_luar_musrenbang' => 'nullable|integer',
            'jumlah_masyarakat_disetujui_rk' => 'nullable|integer',
            'usulan_pemerintah_desa_kelurahan_disetujui_rk' => 'nullable|integer',
            'usulan_rencana_kerja_program' => 'nullable|integer',
            'penyelenggaraan_musyawarah' => 'nullable|in:Ada,Tidak Ada',
            'pelaksanaan_kegiatan_masyarakat' => 'nullable|integer',
            'pelaksanaan_kegiatan_tersisa' => 'nullable|in:Ada,Tidak Ada',
            'jumlah_kasus_penyimpangan_kepada_kepala_desa' => 'nullable|integer',
            'jumlah_kasus_penyimpangan_desa_kelurahan' => 'nullable|integer',
            'jumlah_kasus_penyimpangan_desa_kelurahan_hukum' => 'nullable|integer',
            'jenis_kegiatan_pemeliharaan' => 'nullable|string|max:255',
            'jumlah_kegiatan_didanai_apb_desa' => 'nullable|integer',
            'jumlah_kegiatan_didanai_apb_kabupaten' => 'nullable|integer',
            'jumlah_kegiatan_didanai_apbd_provinsi' => 'nullable|integer',
            'jumlah_kegiatan_didanai_apbn' => 'nullable|integer',
        ]);

        HasilPembangunan::create($validated);

        return redirect()->route('perkembangan.peransertamasyarakat.hasilpembangunan.index')->with('success', 'Data hasil pembangunan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $hasilpembangunan = hasilpembangunan::findOrFail($id);
        $hasilpembangunan->load(['desa']);
        return view('pages.perkembangan.peransertamasyarakat.hasilpembangunan.show', compact('hasilpembangunan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $hasilpembangunan = hasilpembangunan::findOrFail($id);
        $desas = Desa::orderBy('nama_desa')->get();
        return view('pages.perkembangan.peransertamasyarakat.hasilpembangunan.edit', compact('hasilpembangunan', 'desas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'id_desa' => 'required|exists:desas,id',
            'jumlah_masyarakat_terlibat' => 'nullable|integer',
            'jumlah_penduduk_dilibatkan' => 'nullable|integer',
            'jumlah_kegiatan_masyarakat' => 'nullable|integer',
            'jumlah_kegiatan_pihak_ketiga' => 'nullable|integer',
            'jumlah_kegiatan_luar_musrenbang' => 'nullable|integer',
            'jumlah_masyarakat_disetujui_rk' => 'nullable|integer',
            'usulan_pemerintah_desa_kelurahan_disetujui_rk' => 'nullable|integer',
            'usulan_rencana_kerja_program' => 'nullable|integer',
            'penyelenggaraan_musyawarah' => 'nullable|in:Ada,Tidak Ada',
            'pelaksanaan_kegiatan_masyarakat' => 'nullable|integer',
            'pelaksanaan_kegiatan_tersisa' => 'nullable|in:Ada,Tidak Ada',
            'jumlah_kasus_penyimpangan_kepada_kepala_desa' => 'nullable|integer',
            'jumlah_kasus_penyimpangan_desa_kelurahan' => 'nullable|integer',
            'jumlah_kasus_penyimpangan_desa_kelurahan_hukum' => 'nullable|integer',
            'jenis_kegiatan_pemeliharaan' => 'nullable|string|max:255',
            'jumlah_kegiatan_didanai_apb_desa' => 'nullable|integer',
            'jumlah_kegiatan_didanai_apb_kabupaten' => 'nullable|integer',
            'jumlah_kegiatan_didanai_apbd_provinsi' => 'nullable|integer',
            'jumlah_kegiatan_didanai_apbn' => 'nullable|integer',
        ]);
        $hasilpembangunan = hasilpembangunan::findOrFail($id);
        $hasilpembangunan->update($validated);
        return redirect()->route('perkembangan.peransertamasyarakat.hasilpembangunan.index')->with('success', 'Data hasil pembangunan berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $hasilpembangunan = hasilpembangunan::findOrFail($id);
        $hasilpembangunan->delete();
        return redirect()->route('perkembangan.peransertamasyarakat.hasilpembangunan.index')->with('success', 'Data hasil pembangunan berhasil dihapus.');
    }
    public function getDesasByKecamatan($id_kecamatan)
    {
        $desas = Desa::where('id_kecamatan', $id_kecamatan)->get();
        return response()->json($desas);
    }
}
