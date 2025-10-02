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

class PermohonanSuratController extends Controller
{

    public function index()
    {
        $permohonans = Permohonan::with([
            'jenisSurat',
            'anggotaKeluarga.dataKeluarga' => function ($query) {},
            'dataKeluarga'
        ])->get();

        $jenisSurats = JenisSurat::all();

        return view('pages.layanan.permohonan.index', compact('permohonans', 'jenisSurats'));
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

    public function create(Request $request)
    {
        $kopTemplates = KopTemplate::all();
        $allJenisSurats = JenisSurat::all();
        $ttds = Ttd::all();
        $defaultJenisSurat = JenisSurat::first();
        // Pre-calculation for Nomor Surat Display 

        $currentYear = Carbon::now()->year;
        $romanMonth = $this->convertToRoman(Carbon::now()->month);
        $defaultCode = $defaultJenisSurat->kode ?? 'XXXX';


        $nextNomorUrut = 1;

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



        return view('pages.layanan.permohonan.create', [
            'kopTemplates' => $kopTemplates,
            'jenisSurats' => $allJenisSurats,
            'anggotaKeluargas' => $combinedAnggota,
            'ttds' => $ttds,
            'defaultJenisSurat' => $defaultJenisSurat,
            'currentYear' => $currentYear,
            'romanMonth' => $romanMonth,
            'defaultCode' => $defaultCode,
            'nextNomorUrut' => $nextNomorUrut,

        ]);
    }


    public function store(Request $request)
    {
        // 1. Fetch the selected JenisSurat to get its required variables
        $jenisSurat = JenisSurat::findOrFail($request->input('jenis_surat_id'));
        $templateVariables = $jenisSurat->required_variables ?? [];

        // --- AUTO-NUMBERING LOGIC ---
        $currentYear = Carbon::now()->year;
        $romanMonth = $this->convertToRoman(Carbon::now()->month);

        // --- Determine Sequential Number ---
        $userNomorUrut = $request->input('nomor_urut_input');
        $nextNomorUrut = 0; // Initialize
        if (!empty($userNomorUrut) && is_numeric($userNomorUrut)) {
            // OPTION 1: User provided a specific number (e.g., 10 or 50)
            $nextNomorUrut = (int)$userNomorUrut;
        } else {
            // OPTION 2: Auto-calculate the next sequential number
            // FIX: Ensure the WHERE clause is correct here (using id_format_nomor_surats)
            $lastPermohonan = Permohonan::where('id_format_nomor_surats', $jenisSurat->id)
                ->where('tahun', $currentYear)
                ->orderBy('nomor_urut', 'desc')
                ->first();

            $lastNomor = $lastPermohonan->nomor_urut ?? 0;

            // If the query failed to find 'nomor_urut' or found none, we default to 1.
            $nextNomorUrut = $lastNomor + 1;
        }

        // Construct the final Nomor Surat: 001/SKUMUM/IX/2025
        $fullNomorSurat = sprintf(
            "%s/%s/%s/%s",
            str_pad($nextNomorUrut, 3, '0', STR_PAD_LEFT),
            $jenisSurat->kode,
            $romanMonth,
            $currentYear
        );
        // --- END AUTO-NUMBERING ---

        // 2. Define Base Validation Rules
        $rules = [
            'jenis_surat_id' => 'required|exists:jenis_surats,id',

            'id_kop_templates' => 'required|exists:kop_templates,id',
            'id_ttds' => 'required|exists:ttds,id',
            'tanggal_permohonan' => 'required|date',
            'paragraf_pembuka' => 'required|string',
            'paragraf_penutup' => 'required|string',

            // Custom Rule for combined selection (as defined in your code)
            'id_anggota_keluargas' => [
                'required',
                function ($attribute, $value, $fail) {
                    // Assuming DB is aliased or available via use statement
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
        ];

        $customVariableRules = [];
        $customVariableData = [];

        // 3. Dynamically Add Rules for Custom Variables
        foreach ($templateVariables as $variable) {
            $key = $variable['key'];
            $label = $variable['label'];
            $type = $variable['type'] ?? 'text'; // This tells us if it's a system field

            // FIX 1: ONLY add validation rules for fields that are NOT type 'system'.
            if ($type !== 'system') {
                // Validation for fields that MUST be manually entered (Custom Fields)
                $customVariableRules["custom_data.$key"] = 'required|string|max:1000';
            }
        }
        // Merge base rules with custom variable rules
        $rules = array_merge($rules, $customVariableRules);

        // 4. Validate the full request
        $validatedData = $request->validate($rules);

        // 5. Prepare Core Permohonan Data
        $data = $validatedData;

        // Pisahkan custom_data dan hapus dari $data karena akan disimpan di field terpisah (custom_variables)
        $customData = $validatedData['custom_data'] ?? [];
        unset($data['custom_data']);

        // Hapus field yang hanya digunakan untuk input/validasi
        unset($data['nomor_urut_input']);
        // Note: id_anggota_keluargas juga akan di-unset/ditimpa di bawah

        // Ambil ID pemohon (Bisa Anggota Keluarga atau KK)
        $selectedId = $request->input('id_anggota_keluargas');

        // Tambahkan detail nomor surat yang sudah dihitung
        $data['nomor_surat'] = $fullNomorSurat; // Contoh: 001/SKUMUM/IX/2025
        $data['nomor_urut'] = $nextNomorUrut; // Contoh: 1
        $data['tahun'] = $currentYear; // Contoh: 2025

        // --- Pisahkan ID Anggota Keluarga vs ID Data Keluarga (KK) ---
        $data['id_anggota_keluargas'] = null;
        $data['id_data_keluargas'] = null;
        if (str_starts_with($selectedId, 'kk_')) {
            $data['id_data_keluargas'] = (int) substr($selectedId, 3);
        } else {
            $data['id_anggota_keluargas'] = (int) $selectedId;
        }

        // Tambahkan ID format surat
        $data['id_format_nomor_surats'] = $data['jenis_surat_id'];

        // --- Save Dynamic Custom Data ---
        // Variabel custom diambil dari data yang sudah divalidasi
        $data['custom_variables'] = $customData;


        // 7. Create the Permohonan
        Permohonan::create($data);

        return redirect()->route('layanan.permohonan.index')->with('success', 'Permohonan Surat berhasil dibuat.');
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

            return view('pages.layanan.permohonan.edit', [
                'permohonan' => $permohonan,
                'kopTemplates' => $kopTemplates,
                'jenisSurats' => $allJenisSurats,
                'anggotaKeluargas' => $combinedAnggota,
                'ttds' => $ttds,
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
            'logo_url' => optional($kopTemplate)->logo ? Storage::url(optional($kopTemplate)->logo) : null,
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
}
