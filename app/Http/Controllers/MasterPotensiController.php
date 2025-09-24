<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MasterPotensiController extends Controller
{
    public function index(Request $request)
    {
        // Mendefinisikan seluruh struktur menu Potensi dalam satu array
        $menu = [
            'I' => [ // Bagian I
                'jenis_dampak', 'jenis_hutan', 'jenis_ternak', 'jenis_usaha_pengolahan_hasil_ternak',
                'satuan_produksi_ternak', 'alat_produksi_ikan_laut', 'alat_produksi_ikan_tawar',
                'nama_ikan', 'jenis_potensi_air', 'pengelolaan_potensi_air'
            ],
            'II' => [ // Bagian II
                'sumber_air_minum', 'kualitas_air_minum', 'pemanfaatan_danau', 'pemanfaatan_sungai',
                'kondisi_sungai', 'pemanfaatan_rawa', 'kondisi_rawa', 'pemanfaatan_air_terjun'
            ],
            'III' => [ // Bagian III
                'pemanfaatan_sumber_air_panas', 'pemanfaatan_air_laut', 'potensi_panas_bumi',
                'pemanfaatan_sumber_gas_alam', 'potensi_energi_alternatif', 'potensi_wisata'
            ],
            'IV' => [ // Bagian IV
                'jenis_wisata', 'pengelolaan_wisata', 'jasa_lembaga_ekonomi'
            ],
        ];

        $activeBagian = $request->query('bagian', 'I');
        if (!array_key_exists($activeBagian, $menu) || empty($menu[$activeBagian])) {
            $activeBagian = 'I';
        }

        $defaultTab = !empty($menu[$activeBagian]) ? $menu[$activeBagian][0] : null;
        $activeTab = $request->query('tab', $defaultTab);
        if ($defaultTab && !in_array($activeTab, $menu[$activeBagian])) {
            $activeTab = $defaultTab;
        }

        // Data dummy
        $data = [];
        switch ($activeTab) {
            // --- BAGIAN I ---
            case 'jenis_dampak': $data = [(object)['id' => 1, 'nama' => 'Positif'], (object)['id' => 2, 'nama' => 'Negatif']]; break;
            case 'jenis_hutan': $data = [(object)['id' => 1, 'nama' => 'Hutan Lindung'], (object)['id' => 2, 'nama' => 'Hutan Produksi']]; break;
            case 'jenis_ternak': $data = [(object)['id' => 1, 'nama' => 'Sapi'], (object)['id' => 2, 'nama' => 'Kambing']]; break;
            case 'jenis_usaha_pengolahan_hasil_ternak': $data = [(object)['id' => 1, 'nama' => 'Susu Pasteurisasi'], (object)['id' => 2, 'nama' => 'Dendeng']]; break;
            case 'satuan_produksi_ternak': $data = [(object)['id' => 1, 'nama' => 'Liter'], (object)['id' => 2, 'nama' => 'Ekor']]; break;
            case 'alat_produksi_ikan_laut': $data = [(object)['id' => 1, 'nama' => 'Pukat Harimau'], (object)['id' => 2, 'nama' => 'Jaring Insang']]; break;
            case 'alat_produksi_ikan_tawar': $data = [(object)['id' => 1, 'nama' => 'Jala'], (object)['id' => 2, 'nama' => 'Pancing']]; break;
            case 'nama_ikan': $data = [(object)['id' => 1, 'nama' => 'Tuna'], (object)['id' => 2, 'nama' => 'Lele']]; break;
            case 'jenis_potensi_air': $data = [(object)['id' => 1, 'nama' => 'Air Permukaan'], (object)['id' => 2, 'nama' => 'Air Tanah']]; break;
            case 'pengelolaan_potensi_air': $data = [(object)['id' => 1, 'nama' => 'Irigasi'], (object)['id' => 2, 'nama' => 'Air Bersih']]; break;

            // --- BAGIAN II ---
            case 'sumber_air_minum': $data = [(object)['id' => 1, 'nama' => 'Sumur Gali'], (object)['id' => 2, 'nama' => 'Mata Air']]; break;
            case 'kualitas_air_minum': $data = [(object)['id' => 1, 'nama' => 'Baik'], (object)['id' => 2, 'nama' => 'Cukup Baik']]; break;
            case 'pemanfaatan_danau': $data = [(object)['id' => 1, 'nama' => 'Perikanan'], (object)['id' => 2, 'nama' => 'Pariwisata']]; break;
            case 'pemanfaatan_sungai': $data = [(object)['id' => 1, 'nama' => 'Irigasi'], (object)['id' => 2, 'nama' => 'Transportasi']]; break;
            case 'kondisi_sungai': $data = [(object)['id' => 1, 'nama' => 'Tercemar'], (object)['id' => 2, 'nama' => 'Jernih']]; break;
            case 'pemanfaatan_rawa': $data = [(object)['id' => 1, 'nama' => 'Pertanian'], (object)['id' => 2, 'nama' => 'Perikanan']]; break;
            case 'kondisi_rawa': $data = [(object)['id' => 1, 'nama' => 'Baik'], (object)['id' => 2, 'nama' => 'Rusak']]; break;
            case 'pemanfaatan_air_terjun': $data = [(object)['id' => 1, 'nama' => 'Wisata'], (object)['id' => 2, 'nama' => 'PLTA']]; break;

            // --- BAGIAN III ---
            case 'pemanfaatan_sumber_air_panas': $data = [(object)['id' => 1, 'nama' => 'Pemandian'], (object)['id' => 2, 'nama' => 'Pembangkit Listrik']]; break;
            case 'pemanfaatan_air_laut': $data = [(object)['id' => 1, 'nama' => 'Garam'], (object)['id' => 2, 'nama' => 'Wisata Bahari']]; break;
            case 'potensi_panas_bumi': $data = [(object)['id' => 1, 'nama' => 'Ada'], (object)['id' => 2, 'nama' => 'Tidak Ada']]; break;
            case 'pemanfaatan_sumber_gas_alam': $data = [(object)['id' => 1, 'nama' => 'Bahan Bakar'], (object)['id' => 2, 'nama' => 'Industri']]; break;
            case 'potensi_energi_alternatif': $data = [(object)['id' => 1, 'nama' => 'Tenaga Surya'], (object)['id' => 2, 'nama' => 'Tenaga Angin']]; break;
            case 'potensi_wisata': $data = [(object)['id' => 1, 'nama' => 'Sangat Berpotensi'], (object)['id' => 2, 'nama' => 'Kurang Berpotensi']]; break;

            // --- BAGIAN IV ---
            case 'jenis_wisata': $data = [(object)['id' => 1, 'nama' => 'Wisata Alam'], (object)['id' => 2, 'nama' => 'Wisata Budaya']]; break;
            case 'pengelolaan_wisata': $data = [(object)['id' => 1, 'nama' => 'Dikelola Desa'], (object)['id' => 2, 'nama' => 'Dikelola Swasta']]; break;
            case 'jasa_lembaga_ekonomi': $data = [(object)['id' => 1, 'nama' => 'Simpan Pinjam'], (object)['id' => 2, 'nama' => 'Penyaluran Modal']]; break;
        }

        return view('pages.master-potensi.index', [
            'menu' => $menu,
            'activeBagian' => $activeBagian,
            'activeTab' => $activeTab,
            'data' => $data
        ]);
    }
}
