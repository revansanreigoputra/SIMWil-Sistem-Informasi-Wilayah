<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use App\Models\LayananSurat\JenisSurat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Retrieve the required KopTemplate IDs
        $kopSuratId = DB::table('kop_templates')
            ->where('jenis_kop', 'kop surat')
            ->value('id');
        $kopLaporanId = DB::table('kop_templates')
            ->where('jenis_kop', 'kop laporan')
            ->value('id');

        if (!$kopSuratId || !$kopLaporanId) {
            $this->command->error('Kop Template tidak ditemukan. Pastikan KopTemplateSeeder dijalankan terlebih dahulu dan menggunakan nilai ENUM yang benar.');
            return;
        }

        // 2. Generate the FULL set of all possible system variables ONCE
        $fullSystemVariables = $this->generateSystemVariables();

        // 3. Define STANDARD COMPOSITE variables ONCE

        // COMPOSITE 1: Tempat & Tanggal Lahir (Birth Details)
        $tempatTanggalLahirComposite = [
            "key" => "tempat_tanggal_lahir",
            "label" => "Tempat dan Tanggal Lahir",
            "type" => "composite",
            "keys" => ["tempat_lahir", "tanggal_lahir"],
            "format" => "{0}, {1}", // Format: [Tempat Lahir], [Tanggal Lahir]
            "source" => "penduduk_data"
        ];

        // COMPOSITE 2: Alamat Lengkap (Full Address)
        $alamatLengkapComposite = [
            "key" => "alamat_lengkap_detail",
            "label" => "Alamat Lengkap",
            "type" => "composite",
            "keys" => ["alamat", "rt", "rw", "desa", "kecamatan"],
            "format" => "{0} RT {1}/RW {2}, {3}, {4}", // Format: [Alamat] RT [RT]/RW [RW], [Desa], [Kecamatan]
            "source" => "penduduk_data"
        ];

        // List of all composite definitions for easy merging/reference
        $allComposites = [$tempatTanggalLahirComposite, $alamatLengkapComposite];


        // 4. DEFINE VARIABLES PER JENIS SURAT
        //A. SKK STARTS HERE
        // --- SKK (Surat Keterangan Kelahiran) Variables ---
        // This surat needs ALMOST ALL citizen data + a lot of custom data
        $skkCustomVariables = [
            ["key" => "nama_bayi", "label" => "Nama Bayi", "type" => "text"],
            ["key" => "nik_bayi", "label" => "NIK Bayi (16 Digit/Opsional)", "type" => "text", "required" => false],
            ["key" => "tempat_lahir_bayi", "label" => "Tempat Lahir", "type" => "text"],
            ["key" => "tanggal_lahir_bayi", "label" => "Tanggal Lahir", "type" => "date"],
            ["key" => "jenis_kelamin_bayi", "label" => "Jenis Kelamin", "type" => "select", "options" => ["LAKI-LAKI", "PEREMPUAN"]],
            ["key" => "hubungan_keluarga_id", "label" => "Hubungan Keluarga (Cth: Anak)", "type" => "select_db", "model" => "HubunganKeluarga"],
            ["key" => "no_akta_kelahiran", "label" => "Nomor Akta Kelahiran", "type" => "text", "required" => false],
            ["key" => "tanggal_pencatatan", "label" => "Tanggal Pencatatan", "type" => "date"],
            ["key" => "agama_id_bayi", "label" => "Agama", "type" => "select_db", "model" => "Agama"],
            ["key" => "golongan_darah_id_bayi", "label" => "Golongan Darah", "type" => "select_db", "model" => "GolonganDarah"],
            ["key" => "kewarganegaraan_id_bayi", "label" => "Kewarganegaraan", "type" => "select_db", "model" => "Kewarganegaraan"],
            ["key" => "etnis_bayi", "label" => "Etnis/Suku", "type" => "text", "required" => false],
            ["key" => "pendidikan_id_ibu", "label" => "Pendidikan Terakhir Ibu", "type" => "select_db", "model" => "Pendidikan"],
            ["key" => "mata_pencaharian_id_ayah", "label" => "Mata Pencaharian Ayah", "type" => "select_db", "model" => "MataPencaharian"],
            ["key" => "status_perkawinan_orangtua", "label" => "Status Perkawinan Orang Tua", "type" => "select", "options" => ["KAWIN"]],
        ];
        $kelahiranVariables = json_encode(array_merge($fullSystemVariables, $skkCustomVariables));


        // B. SKD (Surat Keterangan Domisili)
        $skdCustomVariables = [
            ["key" => "keperluan", "label" => "Keperluan Mengurus Surat", "type" => "text"],
            ["key" => "masa_berlaku", "label" => "Masa Berlaku (hari)", "type" => "number"],
        ];
        $skdRequiredKeys = ['nama', 'nik', 'jenis_kelamin']; // Base system fields
        $skdSystemVariables = $this->filterSystemVariables($fullSystemVariables, $skdRequiredKeys);

        $skdDependenciesKeys = [ // Dependencies for both composites
            'tempat_lahir',
            'tanggal_lahir',
            'alamat',
            'rt',
            'rw',
            'desa',
            'kecamatan'
        ];
        $skdDependencies = $this->filterSystemVariables($fullSystemVariables, $skdDependenciesKeys);
   
        $domisiliVariables = json_encode(array_merge(
            $skdSystemVariables,
            $skdDependencies,
            $allComposites, // Include BOTH composites
            $skdCustomVariables
        ));


        // C. SKU (Surat Keterangan Umum)
        $skuRequiredKeys = ['nama', 'nik'];
        $skuSystemVariables = $this->filterSystemVariables($fullSystemVariables, $skuRequiredKeys);

        $skuDependenciesKeys = [ // Dependencies for both composites
            'tempat_lahir',
            'tanggal_lahir',
            'alamat',
            'rt',
            'rw',
            'desa',
            'kecamatan'
        ];
        $skuDependencies = $this->filterSystemVariables($fullSystemVariables, $skuDependenciesKeys);

        $umumVariables = json_encode(array_merge(
            $skuSystemVariables,
            $skuDependencies,
            $allComposites // Include BOTH composites
        ));


        // D. SRRT (Surat Rekomendasi RT)
        $srrtCustomVariables = [
            ["key" => "keperluan", "label" => "Keperluan Mengurus Surat", "type" => "text"],
            ["key" => "masa_berlaku", "label" => "Masa Berlaku (hari)", "type" => "number"],
        ];
        $srrtRequiredKeys = ['nama', 'nik', 'jenis_kelamin', 'rt']; // Notice 'rt' is needed directly and as a component
        $srrtSystemVariables = $this->filterSystemVariables($fullSystemVariables, $srrtRequiredKeys);

        $srrtDependenciesKeys = [ // Only address dependencies needed
            'alamat',
            'rt',
            'rw',
            'desa',
            'kecamatan'
        ];
        $srrtDependencies = $this->filterSystemVariables($fullSystemVariables, $srrtDependenciesKeys);

        $srrtVariables = json_encode(array_merge(
            $srrtSystemVariables,
            $srrtDependencies,
            [$alamatLengkapComposite], // ONLY Address composite
            $srrtCustomVariables
        ));


        // E. SKTM (Surat Keterangan Tidak Mampu)
        $sktmCustomVariables = [
            ["key" => "keperluan", "label" => "Keperluan Mengurus Surat", "type" => "text"],
            ["key" => "masa_berlaku", "label" => "Masa Berlaku (hari)", "type" => "number"],
            ["key" => "penghasilan_bulanan", "label" => "Penghasilan Bulanan", "type" => "number"],
        ];
        $sktmRequiredKeys = ['nama', 'nik', 'jenis_kelamin', 'status_perkawinan', 'Mata_pencaharian'];
        $sktmSystemVariables = $this->filterSystemVariables($fullSystemVariables, $sktmRequiredKeys);

        $sktmDependenciesKeys = [ // Dependencies for both composites
            'tempat_lahir',
            'tanggal_lahir',
            'alamat',
            'rt',
            'rw',
            'desa',
            'kecamatan'
        ];
        $sktmDependencies = $this->filterSystemVariables($fullSystemVariables, $sktmDependenciesKeys);

        $sktmVariables = json_encode(array_merge(
            $sktmSystemVariables,
            $sktmDependencies,
            $allComposites, // Include BOTH composites
            $sktmCustomVariables
        ));

        // F. SURAT BERKELAKUAN BAIK (SBB) 
        $sbbCustomVariables = [
            ["key" => "keperluan", "label" => "Keperluan Mengurus Surat", "type" => "text"],
            ["key" => "masa_berlaku", "label" => "Masa Berlaku (hari)", "type" => "number"],
        ];
        $sbbRequiredKeys = ['nama', 'nik'];
        $sbbSystemVariables= $this->filterSystemVariables($fullSystemVariables, $sbbRequiredKeys);
        $sbbDependenciesKeys = [ // Dependencies for both composites
            'tempat_lahir',
            'tanggal_lahir',
            'alamat',
            'rt',
            'rw',
            'desa',
            'kecamatan'
        ];
        $sbbDependenciesKeys = $this->filterSystemVariables($fullSystemVariables, $sbbCustomVariables);
        $sbbVariables = json_encode(array_merge(
            $sbbSystemVariables,
            $sbbDependenciesKeys,
            $allComposites,  
            $sbbCustomVariables
        ));
        // SBB END HERE

        // G. SURAT KETERANGAN KEMATIAN (SKM)
        $skmCustomVariables = [
             ["key" => "tanggal_kematian", "label" => "Tanggal Kematian", "type" => "date"],
            ["key" => "sebab_kematian", "label" => "Sebab Kematian", "type" => "text"],
        ];

        $skmRequiredKeys = ['nama', 'nik', 'jenis_kelamin'];
        $skmSystemVariables = $this->filterSystemVariables($fullSystemVariables, $skmRequiredKeys);
        $skmDependeciesKeys = [ // Dependencies for both composites
            'tempat_lahir',
            'tanggal_lahir',
            'alamat',
            'rt',
            'rw',
            'desa',
            'kecamatan'
        ];
        $skmDependencies = $this->filterSystemVariables($fullSystemVariables, $skmDependeciesKeys);
        $skmVariables = json_encode(array_merge(
            $skmSystemVariables,
            $skmDependencies,
            $allComposites, // Include BOTH composites
            $skmCustomVariables
        ));
        // SKM END HERE

        // H. SURAT KETERANGAN USAHA
        $skuhCustomVariables = [
            ["key" => "nama_usaha", "label" => "Nama Usaha", "type" => "text"],
            ["key" => "jenis_usaha", "label" => "Jenis Usaha", "type" => "text"],
            ["key" => "alamat_usaha", "label" => "Alamat Usaha", "type" => "text"],
            ["key" => "lama_usaha", "label" => "Lama Usaha (dalam tahun)", "type" => "number"],
        ];
        $skuhRequiredKeys = ['nama', 'nik'];
        $skuhSystemVariables = $this->filterSystemVariables($fullSystemVariables, $skuhRequiredKeys);   
        $skuhVariables = json_encode(array_merge(
            $skuhSystemVariables,
            $skuhCustomVariables,
            $allComposites

        ));
        // SKUH END HERE

        // I. SURAT KETERANGAN KEHILANGAN
        $skkhCustomVariables = [
            ["key" => "nama_barang_hilang", "label" => "Nama Barang yang Hilang", "type" => "text"],
            ["key" => "tanggal_kehilangan", "label" => "Tanggal Kehilangan", "type" => "date"],
            ["key" => "tempat_kehilangan", "label" => "Tempat Kehilangan", "type" => "text"],
            ["key" => "keterangan_tambahan", "label" => "Keterangan Tambahan", "type" => "textarea", "required" => false],
        ];  
        $skkhRequiredKeys = ['nama', 'nik'];
        $skkhSystemVariables = $this->filterSystemVariables($fullSystemVariables, $skkhRequiredKeys);   
        $SkkhDependenciesKeys = [ // Dependencies for both composites
            'tempat_lahir',
            'tanggal_lahir',
            'alamat',
            'rt',
            'rw',
            'desa',
            'kecamatan'
        ];
        $skkhDependencies = $this->filterSystemVariables($fullSystemVariables, $SkkhDependenciesKeys);  
        $skkhVariables = json_encode(array_merge(
            $skkhSystemVariables,
            $skkhCustomVariables,
            $allComposites,
            $skkhDependencies
        ));

        // J. SURAT PENGANTAR PINDAH DOMISILI (SPPD)
        $sppdCustomVariables = [
            ["key" => "tujuan_domisili", "label" => "Tujuan Domisili", "type" => "text"],
            ["key" => "tanggal_pindah", "label" => "Tanggal Pindah", "type" => "date"],
            ["key" => "alasan_pindah", "label" => "Alasan Pindah", "type" => "text"],
        ];  
        $sppdRequiredKeys = ['nama', 'nik'];
        $sppdSystemVariables = $this->filterSystemVariables($fullSystemVariables, $sppdRequiredKeys);   
        $sppdDependenciesKeys = [ // Dependencies for both composites
            'tempat_lahir',
            'tanggal_lahir',        
            'alamat',
            'rt',
            'rw',
            'desa',
            'kecamatan'
        ];
        $sppdDependencies = $this->filterSystemVariables($fullSystemVariables, $sppdDependenciesKeys);  
        $sppdVariables = json_encode(array_merge(
            $sppdSystemVariables,
            $sppdCustomVariables,
            $sppdDependencies,
            $allComposites
        ));

        // K. SURAT REKOMENDASI IMB
        $srimbVariables = [
            ["key" => "nama_perusahaan", "label" => "Nama Perusahaan", "type" => "text"],
            ["key" => "nama_pemilik", "label" => "Nama Pemilik", "type" => "text"],
            ["key" => "nik_pemilik", "label" => "NIK Pemilik", "type" => "text"],
            ["key" => "jabatan", "label" => "Jabatan Dalam Perusahaan", "type" => "text"],
            ["key" => "jenis_bangunan", "label" => "Jenis Bangunan", "type" => "text"],
            ["key" => "alamat_bangunan", "label" => "Alamat Bangunan", "type" => "text"],
            ["key" => "luas_bangunan", "label" => "Luas Bangunan (m2)", "type" => "number"],
            ["key" => "keperluan", "label" => "Keperluan Mengurus IMB", "type" => "text"],
            ["key" => "alamat", "label" => "Alamat Perusahaan", "type" => "text"],
        ];   // 4. Define all JenisSurat data
        $jenisSuratData = [
            // SURAT KETERANGAN KELAHIRAN (SKK)
            [
                'kode' => 'SKK',
                'nama' => 'Surat Keterangan Kelahiran',
                'paragraf_pembuka' => 'Yang bertanda tangan di bawah ini menerangkan bahwa telah lahir seorang anak dengan data berikut:',
                'paragraf_penutup' => 'Demikian surat keterangan ini dibuat untuk dipergunakan sebagaimana mestinya.',
                'required_variables' => $kelahiranVariables,
                'kop_template_id' => $kopSuratId,
                'mutasi_type' => 'pencatatan_kelahiran',
            ],

            // SURAT KETERANGAN DOMISILI (SKD)
            [
                'kode' => 'SKD',
                'nama' => 'Surat Keterangan Domisili',
                'paragraf_pembuka' => 'Yang bertanda tangan di bawah ini menerangkan bahwa warga berikut benar-benar berdomisili di wilayah desa/kelurahan ini:',
                'paragraf_penutup' => 'Demikian surat keterangan ini dibuat untuk dipergunakan sebagaimana mestinya.',
                'required_variables' => $domisiliVariables,
                'kop_template_id' => $kopSuratId,
                'mutasi_type' => 'none',
            ],

            // SURAT KETERANGAN UMUM (SKU)
            [
                'kode' => 'SKU',
                'nama' => 'Surat Keterangan Umum',
                'paragraf_pembuka' => 'Yang bertanda tangan di bawah ini menerangkan bahwa warga berikut adalah penduduk desa/kelurahan ini:',
                'paragraf_penutup' => 'Demikian surat keterangan ini dibuat untuk dipergunakan sebagaimana mestinya.',
                'required_variables' => $umumVariables,
                'kop_template_id' => $kopSuratId,
                'mutasi_type' => 'none',
            ],
            // SURAT REKOMENDASI RT (SRRT)
            [
                'kode' => 'SRRT',
                'nama' => 'Surat Rekomendasi RT',
                'paragraf_pembuka' => 'Yang bertanda tangan di bawah ini, Ketua RT setempat menerangkan bahwa warga berikut benar-benar berdomisili di wilayah RT kami:',
                'paragraf_penutup' => 'Demikian surat rekomendasi ini dibuat untuk dipergunakan sebagaimana mestinya.',
                'required_variables' => $srrtVariables,
                'kop_template_id' => $kopSuratId,
                'mutasi_type' => 'none',
            ],
            // SURAT KETERANGAN TIDAK MAMPU (SKTM)
            [
                'kode' => 'SKTM',
                'nama' => 'Surat Keterangan Tidak Mampu',
                'paragraf_pembuka' => 'Yang bertanda tangan di bawah ini menerangkan bahwa warga berikut benar-benar tergolong tidak mampu secara ekonomi:',
                'paragraf_penutup' => 'Demikian surat keterangan ini dibuat untuk dipergunakan sebagaimana mestinya.',
                'required_variables' => $sktmVariables,
                'kop_template_id' => $kopSuratId,
                'mutasi_type' => 'none',
            ],
            // SURAT BERKELAKUAN BAIK (SBB)
            [
                'kode' => 'SBB',
                'nama' => 'Surat Berkelakuan Baik',
                'paragraf_pembuka' => 'Yang bertanda tangan di bawah ini menerangkan bahwa warga berikut memiliki berkelakuan baik selama berdomisili di wilayah kami:',
                'paragraf_penutup' => 'Demikian surat keterangan ini dibuat untuk dipergunakan sebagaimana mestinya.',
                'required_variables' => $sbbVariables,
                'kop_template_id' => $kopSuratId,
                'mutasi_type' => 'none',
            ],
            // SURAT KETERANGAN KEMATIAN (SKM)
            [
                'kode' => 'SKM',
                'nama' => 'Surat Keterangan Kematian',
                'paragraf_pembuka' => 'Yang bertanda tangan di bawah ini menerangkan bahwa warga berikut telah meninggal dunia:',
                'paragraf_penutup' => 'Demikian surat keterangan ini dibuat untuk dipergunakan sebagaimana mestinya.',
                'required_variables' => $skmVariables,
                'kop_template_id' => $kopSuratId,
                'mutasi_type' => 'meninggal',
            ],
            // SURAT KETERANGAN USAHA (SKUH)
            [
                'kode' => 'SKUH',
                'nama' => 'Surat Keterangan Usaha',
                'paragraf_pembuka' => 'Yang bertanda tangan di bawah ini menerangkan bahwa warga berikut benar-benar memiliki usaha sebagai berikut:',
                'paragraf_penutup' => 'Demikian surat keterangan ini dibuat untuk dipergunakan sebagaimana mestinya.',
                'required_variables' => $skuhVariables,
                'kop_template_id' => $kopSuratId,
                'mutasi_type' => 'none',
            ],
            // SURAT KETERANGAN KEHILANGAN (SKKH)
            [
                'kode' => 'SKKH',
                'nama' => 'Surat Keterangan Kehilangan',
                'paragraf_pembuka' => 'Yang bertanda tangan di bawah ini menerangkan bahwa warga berikut benar-benar telah kehilangan barang sebagaimana tersebut di bawah ini:',
                'paragraf_penutup' => 'Demikian surat keterangan ini dibuat untuk dipergunakan sebagaimana mestinya.',
                'required_variables' => $skkhVariables,
                'kop_template_id' => $kopSuratId,
                'mutasi_type' => 'none',
            ],
            // SURAT PENGANTAR PINDAH DOMISILI (SPPD)
            [
                'kode' => 'SPPD',
                'nama' => 'Surat Pengantar Pindah Domisili',
                'paragraf_pembuka' => 'Yang bertanda tangan di bawah ini menerangkan bahwa warga berikut benar-benar akan pindah domisili dengan data sebagai berikut:',
                'paragraf_penutup' => 'Demikian surat pengantar ini dibuat untuk dipergunakan sebagaimana mestinya.',
                'required_variables' => $sppdVariables,
                'kop_template_id' => $kopSuratId,
                'mutasi_type' => 'pindah_keluar',
            ],
            // SURAT REKOMENDASI IMB (SR/IMB)
            [
                'kode' => 'SR/IMB',
                'nama' => 'Surat Rekomendasi Ijin Mendirikan Bangunan',
                'paragraf_pembuka' => 'Yang bertanda tangan di bawah ini menerangkan bahwa warga berikut benar-benar memiliki data bangunan sebagai berikut:',
                'paragraf_penutup' => 'Demikian surat rekomendasi ini dibuat untuk dipergunakan sebagaimana mestinya.',
                'required_variables' => json_encode($srimbVariables),
                'kop_template_id' => $kopSuratId,
                'mutasi_type' => 'none',
            ],

        ];

        // 5. Insert data using updateOrCreate
        foreach ($jenisSuratData as $data) {
            JenisSurat::updateOrCreate(['kode' => $data['kode']], $data);
        }
    }

    // ----------------------------------------------------------------------
    // --- HELPER METHODS FOR SYSTEM VARIABLES ---
    // ----------------------------------------------------------------------

    /**
     * Defines the standard variables available from Anggota Keluarga (Penduduk) data.
     * @return array
     */
    private function getAnggotaKeluargaVariables(): array
    {
        // This list serves as the MASTER SOURCE for all possible citizen variables
        return [
            'nama' => 'Nama Lengkap Penduduk',
            'nik' => 'Nomor Induk Kependudukan (NIK)',
            'jenis_kelamin' => 'Jenis Kelamin',
            'hubungan_keluarga' => 'Hubungan Keluarga',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'status_perkawinan' => 'Status Perkawinan',
            'agama' => 'Agama',
            'pendidikan' => 'Pendidikan Terakhir',
            'mata_pencaharian' => 'Pekerjaan/Mata Pencaharian',
            'alamat' => 'Alamat Lengkap',
            'rt' => 'RT',
            'rw' => 'RW',
            'desa' => 'Desa/Kelurahan',
            'kecamatan' => 'Kecamatan',
            'golongan_darah' => 'Golongan Darah',
            'kewarganegaraan' => 'Kewarganegaraan',
            'etnis' => 'Etnis',
            'no_kk' => 'Nomor Kartu Keluarga (KK)',
            'no_akta_kelahiran' => 'Nomor Akta Kelahiran',
            'nama_orang_tua' => 'Nama Orang Tua',
            'nama_lembaga' => 'Nama Lembaga',
        ];
    }

    /**
     * Transforms the Anggota Keluarga variables into the FULL 'system' variable structure.
     * @return array
     */
    private function generateSystemVariables(): array
    {
        $akVariables = $this->getAnggotaKeluargaVariables();
        $systemVariables = [];

        foreach ($akVariables as $key => $label) {
            $systemVariables[] = [
                "key" => $key,
                "label" => $label,
                "type" => "system",
                "source" => "penduduk_data",
            ];
        }

        return $systemVariables;
    }

    /**
     * Filters the FULL system variable list to include only specified keys.
     * @param array $fullList The array from generateSystemVariables().
     * @param array $keysToInclude Array of 'key' strings (e.g., ['nama', 'nik', 'alamat']).
     * @return array
     */
    private function filterSystemVariables(array $fullList, array $keysToInclude): array
    {
        $filteredList = [];

        // Create an associative array for fast lookup (key => value)
        $keyMap = collect($fullList)->keyBy('key');

        foreach ($keysToInclude as $key) {
            if ($keyMap->has($key)) {
                $filteredList[] = $keyMap->get($key);
            }
        }

        return $filteredList;
    }
}
