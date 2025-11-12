<?php

namespace App\Http\Controllers;

use App\Models\musrenbangdesa;
use App\Models\Desa;
use Illuminate\Http\Request;

class MusrenbangdesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desaId = session('desa_id');
        $data = musrenbangdesa::where('desa_id',$desaId)->with(['desa'])->orderBy('tanggal', 'desc')->get(); 
        return view('pages.perkembangan.peransertamasyarakat.musrenbangdesa.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $desas = Desa::orderBy('nama_desa')->get();
        return view('pages.perkembangan.peransertamasyarakat.musrenbangdesa.create', compact('desas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'jumlah_musrenbang_desa_kelurahan' => 'nullable|integer',
            'jumlah_kehadiran_masyarakat' => 'nullable|integer',
            'jumlah_peserta_laki' => 'nullable|integer',
            'jumlah_peserta_perempuan' => 'nullable|integer',
            'jumlah_musrenbang_antar_desa' => 'nullable|integer',
            'penggunaan_profil_desa' => 'required|in:Ada,Tidak Ada',
            'penggunaan_data_bps' => 'required|in:Ada,Tidak Ada',
            'pelibatan_masyarakat' => 'required|in:Ada,Tidak Ada',
            'usulan_masyarakat_disetujui' => 'nullable|integer',
            'usulan_pemerintah_desa_disetujui' => 'nullable|integer',
            'usulan_rencana_kerja_pemkab' => 'nullable|integer',
            'usulan_rencana_kerja_ditolak' => 'nullable|integer',
            'dokumen_rkpdes' => 'required|in:Ada,Tidak Ada',
            'dokumen_rpjmdes' => 'required|in:Ada,Tidak Ada',
            'dokumen_hasil_musrenbang' => 'required|in:Ada,Tidak Ada',
            'jumlah_kegiatan_terdanai' => 'nullable|integer',
            'jumlah_kegiatan_tidak_sesuai' => 'nullable|integer',
        ]);
        $validated['desa_id'] = session('desa_id');
        musrenbangdesa::create($validated);
        return redirect()->route('perkembangan.peransertamasyarakat.musrenbangdesa.index')->with('success', 'Data Musrenbang Desa berhasil ditambahkan.');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $musrenbangdesa = musrenbangdesa::with(['desa'])->findOrFail($id);
        $musrenbangdesa->load(['desa']); // Memuat relasi desa
        return view('pages.perkembangan.peransertamasyarakat.musrenbangdesa.show', compact('musrenbangdesa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $musrenbangdesa = musrenbangdesa::findOrFail($id);
        $desas = Desa::orderBy('nama_desa')->get();
        return view('pages.perkembangan.peransertamasyarakat.musrenbangdesa.edit', compact('musrenbangdesa', 'desas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'jumlah_musrenbang_desa_kelurahan' => 'nullable|integer',
            'jumlah_kehadiran_masyarakat' => 'nullable|integer',
            'jumlah_peserta_laki' => 'nullable|integer',
            'jumlah_peserta_perempuan' => 'nullable|integer',
            'jumlah_musrenbang_antar_desa' => 'nullable|integer',
            'penggunaan_profil_desa' => 'required|in:Ada,Tidak Ada',
            'penggunaan_data_bps' => 'required|in:Ada,Tidak Ada',
            'pelibatan_masyarakat' => 'required|in:Ada,Tidak Ada',
            'usulan_masyarakat_disetujui' => 'nullable|integer',
            'usulan_pemerintah_desa_disetujui' => 'nullable|integer',
            'usulan_rencana_kerja_pemkab' => 'nullable|integer',
            'usulan_rencana_kerja_ditolak' => 'nullable|integer',
            'dokumen_rkpdes' => 'required|in:Ada,Tidak Ada',
            'dokumen_rpjmdes' => 'required|in:Ada,Tidak Ada',
            'dokumen_hasil_musrenbang' => 'required|in:Ada,Tidak Ada',
            'jumlah_kegiatan_terdanai' => 'nullable|integer',
            'jumlah_kegiatan_tidak_sesuai' => 'nullable|integer',
        ]);
        $musrenbangdesa = musrenbangdesa::findOrFail($id);
        $musrenbangdesa->update($validated);
        return redirect()->route('perkembangan.peransertamasyarakat.musrenbangdesa.index')->with('success', 'Data Musrenbang Desa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $musrenbangdesa = musrenbangdesa::findOrFail($id);  
        $musrenbangdesa->delete();
        return redirect()->route('perkembangan.peransertamasyarakat.musrenbangdesa.index')->with('success', 'Data Musrenbang Desa berhasil dihapus.');    
    }
}
