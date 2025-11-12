<?php

namespace App\Http\Controllers\LayananSurat;

use Illuminate\Support\Facades\View;
use App\Models\LayananSurat\{
    Permohonan,
    KopTemplate,
    JenisSurat,
};
use App\Models\{
    DataKeluarga,
    AnggotaKeluarga,
    Ttd,
};

use App\Models\MasterDDK\HubunganKeluarga;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use App\Models\MasterDDK\{
    Cacat,
    Agama,
    GolonganDarah,
    Kewarganegaraan,
    Pendidikan,
    MataPencaharian,
    KB,
    KedudukanPajak
};
use App\Models\MasterDDK\Lembaga;
use Dflydev\DotAccessData\Data;
use Illuminate\Support\Collection;
use App\Mail\SuratReadyForPickup;
use Illuminate\Support\Facades\Mail;
use Throwable;
use Illuminate\Support\Facades\File;

class PermohonanSuratController extends Controller
{

    public function index()
    {
        $permohonans = Permohonan::with([
            'jenisSurat',
            'anggotaKeluarga.dataKeluarga' => function ($query) {},
            'dataKeluarga'
        ])->get();

        $groupedKopTemplates = KopTemplate::with('jenisSurats')->get();

        return view('pages.layanan.permohonan.index', compact('permohonans', 'groupedKopTemplates'));
    }

    // handle mutasi masuk form
    public function createMasukDomisili($anggotaKeluargaId)
    {
        // Cari data Anggota Keluarga yang baru disimpan (mutasi masuk)
        $newAnggota = \App\Models\AnggotaKeluarga::findOrFail($anggotaKeluargaId);

        // Cari Jenis Surat 'Surat Keterangan Masuk Domisili'
        $jenisSuratMasuk = \App\Models\LayananSurat\JenisSurat::where('mutasi_type', 'mutasi_masuk_kk')->first();

        if (!$jenisSuratMasuk) {
            return redirect()->route('layanan.permohonan.create')->withErrors('Jenis Surat Masuk Domisili tidak ditemukan.');
        }

        // Asumsi Anda memiliki metode untuk memuat semua data master (agama, ttd, dll.)
        $data = [
            // Data Khusus untuk Pre-selection
            'preselected_jenis_surat_id' => $jenisSuratMasuk->id,
            'preselected_pemohon_id' => $newAnggota->id,
            // $defaultJenisSurat digunakan untuk paragraf pembuka/penutup
            'defaultJenisSurat' => $jenisSuratMasuk,

            // Data yang WAJIB ada di form create.blade.php Anda:
            'jenisSurats' => JenisSurat::all(), // Daftar semua jenis surat
            'anggotaKeluargas' => AnggotaKeluarga::select('id', 'nik', 'nama', 'is_kk')->where('status_penduduk', 'Aktif')->get(),
            'dataKeluargas' => DataKeluarga::select('id', 'no_kk', 'kepala_keluarga')->get(), // Untuk Kelahiran
            'ttds' => Ttd::all(), // Pejabat penanda tangan
            'kopTemplates' => KopTemplate::all(), // Kop Surat

            // Data Master untuk dynamic fields (required_variables)
            'agamaList' => Agama::all(),
            'hubunganKeluargaList' => HubunganKeluarga::all(),
            'golonganDarahList' => GolonganDarah::all(),
            'kewarganegaraanList' => Kewarganegaraan::all(),
            'pendidikanList' => Pendidikan::all(),
            'mataPencaharianList' => MataPencaharian::all(),

            // Data Nomor Surat Otomatis
            'nextNomorUrut' => Permohonan::getNextNomorUrut(), // Asumsi ini ada
            'defaultCode' => $jenisSuratMasuk->kode ?? 'SKD',
            'romanMonth' => date('roman', time()), // Format bulan Romawi
            'currentYear' => date('Y'), // Tahun saat ini

            'preselected_jenis_surat_id' => $jenisSuratMasuk->id,
            'preselected_pemohon_id' => $newAnggota->id,
        ];


        // Tampilkan form create standar, tetapi dengan data yang sudah diisi sebelumnya.
        return view('pages.layanan.permohonan.create', $data);
    }

    private function convertToRoman(int $number): string
    {
        $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
        $returnValue = '';
        while ($number > 0) {
            foreach ($map as $roman => $int) {
                if ($number >= $int) {
                    $number -= $int;
                    $returnValue .= $roman;
                    break;
                }
            }
        }
        return $returnValue;
    }

    // handle mutasi update data
    protected function handleMutasiUpdateKK(AnggotaKeluarga $anggota, Permohonan $permohonan, string $mutasiType)
    {
        // Lakukan ini di dalam transaksi di fungsi store/update utama.
        $tanggalPeristiwa = $permohonan->tanggal_permohonan;
        $dataKeluarga = $anggota->dataKeluarga; // Anggota harus dimuat dengan relasi dataKeluarga

        if (!$dataKeluarga) {
            throw new Exception("Mutasi gagal: Data Keluarga tidak ditemukan untuk anggota ini.");
        }

        // --- 1. AMBIL ID HUBUNGAN KELUARGA DINAMIS (Tidak Ada Asumsi ID) ---
        // Pastikan kolom di tabel HubunganKeluarga adalah 'nama'
        $relasiIds = HubunganKeluarga::whereIn('nama', ['Kepala Keluarga', 'Istri'])
            ->pluck('id', 'nama');

        $idKepalaKeluarga = $relasiIds['Kepala Keluarga'] ?? null;
        $idIstri = $relasiIds['Istri'] ?? null;

        if (!$idKepalaKeluarga) {
            throw new Exception("Mutasi gagal: Hubungan 'Kepala Keluarga' tidak ditemukan di master data.");
        }

        // Panggil mutasi pada Anggota Keluarga yang meninggal/pindah (handleMutasi di model)
        $anggota->handleMutasi($mutasiType, ['tanggal_surat' => $tanggalPeristiwa, 'permohonan_id' => $permohonan->id]);

        // --- Cek Anggota Keluarga yang Tersisa ---
        $anggotaAktifLainnya = $dataKeluarga->anggotaKeluarga()
            ->where('status_kehidupan', 'hidup')
            ->where('id', '!=', $anggota->id) // Exclude anggota yang baru dimutasi
            // Filter anggota lain yang bukan Kepala Keluarga (jika ada Kepala Keluarga aktif lain, abaikan logic promosi)
            ->get();

        if ($anggotaAktifLainnya->isNotEmpty()) {
            // ADA ANGGOTA LAIN YANG HIDUP: Lakukan promosi

            // 2. Tandai KK lama sebagai INAKTIF
            $dataKeluarga->update([
                'status_kk_record' => 'inactive_pending',
                'tanggal_inaktif' => $tanggalPeristiwa,
            ]);

            // 3. Promosikan Anggota Lain menjadi KK Sementara

            // Prioritas 1: Cari Istri yang aktif
            $newHead = $anggotaAktifLainnya
                ->where('hubungan_keluarga_id', $idIstri)
                ->first();

            if (!$newHead) {
                // Prioritas 2: Jika Istri tidak ada, ambil anggota aktif tertua/pertama
                // Urutkan berdasarkan tanggal lahir (jika tersedia) atau ID
                $newHead = $anggotaAktifLainnya->sortByDesc('tanggal_lahir')->first();
            }

            if ($newHead) {
                // 4. Update Anggota Baru menjadi Kepala Keluarga
                $newHead->update([
                    'hubungan_keluarga_id' => $idKepalaKeluarga,
                    'catatan_mutasi' => 'Dipromosikan menjadi Kepala Keluarga sementara karena mutasi ID ' . $permohonan->id,
                ]);

                // 5. Update Nama Kepala Keluarga di DataKeluarga
                $dataKeluarga->update([
                    'kepala_keluarga' => $newHead->nama,
                ]);
            }
        } else {
            // TIDAK ADA ANGGOTA LAIN YANG HIDUP: Tutup KK
            $dataKeluarga->update([
                'status_kk_record' => 'closed',
                'tanggal_inaktif' => $tanggalPeristiwa,
            ]);
        }
    }

    protected function handlePencatatanKelahiran(Permohonan $permohonan, int $dataKeluargaId): ?array
    {
        $customData = $permohonan->custom_variables;

        // --- Data Mapping (Kept for integrity) ---
        $jenisKelaminInput = $customData['jenis_kelamin_bayi'] ?? null;
        $jenisKelaminFixed = $jenisKelaminInput ? ucwords(strtolower($jenisKelaminInput)) : null;

        $statusPerkawinanInput = $customData['status_perkawinan'] ?? null;
        $statusPerkawinanFixed = match (strtoupper($statusPerkawinanInput ?? '')) {
            'BELUM KAWIN', 'BELUM MENIKAH' => 'Belum Menikah',
            'KAWIN', 'MENIKAH' => 'Menikah',
            'CERAI HIDUP', 'CERAI MATI', 'CERAI' => 'Cerai',
            default => null,
        };
        // ------------------------------------------

        try {
            return DB::transaction(function () use ($customData, $dataKeluargaId, $jenisKelaminFixed, $statusPerkawinanFixed) {

                // Step 1: Fetch Data Keluarga (KK)
                // IMPORTANT: Eager load anggotaKeluarga to find the Head of Household efficiently
                $dataKeluarga = DataKeluarga::with(['anggotaKeluarga' => function ($query) {
                    // Assuming Kepala Keluarga has a specific relationship ID or attribute
                    // This will need adjustment based on how you identify the KK
                    $query->where('hubungan_keluarga_id', 1); // <--- REPLACE 1 with your actual Kepala Keluarga ID
                }])->findOrFail($dataKeluargaId);

                // Step 2.1: DETERMINE NAMA ORANG TUA
                // Find the head of household among the family members
                $kepalaKeluarga = $dataKeluarga->anggotaKeluarga->first();

                // Use the Kepala Keluarga's name, or a safe default if not found
                $namaOrangTua = $kepalaKeluarga->nama ?? 'Kepala Keluarga Tidak Ditemukan';

                // 1. Hitung No Urut Berikutnya
                $lastAnggota = $dataKeluarga->anggotaKeluarga()->orderBy('no_urut', 'desc')->first();
                $nextNoUrut = ($lastAnggota->no_urut ?? 0) + 1;

                // 2. Siapkan Data Anggota Keluarga Baru
                $anggotaKeluargaData = [
                    'data_keluarga_id' => $dataKeluargaId,
                    'no_urut' => $nextNoUrut,

                    // DATA FIELDS
                    'nama' => $customData['nama_bayi'] ?? null,
                    'hubungan_keluarga_id' => $customData['hubungan_keluarga_id'] ?? null,
                    'nik' => $customData['nik_bayi'] ?? null,
                    'no_akta_kelahiran' => $customData['no_akta_kelahiran'] ?? null,

                    // FIXED REQUIRED FIELDS
                    'jenis_kelamin' => $jenisKelaminFixed,
                    'status_perkawinan' => $statusPerkawinanFixed,
                    'nama_orang_tua' => $namaOrangTua, // <--- FIXED: Using KK's name

                    // OTHER FIELDS
                    'tempat_lahir' => $customData['tempat_lahir_bayi'] ?? null,
                    'tanggal_lahir' => $customData['tanggal_lahir_bayi'] ?? null,
                    'tanggal_pencatatan' => $customData['tanggal_pencatatan'] ?? null,
                    'agama_id' => $customData['agama_id_bayi'] ?? null,
                    'golongan_darah_id' => $customData['golongan_darah_id_bayi'] ?? null,
                    'kewarganegaraan_id' => $customData['kewarganegaraan_id_bayi'] ?? null,
                    'etnis' => $customData['etnis_bayi'] ?? null,
                    'pendidikan_id' => $customData['pendidikan_id_bayi'] ?? null,
                    'mata_pencaharian_id' => $customData['mata_pencaharian_id_bayi'] ?? null,
                    'status_kehidupan' => 'hidup',
                ];

                // 3. Buat Anggota Keluarga
                $anggotaKeluarga = AnggotaKeluarga::create($anggotaKeluargaData);

                return [
                    'anggota_keluarga_id' => $anggotaKeluarga->id,
                    'data_keluarga_id' => $dataKeluargaId,
                ];
            });
        } catch (Throwable $e) {
            throw $e;
        }
    }


    public function create(Request $request)
    {
        // Read the query parameters passed from the MutasiMasukKK flow
        $preselected_jenis_surat_id = $request->get('preselected_jenis_surat_id');
        $preselected_pemohon_id = $request->get('preselected_pemohon_id');


        $kopTemplates = KopTemplate::all();
        $allJenisSurats = JenisSurat::all()->map(function ($item) {
            if (is_string($item->required_variables)) {
                $item->required_variables = json_decode($item->required_variables, true);
            }
            return $item;
        });

        $ttds = Ttd::all();
        // Use the pre-selected ID if available, otherwise fall back to the first JenisSurat
        if ($preselected_jenis_surat_id) {
            $defaultJenisSurat = $allJenisSurats->firstWhere('id', $preselected_jenis_surat_id);
        } else {
            $defaultJenisSurat = JenisSurat::first();
        }

        // Pre-calculation for Nomor Surat Display 
        $currentYear = Carbon::now()->year;
        $romanMonth = $this->convertToRoman(Carbon::now()->month);
        $defaultCode = $defaultJenisSurat->kode ?? 'XXXX';


        $nextNomorUrut = 1;

        $anggotaKeluargas = AnggotaKeluarga::select('id', 'nik', 'nama')
            ->where('status_kehidupan', 'hidup')
            ->get();


        // filter data keluarga
        $kepalaKeluargaRelasi = HubunganKeluarga::where('nama', 'Kepala Keluarga')->first();
        $idKepalaKeluarga = optional($kepalaKeluargaRelasi)->id;

        if ($idKepalaKeluarga) {
            $dataKeluargas = DataKeluarga::whereHas('anggotaKeluarga', function ($query) use ($idKepalaKeluarga) {
                $query->where('status_kehidupan', 'hidup')
                    ->where('hubungan_keluarga_id', $idKepalaKeluarga);
            })
                ->with([
                    'desas',
                    'kecamatans',
                    'perangkatDesas',
                    'anggotaKeluarga' => function ($query) {
                        $query->where('status_kehidupan', 'hidup');
                    }
                ])
                ->get();
        } else {
            $dataKeluargas = collect();
        }
        // tambah kelahiran data
        $agamaList = Agama::select('id', 'agama')->get();
        $hubunganKeluargaList = HubunganKeluarga::select('id', 'nama')->get();
        $golonganDarahList = GolonganDarah::select('id', 'golongan_darah')->get();
        $kewarganegaraanList = Kewarganegaraan::select('id', 'kewarganegaraan')->get();
        $pendidikanList = Pendidikan::select('id', 'pendidikan')->get();
        $mataPencaharianList = MataPencaharian::select('id', 'mata_pencaharian')->get();
        $initialSystemDefaults = [];
        $anggotaPemohon = null;

        // FOR FILLING SYSTEM VARIABLES COMPOSITE COMPONENTS
        if ($preselected_pemohon_id) {
            $anggotaPemohon = AnggotaKeluarga::with(['agama', 'pendidikan', 'mataPencaharian', 'golonganDarah', 'kewarganegaraan'])
                ->find($preselected_pemohon_id);

            if ($anggotaPemohon) {
                // Map AnggotaKeluarga attributes to the keys required by the dynamic form (including composite components)
                $initialSystemDefaults = [
                    // Components for Tempat dan Tanggal Lahir:
                    'tempat_lahir' => $anggotaPemohon->tempat_lahir,
                    'tanggal_lahir' => optional($anggotaPemohon->tanggal_lahir)->format('Y-m-d'), // Format date correctly

                    // Components for Alamat Lengkap:
                    'alamat' => $anggotaPemohon->alamat,
                    'rt' => $anggotaPemohon->rt,
                    'rw' => $anggotaPemohon->rw,
                    // Note: 'desa' and 'kecamatan' might require complex lookups if they are foreign keys.
                    // Assuming they are simple string columns on AnggotaKeluarga/DataKeluarga for now:
                    'desa' => $anggotaPemohon->desa,
                    'kecamatan' => $anggotaPemohon->kecamatan,

                    // Other required system fields (optional, used if they should pre-fill inputs)
                    'nik' => $anggotaPemohon->nik,
                    'jenis_kelamin' => $anggotaPemohon->jenis_kelamin,
                    'agama_id' => $anggotaPemohon->agama_id,
                    'pendidikan_id' => $anggotaPemohon->pendidikan_id,
                    'mata_pencaharian_id' => $anggotaPemohon->mata_pencaharian_id,
                    'kewarganegaraan_id' => $anggotaPemohon->kewarganegaraan_id,
                    'golongan_darah_id' => $anggotaPemohon->golongan_darah_id,

                ];

                // Add other complex defaults if needed (e.g., if you have system fields
                // that are also used as inputs, like agama_id, it must be the ID value)
            }
        }

        // Merge system defaults with old session input (which stores user-filled 'custom' fields)
        $oldCustomData = array_merge(
            $initialSystemDefaults,
            session()->getOldInput('custom_data', [])
        );
        return view('pages.layanan.permohonan.create', [
            'kopTemplates' => $kopTemplates,
            'jenisSurats' => $allJenisSurats,
            'anggotaKeluargas' => $anggotaKeluargas,
            'ttds' => $ttds,
            'defaultJenisSurat' => $defaultJenisSurat,
            'currentYear' => $currentYear,
            'romanMonth' => $romanMonth,
            'defaultCode' => $defaultCode,
            'nextNomorUrut' => $nextNomorUrut,
            'dataKeluargas' => $dataKeluargas,
            // tambah kelahiran data
            'agamaList' => $agamaList,
            'hubunganKeluargaList' => $hubunganKeluargaList,
            'golonganDarahList' => $golonganDarahList,
            'kewarganegaraanList' => $kewarganegaraanList,
            'pendidikanList' => $pendidikanList,
            'mataPencaharianList' => $mataPencaharianList,
            'preselected_jenis_surat_id' => $preselected_jenis_surat_id,
            'preselected_pemohon_id' => $preselected_pemohon_id,
            'oldCustomData' => $oldCustomData,

        ]);
    }


    public function store(Request $request)
    {
        // 1. Fetch JenisSurat dan Mutasi Type 
        // $templateVariables = $jenisSurat->required_variables ?? [];
        $jenisSurat = JenisSurat::findOrFail($request->input('jenis_surat_id'));
        // --- START FIX ---
        $templateVariables = $jenisSurat->required_variables;

        // Check if it's a string (meaning casting failed or was bypassed)
        if (is_string($templateVariables)) {
            // Attempt to decode the JSON string. Use 'true' for associative array.
            $decoded = json_decode($templateVariables, true);

            // Set to decoded array if successful, otherwise default to an empty array.
            $templateVariables = is_array($decoded) ? $decoded : [];
        } else {
            // If it's already an array/object (due to successful casting) or null, 
            // use null coalescing for safety.
            $templateVariables = $templateVariables ?? [];
        }
        // --- END FIX ---


        $mutasiType = $jenisSurat->mutasi_type ?? 'none';
        $isMutasiMasukKK = $mutasiType === 'mutasi_masuk_kk';
        $isKelahiran = $mutasiType === 'pencatatan_kelahiran';
        $isUpdateMutasi = in_array($mutasiType, ['meninggal', 'pindah_keluar']);

        // --- AUTO-NUMBERING LOGIC ---
        $currentYear = Carbon::now()->year;
        $romanMonth = $this->convertToRoman(Carbon::now()->month);

        $userNomorUrut = $request->input('nomor_urut_input');
        if (!empty($userNomorUrut) && is_numeric($userNomorUrut)) {
            $nextNomorUrut = (int)$userNomorUrut;
        } else {
            $lastPermohonan = Permohonan::where('id_format_nomor_surats', $jenisSurat->id)
                ->where('tahun', $currentYear)
                ->orderBy('nomor_urut', 'desc')
                ->first();

            $nextNomorUrut = ($lastPermohonan->nomor_urut ?? 0) + 1;
        }

        $fullNomorSurat = sprintf(
            "%s/%s/%s/%s",
            str_pad($nextNomorUrut, 3, '0', STR_PAD_LEFT),
            $jenisSurat->kode,
            $romanMonth,
            $currentYear
        );
        // --- END AUTO-NUMBERING ---

        // 2. Base Validation Rules
        $rules = [
            'jenis_surat_id' => 'required|exists:jenis_surats,id',
            'id_kop_templates' => 'required|exists:kop_templates,id',
            'id_ttds' => 'required|exists:ttds,id',
            'tanggal_permohonan' => 'required|date',
            'paragraf_pembuka' => 'required|string',
            'paragraf_penutup' => 'required|string',
            'status' => 'required|in:belum_diverifikasi,diverifikasi,ditolak,siap_diambil,sudah_diambil',
            'catatan_penolakan' => 'nullable|string|max:1000',

            // Dynamic: anggota keluarga ID rules
            'id_anggota_keluargas' => [
                ($isMutasiMasukKK || $isKelahiran) ? 'nullable' : 'required',
                function ($attribute, $value, $fail) use ($isMutasiMasukKK, $isKelahiran) {
                    if ($isMutasiMasukKK || $isKelahiran || !$value) return;
                    if (str_starts_with($value, 'kk_')) {
                        $id = (int) substr($value, 3);
                        if (!DB::table('data_keluargas')->where('id', $id)->exists()) {
                            $fail('The selected KK ID is invalid.');
                        }
                    } else {
                        if (!DB::table('anggota_keluargas')->where('id', $value)->exists()) {
                            $fail('The selected Anggota Keluarga ID is invalid.');
                        }
                    }
                },
            ],
            'nomor_urut_input' => [
                'required',
                'integer',
                'min:1',
                // --- ATURAN UNIQUE BARU ---
                Rule::unique('permohonans', 'nomor_urut')->where(function ($query) use ($request, $currentYear) {
                    return $query->where('id_format_nomor_surats', $request->input('jenis_surat_id'))
                        ->where('tahun', $currentYear);
                }),
            ],

            // Mutasi type handling
        ];

        // 3. Add dynamic rules for custom variables
        $customVariableRules = [];
        foreach ($templateVariables as $variable) {
            if (($variable['type'] ?? 'text') !== 'system') {
                $key = $variable['key'];
                $isRequired = ($variable['required'] ?? true);
                $rule = $isRequired ? 'required|' : 'nullable|';
                $rule .= 'string|max:1000';

                if ($isMutasiMasukKK || $isKelahiran) {
                    if ($key === 'nik') {
                        $rule = ($isRequired ? 'required' : 'nullable') . '|string|size:16|unique:anggota_keluargas,nik';
                    }
                    if ($key === 'no_kk' && $isMutasiMasukKK) {
                        $rule = ($isRequired ? 'required' : 'nullable') . '|string|unique:data_keluargas,no_kk';
                    }
                    if (in_array($key, ['agama_id', 'pendidikan_id'])) {
                        $tableMap = [
                            'agama_id' => 'agama',
                            'pendidikan_id' => 'pendidikans',
                        ];
                        $rule = 'required|exists:' . $tableMap[$key] . ',id';
                    }
                }
                $customVariableRules["custom_data.$key"] = $rule;
            }
        }
        $rules = array_merge($rules, $customVariableRules);

        // 4. Validate request
        $validatedData = $request->validate($rules);

        // 5. Prepare data
        $data = $validatedData;
        $customData = $validatedData['custom_data'] ?? [];
        foreach ($customData as $key => $value) {
            if ($value === '') {
                $customData[$key] = null;
            }
        }
        unset($data['custom_data'], $data['nomor_urut_input']);

        $data['nomor_surat'] = $fullNomorSurat;
        $data['nomor_urut'] = $nextNomorUrut;
        $data['tahun'] = $currentYear;
        $data['id_format_nomor_surats'] = $data['jenis_surat_id'];
        $data['custom_variables'] = $customData;

        $selectedId = $request->input('id_anggota_keluargas');
        if ($isKelahiran) {
            $selectedId = $request->input('selected_id');
        }

        $data['id_anggota_keluargas'] = null;
        $data['id_data_keluargas'] = null;

        $permohonan = null;

        try {
            DB::transaction(function () use (&$permohonan, &$data, $isMutasiMasukKK, $isKelahiran, $selectedId, $mutasiType, $isUpdateMutasi) {
                if ($isMutasiMasukKK) {
                    $anggota = AnggotaKeluarga::select('id', 'data_keluarga_id')->find($selectedId);

                    if (!$anggota) {
                        throw new \Exception("Gagal menemukan data Anggota Keluarga baru dengan ID: " . $selectedId);
                    }

                    // Assign the IDs of the already-created entities
                    $data['id_anggota_keluargas'] = $anggota->id;
                    $data['id_data_keluargas'] = $anggota->data_keluarga_id;
                } elseif ($isKelahiran) {
                    $permohonanTemp = new Permohonan($data);

                    // Determine which KK is selected
                    if (str_starts_with($selectedId, 'kk_')) {
                        $dataKeluargaId = (int) substr($selectedId, 3);
                    } else {
                        $anggota = AnggotaKeluarga::find($selectedId);
                        if (!$anggota || !$anggota->data_keluarga_id) {
                            throw new \Exception("Data Keluarga ID wajib diisi untuk pencatatan kelahiran.");
                        }
                        $dataKeluargaId = $anggota->data_keluarga_id;
                    }

                    // Now call handlePencatatanKelahiran safely
                    $newIds = $this->handlePencatatanKelahiran($permohonanTemp, $dataKeluargaId);

                    if ($newIds) {
                        $data['id_anggota_keluargas'] = $newIds['anggota_keluarga_id'];
                        $data['id_data_keluargas'] = $newIds['data_keluarga_id'];
                    } else {
                        throw new \Exception("Pencatatan kelahiran gagal memproses data.");
                    }
                } else {
                    if (str_starts_with($selectedId, 'kk_')) {
                        $data['id_data_keluargas'] = (int)substr($selectedId, 3);
                    } else {
                        $data['id_anggota_keluargas'] = (int)$selectedId;
                    }
                }

                $permohonan = Permohonan::create($data);

                if ($isUpdateMutasi && $permohonan->id_anggota_keluargas) {
                    $anggota = AnggotaKeluarga::with(['dataKeluarga', 'dataKeluarga.anggotaKeluarga'])
                        ->find($permohonan->id_anggota_keluargas);

                    if ($anggota) {
                        if ($anggota->isKepalaKeluarga()) {
                            $this->handleMutasiUpdateKK($anggota, $permohonan, $mutasiType);
                        } else {
                            $dataMutasi = [
                                'tanggal_surat' => $permohonan->tanggal_permohonan,
                                'permohonan_id' => $permohonan->id,
                            ];
                            $anggota->handleMutasi($mutasiType, $dataMutasi);
                        }
                    }
                }
            });
        } catch (\Throwable $e) {
            Log::error('DEBUG MUTASI FAILED: ' . $e->getMessage() . ' Trace: ' . $e->getTraceAsString());
            throw $e;
        }

        return redirect()->route('permohonan.index')
            ->with('success', 'Permohonan Surat berhasil dibuat dan mutasi data diproses.');
    }

    public function edit($id)
    {
        try {

            $permohonan = Permohonan::findOrFail($id);
            $jenisSurat = $permohonan->jenisSurat;
            $kopTemplates = KopTemplate::all();
            $allJenisSurats = JenisSurat::all();
            $ttds = Ttd::all();
            $anggotaKeluargas = AnggotaKeluarga::select('id', 'nik', 'nama')->get();
            $dataKeluargas = DataKeluarga::select('id', 'no_kk', 'kepala_keluarga')->get();

            $preparedDataKeluargas = $dataKeluargas->map(function ($keluarga) {
                return (object) [
                    'id' => 'kk_' . $keluarga->id,
                    'nik' => $keluarga->no_kk,
                    'nama' => '(KK) ' . $keluarga->kepala_keluarga,
                    'is_kk' => true,
                ];
            });

            $combinedAnggota = $anggotaKeluargas->concat($preparedDataKeluargas);

            // --- FIX START: Force requiredVariables to be an array ---
            $requiredVariables = $permohonan->jenisSurat->required_variables;

            if (is_string($requiredVariables)) {
                $decoded = json_decode($requiredVariables, true);
                $requiredVariables = is_array($decoded) ? $decoded : [];
            } else {
                $requiredVariables = $requiredVariables ?? [];
            }
            $customFields = collect($requiredVariables)->filter(function ($variable) {
                return ($variable['type'] ?? 'text') !== 'system';
            });


            $storedCustomData = old('custom_data', $permohonan->custom_variables ?? []);

            $currentYear = $permohonan->tahun ?? Carbon::now()->year;
            $monthToUse = $permohonan->created_at ? $permohonan->created_at->month : Carbon::now()->month;
            $romanMonth = $this->convertToRoman($monthToUse);

            $currentNomorUrut = $permohonan->nomor_urut;
            $defaultCode = $jenisSurat->kode ?? 'XXXX';
            return view('pages.layanan.permohonan.edit', [
                'permohonan' => $permohonan,
                'kopTemplates' => $kopTemplates,
                'allJenisSurats' => $allJenisSurats,
                'anggotaKeluargas' => $combinedAnggota,
                'ttds' => $ttds,
                'customFields' => $customFields,
                'storedCustomData' => $storedCustomData,
                'mutasiType' => $jenisSurat->mutasi_type,
                'currentYear' => $currentYear,
                'romanMonth' => $romanMonth,
                'currentNomorUrut' => $currentNomorUrut,
                'defaultCode' => $defaultCode,
            ]);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('permohonan.index')->with('error', 'Permohonan Surat tidak ditemukan.');
        } catch (Exception $e) {
            Log::error('Error loading edit form for Permohonan ID ' . $id . ': ' . $e->getMessage());
            return redirect()->route('permohonan.index')->with('error', 'Terjadi kesalahan saat memuat formulir edit.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $permohonan = Permohonan::findOrFail($id);
            $jenisSurat = $permohonan->jenisSurat;
            $oldStatus = $permohonan->status;
            // --- START Re-generate nomor_surat ---
            $currentYear = $permohonan->tahun;
            $romanMonth = $this->convertToRoman(Carbon::now()->month);
            $userNomorUrut = $request->input('nomor_urut_input');

            $nextNomorUrut = (!empty($userNomorUrut) && is_numeric($userNomorUrut))
                ? (int)$userNomorUrut
                : $permohonan->nomor_urut;

            // Re-generate the full string
            $fullNomorSurat = sprintf(
                "%s/%s/%s/%s",
                str_pad($nextNomorUrut, 3, '0', STR_PAD_LEFT),
                $jenisSurat->kode,
                $romanMonth,
                $currentYear
            );
            // -----------------------------------------------------------

            $rules = [
                'jenis_surat_id' => 'required|exists:jenis_surats,id',
                'id_kop_templates' => 'required|exists:kop_templates,id',
                'id_ttds' => 'required|exists:ttds,id',
                'tanggal_permohonan' => 'required|date',
                'paragraf_pembuka' => 'required|string',
                'paragraf_penutup' => 'required|string',
                'id_anggota_keluargas' => 'required',
                'status' => 'required|in:belum_diverifikasi,diverifikasi,ditolak,siap_diambil,sudah_diambil',
                'catatan_penolakan' => 'nullable|string|max:1000',
                'nomor_urut_input' => [
                    'required',
                    'integer',
                    'min:1',
                    Rule::unique('permohonans', 'nomor_urut')->where(function ($query) use ($request, $currentYear) {
                        return $query->where('id_format_nomor_surats', $request->input('jenis_surat_id'))
                            ->where('tahun', $currentYear);
                    })->ignore($permohonan->id),
                ],
                'custom_data' => 'nullable|array',

            ];


            $validatedData = $request->validate($rules);
            $newStatus = $validatedData['status'];

            $data = $request->except(['_token', '_method', 'custom_data', 'nomor_urut_input']);
            $data['nomor_surat'] = $fullNomorSurat;
            $data['nomor_urut'] = $nextNomorUrut;
            $data['tahun'] = $currentYear;
            $data['id_format_nomor_surats'] = $data['jenis_surat_id'];

            $selectedId = $request->input('id_anggota_keluargas');
            $data['id_anggota_keluargas'] = null;
            $data['id_data_keluargas'] = null;

            if (str_starts_with($selectedId, 'kk_')) {
                $data['id_data_keluargas'] = (int) substr($selectedId, 3);
            } else {
                $data['id_anggota_keluargas'] = (int) $selectedId;
            }


            if ($request->has('custom_data')) {

                $data['custom_variables'] = $request->input('custom_data', []);
            } else {

                $data['custom_variables'] = $permohonan->custom_variables;
            }


            $permohonan->update($data);
            // email notificaation logic
            if ($newStatus === 'siap_diambil' && $oldStatus !== 'siap_diambil') {

                $anggota = $permohonan->anggotaKeluarga()->select('email')->first();

                $emailTujuan = optional($anggota)->email;

                if (empty($emailTujuan)) {
                    Log::warning('Email tidak terkirim ' . $permohonan->id . ': Periksa email dari penduduk tersebut.');
                } else {
                    Mail::to($emailTujuan)->send(new SuratReadyForPickup($permohonan));
                    Log::info('Email dikirim kepada ' . $emailTujuan . ' untuk surat ' . $permohonan->jenisSurat->nama);
                }
            }


            $targetAnggota = null;
            $mutasiType = $jenisSurat->mutasi_type;


            if ($permohonan->id_anggota_keluargas) {
                $targetAnggota = AnggotaKeluarga::find($permohonan->id_anggota_keluargas);
            } elseif ($mutasiType === 'pencatatan_kelahiran') {
                $newAnggotaId = $permohonan->custom_variables['id_anggota_keluarga_baru'] ?? null;
                if ($newAnggotaId) {
                    $targetAnggota = AnggotaKeluarga::find($newAnggotaId);
                }
            }

            if ($targetAnggota) {
                switch ($mutasiType) {
                    case 'meninggal':
                        if ($targetAnggota->status_kependudukan !== 'Meninggal') {
                            $targetAnggota->update(['status_kependudukan' => 'Meninggal']);
                        }
                        break;

                    case 'pindah_keluar':
                        if ($targetAnggota->status_kependudukan !== 'Pindah') {
                            $targetAnggota->update(['status_kependudukan' => 'Pindah']);
                        }
                        break;

                    case 'pencatatan_kelahiran':
                    case 'mutasi_masuk_kk':
                    case 'none':
                    default:
                        break;
                }
            }
            // email notification logic 
            $successMessage = 'Permohonan Surat berhasil diperbarui.';

            if ($newStatus === 'siap_diambil') {
                if (!empty($emailTujuan)) {
                    $successMessage = "Status diupdate menjadi siap diambil, email pemberitahuan sudah terkirim kepada {$emailTujuan}.";
                } else {
                    $successMessage = "Status diupdate menjadi siap diambil, namun email pemberitahuan tidak dapat dikirim karena alamat email tidak ditemukan.";
                }
            }

            return redirect()->route('permohonan.index')->with('success', $successMessage);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('permohonan.index')->with('error', 'Permohonan Surat tidak ditemukan.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (Exception $e) {
            Log::error('Error updating Permohonan ID ' . $id . ': ' . $e->getMessage());
            return redirect()->route('permohonan.index')->with('error', 'Terjadi kesalahan saat memperbarui Permohonan Surat: ' . $e->getMessage());
        }
    }
    public function destroy($id)
    {
        try {
            $permohonan = Permohonan::findOrFail($id);
            $permohonan->delete();

            return redirect()->route('permohonan.index')->with('success', 'Permohonan Surat berhasil dihapus.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('permohonan.index')->with('error', 'Permohonan Surat tidak ditemukan.');
        } catch (Exception $e) {
            Log::error('Error deleting Permohonan ID ' . $id . ': ' . $e->getMessage());
            return redirect()->route('permohonan.index')->with('error', 'Terjadi kesalahan saat menghapus Permohonan Surat.');
        }
    }

    public function getNextNomorUrut($jenisSuratId)
    {
        // Ensure $jenisSuratId is a valid integer before querying
        if (!is_numeric($jenisSuratId) || $jenisSuratId <= 0) {
            return response()->json(['success' => false, 'message' => 'Invalid Jenis Surat ID.'], 400);
        }

        try {
            $currentYear = Carbon::now()->year;

            $lastPermohonan = Permohonan::where('id_format_nomor_surats', $jenisSuratId)
                ->where('tahun', $currentYear)
                ->orderBy('nomor_urut', 'desc')
                ->first();

            $lastNomor = $lastPermohonan->nomor_urut ?? 0;
            $nextNomorUrut = $lastNomor + 1;

            return response()->json([
                'success' => true,
                'next_number' => $nextNomorUrut,
            ]);
        } catch (\Exception $e) {
            // Log the error for debugging purposes
            Log::error('Failed to calculate next surat number for ID ' . $jenisSuratId . ': ' . $e->getMessage());

            // Return a generic error to the frontend, but keep the number at 1 as a fallback
            return response()->json([
                'success' => false,
                'next_number' => 1,
                'message' => 'Internal server error during number calculation.'
            ], 500);
        }
    }



    public function cetak($permohonanId)
    {
        // 1. Fetch Permohonan with ALL required relationships
        $permohonan = Permohonan::with([
            // Subject Relationships
            'anggotaKeluarga.dataKeluarga.desas',
            'anggotaKeluarga.dataKeluarga.kecamatans',
            'anggotaKeluarga.agama',
            'anggotaKeluarga.mataPencaharian',
            'anggotaKeluarga.kewarganegaraan',
            'anggotaKeluarga.pendidikan',
            'anggotaKeluarga.golonganDarah',
            'anggotaKeluarga.hubunganKeluarga',
            'dataKeluarga.desas',
            'dataKeluarga.kecamatans',
            'jenisSurat.kopTemplate',
            'ttd',
        ])->findOrFail($permohonanId);

        // --- Subject and Template Identification ---
        $subject = $permohonan->anggotaKeluarga ?? $permohonan->dataKeluarga;
        $isAnggota = $permohonan->anggotaKeluarga !== null;
        $kopTemplate = optional($permohonan->jenisSurat)->kopTemplate;
        $ttdModel = $permohonan->ttd;
        $locationSource = $isAnggota ? $subject->dataKeluarga : $subject;

        // --- START FIX: Ensure requiredVars is an array ---
        $requiredVars = optional($permohonan->jenisSurat)->required_variables;

        // Check if it's a string (meaning casting failed or was bypassed)
        if (is_string($requiredVars)) {
            // Attempt to decode the JSON string. Use 'true' for associative array.
            $decoded = json_decode($requiredVars, true);

            // Set to decoded array if successful, otherwise default to an empty array.
            $requiredVars = is_array($decoded) ? $decoded : [];
        } else {
            // If it's already an array (due to successful casting) or null, 
            // use null coalescing for safety.
            $requiredVars = $requiredVars ?? [];
        }
        // end fix
        $customVars = $permohonan->custom_variables ?? [];
        // --- 2. Build Core Letter Data (Kop, TTD, Paragraf) ---

        // Logo/Kop Data (pulled from TTD/KopTemplate)
        $data['logo_url'] = optional($kopTemplate)->logo ? public_path($kopTemplate->logo) : null;
        $data['instansi_kabupaten'] = optional($kopTemplate)->nama_kabupaten ?? 'PEMERINTAH KABUPATEN CONTOH';


        $data['instansi_kecamatan'] = $kopTemplate?->nama_kecamatan ?? $locationSource?->kecamatans?->nama_kecamatan ?? 'N/A';
        $data['instansi_desa'] = $kopTemplate?->nama_desa ?? $locationSource?->desas?->nama_desa ?? 'N/A';
        $data['instansi_alamat'] = $kopTemplate?->alamat_instansi ?? 'N/A';
        // Letter Metadata
        $data['nomor'] = $permohonan->nomor_surat;
        $data['paragraf_pembuka'] = $permohonan->paragraf_pembuka ?? optional($permohonan->jenisSurat)->paragraf_pembuka;
        $data['paragraf_penutup'] = $permohonan->paragraf_penutup ?? optional($permohonan->jenisSurat)->paragraf_penutup;
        $data['surat_judul'] = optional($permohonan->jenisSurat)->nama ?? 'SURAT KETERANGAN';

        // TTD Data
        $data['nip'] = optional($ttdModel)->nip ?? 'N/A';
        $data['ttd_nama'] = optional($ttdModel)->nama ?? 'N/A';
        $data['ttd_jabatan'] = optional($ttdModel)->jabatan ?? 'N/A';
        $data['city_village'] = optional($locationSource->desas)->nama_desa ?? 'N/A';
        $data['tanggal_surat'] = Carbon::parse($permohonan->tanggal_permohonan)->translatedFormat('d F Y');
        // Determine Kepala Keluarga Name
        $namaKepalaKeluarga = 'N/A';
        if ($isAnggota && $subject->dataKeluarga) {
            // If the subject is an Anggota, pull the KK Name from their DataKeluarga relation
            $namaKepalaKeluarga = $subject->dataKeluarga->kepala_keluarga ?? 'N/A';
        } elseif (!$isAnggota) {
            // If the subject IS the DataKeluarga, the name is kepala_keluarga
            $namaKepalaKeluarga = $subject->kepala_keluarga ?? 'N/A';
        }
        $dataKeluargaId = $isAnggota
            ? $subject->data_keluarga_id
            : $subject->id;

        // Find Kepala Keluarga based on relationship name
        $kepalaKeluarga = \App\Models\AnggotaKeluarga::where('data_keluarga_id', $dataKeluargaId)
            ->whereHas('hubunganKeluarga', function ($q) {
                $q->whereRaw('LOWER(nama) = ?', ['kepala keluarga']);
            })
            ->first();

        $namaKepalaKeluarga = $kepalaKeluarga?->nama
            ?? optional($subject->dataKeluarga)->kepala_keluarga
            ?? optional($subject)->kepala_keluarga
            ?? 'N/A';

        $isSKK = optional($permohonan->jenisSurat)->mutasi_type === 'pencatatan_kelahiran';

        // --- 3. Process ALL Variables for Content Table ---
        $contentTableData = [];

        foreach ($requiredVars as $variable) {
            $key = $variable['key'];
            $label = $variable['label'];
            $type = $variable['type'] ?? 'text';
            $isDisplayed = ($type === 'system') || (isset($variable['display']) && $variable['display'] === true);
            $value = 'N/A';
            // --- LOGIKA PENTING: FILTER REDUNDANSI UNTUK SKK ---
            if ($isSKK && $type === 'system') {
                if (in_array($key, ['nama', 'nik', 'alamat'])) {
                    // SKIPPED: Jangan cetak Nama Lengkap, NIK, dan Alamat karena 
                    // Nama Kepala Keluarga dan Alamat Lengkap sudah akan dicetak
                    continue;
                }
            }
            // Only process fields that are explicitly set for display in the PDF
            if ($isDisplayed) {

                if ($type === 'system') {
                    // SYSTEM VARIABLE: Pull from loaded subject models
                    if ($isAnggota) {
                        $value = match ($key) {
                            'nama' => $subject->nama ?? optional($subject->dataKeluarga)->kepala_keluarga ?? 'N/A',
                            'nik' => $subject->nik ?? 'N/A',
                            'jenis_kelamin' => $subject->jenis_kelamin ?? 'N/A',
                            'agama' => optional($subject->agama)->agama ?? 'N/A',
                            'status_perkawinan' => $subject->status_perkawinan ?? 'N/A',
                            'pendidikan' => optional($subject->pendidikan)->pendidikan ?? 'N/A',
                            'mata_pencaharian' => optional($subject->mataPencaharian)->mata_pencaharian ?? 'N/A',
                            'golongan_darah' => optional($subject->golonganDarah)->golongan_darah ?? 'N/A',
                            'hubungan_keluarga' => optional($subject->hubunganKeluarga)->nama ?? 'N/A',
                            'ttl' => optional($subject)->tempat_lahir . ', ' . (optional($subject->tanggal_lahir)->translatedFormat('d F Y') ?? '-'),
                            'alamat' => optional($subject->dataKeluarga)->alamat ?? 'N/A',
                            'rt' => optional($subject->dataKeluarga)->rt ?? 'N/A',
                            'rw' => optional($subject->dataKeluarga)->rw ?? 'N/A',
                            'desa' => optional(optional($subject->dataKeluarga)->desas)->nama_desa ?? 'N/A',
                            'kecamatan' => optional(optional($subject->dataKeluarga)->kecamatans)->nama_kecamatan ?? 'N/A',
                            'kepala_keluarga' => $namaKepalaKeluarga,


                            default => $subject->$key ?? 'N/A',
                        };
                    } else {
                        // Logic for DataKeluarga (KK) subject
                        $value = match ($key) {
                            'nama' => $subject->kepala_keluarga ?? 'N/A',
                            'nik' => $subject->no_kk ?? 'N/A',
                            'alamat' => $subject->alamat ?? 'N/A',
                            default => 'N/A',
                        };
                    }
                } else {
                    // CUSTOM VARIABLE: Retrieve from saved custom_variables JSON
                    $value = $customVars[$key] ?? 'N/A';
                }

                // Store the clean data for the table loop
                $contentTableData[] = [
                    'label' => $label,
                    'value' => $value,
                    'key' => $key
                ];
            }
        }

        // Attach the combined content table data to the $data array
        $data['contentTableData'] = $contentTableData;

        // --- 4. Generate PDF ---
        $jenisSuratKode = optional($permohonan->jenisSurat)->kode ?? 'UNKNOWN';
        $safe_kode = Str::slug($jenisSuratKode, '_');
        $safe_nomor = Str::slug($permohonan->nomor_surat, '_');
        $filename = "Surat_{$safe_kode}_{$safe_nomor}.pdf";

        $pdf = PDF::loadView('pages.layanan.permohonan.cetak.cetak_surat', $data);
        return $pdf->download($filename);
    }

    //view ttd page
    public function showTtdPage()
    {
        return view('pages.ttd.index');
    }

    public function unverified(Request $request)
    {
        $permohonans = Permohonan::where('status', 'belum_diverifikasi')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        $groupedKopTemplates = KopTemplate::with('jenisSurats')->get();
        return view('pages.layanan.permohonan.unverified', [
            'permohonans' => $permohonans,
            'groupedKopTemplates' => $groupedKopTemplates,
        ]);
    }
    // send email notification
    // public function updateStatus(Request $request, Permohonan $permohonan)
    // {
    //     $request->validate(['status' => 'required|in:belum_diverifikasi,diverifikasi,ditolak,siap_diambil,sudah_diambil']);

    //     $oldStatus = $permohonan->status;
    //     $newStatus = $request->status;

    //     $permohonan->status = $newStatus;
    //     $permohonan->save();
    //     if ($newStatus === 'siap_diambil' && $oldStatus !== 'siap_diambil') {


    //         $emailTujuan = optional($permohonan->anggotaKeluarga)->email;

    //         if ($emailTujuan) {
    //             Mail::to($emailTujuan)->send(new SuratReadyForPickup($permohonan));
    //         }
    //     }
    //     return back()->with('success', 'Status permohonan berhasil diperbarui.');
    // }
}
