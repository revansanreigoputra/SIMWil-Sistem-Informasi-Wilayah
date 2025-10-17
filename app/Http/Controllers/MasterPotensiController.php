<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\View;
use App\Models\MasterPotensi;

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

        $activeBagian = $request->bagian ?? 'I'; // default ke 'I', bukan angka
        if (!isset($menu[$activeBagian])) {
            $activeBagian = array_key_first($menu);
        }

        $activeTab = $request->tab ?? ($menu[$activeBagian][0] ?? null);

        // Coba ambil model sesuai tab aktif
        $data = collect();
        if ($activeTab) {
            $model = $this->getModelForTab($activeTab);
            $data = $model::orderBy('id')->get();
        }

        return view('pages.master-potensi.index', compact('menu', 'activeBagian', 'activeTab', 'data'));
    }
    private function getModelForTab(?string $tabName): ?string
    {
        // Ubah ke huruf kecil semua untuk jaga-jaga
        $tabName = strtolower($tabName);

        // === PERIKSA KHUSUS DULU ===
        if ($tabName === 'tempat_ibadah') {
            $className = "App\\Models\\TempatIbadah";
            if (class_exists($className)) {
                return $className;
            }
        }

        // === BARU CEK DI FOLDER MasterPotensi ===
        $modelName = Str::studly($tabName);
        $className = "App\\Models\\MasterPotensi\\{$modelName}";
        if (class_exists($className)) {
            return $className;
        }

        abort(404, "Model untuk tab '{$tabName}' tidak ditemukan.");
    }


    /**
     * Menyimpan data baru ke database
     */
    public function store(Request $request)
    {
        // Validasi dasar untuk semua tab
        $rules = [
            'nama' => 'required|string|max:255',
            'tab'  => 'required|string'
        ];

        // Validasi tambahan untuk tab tertentu
        switch ($request->tab) {
            case 'tempat_ibadah':
                $rules['nama_tempat'] = 'required|string|max:255';
                break;
            default:
                // tab lain tidak perlu kolom nama_tempat
                break;
        }

        $validated = $request->validate($rules);

        $model = $this->getModelForTab($request->input('tab'));

        // Simpan data ke database
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
     */
    public function edit($id)
    {
        $potensi = MasterPotensi::findOrFail($id);
        return response()->json($potensi);
    }

    /**
     * Mengupdate data berdasarkan ID
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tab'  => 'required|string'
        ]);

        $model = $this->getModelForTab($request->input('tab'));
        $item = $model::findOrFail($id);
        $item->update(['nama' => $request->nama]);

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
        $item = $model::findOrFail($id);
        $item->delete();

        return back()->with('success', 'Data berhasil dihapus!');
    }
}
