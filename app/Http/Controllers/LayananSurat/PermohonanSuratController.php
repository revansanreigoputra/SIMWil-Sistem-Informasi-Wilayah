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

use Throwable;

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

    protected function handleMutasiMasukKK(Permohonan $permohonan): ?array
    {
        // Custom data dari Permohonan Surat
        $customData = $permohonan->custom_variables;

        // PENTING: Lakukan transaksi untuk memastikan kedua INSERT (KK & Anggota) berhasil
        try {
            return DB::transaction(function () use ($permohonan, $customData) {

                // --- 1. SIAPKAN DATA KELUARGA (KK) BARU ---
                // Ambil hanya field yang dibutuhkan untuk tabel DataKeluarga dari Custom Variables.
                // Asumsi key di custom_variables menggunakan format: no_kk, kepala_keluarga, alamat, rt, rw, desa_id, kecamatan_id, nama_pengisi_id
                $dataKeluargaData = [
                    'no_kk' => $customData['no_kk'], // Mengacu pada validation data_keluarga store
                    'kepala_keluarga' => $customData['kepala_keluarga'],
                    'alamat' => $customData['alamat'],
                    'rt' => $customData['rt'],
                    'rw' => $customData['rw'],
                    'desa_id' => $customData['desa_id'],
                    'kecamatan_id' => $customData['kecamatan_id'],
                    'nama_pengisi_id' => $customData['nama_pengisi_id'],
                    'status_kk_record' => $customData['status_kk_record'],
                    'tanggal_inaktif' => $customData['tanggal_inaktif']
                ];

                $dataKeluarga = DataKeluarga::create($dataKeluargaData);


                // --- 2. SIAPKAN DATA ANGGOTA KELUARGA (Kepala Keluarga) ---
                // Ambil field yang diperlukan untuk AnggotaKeluarga (termasuk Cacat/Lembaga)
                $anggotaKeluargaData = [
                    'data_keluarga_id' => $dataKeluarga->id,
                    'no_urut' => 1, // KK selalu no urut 1
                    'nama' => $dataKeluarga->kepala_keluarga, // Ambil nama dari data keluarga

                    // Field yang diambil dari custom_variables permohonan
                    'nik' => $customData['nik'],
                    'no_akta_kelahiran' => $customData['no_akta_kelahiran'] ?? null,
                    'jenis_kelamin' => $customData['jenis_kelamin'],
                    'hubungan_keluarga_id' => $customData['hubungan_keluarga_id'] ?? null, // Harus ada di validasi data_keluarga store
                    'tempat_lahir' => $customData['tempat_lahir'] ?? null,
                    'tanggal_lahir' => $customData['tanggal_lahir'] ?? null,
                    'tanggal_pencatatan' => $customData['tanggal_pencatatan'] ?? null,
                    'status_perkawinan' => $customData['status_perkawinan'] ?? null,
                    'agama_id' => $customData['agama_id'] ?? null,
                    'golongan_darah_id' => $customData['golongan_darah_id'] ?? null,
                    'kewarganegaraan_id' => $customData['kewarganegaraan_id'] ?? null,
                    'etnis' => $customData['etnis'] ?? null,
                    'pendidikan_id' => $customData['pendidikan_id'] ?? null,
                    'mata_pencaharian_id' => $customData['mata_pencaharian_id'] ?? null,
                    'status_kehidupan' => 'hidup', // Default status untuk penduduk baru
                ];

                // --- Logika Cacat (Diambil dari AnggotaKeluarga store Controller) ---
                $namaCacat = $customData['nama_cacat'] ?? null;
                $cacatId = $customData['cacat_id'] ?? null;

                if ($namaCacat && $cacatId) {
                    $selectedCacat = Cacat::find($cacatId);
                    if ($selectedCacat) {
                        $newCacat = Cacat::firstOrCreate(
                            ['tipe' => $selectedCacat->tipe, 'nama_cacat' => $namaCacat]
                        );
                        $anggotaKeluargaData['cacat_id'] = $newCacat->id;
                    }
                } else {
                    $anggotaKeluargaData['cacat_id'] = null;
                }

                // --- Logika Lembaga (Diambil dari AnggotaKeluarga store Controller) ---
                $namaLembaga = $customData['nama_lembaga'] ?? null;
                $lembagaId = $customData['lembaga_id'] ?? null;

                if ($namaLembaga && $lembagaId) {
                    $selectedLembaga = Lembaga::find($lembagaId);
                    if ($selectedLembaga) {
                        $newLembaga = Lembaga::firstOrCreate(
                            ['nama_lembaga' => $namaLembaga]
                        );
                        $anggotaKeluargaData['lembaga_id'] = $newLembaga->id;
                    }
                } else {
                    $anggotaKeluargaData['lembaga_id'] = null;
                }

                // Buat Anggota Keluarga
                $anggotaKeluarga = AnggotaKeluarga::create($anggotaKeluargaData);

                return [
                    'anggota_keluarga_id' => $anggotaKeluarga->id,
                    'data_keluarga_id' => $dataKeluarga->id,
                ];
            });
        } catch (Throwable $e) {
            // Log the error and re-throw
            // Log::error("Mutasi Masuk Gagal: " . $e->getMessage());
            throw new \Exception("Gagal menyimpan data penduduk baru (Mutasi Masuk). Pastikan semua data lengkap.", 0, $e);
            return null;
        }
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
        $jenisKelaminInput = $customData['jenis_kelamin'] ?? null;
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
                    'nama' => $customData['nama'] ?? null,
                    'hubungan_keluarga_id' => $customData['hubungan_keluarga_id'] ?? null,
                    'nik' => $customData['nik'] ?? null,
                    'no_akta_kelahiran' => $customData['no_akta_kelahiran'] ?? null,

                    // FIXED REQUIRED FIELDS
                    'jenis_kelamin' => $jenisKelaminFixed,
                    'status_perkawinan' => $statusPerkawinanFixed,
                    'nama_orang_tua' => $namaOrangTua, // <--- FIXED: Using KK's name

                    // OTHER FIELDS
                    'tempat_lahir' => $customData['tempat_lahir'] ?? null,
                    'tanggal_lahir' => $customData['tanggal_lahir'] ?? null,
                    'tanggal_pencatatan' => $customData['tanggal_pencatatan'] ?? null,
                    'agama_id' => $customData['agama_id'] ?? null,
                    'golongan_darah_id' => $customData['golongan_darah_id'] ?? null,
                    'kewarganegaraan_id' => $customData['kewarganegaraan_id'] ?? null,
                    'etnis' => $customData['etnis'] ?? null,
                    'pendidikan_id' => $customData['pendidikan_id'] ?? null,
                    'mata_pencaharian_id' => $customData['mata_pencaharian_id'] ?? null,
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
        $kopTemplates = KopTemplate::all();
        $allJenisSurats = JenisSurat::all()->map(function ($item) {
            if (is_string($item->required_variables)) {
                $item->required_variables = json_decode($item->required_variables, true);
            }
            return $item;
        });

        $ttds = Ttd::all();
        $defaultJenisSurat = JenisSurat::first();
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
                $query->where('status_kehidupan', 'hidup') // ✅ only alive
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

        ]);
    }


    public function store(Request $request)
    {
        // 1. Fetch JenisSurat dan Mutasi Type
        $jenisSurat = JenisSurat::findOrFail($request->input('jenis_surat_id'));
        $templateVariables = $jenisSurat->required_variables ?? [];

        $mutasiType = $jenisSurat->mutasi_type ?? 'none';
        $isNewKK = $mutasiType === 'mutasi_masuk_kk';
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
            'status' => 'required|in:belum_diverifikasi,diverifikasi,ditolak,sudah_diambil',
            'catatan_penolakan' => 'nullable|string|max:1000',

            // Dynamic: anggota keluarga ID rules
            'id_anggota_keluargas' => [
                ($isNewKK || $isKelahiran) ? 'nullable' : 'required',
                function ($attribute, $value, $fail) use ($isNewKK, $isKelahiran) {
                    if ($isNewKK || $isKelahiran || !$value) return;

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

                if ($isNewKK || $isKelahiran) {
                    if ($key === 'nik') {
                        $rule = ($isRequired ? 'required' : 'nullable') . '|string|size:16|unique:anggota_keluargas,nik';
                    }
                    if ($key === 'no_kk' && $isNewKK) {
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

        $selectedId = $request->input('selected_id') ?: $request->input('id_anggota_keluargas');

        $data['id_anggota_keluargas'] = null;
        $data['id_data_keluargas'] = null;

        $permohonan = null;

        try {
            DB::transaction(function () use (&$permohonan, &$data, $isNewKK, $isKelahiran, $selectedId, $mutasiType, $isUpdateMutasi) {
                if ($isNewKK) {
                    $permohonanTemp = new Permohonan($data);
                    $newIds = $this->handleMutasiMasukKK($permohonanTemp);
                    if ($newIds) {
                        $data['id_anggota_keluargas'] = $newIds['anggota_keluarga_id'];
                        $data['id_data_keluargas'] = $newIds['data_keluarga_id'];
                    } else {
                        throw new \Exception("Mutasi Masuk KK Baru gagal memproses data.");
                    }
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

        return redirect()->route('layanan.permohonan.index')
            ->with('success', 'Permohonan Surat berhasil dibuat dan mutasi data diproses.');
    }

    public function edit($id)
    {
        try {
            $permohonan = Permohonan::findOrFail($id);
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

            $requiredVariables = $permohonan->jenisSurat->required_variables ?? [];


            $customFields = collect($requiredVariables)->filter(function ($variable) {
                return ($variable['type'] ?? 'text') !== 'system';
            });


            $storedCustomData = old('custom_data', $permohonan->custom_variables ?? []);


            return view('pages.layanan.permohonan.edit', [
                'permohonan' => $permohonan,
                'kopTemplates' => $kopTemplates,
                'allJenisSurats' => $allJenisSurats,
                'anggotaKeluargas' => $combinedAnggota,
                'ttds' => $ttds,
                'customFields' => $customFields,
                'storedCustomData' => $storedCustomData,
            ]);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('layanan.permohonan.index')->with('error', 'Permohonan Surat tidak ditemukan.');
        } catch (Exception $e) {
            Log::error('Error loading edit form for Permohonan ID ' . $id . ': ' . $e->getMessage());
            return redirect()->route('layanan.permohonan.index')->with('error', 'Terjadi kesalahan saat memuat formulir edit.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $permohonan = Permohonan::findOrFail($id);

            // Validate incoming request
            $rules = [
                'jenis_surat_id' => 'required|exists:jenis_surats,id',
                'id_kop_templates' => 'required|exists:kop_templates,id',
                'id_ttds' => 'required|exists:ttds,id',
                'tanggal_permohonan' => 'required|date',
                'paragraf_pembuka' => 'required|string',
                'paragraf_penutup' => 'required|string',
                'id_anggota_keluargas' => 'required',
                'status' => 'required|in:belum_diverifikasi,diverifikasi,ditolak,sudah_diambil',
                'catatan_penolakan' => 'nullable|string|max:1000',
            ];

            $validatedData = $request->validate($rules);

            // Update permohonan data
            $data = $request->except(['_token', '_method']);
            $selectedId = $request->input('id_anggota_keluargas');

            $data['id_anggota_keluargas'] = null;
            $data['id_data_keluargas'] = null;
            if (str_starts_with($selectedId, 'kk_')) {
                $data['id_data_keluargas'] = (int) substr($selectedId, 3);
            } else {
                $data['id_anggota_keluargas'] = (int) $selectedId;
            }

            // Update dynamic custom variables if provided
            if ($request->has('custom_data')) {
                $data['custom_variables'] = $request->input('custom_data', []);
            }

            $permohonan->update($data);

            return redirect()->route('layanan.permohonan.index')->with('success', 'Permohonan Surat berhasil diperbarui.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('layanan.permohonan.index')->with('error', 'Permohonan Surat tidak ditemukan.');
        } catch (Exception $e) {
            Log::error('Error updating Permohonan ID ' . $id . ': ' . $e->getMessage());
            return redirect()->route('layanan.permohonan.index')->with('error', 'Terjadi kesalahan saat memperbarui Permohonan Surat.');
        }
    }

    public function destroy($id)
    {
        try {
            $permohonan = Permohonan::findOrFail($id);
            $permohonan->delete();

            return redirect()->route('layanan.permohonan.index')->with('success', 'Permohonan Surat berhasil dihapus.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('layanan.permohonan.index')->with('error', 'Permohonan Surat tidak ditemukan.');
        } catch (Exception $e) {
            Log::error('Error deleting Permohonan ID ' . $id . ': ' . $e->getMessage());
            return redirect()->route('layanan.permohonan.index')->with('error', 'Terjadi kesalahan saat menghapus Permohonan Surat.');
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

            // CRITICAL FIX: Use the correct DB column name (id_format_nomor_surats)
            $lastPermohonan = Permohonan::where('id_format_nomor_surats', $jenisSuratId)
                // Use 'tahun' column if available (as established in previous steps)
                ->where('tahun', $currentYear)
                ->orderBy('nomor_urut', 'desc')
                ->first();

            // Safe calculation: If no record is found, ->first() returns null.
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
        // Mengambil Permohonan dengan semua relasi yang diperlukan
        $permohonan = Permohonan::with([
            'anggotaKeluarga.dataKeluarga.desas',
            'anggotaKeluarga.dataKeluarga.kecamatans',
            'anggotaKeluarga.agama',
            'anggotaKeluarga.mataPencaharian',
            'dataKeluarga.desas',
            'dataKeluarga.kecamatans',
            'jenisSurat.kopTemplate',
            'ttd',
        ])->findOrFail($permohonanId);

        // --- Subject and Template Identification ---
        $subject = $permohonan->anggotaKeluarga ?? $permohonan->dataKeluarga;
        $isAnggota = $permohonan->anggotaKeluarga !== null;
        $kopTemplate = $permohonan->jenisSurat->kopTemplate ?? $permohonan->kopTemplate;
        $ttdModel = $permohonan->ttd;
        $locationSource = $isAnggota ? optional($subject->dataKeluarga) : $subject;

        // Variabel yang dibutuhkan (Definisi dari template JenisSurat)
        $requiredVars = $permohonan->jenisSurat->required_variables ?? [];

        // Data variabel custom yang tersimpan di permohonan (Nilai input user)
        $customVars = $permohonan->custom_variables ?? [];

        // --- 1. Populate Fixed Data ($data) ---

        $data = [
            // Kop Data
            // 'logo_url' => optional($kopTemplate)->logo ? Storage::url(optional($kopTemplate)->logo) : null,
            'logo_url' => optional($kopTemplate)->logo
                ? Storage::disk('public')->path(optional($kopTemplate)->logo) // <-- USE ABSOLUTE PATH
                : null,
            'instansi_kabupaten' => optional($kopTemplate)->nama ?? 'N/A',
            'instansi_kecamatan' => optional($locationSource->kecamatans)->nama_kecamatan ?? 'N/A',
            'instansi_desa' => optional($locationSource->desas)->nama_desa ?? 'N/A',

            // Letter Details
            'nomor' => $permohonan->nomor_surat,
            // Menggunakan paragraf yang tersimpan di permohonan (hasil edit/default)
            'paragraf_pembuka' => $permohonan->paragraf_pembuka ?? optional($permohonan->jenisSurat)->paragraf_pembuka,
            'paragraf_penutup' => $permohonan->paragraf_penutup ?? optional($permohonan->jenisSurat)->paragraf_penutup,
            'surat_judul' => optional($permohonan->jenisSurat)->nama ?? 'SURAT KETERANGAN',
            'tanggal_surat_lokasi' => optional($locationSource->desas)->nama_desa ?? 'N/A',
            'tanggal_surat' => Carbon::parse($permohonan->tanggal_permohonan)->translatedFormat('d F Y'),

            // TTD Data
            'ttd_nama' => optional($ttdModel)->nama ?? 'N/A',
            'ttd_jabatan' => optional($ttdModel)->jabatan ?? 'N/A',
        ];

        // --- 2. Process ALL Variables (System & Custom) for Content Table ---
        $contentTableData = [];

        foreach ($requiredVars as $variable) {
            $key = $variable['key'];
            $label = $variable['label'];
            $type = $variable['type'] ?? 'text';
            $value = 'N/A'; // Default value

            if ($type === 'system') {
                // Logic untuk mengambil data Variabel SISTEM (dari Anggota/KK)
                if ($isAnggota) {
                    $value = match ($key) {
                        'nama' => $subject->nama ?? optional($subject->dataKeluarga)->kepala_keluarga ?? 'N/A',
                        'nik' => $subject->nik ?? 'N/A',
                        'jenis_kelamin' => $subject->jenis_kelamin ?? 'N/A',
                        'agama' => optional($subject->agama)->agama ?? 'N/A',
                        'status_perkawinan' => $subject->status_perkawinan ?? 'N/A',
                        'mata_pencaharian' => optional($subject->mataPencaharian)->mata_pencaharian ?? 'N/A',
                        'ttl' => "{$subject->tempat_lahir}, " . (optional($subject->tanggal_lahir)->translatedFormat('d F Y') ?? '-'),
                        default => $subject->$key ?? optional($subject->dataKeluarga)->$key ?? 'N/A',
                    };
                } else { // Logic for DataKeluarga (KK) subject
                    $value = match ($key) {
                        'nama' => $subject->kepala_keluarga ?? 'N/A',
                        'nik' => $subject->no_kk ?? 'N/A',
                        default => $subject->$key ?? 'N/A',
                    };
                }
            } else {
                // Logic untuk Variabel CUSTOM (Ambil dari custom_variables yang tersimpan)
                // Ini menjamin variabel custom akan tampil sesuai urutan template
                $value = $customVars[$key] ?? 'N/A';
            }

            $contentTableData[] = [
                'label' => $label,
                'value' => $value,
                'key' => $key
            ];
        }

        // Attach the combined content table data to the $data array
        $data['contentTableData'] = $contentTableData;

        // --- 3. Generate PDF ---
        $jenisSuratKode = optional($permohonan->jenisSurat)->kode ?? 'UNKNOWN';
        $safe_kode = Str::slug($jenisSuratKode, '_'); // Menggunakan Str::slug agar lebih aman
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
}
