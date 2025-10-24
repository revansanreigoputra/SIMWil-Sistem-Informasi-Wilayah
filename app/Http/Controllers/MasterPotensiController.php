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
                'alat_produksi_ikan_laut',
                'alat_produksi_ikan_tawar',
                'nama_ikan',
                'jenis_potensi_air',
                'pengelolaan_potensi_air'
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
        if ($activeTab) {
            $model = $this->getModelForTab($activeTab);
            // Tambahkan pengecekan jika model ada
            if ($model) {
                $data = $model::orderBy('id')->get();
            }
            // Jika model_name null, $data akan tetap kosong, tidak error
        }

        return view('pages.master-potensi.index', compact('menu', 'activeBagian', 'activeTab', 'data'));
    }

    /**
     * Mengambil path class Model berdasarkan nama tab.
     * PERUBAHAN: Dibuat agar mengembalikan null jika tidak ada, bukan abort(404).
     * Ini lebih baik untuk method yang dipanggil oleh method API.
     */
    private function getModelForTab(?string $tabName): ?string
    {
        if (!$tabName) {
            return null; // Jika tabName kosong, kembalikan null
        }

        $tabName = strtolower($tabName);

        // === PERIKSA KHUSUS DULU ===
        if ($tabName === 'tempat_ibadah') {
            $className = "App\\Models\\TempatIbadah";
            // Kembalikan null jika class tidak ada
            return class_exists($className) ? $className : null;
        }

        // === BARU CEK DI FOLDER MasterPotensi ===
        $modelName = Str::studly($tabName);
        $className = "App\\Models\\MasterPotensi\\{$modelName}";
        if (class_exists($className)) {
            return $className;
        }

        // abort(404, "Model untuk tab '{$tabName}' tidak ditemukan."); // <-- INI DIHAPUS
        return null; // <-- GANTI DENGAN INI
    }


    /**
     * Menyimpan data baru ke database
     */
    public function store(Request $request)
    {
        $rules = [
            'nama' => 'required|string|max:255',
            'tab'  => 'required|string'
        ];

        switch ($request->tab) {
            case 'tempat_ibadah':
                $rules['nama_tempat'] = 'required|string|max:255';
                break;
            default:
                break;
        }

        $validated = $request->validate($rules);

        $model = $this->getModelForTab($request->input('tab'));

        // Tambahkan pengecekan jika model tidak ditemukan
        if (!$model) {
            return back()->with('error', 'Gagal menyimpan. Model untuk tab ' . $request->input('tab') . ' tidak ditemukan.');
        }

        $data = [
            'nama' => $validated['nama']
        ];

        if (isset($validated['nama_tempat'])) {
            $data['nama_tempat'] = $validated['nama_tempat'];
        }

        $model::create($data);

        return back()->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Mengambil data untuk form edit
     * PERUBAHAN: Dibuat lebih robust untuk mengembalikan error JSON yang jelas.
     */
    public function edit($id, Request $request)
    {
        $tabName = $request->input('tab');

        // 1. Cek apakah parameter 'tab' dikirim
        if (!$tabName) {
            return response()->json(['error' => 'Parameter "tab" tidak ada dalam request.'], 422); // 422 Unprocessable Entity
        }

        // 2. Cek apakah model untuk 'tab' tersebut ada
        $model = $this->getModelForTab($tabName);
        if (!$model) {
            return response()->json(['error' => "Model untuk tab '{$tabName}' tidak ditemukan."], 404); // 404 Not Found
        }

        // 3. Cek apakah item datanya ada
        $item = $model::find($id);
        if (!$item) {
            return response()->json(['error' => 'Data dengan ID tersebut tidak ditemukan.'], 404); // 404 Not Found
        }

        // 4. Jika semua berhasil, kirim datanya
        return response()->json($item);
    }


    /**
     * Mengupdate data berdasarkan ID
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'nama' => 'required|string|max:255',
            'tab'  => 'required|string'
        ];

        // Validasi tambahan bisa ditambahkan di sini jika perlu
        // ...

        $validated = $request->validate($rules);

        $model = $this->getModelForTab($request->input('tab'));

        if (!$model) {
            // Seharusnya ini tidak terjadi jika 'tab' divalidasi, tapi untuk jaga-jaga
            return back()->with('error', 'Gagal update. Model tidak ditemukan.');
        }

        $item = $model::findOrFail($id);

        // Siapkan data untuk update
        $dataToUpdate = [
            'nama' => $validated['nama']
        ];

        // Logika update untuk kolom khusus (jika ada)
        if ($request->has('nama_tempat') && $request->tab === 'tempat_ibadah') {
             $dataToUpdate['nama_tempat'] = $request->input('nama_tempat');
        }

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
