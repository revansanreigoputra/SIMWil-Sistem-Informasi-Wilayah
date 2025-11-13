<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\View;
// Hapus 'use App\Models\MasterPotensi;' karena tidak digunakan secara langsung
// use App\Models\MasterPotensi;

class MasterPotensiController extends Controller
{
    /**
     * Menampilkan halaman utama Master Potensi
     */
    public function index(Request $request)
    {
        $menu = [
            'I' => [
                'jenis_dampak',
                'jenis_hutan',
                'jenis_ternak',
                'jenis_usaha_pengolahan_hasil_ternak',
                'satuan_produksi_ternak',
                'satuan_produksi_kehutanan',
                'alat_produksi_ikan_laut',
                'alat_produksi_ikan_tawar',
                'nama_ikan',
                'jenis_potensi_air',
                'pengelolaan_potensi_air',
                'jenis_produksi_ternak'
            ],
            'II' => [
                'sumber_air_bersih',
                'jenis_air_minum',
                'sumber_air_panas',
                'jenis_lembaga',
                'dasar_hukum',
                'jenis_pemilihan',
                'kategori_lembaga_ekonomi',
                'jenis_lembaga_ekonomi',
                'kategori_usaha_pengangkutan',
                'kategori_usaha_jasa_dan_hiburan',
            ],
            'III' => [
                'kategori_sekolah',
                'jenis_sekolah_tingkatan',
                'kategori_prasarana_transportasi_darat',
                'jenis_prasarana_transportasi_darat',
                'kategori_prasarana_transportasi_lainnya',
                'jenis_prasarana_transportasi_lainnya',
                'kategori_prasarana_komunikasi_informasi',
                'jenis_prasarana_komunikasi_informasi',
                'jenis_penginapan',
                'jenis_gedung',
            ],
            'IV' => [
                'jenis_prasarana_kesehatan',
                'Jenis_Sarana_Kesehatan',
                'Jenis_prasarana_Olah_Raga',
                'tempat_ibadah',
            ],
        ];

        $activeBagian = $request->bagian ?? 'I';
        if (!isset($menu[$activeBagian])) {
            $activeBagian = array_key_first($menu);
        }

        $activeTab = $request->tab ?? ($menu[$activeBagian][0] ?? null);

        $data = collect();
        // Variabel untuk data relasi (seperti Kategori Sekolah)
        $relatedData = [];

        if ($activeTab) {
            $model = $this->getModelForTab($activeTab);
            if ($model) {
                $query = $model::query();

                // === PERBAIKAN 1: TAMBAHKAN EAGER LOADING UNTUK RELASI BARU ===
                // Jika tab-nya jenis_sekolah_tingkatan, ambil juga relasinya
                if ($activeTab === 'jenis_sekolah_tingkatan') {
                    $query->with('KategoriSekolah'); // Asumsi nama relasinya 'KategoriSekolah'
                }
                // TAMBAHAN UNTUK RELASI BARU
                elseif ($activeTab === 'jenis_lembaga_ekonomi') {
                    $query->with('KategoriLembagaEkonomi'); // Asumsi relasi 'KategoriLembagaEkonomi'
                } elseif ($activeTab === 'jenis_prasarana_transportasi_darat') {
                    $query->with('KategoriPrasaranaTransportasiDarat'); // Asumsi relasi 'KategoriPrasaranaTransportasiDarat'
                } elseif ($activeTab === 'jenis_prasarana_komunikasi_informasi') {
                    $query->with('KategoriPrasaranaKomunikasiInformasi'); // Asumsi relasi 'KategoriPrasaranaKomunikasiInformasi'
                }
                // TAMBAHAN UNTUK 'jenis_prasarana_transportasi_lainnya'
                elseif ($activeTab === 'jenis_prasarana_transportasi_lainnya') {
                    $query->with('KategoriPrasaranaTransportasiLainnya'); // Asumsi relasi 'KategoriPrasaranaTransportasiLainnya'
                }
                // === AKHIR PERBAIKAN 1 ===

                $data = $query->orderBy('id')->get();

                // === PERBAIKAN 2: AMBIL DATA KATEGORI UNTUK DROPDOWN ===
                // Jika tab-nya 'jenis_sekolah_tingkatan', kita perlu data Kategori Sekolah
                // untuk ditampilkan di form <select>
                if ($activeTab === 'jenis_sekolah_tingkatan') {
                    $kategoriModel = $this->getModelForTab('kategori_sekolah');
                    if ($kategoriModel) {
                        $relatedData['kategori_sekolah'] = $kategoriModel::all();
                    }
                }
                // TAMBAHAN UNTUK RELASI BARU
                elseif ($activeTab === 'jenis_lembaga_ekonomi') {
                    $kategoriModel = $this->getModelForTab('kategori_lembaga_ekonomi');
                    if ($kategoriModel) {
                        $relatedData['kategori_lembaga_ekonomi'] = $kategoriModel::all();
                    }
                } elseif ($activeTab === 'jenis_prasarana_transportasi_darat') { // Typo 'transportASI' diperbaiki ke 'transportasi'
                    $kategoriModel = $this->getModelForTab('kategori_prasarana_transportasi_darat');
                    if ($kategoriModel) {
                        $relatedData['kategori_prasarana_transportasi_darat'] = $kategoriModel::all();
                    }
                } elseif ($activeTab === 'jenis_prasarana_komunikasi_informasi') {
                    $kategoriModel = $this->getModelForTab('kategori_prasarana_komunikasi_informasi');
                    if ($kategoriModel) {
                        $relatedData['kategori_prasarana_komunikasi_informasi'] = $kategoriModel::all();
                    }
                }
                // TAMBAHAN UNTUK 'jenis_prasarana_transportasi_lainnya'
                elseif ($activeTab === 'jenis_prasarana_transportasi_lainnya') {
                    $kategoriModel = $this->getModelForTab('kategori_prasarana_transportasi_lainnya');
                    if ($kategoriModel) {
                        $relatedData['kategori_prasarana_transportasi_lainnya'] = $kategoriModel::all();
                    }
                }
                // === AKHIR PERBAIKAN 2 ===
            }
        }

        return view('pages.master-potensi.index', compact('menu', 'activeBagian', 'activeTab', 'data', 'relatedData'));
    }

    /**
     * Mengambil path class Model berdasarkan nama tab.
     */
    private function getModelForTab(?string $tabName): ?string
    {
        if (!$tabName) {
            return null;
        }

        $tabName = strtolower($tabName);

        if ($tabName === 'tempat_ibadah') {
            $className = "App\\Models\\TempatIbadah";
            return class_exists($className) ? $className : null;
        }

        $modelName = Str::studly($tabName);
        $className = "App\\Models\\MasterPotensi\\{$modelName}";
        if (class_exists($className)) {
            return $className;
        }

        return null;
    }


    /**
     * Menyimpan data baru ke database
     */
    public function store(Request $request)
    {
        $rules = [
            'nama' => 'required|string|max:255',
            'tab' => 'required|string'
        ];

        // === PERBAIKAN 3: TAMBAHKAN VALIDASI UNTUK RELASI BARU ===
        switch ($request->tab) {
            case 'tempat_ibadah':
                $rules['nama_tempat'] = 'required|string|max:255';
                break;
            case 'jenis_sekolah_tingkatan':
                $rules['kategori_sekolah_id'] = 'required|integer|exists:kategori_sekolah,id';
                break;
            // TAMBAHAN VALIDASI RELASI
            case 'jenis_lembaga_ekonomi':
                $rules['kategori_lembaga_ekonomi_id'] = 'required|integer|exists:kategori_lembaga_ekonomi,id';
                break;
            case 'jenis_prasarana_transportasi_darat':
                $rules['kategori_prasarana_transportasi_darat_id'] = 'required|integer|exists:kategori_prasarana_transportasi_darat,id';
                break;
            case 'jenis_prasarana_komunikasi_informasi':
                $rules['kategori_prasarana_komunikasi_informasi_id'] = 'required|integer|exists:kategori_prasarana_komunikasi_informasi,id';
                break;
            // TAMBAHAN UNTUK 'jenis_prasarana_transportasi_lainnya'
            case 'jenis_prasarana_transportasi_lainnya':
                $rules['kategori_prasarana_transportasi_lainnya_id'] = 'required|integer|exists:kategori_prasarana_transportasi_lainnya,id';
                break;
            // AKHIR TAMBAHAN
            default:
                break;
        }
        // ====================================================================

        $validated = $request->validate($rules);

        $model = $this->getModelForTab($request->input('tab'));

        if (!$model) {
            return back()->with('error', 'Gagal menyimpan. Model untuk tab ' . $request->input('tab') . ' tidak ditemukan.');
        }

        // === PERBAIKAN 4: TAMBAHKAN 'kategori_id' LAINNYA KE DATA YANG DIBUAT ===
        $data = [
            'nama' => $validated['nama']
        ];

        if (isset($validated['nama_tempat'])) {
            $data['nama_tempat'] = $validated['nama_tempat'];
        }

        // Data untuk 'jenis_sekolah_tingkatan'
        if (isset($validated['kategori_sekolah_id'])) {
            $data['kategori_sekolah_id'] = $validated['kategori_sekolah_id'];
        }

        // TAMBAHAN DATA RELASI BARU
        if (isset($validated['kategori_lembaga_ekonomi_id'])) {
            $data['kategori_lembaga_ekonomi_id'] = $validated['kategori_lembaga_ekonomi_id'];
        }
        if (isset($validated['kategori_prasarana_transportasi_darat_id'])) {
            $data['kategori_prasarana_transportasi_darat_id'] = $validated['kategori_prasarana_transportasi_darat_id'];
        }
        if (isset($validated['kategori_prasarana_komunikasi_informasi_id'])) {
            $data['kategori_prasarana_komunikasi_informasi_id'] = $validated['kategori_prasarana_komunikasi_informasi_id'];
        }
        // TAMBAHAN UNTUK 'jenis_prasarana_transportasi_lainnya'
        if (isset($validated['kategori_prasarana_transportasi_lainnya_id'])) {
            $data['kategori_prasarana_transportasi_lainnya_id'] = $validated['kategori_prasarana_transportasi_lainnya_id'];
        }
        // AKHIR TAMBAHAN
        // =======================================================================

        // $model::create($data) sekarang akan berisi 'kategori_id' yang relevan
        $model::create($data);

        return back()->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Mengambil data untuk form edit
     */
    public function edit($id, Request $request)
    {
        $tabName = $request->input('tab');

        if (!$tabName) {
            return response()->json(['error' => 'Parameter "tab" tidak ada dalam request.'], 422);
        }

        $model = $this->getModelForTab($tabName);
        if (!$model) {
            return response()->json(['error' => "Model untuk tab '{$tabName}' tidak ditemukan."], 404);
        }

        $item = $model::find($id);
        if (!$item) {
            return response()->json(['error' => 'Data dengan ID tersebut tidak ditemukan.'], 404);
        }

        return response()->json($item);
    }


    /**
     * Mengupdate data berdasarkan ID
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'nama' => 'required|string|max:255',
            'tab' => 'required|string'
        ];

        // === PERBAIKAN 5: TAMBAHKAN VALIDASI UPDATE UNTUK RELASI BARU ===
        switch ($request->tab) {
            case 'jenis_sekolah_tingkatan':
                $rules['kategori_sekolah_id'] = 'required|integer|exists:kategori_sekolah,id';
                break;
            // TAMBAHAN VALIDASI RELASI UPDATE
            case 'jenis_lembaga_ekonomi':
                $rules['kategori_lembaga_ekonomi_id'] = 'required|integer|exists:kategori_lembaga_ekonomi,id';
                break;
            case 'jenis_prasarana_transportasi_darat':
                $rules['kategori_prasarana_transportasi_darat_id'] = 'required|integer|exists:kategori_prasarana_transportasi_darat,id';
                break;
            case 'jenis_prasarana_komunikasi_informasi':
                $rules['kategori_prasarana_komunikasi_informasi_id'] = 'required|integer|exists:kategori_prasarana_komunikasi_informasi,id';
                break;
            // TAMBAHAN UNTUK 'jenis_prasarana_transportasi_lainnya'
            case 'jenis_prasarana_transportasi_lainnya':
                $rules['kategori_prasarana_transportasi_lainnya_id'] = 'required|integer|exists:kategori_prasarana_transportasi_lainnya,id';
                break;
            // AKHIR TAMBAHAN
        }
        // =====================================================================

        $validated = $request->validate($rules);

        $model = $this->getModelForTab($request->input('tab'));

        if (!$model) {
            return back()->with('error', 'Gagal update. Model tidak ditemukan.');
        }

        $item = $model::findOrFail($id);

        // Siapkan data untuk update
        $dataToUpdate = [
            'nama' => $validated['nama']
        ];

        if ($request->has('nama_tempat') && $request->tab === 'tempat_ibadah') {
            $dataToUpdate['nama_tempat'] = $request->input('nama_tempat');
        }

        // === PERBAIKAN 6: TAMBAHKAN DATA UPDATE RELASI BARU ===
        if (isset($validated['kategori_sekolah_id'])) {
            $dataToUpdate['kategori_sekolah_id'] = $validated['kategori_sekolah_id'];
        }

        // TAMBAHAN DATA RELASI UPDATE
        if (isset($validated['kategori_lembaga_ekonomi_id'])) {
            $dataToUpdate['kategori_lembaga_ekonomi_id'] = $validated['kategori_lembaga_ekonomi_id'];
        }
        if (isset($validated['kategori_prasarana_transportasi_darat_id'])) {
            $dataToUpdate['kategori_prasarana_transportasi_darat_id'] = $validated['kategori_prasarana_transportasi_darat_id'];
        }
        if (isset($validated['kategori_prasarana_komunikasi_informasi_id'])) {
            $dataToUpdate['kategori_prasarana_komunikasi_informasi_id'] = $validated['kategori_prasarana_komunikasi_informasi_id'];
        }
        // TAMBAHAN UNTUK 'jenis_prasarana_transportasi_lainnya'
        if (isset($validated['kategori_prasarana_transportasi_lainnya_id'])) {
            $dataToUpdate['kategori_prasarana_transportasi_lainnya_id'] = $validated['kategori_prasarana_transportasi_lainnya_id'];
        }
        // AKHIR TAMBAHAN
        // =========================================

        $item->update($dataToUpdate);

        return back()->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Menghapus data berdasarkan ID
     */
    public function destroy(Request $request, $id)
    {
        $request->validate([
            'tab' => 'required|string'
        ]);

        $model = $this->getModelForTab($request->input('tab'));

        if (!$model) {
            return back()->with('error', 'Gagal hapus. Model tidak ditemukan.');
        }

        $item = $model::findOrFail($id);
        $item->delete();

        return back()->with('success', 'Data berhasil dihapus!');
    }
}
