<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\View;
use App\Models\MasterPerkembangan\KabupatenKota;
use App\Models\MasterPerkembangan\Provinsi;

class MasterPerkembanganController extends Controller
{
    /**
     * Menampilkan halaman utama Master Perkembangan Desa
     */
    public function index(Request $request)
    {
        // Daftar menu utama (bisa kamu ubah sesuai struktur desamu)
        $menu = [
            'I' => [
                'aset_atap', 'aset_dinding', 'aset_lantai',
                'aset_produksi', 'aset_sarana', 'aset_tanah', 'aset_lainnya'
            ],
            'II' => [
                'gizi_balita', 'etnis', 'hidup_bersih', 'hukum_lkd', 'hukum_lkk', 'kabupaten_kota', 'keluarga_berencana'
            ],
            'III' => [
                'kebiasaan_berobat','kejahatan', 'kekerasan', 'kerukunan',
                'kesejahteraan_keluarga_master', 'keterangan_air', 'komoditas_alat_perikanan'
            ],
            'IV' => [
                'komoditas_buah', 'komoditas_galian', 'komoditas_hasil_ternak', 'komoditas_hutan', 'komoditas_industri',
                'komoditas_kerajinan', 'komoditas_obat', 'komoditas_pangan', 'komoditas_perikanan', 'komoditas_perkebunan'
            ],
            'V' => [
                'komoditas_sektor', 'komoditas_ternak', 'komoditas_wabah', 'kualitas_bayi', 'kualitas_ibu',
                'kualitas_kerja', 'pemasaran_hasil', 'pembunuhan', 'penculikan'
            ],
            'VI' => [
                'pencurian', 'penentuan_anggota_bpd', 'penentuan_kepala_desa', 'penentuan_lurah',
                'penentuan_ketua_bpd', 'penentuan_perangkat_desa', 'penentuan_sekretaris_desa', 'pengurus_lkd', 'pengurus_lkk'
            ],
            'VII' => [
                'penjarahan', 'penyakit', 'perjudian', 'perkelahian', 'persalinan',
                'pola_makan', 'provinsi', 'sakit_kelainan', 'status_kepemilikan', 'tempat_perawatan', 'tempat_persalinan'
            ],
        ];

        // Ambil bagian & tab aktif dari URL
        $activeBagian = $request->bagian ?? 'I'; // default ke 'I', bukan angka
        if (!isset($menu[$activeBagian])) {
            $activeBagian = array_key_first($menu);
        }

        $activeTab = $request->tab ?? ($menu[$activeBagian][0] ?? null);

        // Coba ambil model sesuai tab aktif
        $data = collect();
        $provinsiList = collect();

        if ($activeTab === 'provinsi') {
            $data = Provinsi::orderBy('id')->get();
        } elseif ($activeTab === 'kabupaten_kota') {
            $data = KabupatenKota::orderBy('id')->get();
            $provinsiList = Provinsi::orderBy('nama')->get();
        } elseif ($activeTab) {
            $model = $this->getModelForTab($activeTab);
            $data = $model::orderBy('id')->get();
        }

        return view('pages.master-perkembangan.index', compact('menu', 'activeBagian', 'activeTab', 'data', 'provinsiList'));
    }
    

    /**
     * Menentukan model mana yang dipakai berdasarkan tab yang aktif.
     */
    private function getModelForTab(?string $tabName): ?object
    {
        $modelName = Str::studly($tabName); // contoh: aset_atap -> AsetAtap
        $className = "App\\Models\\MasterPerkembangan\\{$modelName}";

        if (class_exists($className)) {
            return new $className();
        }

        abort(404, "Model untuk tab '{$tabName}' tidak ditemukan.");
    }

    /**
     * Tambah data baru.
     */
     public function store(Request $request)
    {
        $tab = $request->input('tab');

        if ($tab === 'provinsi') {
            Provinsi::create([
                'nama' => $request->nama,
            ]);
        } elseif ($tab === 'kabupaten_kota') {
            KabupatenKota::create([
                'provinsi' => $request->provinsi, // simpan nama provinsi, bukan ID
                'nama' => $request->nama,
            ]);
        }

        return back()->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Update data yang sudah ada.
     */
    public function update(Request $request, $id)
    {
        $tab = $request->input('tab');

        if ($tab === 'provinsi') {
            $item = Provinsi::findOrFail($id);
            $item->update(['nama' => $request->nama]);
        } elseif ($tab === 'kabupaten_kota') {
            $item = KabupatenKota::findOrFail($id);
            $item->update([
                'provinsi' => $request->provinsi,
                'nama' => $request->nama,
            ]);
        }

        return back()->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Hapus data berdasarkan ID.
     */
    public function destroy(Request $request, $id)
    {
        $tab = $request->input('tab');

        if ($tab === 'provinsi') {
            Provinsi::destroy($id);
        } elseif ($tab === 'kabupaten_kota') {
            KabupatenKota::destroy($id);
        }

        return back()->with('success', 'Data berhasil dihapus!');
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            'tab' => 'required|string'
        ]);

        $model = $this->getModelForTab($request->input('tab'));
        $item = $model::findOrFail($id);

        return response()->json($item);
    }
}
