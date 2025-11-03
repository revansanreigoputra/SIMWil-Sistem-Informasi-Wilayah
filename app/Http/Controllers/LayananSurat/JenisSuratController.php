<?php

namespace App\Http\Controllers\LayananSurat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LayananSurat\JenisSurat;
use App\Models\LayananSurat\KopTemplate;
use Illuminate\Validation\Rule;

class JenisSuratController extends Controller
{
    public function index()
    {
        $jenisSurats = JenisSurat::all();
        $kopTemplates = KopTemplate::all();
        return view('pages.layanan.template.jenis_surats.index', compact('jenisSurats', 'kopTemplates'));
    }
    private function getAnggotaKeluargaVariables()
    {

        $akVariables = [
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

        $akVariables['__CUSTOM__'] = '-- Tambah Inputan Baru --';

        return $akVariables;
    }

    public function create()
    {
        $systemVariables = $this->getAnggotaKeluargaVariables();
        $kopTemplates = KopTemplate::all();
        return view('pages.layanan.template.jenis_surats.create', compact('systemVariables', 'kopTemplates'));
    }

    public function store(Request $request)
    {
        // 1. Validasi Input Dasar dan Dinamis
        $request->validate([
            'kode' => 'required|string|max:255|unique:jenis_surats,kode',
            'nama' => 'required|string|max:255|unique:jenis_surats,nama',
            'paragraf_pembuka' => 'nullable|string',
            'paragraf_penutup' => 'nullable|string',
            'kop_template_id' => 'nullable|exists:kop_templates,id',
            // mutation type
            'mutasi_type' => ['required', Rule::in(['none', 'meninggal', 'pindah_keluar', 'mutasi_masuk_kk', 'pencatatan_kelahiran'])],
            // Validation for dynamic variables array
            'variables' => 'nullable|array',
            'variables.*.key' => 'required_with:variables|string|max:50|regex:/^[a-z0-9_]+$/i',
            'variables.*.label' => 'required_with:variables|string|max:255',
            'variables.*.type' => 'required_with:variables|in:text,date,number,textarea,system',
        ], [
            'kode.required' => 'Kode Jenis Surat wajib diisi.',
            'nama.required' => 'Nama Jenis Surat wajib diisi.',
            'variables.*.key.regex' => 'Kunci variabel hanya boleh berisi huruf, angka, dan underscore.',
            'kop_template_id.exists' => 'Template Kop yang dipilih tidak valid.'
        ]);

        // 2. Process Dynamic Variables (Hybrid System/Custom Logic)
        $rawVariables = $request->input('variables', []);
        $variablesToSave = [];

        foreach ($rawVariables as $variable) {
            $source = $variable['source'] ?? null;

            // Skip if no source is selected
            if (!$source) continue;

            if ($source === '__CUSTOM__') {
                // Logic for a new custom variable
                if (!empty($variable['key']) && !empty($variable['label'])) {
                    $variablesToSave[] = [
                        'key' => $variable['key'],
                        'label' => $variable['label'],
                        'type' => $variable['type'] ?? 'text',
                        'display' => true,
                    ];
                }
            } else {
                // Logic for a pre-defined system variable (from AnggotaKeluarga)
                $systemVars = $this->getAnggotaKeluargaVariables();

                // Safety check: ensure the selected system key actually exists
                if (isset($systemVars[$source])) {
                    $variablesToSave[] = [
                        'key' => $source,
                        'label' => $systemVars[$source],
                        'type' => 'system' // Mark as system to prevent rendering an input field later
                    ];
                }
            }
        }

        // 3. Prepare Final Data Array
        $data = $request->only([
            'kode',
            'nama',
            'paragraf_pembuka',
            'paragraf_penutup',
            'kop_template_id',
            'mutasi_type',
        ]);

        // 4. Attach Processed Variables and Save
        $data['required_variables'] = $variablesToSave;

        JenisSurat::create($data);

        return redirect()->route('jenis_surats.index')->with('success', 'Jenis Surat dan Template berhasil dibuat.');
    }

    public function edit($id)
    {
        $jenisSurat = JenisSurat::findOrFail($id);
        $systemVariables = $this->getAnggotaKeluargaVariables();

        $kopTemplates = KopTemplate::all();

        return view('pages.layanan.template.jenis_surats.edit', compact(
            'jenisSurat',
            'systemVariables',
            'kopTemplates'
        ));
    }
    public function update(Request $request, $id)
    {
        $jenisSurat = JenisSurat::findOrFail($id);

        // 1. Validation (NIK unique rule must exclude the current member's NIK)
        $request->validate([
            'kode' => 'required|string|max:255|unique:jenis_surats,kode,' . $jenisSurat->id,
            'nama' => 'required|string|max:255|unique:jenis_surats,nama,' . $jenisSurat->id,
            'paragraf_pembuka' => 'nullable|string',
            'paragraf_penutup' => 'nullable|string',
            'kop_template_id' => 'nullable|exists:kop_templates,id',
            // mutation type
            'mutasi_type' => ['required', Rule::in(['none', 'meninggal', 'pindah_keluar', 'mutasi_masuk_kk', 'pencatatan_kelahiran'])],
            'variables' => 'nullable|array',
            'variables.*.key' => 'required_with:variables|string|max:50|regex:/^[a-z0-9_]+$/i',
            'variables.*.label' => 'required_with:variables|string|max:255',
            'variables.*.type' => 'required_with:variables|in:text,date,number,textarea,system',
        ], [
            'kode.unique' => 'Kode jenis surat sudah ada.',
            'nama.unique' => 'Nama jenis surat sudah ada.',
        ]);

        $data = $request->only([
            'kode',
            'nama',
            'paragraf_pembuka',
            'paragraf_penutup',
            'kop_template_id',
            'mutasi_type',
        ]);

        // 2. Process Dynamic Variables (Same logic as store to correctly tag 'system' types)
        $rawVariables = $request->input('variables', []);
        $variablesToSave = [];

        foreach ($rawVariables as $variable) {
            $source = $variable['source'] ?? null;

            if (!$source) continue;

            if ($source === '__CUSTOM__') {
                if (!empty($variable['key']) && !empty($variable['label'])) {
                    $variablesToSave[] = [
                        'key' => $variable['key'],
                        'label' => $variable['label'],
                        'type' => $variable['type'] ?? 'text'
                    ];
                }
            } else {
                // Logic for a pre-defined system variable
                $systemVars = $this->getAnggotaKeluargaVariables();

                if (isset($systemVars[$source])) {
                    $variablesToSave[] = [
                        'key' => $source,
                        $label_key = 'label', // Added to avoid undefined variable error
                        'label' => $systemVars[$source],
                        'type' => 'system' // Correctly mark as system
                    ];
                }
            }
        }



        // Attach Processed Variables
        $data['required_variables'] = $variablesToSave;

        $jenisSurat->update($data);

        return redirect()->route('jenis_surats.index')->with('success', 'Jenis Surat berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $jenisSurat = JenisSurat::findOrFail($id);
        $jenisSurat->delete();
        return redirect()->route('jenis_surats.index')->with('success', 'Jenis Surat berhasil dihapus.');
    }
}
