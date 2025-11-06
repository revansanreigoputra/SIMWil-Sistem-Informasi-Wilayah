<?php

namespace App\Http\Controllers;

use App\Models\politik;
use App\Models\MasterPerkembangan\PenentuanKepalaDesa;
use App\Models\MasterPerkembangan\PenentuanSekretarisDesa;
use App\Models\MasterPerkembangan\PenentuanPerangkatDesa;
use App\Models\MasterPerkembangan\PenentuanLurah;
use App\Models\MasterPerkembangan\PenentuanAnggotaBpd;
use App\Models\MasterPerkembangan\PenentuanKetuaBpd;
use App\Models\MasterPerkembangan\PengurusLkd;
use App\Models\MasterPerkembangan\PengurusLkk;
use App\Models\MasterPerkembangan\HukumLkk;
use App\Models\MasterPerkembangan\HukumLkd;
use App\Models\Desa;
use Illuminate\Http\Request;

class PolitikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desaId = session('desa_id');
        $data = Politik::with([
            'desa',
            'penentuanKepalaDesa',
            'penentuanSekretarisDesa',
            'penentuanPerangkatDesa',
            'penentuanLurah',
            'penentuanAnggotaBpd',
            'penentuanKetuaBpd',
            'pengurusLkd',
            'pengurusLkk',
            'hukumLkk',
            'HukumLkd'
        ])->where('desa_id', $desaId)->latest()->get();

        return view('pages.perkembangan.kedaulatanmasyarakat.politik.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $penentuankepaladesa = PenentuanKepalaDesa::all();
        $penentuansekretarisdesa = PenentuanSekretarisDesa::all();
        $penentuanperangkatdesa = PenentuanPerangkatDesa::all();
        $penentuanlurah = PenentuanLurah::all();
        $penentuananggotabpd = PenentuanAnggotaBpd::all();
        $penentuanketuabpd = PenentuanKetuaBpd::all();
        $penguruslkd = PengurusLkd::all();
        $penguruslkk = PengurusLkk::all();
        $hukumlkd = HukumLkd::all();
        $hukumlkk = HukumLkk::all();
        return view('pages.perkembangan.kedaulatanmasyarakat.politik.create', compact('penentuankepaladesa', 'penentuansekretarisdesa', 'penentuanperangkatdesa', 'penentuanlurah', 'penentuananggotabpd', 'penentuanketuabpd', 'penguruslkd', 'penguruslkk', 'hukumlkd', 'hukumlkk',));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',

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
            'penentuan_kepala_desa_id' => 'required|exists:penentuan_kepala_desa,id',
            'penentuan_sekretaris_desa_id' => 'required|exists:penentuan_sekretaris_desa,id',
            'penentuan_perangkat_desa_id' => 'required|exists:penentuan_perangkat_desa,id',
            'masa_jabatan_kepala_desa' => 'nullable|integer|min:0',
            'penentuan_lurah_id' => 'required|exists:penentuan_lurah,id',

            // BPD
            'jumlah_anggota_bpd' => 'nullable|integer|min:0',
            'penentuan_anggota_bpd_id' => 'required|exists:penentuan_anggota_bpd,id',
            'penentuan_ketua_bpd_id' => 'required|exists:penentuan_ketua_bpd,id',
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
            'hukum_lkds_id' => 'required|exists:hukum_lkds,id',
            'jumlah_organisasi_lkd_desa' => 'nullable|integer|min:0',
            'hukum_lkks_id' => 'required|exists:hukum_lkks,id',
            'jumlah_organisasi_lkd_kelurahan' => 'nullable|integer|min:0',
            'pengurus_lkd_id' => 'required|exists:pengurus_lkd,id',
            'pengurus_lkk_id' => 'required|exists:pengurus_lkk,id',
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

        $data = $validated;
        $data['desa_id'] = session('desa_id');
        Politik::create($data);
        return redirect()->route('perkembangan.kedaulatanmasyarakat.politik.index')->with('success', 'Data Politik berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $politik = Politik::with([
        'penentuanKepalaDesa',
        'penentuanSekretarisDesa',
        'penentuanPerangkatDesa',
        'penentuanLurah',
        'penentuanAnggotaBpd',
        'penentuanKetuaBpd',
        'pengurusLkd',
        'pengurusLkk',
        'hukumLkk',
        'HukumLkd',
        'desa'
    ])->findOrFail($id);



    // Ambil data desa dari session jika create tidak input desa
        $desa = null;

        if (session('nama_desa')) {
            $desa = (object)[
                'nama_desa' => session('nama_desa')
            ];
        } else {
            $desa = $politik->desa; // relasi desa
        }
        return view('pages.perkembangan.kedaulatanmasyarakat.politik.show', compact('desa','politik'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $politik = Politik::findOrFail($id);
        $penentuankepaladesa = PenentuanKepalaDesa::all();
        $penentuansekretarisdesa = PenentuanSekretarisDesa::all();
        $penentuanperangkatdesa = PenentuanPerangkatDesa::all();
        $penentuanlurah = PenentuanLurah::all();
        $penentuananggotabpd = PenentuanAnggotaBpd::all();
        $penentuanketuabpd = PenentuanKetuaBpd::all();
        $penguruslkd = PengurusLkd::all();
        $penguruslkk = PengurusLkk::all();
        $hukumlkd = HukumLkd::all();
        $hukumlkk = HukumLkk::all();
        return view('pages.perkembangan.kedaulatanmasyarakat.politik.edit', compact('politik', 'penentuankepaladesa', 'penentuansekretarisdesa', 'penentuanperangkatdesa', 'penentuanlurah', 'penentuananggotabpd', 'penentuanketuabpd', 'penguruslkd', 'penguruslkk', 'hukumlkk', 'hukumlkd',));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',

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
            'penentuan_kepala_desa_id' => 'required|exists:penentuan_kepala_desa,id',
            'penentuan_sekretaris_desa_id' => 'required|exists:penentuan_sekretaris_desa,id',
            'penentuan_perangkat_desa_id' => 'required|exists:penentuan_perangkat_desa,id',
            'masa_jabatan_kepala_desa' => 'nullable|integer|min:0',
            'penentuan_lurah_id' => 'required|exists:penentuan_lurah,id',

            // BPD
            'jumlah_anggota_bpd' => 'nullable|integer|min:0',
            'penentuan_anggota_bpd_id' => 'required|exists:penentuan_anggota_bpd,id',
            'penentuan_ketua_bpd_id' => 'required|exists:penentuan_ketua_bpd,id',
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
            'hukum_lkds_id' => 'required|exists:hukum_lkds,id',
            'jumlah_organisasi_lkd_desa' => 'nullable|integer|min:0',
            'hukum_lkks_id' => 'required|exists:hukum_lkks,id',
            'jumlah_organisasi_lkd_kelurahan' => 'nullable|integer|min:0',
            'pengurus_lkd_id' => 'required|exists:pengurus_lkd,id',
            'pengurus_lkk_id' => 'required|exists:pengurus_lkk,id',
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
        $politik = Politik::findOrFail($id);
        $politik->update($validated);
        return redirect()->route('perkembangan.kedaulatanmasyarakat.politik.index')->with('success', 'Data Politik berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $politik = Politik::findOrFail($id);
        $politik->delete();
        return redirect()->route('perkembangan.kedaulatanmasyarakat.politik.index')->with('success', 'Data Politik berhasil dihapus.');
    }
}
