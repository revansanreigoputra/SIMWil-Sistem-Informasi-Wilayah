<?php

namespace App\Http\Controllers;

use App\Models\politik;
use App\Models\Desa;
use Illuminate\Http\Request;

class PolitikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Politik::with(['desa'])->orderBy('tanggal', 'desc')->get();
        return view('pages.perkembangan.kedaulatanmasyarakat.politik.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $desas = Desa::orderBy('nama_desa')->get();
        return view('pages.perkembangan.kedaulatanmasyarakat.politik.create', compact('desas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'id_desa' => 'required|exists:desas,id',

            // Partai Politik dan Pemilu
            'jumlah_penduduk_memiliki_hak_pilih' => 'nullable|integer|min:0',
            'jumlah_pengguna_hak_pilih_pemilu_legislatif' => 'nullable|integer|min:0',
            'jumlah_perempuan_aktif_partai_politik' => 'nullable|integer|min:0',
            'jumlah_partai_politik_memiliki_pengurus' => 'nullable|integer|min:0',
            'jumlah_partai_politik_memiliki_kantor' => 'nullable|integer|min:0',
            'jumlah_penduduk_pengurus_partai' => 'nullable|integer|min:0',
            'jumlah_penduduk_dipilih_legislatif' => 'nullable|integer|min:0',
            'jumlah_pengguna_hak_pilih_presiden' => 'nullable|integer|min:0',

            // Pemilihan Kepala Daerah
            'jumlah_penduduk_memiliki_hak_pilih_pilkada' => 'nullable|integer|min:0',
            'jumlah_pengguna_hak_pilih_bupati' => 'nullable|integer|min:0',
            'jumlah_pengguna_hak_pilih_gubernur' => 'nullable|integer|min:0',

            // Penentuan Kepala Desa / Lurah
            'penentuan_jabatan_kepala_desa' => 'nullable|in:dipilih_rakyat_langsung,ditunjuk_bupati_walikota,turun_temurun',
            'penentuan_sekretaris_desa' => 'nullable|in:diangkat_kepala_desa,diangkat_bupati_walikota,diangkat_kepala_desa_disahkan_bupati',
            'penentuan_perangkat_desa' => 'nullable|in:diangkat_kepala_desa_ditetapkan_camat,diangkat_dan_ditetapkan_kepala_desa',
            'masa_jabatan_kepala_desa' => 'nullable|integer|min:0',
            'penentuan_jabatan_lurah' => 'nullable|in:diangkat_bupati_walikota,dipilih_rakyat_langsung',

            // BPD
            'jumlah_anggota_bpd' => 'nullable|integer|min:0',
            'penentuan_anggota_bpd' => 'nullable|in:dipilih_rakyat_langsung,dipilih_musyawarah_masyarakat,diangkat_kepala_desa,diangkat_camat',
            'pimpinan_bpd' => 'nullable|in:dipilih_anggota_bpd,ditunjuk_kepala_desa,ditunjuk_camat,dipilih_rakyat_langsung',
            'kantor_bpd' => 'nullable|in:Ada,Tidak Ada',
            'anggaran_bpd' => 'nullable|in:Ada,Tidak Ada',
            'peraturan_desa' => 'nullable|integer|min:0',
            'permintaan_keterangan_kepala_desa' => 'nullable|integer|min:0',
            'rancangan_perdes' => 'nullable|integer|min:0',
            'menyalurkan_aspirasi' => 'nullable|integer|min:0',
            'menyatakan_pendapat' => 'nullable|integer|min:0',
            'menyampaikan_usul' => 'nullable|integer|min:0',
            'mengevaluasi_apb_desa' => 'nullable|integer|min:0',

            // LKD/LKK
            'keberadaan_organisasi_lkd' => 'nullable|in:Ada,Tidak Ada',
            'dasar_hukum_organisasi_lkd' => 'nullable|in:peraturan_desa,keputusan_kepala_desa,keputusan_camat,belum_diatur',
            'jumlah_organisasi_lkd_desa' => 'nullable|integer|min:0',
            'dasar_hukum_pembentukan_lkd_kelurahan' => 'nullable|in:keputusan_lurah,keputusan_camat,belum_diatur',
            'jumlah_organisasi_lkd_kelurahan' => 'nullable|integer|min:0',
            'pemilihan_pengurus_lkd' => 'nullable|in:dipilih_rakyat_langsung,diangkat_kepala_desa,diangkat_camat',
            'pemilihan_pengurus_organisasi_lkd' => 'nullable|in:dipilih_rakyat_langsung,diangkat_ketua_lkd_lkk,diangkat_kepala_desa,diangkat_camat',
            'status_lkd' => 'nullable|in:Aktif,Pasif',
            'jumlah_kegiatan_lkd' => 'nullable|integer|min:0',
            'fungsi_tugas_lkd' => 'nullable|in:Aktif,Pasif',
            'jumlah_kegiatan_organisasi_lkd' => 'nullable|integer|min:0',
            'alokasi_anggaran_lkd' => 'nullable|in:Ada,Tidak Ada',
            'alokasi_anggaran_organisasi' => 'nullable|in:Ada,Tidak Ada',
            'kantor_lkd' => 'nullable|in:Ada,Tidak Ada',
            'dukungan_pembiayaan' => 'nullable|in:Memadai,Kurang Memadai',
            'realisasi_program_kerja' => 'nullable|integer|min:0',
            'keberadaan_alat_kelengkapan' => 'nullable|in:Ada,Tidak Ada',
            'kegiatan_administrasi' => 'nullable|in:Berfungsi,Tidak Berfungsi',
        ]);
        politik::create($validated);
        return redirect()->route('perkembangan.kedaulatanmasyarakat.politik.index')->with('success', 'Data Politik berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $politik = politik::findOrFail($id);
        $politik->load(['desa']);
        return view('pages.perkembangan.kedaulatanmasyarakat.politik.show', compact('politik'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $politik = politik::findOrFail($id);
        $desas = Desa::orderBy('nama_desa')->get();
        return view('pages.perkembangan.kedaulatanmasyarakat.politik.edit', compact('politik', 'desas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'id_desa' => 'required|exists:desas,id',

            // Partai Politik dan Pemilu
            'jumlah_penduduk_memiliki_hak_pilih' => 'nullable|integer|min:0',
            'jumlah_pengguna_hak_pilih_pemilu_legislatif' => 'nullable|integer|min:0',
            'jumlah_perempuan_aktif_partai_politik' => 'nullable|integer|min:0',
            'jumlah_partai_politik_memiliki_pengurus' => 'nullable|integer|min:0',
            'jumlah_partai_politik_memiliki_kantor' => 'nullable|integer|min:0',
            'jumlah_penduduk_pengurus_partai' => 'nullable|integer|min:0',
            'jumlah_penduduk_dipilih_legislatif' => 'nullable|integer|min:0',
            'jumlah_pengguna_hak_pilih_presiden' => 'nullable|integer|min:0',

            // Pemilihan Kepala Daerah
            'jumlah_penduduk_memiliki_hak_pilih_pilkada' => 'nullable|integer|min:0',
            'jumlah_pengguna_hak_pilih_bupati' => 'nullable|integer|min:0',
            'jumlah_pengguna_hak_pilih_gubernur' => 'nullable|integer|min:0',

            // Penentuan Kepala Desa / Lurah
            'penentuan_jabatan_kepala_desa' => 'nullable|in:dipilih_rakyat_langsung,ditunjuk_bupati_walikota,turun_temurun',
            'penentuan_sekretaris_desa' => 'nullable|in:diangkat_kepala_desa,diangkat_bupati_walikota,diangkat_kepala_desa_disahkan_bupati',
            'penentuan_perangkat_desa' => 'nullable|in:diangkat_kepala_desa_ditetapkan_camat,diangkat_dan_ditetapkan_kepala_desa',
            'masa_jabatan_kepala_desa' => 'nullable|integer|min:0',
            'penentuan_jabatan_lurah' => 'nullable|in:diangkat_bupati_walikota,dipilih_rakyat_langsung',

            // BPD
            'jumlah_anggota_bpd' => 'nullable|integer|min:0',
            'penentuan_anggota_bpd' => 'nullable|in:dipilih_rakyat_langsung,dipilih_musyawarah_masyarakat,diangkat_kepala_desa,diangkat_camat',
            'pimpinan_bpd' => 'nullable|in:dipilih_anggota_bpd,ditunjuk_kepala_desa,ditunjuk_camat,dipilih_rakyat_langsung',
            'kantor_bpd' => 'nullable|in:Ada,Tidak Ada',
            'anggaran_bpd' => 'nullable|in:Ada,Tidak Ada',
            'peraturan_desa' => 'nullable|integer|min:0',
            'permintaan_keterangan_kepala_desa' => 'nullable|integer|min:0',
            'rancangan_perdes' => 'nullable|integer|min:0',
            'menyalurkan_aspirasi' => 'nullable|integer|min:0',
            'menyatakan_pendapat' => 'nullable|integer|min:0',
            'menyampaikan_usul' => 'nullable|integer|min:0',
            'mengevaluasi_apb_desa' => 'nullable|integer|min:0',

            // LKD/LKK
            'keberadaan_organisasi_lkd' => 'nullable|in:Ada,Tidak Ada',
            'dasar_hukum_organisasi_lkd' => 'nullable|in:peraturan_desa,keputusan_kepala_desa,keputusan_camat,belum_diatur',
            'jumlah_organisasi_lkd_desa' => 'nullable|integer|min:0',
            'dasar_hukum_pembentukan_lkd_kelurahan' => 'nullable|in:keputusan_lurah,keputusan_camat,belum_diatur',
            'jumlah_organisasi_lkd_kelurahan' => 'nullable|integer|min:0',
            'pemilihan_pengurus_lkd' => 'nullable|in:dipilih_rakyat_langsung,diangkat_kepala_desa,diangkat_camat',
            'pemilihan_pengurus_organisasi_lkd' => 'nullable|in:dipilih_rakyat_langsung,diangkat_ketua_lkd_lkk,diangkat_kepala_desa,diangkat_camat',
            'status_lkd' => 'nullable|in:Aktif,Pasif',
            'jumlah_kegiatan_lkd' => 'nullable|integer|min:0',
            'fungsi_tugas_lkd' => 'nullable|in:Aktif,Pasif',
            'jumlah_kegiatan_organisasi_lkd' => 'nullable|integer|min:0',
            'alokasi_anggaran_lkd' => 'nullable|in:Ada,Tidak Ada',
            'alokasi_anggaran_organisasi' => 'nullable|in:Ada,Tidak Ada',
            'kantor_lkd' => 'nullable|in:Ada,Tidak Ada',
            'dukungan_pembiayaan' => 'nullable|in:Memadai,Kurang Memadai',
            'realisasi_program_kerja' => 'nullable|integer|min:0',
            'keberadaan_alat_kelengkapan' => 'nullable|in:Ada,Tidak Ada',
            'kegiatan_administrasi' => 'nullable|in:Berfungsi,Tidak Berfungsi',
        ]);
        $politik = politik::findOrFail($id);
        $politik->update($validated);
        return redirect()->route('perkembangan.kedaulatanmasyarakat.politik.index')->with('success', 'Data Politik berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $politik = politik::findOrFail($id);
        $politik->delete();
        return redirect()->route('perkembangan.kedaulatanmasyarakat.politik.index')->with('success', 'Data Politik berhasil dihapus.');
    }
    public function getDesasByKecamatan($id_kecamatan)
    {
        $desas = Desa::where('id_kecamatan', $id_kecamatan)->get();
        return response()->json($desas);
    }
}
