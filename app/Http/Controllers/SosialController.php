<?php

namespace App\Http\Controllers;

use App\Models\sosial;
use App\Models\Desa;
use Illuminate\Http\Request;

class SosialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Sosial::with(['desa'])->orderBy('tanggal', 'desc')->get();
        return view('pages.perkembangan.keamanandanketertiban.sosial.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $desas = Desa::orderBy('nama_desa')->get();
        return view('pages.perkembangan.keamanandanketertiban.sosial.create', compact('desas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'id_desa' => 'required|exists:desas,id',
            'jumlah_anak_remaja_preman_pengangguran' => 'nullable|integer|min:0',
            'jumlah_gelandangan' => 'nullable|integer|min:0',
            'jumlah_pengemis_jalanan' => 'nullable|integer|min:0',
            'jumlah_anak_jalanan_terlantar' => 'nullable|integer|min:0',
            'jumlah_lansia_terlantar' => 'nullable|integer|min:0',
            'jumlah_orang_gila_stress_cacat_mental' => 'nullable|integer|min:0',
            'jumlah_orang_cacat_fisik' => 'nullable|integer|min:0',
            'jumlah_orang_kelainan_kulit' => 'nullable|integer|min:0',
            'jumlah_tidur_kolong_jembatan' => 'nullable|integer|min:0',
            'jumlah_rumah_kawasan_kumuh' => 'nullable|integer|min:0',
            'jumlah_panti_jompo' => 'nullable|integer|min:0',
            'jumlah_panti_asuhan_anak' => 'nullable|integer|min:0',
            'jumlah_rumah_singgah_jalanan' => 'nullable|integer|min:0',
            'jumlah_penghuni_jalur_hijau_taman' => 'nullable|integer|min:0',
            'jumlah_penghuni_bantaran_sungai' => 'nullable|integer|min:0',
            'jumlah_penghuni_pinggiran_rel' => 'nullable|integer|min:0',
            'jumlah_penghuni_liar_lahan_fasilitas_umum' => 'nullable|integer|min:0',
            'jumlah_kelompok_terasing_terlantar_primitif' => 'nullable|integer|min:0',
            'jumlah_anak_yatim_0_18' => 'nullable|integer|min:0',
            'jumlah_anak_piatu_0_18' => 'nullable|integer|min:0',
            'jumlah_anak_yatim_piatu_0_18' => 'nullable|integer|min:0',
            'jumlah_janda' => 'nullable|integer|min:0',
            'jumlah_duda' => 'nullable|integer|min:0',
            'jumlah_anak_tidak_sekolah_sd' => 'nullable|integer|min:0',
            'jumlah_anak_tidak_sekolah_sltp' => 'nullable|integer|min:0',
            'jumlah_anak_tidak_sekolah_slta' => 'nullable|integer|min:0',
            'jumlah_anak_bekerja_membantu_keluarga' => 'nullable|integer|min:0',
            'jumlah_perempuan_kepala_keluarga' => 'nullable|integer|min:0',
            'jumlah_penduduk_eks_napi' => 'nullable|integer|min:0',
            'jumlah_rentan_banjir' => 'nullable|integer|min:0',
            'jumlah_rentan_gunung_berapi' => 'nullable|integer|min:0',
            'jumlah_rentan_tsunami' => 'nullable|integer|min:0',
            'jumlah_rentan_gempa_bumi' => 'nullable|integer|min:0',
            'jumlah_rentan_kebakaran_rumah' => 'nullable|integer|min:0',
            'jumlah_rentan_kekeringan' => 'nullable|integer|min:0',
            'jumlah_rentan_longsor' => 'nullable|integer|min:0',
            'jumlah_rentan_kebakaran_hutan' => 'nullable|integer|min:0',
            'jumlah_rentan_kelaparan' => 'nullable|integer|min:0',
            'jumlah_rentan_air_bersih' => 'nullable|integer|min:0',
            'jumlah_rentan_lahan_kritis' => 'nullable|integer|min:0',
            'jumlah_rentan_padat_kumuh' => 'nullable|integer|min:0',
            'jumlah_warga_pendatang_tanpa_identitas' => 'nullable|integer|min:0',
            'jumlah_warga_pendatang_pekerja_musiman' => 'nullable|integer|min:0',
            
        ]);
        Sosial::create($validated);
        return redirect()->route('perkembangan.keamanandanketertiban.sosial.index')->with('success', 'Data Sosial berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $sosial = sosial::findOrFail($id);
        $sosial->load(['desa']);
        return view('pages.perkembangan.keamanandanketertiban.sosial.show', compact('sosial'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sosial = sosial::findOrFail($id);
        $desas = Desa::orderBy('nama_desa')->get();
        return view('pages.perkembangan.keamanandanketertiban.sosial.edit', compact('sosial', 'desas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
           'tanggal' => 'required|date',
            'id_desa' => 'required|exists:desas,id',
            'jumlah_anak_remaja_preman_pengangguran' => 'nullable|integer|min:0',
            'jumlah_gelandangan' => 'nullable|integer|min:0',
            'jumlah_pengemis_jalanan' => 'nullable|integer|min:0',
            'jumlah_anak_jalanan_terlantar' => 'nullable|integer|min:0',
            'jumlah_lansia_terlantar' => 'nullable|integer|min:0',
            'jumlah_orang_gila_stress_cacat_mental' => 'nullable|integer|min:0',
            'jumlah_orang_cacat_fisik' => 'nullable|integer|min:0',
            'jumlah_orang_kelainan_kulit' => 'nullable|integer|min:0',
            'jumlah_tidur_kolong_jembatan' => 'nullable|integer|min:0',
            'jumlah_rumah_kawasan_kumuh' => 'nullable|integer|min:0',
            'jumlah_panti_jompo' => 'nullable|integer|min:0',
            'jumlah_panti_asuhan_anak' => 'nullable|integer|min:0',
            'jumlah_rumah_singgah_jalanan' => 'nullable|integer|min:0',
            'jumlah_penghuni_jalur_hijau_taman' => 'nullable|integer|min:0',
            'jumlah_penghuni_bantaran_sungai' => 'nullable|integer|min:0',
            'jumlah_penghuni_pinggiran_rel' => 'nullable|integer|min:0',
            'jumlah_penghuni_liar_lahan_fasilitas_umum' => 'nullable|integer|min:0',
            'jumlah_kelompok_terasing_terlantar_primitif' => 'nullable|integer|min:0',
            'jumlah_anak_yatim_0_18' => 'nullable|integer|min:0',
            'jumlah_anak_piatu_0_18' => 'nullable|integer|min:0',
            'jumlah_anak_yatim_piatu_0_18' => 'nullable|integer|min:0',
            'jumlah_janda' => 'nullable|integer|min:0',
            'jumlah_duda' => 'nullable|integer|min:0',
            'jumlah_anak_tidak_sekolah_sd' => 'nullable|integer|min:0',
            'jumlah_anak_tidak_sekolah_sltp' => 'nullable|integer|min:0',
            'jumlah_anak_tidak_sekolah_slta' => 'nullable|integer|min:0',
            'jumlah_anak_bekerja_membantu_keluarga' => 'nullable|integer|min:0',
            'jumlah_perempuan_kepala_keluarga' => 'nullable|integer|min:0',
            'jumlah_penduduk_eks_napi' => 'nullable|integer|min:0',
            'jumlah_rentan_banjir' => 'nullable|integer|min:0',
            'jumlah_rentan_gunung_berapi' => 'nullable|integer|min:0',
            'jumlah_rentan_tsunami' => 'nullable|integer|min:0',
            'jumlah_rentan_gempa_bumi' => 'nullable|integer|min:0',
            'jumlah_rentan_kebakaran_rumah' => 'nullable|integer|min:0',
            'jumlah_rentan_kekeringan' => 'nullable|integer|min:0',
            'jumlah_rentan_longsor' => 'nullable|integer|min:0',
            'jumlah_rentan_kebakaran_hutan' => 'nullable|integer|min:0',
            'jumlah_rentan_kelaparan' => 'nullable|integer|min:0',
            'jumlah_rentan_air_bersih' => 'nullable|integer|min:0',
            'jumlah_rentan_lahan_kritis' => 'nullable|integer|min:0',
            'jumlah_rentan_padat_kumuh' => 'nullable|integer|min:0',
            'jumlah_warga_pendatang_tanpa_identitas' => 'nullable|integer|min:0',
            'jumlah_warga_pendatang_pekerja_musiman' => 'nullable|integer|min:0',
        ]);
        $sosial = sosial::findOrFail($id);
        $sosial->update($validated);
        return redirect()->route('perkembangan.keamanandanketertiban.sosial.index')->with('success', 'Data Sosial berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $sosial = sosial::findOrFail($id);
        $sosial->delete();
        return redirect()->route('perkembangan.keamanandanketertiban.sosial.index')->with('success', 'Data Sosial berhasil dihapus.');
    }
}
