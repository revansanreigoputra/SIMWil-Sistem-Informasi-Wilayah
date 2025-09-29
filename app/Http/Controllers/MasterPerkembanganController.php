<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MasterPerkembanganController extends Controller
{
    public function index(Request $request)
    {
        // Mendefinisikan seluruh struktur menu dalam satu array
        $menu = [
            'I' => [
                'aset_atap', 'aset_dinding', 'aset_lantai',
                'aset_produksi', 'aset_sarana', 'aset_tanah', 'aset_lainnya'
            ],
            'II' => [
                'gigi_balita', 'etnis', 'hidup_bersih', 'hukum_lkd', 'hukum_lkk', 'jabatan', 'kabupaten_kota', 'keluarga_berencana'
            ],
            'III' => [
                'kebiasaan_berobat', 'kecamatan', 'kejahatan', 'kekerasan', 'kerukunan',
                'kesejahteraan_keluarga', 'keterangan_air', 'komoditas_alat_perikanan'
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
            case 'aset_atap': $data = [(object)['id' => 1, 'nama' => 'Genteng'], (object)['id' => 2, 'nama' => 'Asbes']]; break;
            case 'aset_dinding': $data = [(object)['id' => 1, 'nama' => 'Tembok'], (object)['id' => 2, 'nama' => 'Kayu']]; break;
            case 'aset_lantai': $data = [(object)['id' => 1, 'nama' => 'Keramik'], (object)['id' => 2, 'nama' => 'Tegel']]; break;
            case 'aset_produksi': $data = [(object)['id' => 1, 'nama' => 'Mesin Jahit'], (object)['id' => 2, 'nama' => 'Mesin Traktor']]; break;
            case 'aset_sarana': $data = [(object)['id' => 1, 'nama' => 'Sumur'], (object)['id' => 2, 'nama' => 'MCK Umum']]; break;
            case 'aset_tanah': $data = [(object)['id' => 1, 'nama' => 'Sawah Irigasi'], (object)['id' => 2, 'nama' => 'Pekarangan']]; break;
            case 'aset_lainnya': $data = [(object)['id' => 1, 'nama' => 'Kipas Angin'], (object)['id' => 2, 'nama' => 'Televisi']]; break;

            // --- BAGIAN II ---
            case 'gigi_balita': $data = [(object)['id' => 1, 'nama' => 'Ompong'], (object)['id' => 2, 'nama' => 'Gigi Susu']]; break;
            case 'etnis': $data = [(object)['id' => 1, 'nama' => 'Jawa'], (object)['id' => 2, 'nama' => 'Sunda']]; break;
            case 'hidup_bersih': $data = [(object)['id' => 1, 'nama' => 'Memiliki Jamban'], (object)['id' => 2, 'nama' => 'Tidak Memiliki Jamban']]; break;
            case 'hukum_lkd': $data = [(object)['id' => 1, 'nama' => 'Perdes'], (object)['id' => 2, 'nama' => 'Perda']]; break;
            case 'hukum_lkk': $data = [(object)['id' => 1, 'nama' => 'SK Kades'], (object)['id' => 2, 'nama' => 'SK Camat']]; break;
            case 'jabatan': $data = [(object)['id' => 1, 'nama' => 'Kepala Desa'], (object)['id' => 2, 'nama' => 'Sekretaris Desa']]; break;
            case 'kabupaten_kota': $data = [(object)['id' => 1, 'nama' => 'Bantul'], (object)['id' => 2, 'nama' => 'Sleman']]; break;
            case 'keluarga_berencana': $data = [(object)['id' => 1, 'nama' => 'Pil'], (object)['id' => 2, 'nama' => 'Suntik']]; break;

            // --- BAGIAN III ---
            case 'kebiasaan_berobat': $data = [(object)['id' => 1, 'nama' => 'Puskesmas'], (object)['id' => 2, 'nama' => 'Dukun']]; break;
            case 'kecamatan': $data = [(object)['id' => 1, 'nama' => 'Kasihan'], (object)['id' => 2, 'nama' => 'Sewon']]; break;
            case 'kejahatan': $data = [(object)['id' => 1, 'nama' => 'Pencurian'], (object)['id' => 2, 'nama' => 'Perampokan']]; break;
            case 'kekerasan': $data = [(object)['id' => 1, 'nama' => 'KDRT'], (object)['id' => 2, 'nama' => 'Penganiayaan']]; break;
            case 'kerukunan': $data = [(object)['id' => 1, 'nama' => 'Sangat Rukun'], (object)['id' => 2, 'nama' => 'Rukun']]; break;
            case 'kesejahteraan_keluarga': $data = [(object)['id' => 1, 'nama' => 'Sejahtera'], (object)['id' => 2, 'nama' => 'Pra-Sejahtera']]; break;
            case 'keterangan_air': $data = [(object)['id' => 1, 'nama' => 'Air Bersih'], (object)['id' => 2, 'nama' => 'Air Keruh']]; break;
            case 'komoditas_alat_perikanan': $data = [(object)['id' => 1, 'nama' => 'Jala'], (object)['id' => 2, 'nama' => 'Pancing']]; break;

            // --- BAGIAN IV ---
            case 'komoditas_buah': $data = [(object)['id' => 1, 'nama' => 'Mangga'], (object)['id' => 2, 'nama' => 'Jeruk']]; break;
            case 'komoditas_galian': $data = [(object)['id' => 1, 'nama' => 'Pasir'], (object)['id' => 2, 'nama' => 'Batu']]; break;
            case 'komoditas_hasil_ternak': $data = [(object)['id' => 1, 'nama' => 'Susu Sapi'], (object)['id' => 2, 'nama' => 'Telur Ayam']]; break;
            case 'komoditas_hutan': $data = [(object)['id' => 1, 'nama' => 'Kayu Jati'], (object)['id' => 2, 'nama' => 'Madu']]; break;
            case 'komoditas_industri': $data = [(object)['id' => 1, 'nama' => 'Tahu'], (object)['id' => 2, 'nama' => 'Tempe']]; break;
            case 'komoditas_kerajinan': $data = [(object)['id' => 1, 'nama' => 'Batik'], (object)['id' => 2, 'nama' => 'Gerabah']]; break;
            case 'komoditas_obat': $data = [(object)['id' => 1, 'nama' => 'Jahe'], (object)['id' => 2, 'nama' => 'Kunyit']]; break;
            case 'komoditas_pangan': $data = [(object)['id' => 1, 'nama' => 'Padi'], (object)['id' => 2, 'nama' => 'Jagung']]; break;
            case 'komoditas_perikanan': $data = [(object)['id' => 1, 'nama' => 'Ikan Lele'], (object)['id' => 2, 'nama' => 'Ikan Nila']]; break;
            case 'komoditas_perkebunan': $data = [(object)['id' => 1, 'nama' => 'Kopi'], (object)['id' => 2, 'nama' => 'Teh']]; break;

            // --- BAGIAN V ---
            case 'komoditas_sektor': $data = [(object)['id' => 1, 'nama' => 'Perdagangan'], (object)['id' => 2, 'nama' => 'Jasa']]; break;
            case 'komoditas_ternak': $data = [(object)['id' => 1, 'nama' => 'Sapi'], (object)['id' => 2, 'nama' => 'Kambing']]; break;
            case 'komoditas_wabah': $data = [(object)['id' => 1, 'nama' => 'Demam Berdarah'], (object)['id' => 2, 'nama' => 'Chikungunya']]; break;
            case 'kualitas_bayi': $data = [(object)['id' => 1, 'nama' => 'Gizi Baik'], (object)['id' => 2, 'nama' => 'Gizi Buruk']]; break;
            case 'kualitas_ibu': $data = [(object)['id' => 1, 'nama' => 'Sehat'], (object)['id' => 2, 'nama' => 'Kurang Sehat']]; break;
            case 'kualitas_kerja': $data = [(object)['id' => 1, 'nama' => 'Produktif'], (object)['id' => 2, 'nama' => 'Kurang Produktif']]; break;
            case 'pemasaran_hasil': $data = [(object)['id' => 1, 'nama' => 'Pasar Tradisional'], (object)['id' => 2, 'nama' => 'Supermarket']]; break;
            case 'pembunuhan': $data = [(object)['id' => 1, 'nama' => 'Pembunuhan Biasa'], (object)['id' => 2, 'nama' => 'Pembunuhan Berencana']]; break;
            case 'penculikan': $data = [(object)['id' => 1, 'nama' => 'Anak-anak'], (object)['id' => 2, 'nama' => 'Dewasa']]; break;

            // --- BAGIAN VI ---
            case 'pencurian': $data = [(object)['id' => 1, 'nama' => 'Pencurian Biasa'], (object)['id' => 2, 'nama' => 'Pencurian dengan Pemberatan']]; break;
            case 'penentuan_anggota_bpd': $data = [(object)['id' => 1, 'nama' => 'Pemilihan Langsung'], (object)['id' => 2, 'nama' => 'Musyawarah']]; break;
            case 'penentuan_kepala_desa': $data = [(object)['id' => 1, 'nama' => 'Pilkades'], (object)['id' => 2, 'nama' => 'Penunjukan']]; break;
            case 'penentuan_lurah': $data = [(object)['id' => 1, 'nama' => 'Penunjukan oleh Bupati'], (object)['id' => 2, 'nama' => 'Seleksi']]; break;
            case 'penentuan_ketua_bpd': $data = [(object)['id' => 1, 'nama' => 'Dipilih oleh Anggota'], (object)['id' => 2, 'nama' => 'Aklamasi']]; break;
            case 'penentuan_perangkat_desa': $data = [(object)['id' => 1, 'nama' => 'Seleksi Terbuka'], (object)['id' => 2, 'nama' => 'Penunjukan Kades']]; break;
            case 'penentuan_sekretaris_desa': $data = [(object)['id' => 1, 'nama' => 'PNS'], (object)['id' => 2, 'nama' => 'Non-PNS']]; break;
            case 'pengurus_lkd': $data = [(object)['id' => 1, 'nama' => 'Aktif'], (object)['id' => 2, 'nama' => 'Tidak Aktif']]; break;
            case 'pengurus_lkk': $data = [(object)['id' => 1, 'nama' => 'Ada'], (object)['id' => 2, 'nama' => 'Tidak Ada']]; break;

            // --- BAGIAN VII ---
            case 'penjarahan': $data = [(object)['id' => 1, 'nama' => 'Toko'], (object)['id' => 2, 'nama' => 'Rumah']]; break;
            case 'penyakit': $data = [(object)['id' => 1, 'nama' => 'Flu'], (object)['id' => 2, 'nama' => 'Batuk']]; break;
            case 'perjudian': $data = [(object)['id' => 1, 'nama' => 'Ada'], (object)['id' => 2, 'nama' => 'Tidak Ada']]; break;
            case 'perkelahian': $data = [(object)['id' => 1, 'nama' => 'Antar Warga'], (object)['id' => 2, 'nama' => 'Antar Desa']]; break;
            case 'persalinan': $data = [(object)['id' => 1, 'nama' => 'Ditolong Bidan'], (object)['id' => 2, 'nama' => 'Ditolong Dukun']]; break;
            case 'pola_makan': $data = [(object)['id' => 1, 'nama' => 'Sehat'], (object)['id' => 2, 'nama' => 'Kurang Sehat']]; break;
            case 'provinsi': $data = [(object)['id' => 1, 'nama' => 'DI Yogyakarta'], (object)['id' => 2, 'nama' => 'Jawa Tengah']]; break;
            case 'sakit_kelainan': $data = [(object)['id' => 1, 'nama' => 'Jantung'], (object)['id' => 2, 'nama' => 'Ginjal']]; break;
            case 'status_kepemilikan': $data = [(object)['id' => 1, 'nama' => 'Milik Sendiri'], (object)['id' => 2, 'nama' => 'Sewa']]; break;
            case 'tempat_perawatan': $data = [(object)['id' => 1, 'nama' => 'Rumah Sakit'], (object)['id' => 2, 'nama' => 'Puskesmas']]; break;
            case 'tempat_persalinan': $data = [(object)['id' => 1, 'nama' => 'Rumah Bersalin'], (object)['id' => 2, 'nama' => 'Rumah Sakit']]; break;

        }

        return view('pages.master-perkembangan.index', [
            'menu' => $menu,
            'activeBagian' => $activeBagian,
            'activeTab' => $activeTab,
            'data' => $data
        ]);
    }
}
