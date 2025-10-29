<?php

namespace App\Http\Controllers;

use App\Models\Jlahan;
use Illuminate\Http\Request;

class JlahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desaId = session('desa_id');
        $jlahans = Jlahan::with('desa')->where('desa_id', $desaId)->latest()->get();
        return view('pages.potensi.sda.jlahan.index', compact('jlahans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.potensi.sda.jlahan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'sawah_irigasi_teknis' => 'required|numeric|min:0',
            'sawah_irigasi_setengah_teknis' => 'required|numeric|min:0',
            'sawah_tadah_hujan' => 'required|numeric|min:0',
            'sawah_pasang_surut' => 'required|numeric|min:0',
            'luas_tanah_sawah' => 'required|numeric|min:0',
            'tanah_rawa' => 'required|numeric|min:0',
            'pasang_surut' => 'required|numeric|min:0',
            'lahan_gambut' => 'required|numeric|min:0',
            'situ_waduk_danau' => 'required|numeric|min:0',
            'luas_tanah_basah' => 'required|numeric|min:0',
            'tanah_ladang' => 'required|numeric|min:0',
            'pemukiman' => 'required|numeric|min:0',
            'pekarangan' => 'required|numeric|min:0',
            'luas_tanah_kering' => 'required|numeric|min:0',
            'perkebunan_rakyat' => 'required|numeric|min:0',
            'perkebunan_negara' => 'required|numeric|min:0',
            'perkebunan_swasta' => 'required|numeric|min:0',
            'perkebunan_perseorangan' => 'required|numeric|min:0',
            'luas_tanah_perkebunan' => 'required|numeric|min:0',
            'tanah_bengkok' => 'required|numeric|min:0',
            'tanah_titi_sara' => 'required|numeric|min:0',
            'kebun_desa' => 'required|numeric|min:0',
            'sawah_desa' => 'required|numeric|min:0',
            'kas_desa' => 'required|numeric|min:0',
            'lokasi_tanah_kas_desa' => 'nullable|string',
            'perkantoran_pemerintahan' => 'required|numeric|min:0',
            'ruang_publik_taman' => 'required|numeric|min:0',
            'tpu' => 'required|numeric|min:0',
            'tps' => 'required|numeric|min:0',
            'bangunan_pendidikan' => 'required|numeric|min:0',
            'pertokoan' => 'required|numeric|min:0',
            'fasilitas_pasar' => 'required|numeric|min:0',
            'terminal' => 'required|numeric|min:0',
            'jalan' => 'required|numeric|min:0',
            'daerah_tangkapan_air' => 'required|numeric|min:0',
            'usaha_perikanan' => 'required|numeric|min:0',
            'aliran_stutet' => 'required|numeric|min:0',
            'luas_tanah_fasilitas_umum' => 'required|numeric|min:0',
            'hutan_lindung' => 'required|numeric|min:0',
            'hutan_produksi_tetap' => 'required|numeric|min:0',
            'hutan_produksi_terbatas' => 'required|numeric|min:0',
            'hutan_produksi' => 'required|numeric|min:0',
            'hutan_konservasi' => 'required|numeric|min:0',
            'hutan_adat' => 'required|numeric|min:0',
            'hutan_asli' => 'required|numeric|min:0',
            'hutan_sekunder' => 'required|numeric|min:0',
            'hutan_buatan' => 'required|numeric|min:0',
            'hutan_mangrove' => 'required|numeric|min:0',
            'suaka_alam' => 'required|numeric|min:0',
            'suaka_margasatwa' => 'required|numeric|min:0',
            'hutan_suaka' => 'required|numeric|min:0',
            'hutan_rakyat' => 'required|numeric|min:0',
            'luas_tanah_hutan' => 'required|numeric|min:0',
            'luas_desa' => 'required|numeric|min:0',
            'total_luas_entri_data' => 'required|numeric|min:0',
            'selisih_luas' => 'required|numeric|min:0',
        ]);

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        Jlahan::create($data);

        return redirect()->route('jlahan.index')->with('success', 'Data jlahan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jlahan $jlahan)
    {
        return view('pages.potensi.sda.jlahan.show', compact('jlahan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jlahan $jlahan)
    {
        return view('pages.potensi.sda.jlahan.edit', compact('jlahan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jlahan $jlahan)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'sawah_irigasi_teknis' => 'required|numeric|min:0',
            'sawah_irigasi_setengah_teknis' => 'required|numeric|min:0',
            'sawah_tadah_hujan' => 'required|numeric|min:0',
            'sawah_pasang_surut' => 'required|numeric|min:0',
            'luas_tanah_sawah' => 'required|numeric|min:0',
            'tanah_rawa' => 'required|numeric|min:0',
            'pasang_surut' => 'required|numeric|min:0',
            'lahan_gambut' => 'required|numeric|min:0',
            'situ_waduk_danau' => 'required|numeric|min:0',
            'luas_tanah_basah' => 'required|numeric|min:0',
            'tanah_ladang' => 'required|numeric|min:0',
            'pemukiman' => 'required|numeric|min:0',
            'pekarangan' => 'required|numeric|min:0',
            'luas_tanah_kering' => 'required|numeric|min:0',
            'perkebunan_rakyat' => 'required|numeric|min:0',
            'perkebunan_negara' => 'required|numeric|min:0',
            'perkebunan_swasta' => 'required|numeric|min:0',
            'perkebunan_perseorangan' => 'required|numeric|min:0',
            'luas_tanah_perkebunan' => 'required|numeric|min:0',
            'tanah_bengkok' => 'required|numeric|min:0',
            'tanah_titi_sara' => 'required|numeric|min:0',
            'kebun_desa' => 'required|numeric|min:0',
            'sawah_desa' => 'required|numeric|min:0',
            'kas_desa' => 'required|numeric|min:0',
            'lokasi_tanah_kas_desa' => 'nullable|string',
            'lapangan_olahraga' => 'required|numeric|min:0',
            'perkantoran_pemerintahan' => 'required|numeric|min:0',
            'ruang_publik_taman' => 'required|numeric|min:0',
            'tpu' => 'required|numeric|min:0',
            'tps' => 'required|numeric|min:0',
            'bangunan_pendidikan' => 'required|numeric|min:0',
            'pertokoan' => 'required|numeric|min:0',
            'fasilitas_pasar' => 'required|numeric|min:0',
            'terminal' => 'required|numeric|min:0',
            'jalan' => 'required|numeric|min:0',
            'daerah_tangkapan_air' => 'required|numeric|min:0',
            'usaha_perikanan' => 'required|numeric|min:0',
            'aliran_stutet' => 'required|numeric|min:0',
            'luas_tanah_fasilitas_umum' => 'required|numeric|min:0',
            'hutan_lindung' => 'required|numeric|min:0',
            'hutan_produksi_tetap' => 'required|numeric|min:0',
            'hutan_produksi_terbatas' => 'required|numeric|min:0',
            'hutan_produksi' => 'required|numeric|min:0',
            'hutan_konservasi' => 'required|numeric|min:0',
            'hutan_adat' => 'required|numeric|min:0',
            'hutan_asli' => 'required|numeric|min:0',
            'hutan_sekunder' => 'required|numeric|min:0',
            'hutan_buatan' => 'required|numeric|min:0',
            'hutan_mangrove' => 'required|numeric|min:0',
            'suaka_alam' => 'required|numeric|min:0',
            'suaka_margasatwa' => 'required|numeric|min:0',
            'hutan_suaka' => 'required|numeric|min:0',
            'hutan_rakyat' => 'required|numeric|min:0',
            'luas_tanah_hutan' => 'required|numeric|min:0',
            'luas_desa' => 'required|numeric|min:0',
            'total_luas_entri_data' => 'required|numeric|min:0',
            'selisih_luas' => 'required|numeric|min:0',
        ]);

        $jlahan->update($request->all());

        return redirect()->route('jlahan.index')->with('success', 'Data jlahan berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jlahan $jlahan)
    {
        $jlahan->delete();
        return redirect()->route('jlahan.index')->with('success', 'Data jlahan berhasil dihapus.');
    }
}
