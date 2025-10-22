<?php

namespace App\Http\Controllers\LayananSurat;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LayananSurat\Permohonan;
use App\Models\LayananSurat\JenisSurat;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\{
    AnggotaKeluarga,
    Desa,
    PerangkatDesa,
    Kecamatan,
    DataKeluarga
};
use App\Models\MasterDDK\{
    Agama,
    GolonganDarah,
    Kewarganegaraan,
    Pendidikan,
    MataPencaharian,
    KB,
    Cacat,
    KedudukanPajak,
    Lembaga,
    HubunganKeluarga
};

class PermohonanMasukController extends Controller // Menggunakan nama konsisten: PermohonanMasukKKController
{
    /**
     * Tampilkan form untuk membuat KK Baru (Mutasi Masuk KK).
     */
    public function createNewKKForm()
    {
        // Muat semua data master yang dibutuhkan oleh form
        $data = [
            'desas' => Desa::all(),
            'kecamatans' => Kecamatan::all(),
            // Hanya Kepala Keluarga yang relevan untuk form ini
            'hubunganKeluarga' => HubunganKeluarga::where('nama', 'Kepala Keluarga')->get(),
            'agama' => Agama::all(),
            'golonganDarah' => GolonganDarah::all(),
            'kewarganegaraan' => Kewarganegaraan::all(),
            'pendidikan' => Pendidikan::all(),
            'mataPencaharians' => MataPencaharian::all(),
            'kb' => Kb::all(),
            'kedudukanPajak' => KedudukanPajak::all(),
            'cacat' => Cacat::all(),
            'lembaga' => Lembaga::all(),
            'perangkatDesas' => PerangkatDesa::all(),
        ];

        // Mengarahkan ke view yang benar: pages/layanan/permohonan/masuk_kk/create.blade.php
        return view('pages.layanan.permohonan.masuk_kk.create', $data);
    }

    /**
     * Proses penyimpanan data KK Baru dan Anggota Keluarga (Kepala Keluarga).
     */
    public function storeNewKK(Request $request)
    {
        // --- VALIDASI (Using the structure from your existing store function) ---
        $request->validate([
            'no_kk' => 'required|string|unique:data_keluargas,no_kk',
            'kepala_keluarga' => 'required|string', // Name of the head
            'alamat' => 'required|string',
            'rt' => 'required|string',
            'rw' => 'required|string',
            'desa_id' => 'required|exists:desas,id',
            'kecamatan_id' => 'required|exists:kecamatans,id',
            'nama_pengisi_id' => 'required|exists:perangkat_desas,id',

            // Fields for Kepala Keluarga (now required for a new KK entry)
            // Note: Since this is a new KK form, NIK and essential data should be required.
            // Adjust validation from nullable to required if necessary in the actual form/code
            'nik' => 'required|string|size:16|unique:anggota_keluargas,nik',
            'no_akta_kelahiran' => 'nullable|string',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan', // Made required
            'hubungan_keluarga_id' => 'required|exists:hubungan_keluarga,id', // Should be the ID for 'Kepala Keluarga'
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'tanggal_pencatatan' => 'nullable|date',
            'status_perkawinan' => 'required|in:Belum Menikah,Menikah,Cerai,Cerai Mati', // Made required
            'agama_id' => 'required|exists:agama,id',
            'golongan_darah_id' => 'required|exists:golongan_darahs,id',
            'kewarganegaraan_id' => 'required|exists:kewarganegaraans,id',
            'etnis' => 'nullable|string',
            'pendidikan_id' => 'required|exists:pendidikans,id',
            'mata_pencaharian_id' => 'required|exists:mata_pencaharians,id',
            'nama_orang_tua' => 'required|string',
            'kb_id' => 'nullable|exists:kb,id',
            'cacat_id' => 'nullable|exists:cacats,id',
            'nama_cacat' => 'nullable|string',
            'kedudukan_pajak_id' => 'nullable|exists:kedudukan_pajaks,id',
            'lembaga_id' => 'nullable|exists:lembagas,id',
            'nama_lembaga' => 'nullable|string',
        ]);

        $dataKeluargaData = $request->only([
            'no_kk',
            'kepala_keluarga',
            'alamat',
            'rt',
            'rw',
            'desa_id',
            'kecamatan_id',
            'nama_pengisi_id'
        ]);
        $anggotaKeluargaData = $request->only([
            'nik',
            'no_akta_kelahiran',
            'jenis_kelamin',
            'hubungan_keluarga_id',
            'tempat_lahir',
            'tanggal_lahir',
            'tanggal_pencatatan',
            'status_perkawinan',
            'agama_id',
            'golongan_darah_id',
            'kewarganegaraan_id',
            'etnis',
            'pendidikan_id',
            'mata_pencaharian_id',
            'kb_id',
            'cacat_id',
            'nama_cacat',
            'kedudukan_pajak_id',
            'lembaga_id',
            'nama_lembaga',
            'nama_orang_tua'
        ]);

        try {
            DB::beginTransaction();

            // 1. Buat Data Keluarga
            $dataKeluarga = DataKeluarga::create($dataKeluargaData);

            // 2. Siapkan data Anggota Keluarga
            $anggotaKeluargaData['data_keluarga_id'] = $dataKeluarga->id;
            $anggotaKeluargaData['no_urut'] = 1;

            // Tambahan Mutasi Masuk KK (CRUCIAL)
            $anggotaKeluargaData['nama'] = $dataKeluarga->kepala_keluarga; // Use the name from the family data
            $anggotaKeluargaData['is_kk'] = true; // Tandai sebagai Kepala Keluarga
            $anggotaKeluargaData['status_penduduk'] = 'Aktif';
            $anggotaKeluargaData['status_data'] = 'Mutasi Masuk KK Baru'; // Tandai sebagai hasil mutasi

            // 3. Buat Anggota Keluarga
            $anggotaKeluarga = AnggotaKeluarga::create($anggotaKeluargaData);

            $jenisSurat = JenisSurat::where('mutasi_type', 'mutasi_masuk_kk')->first();

            if (!$jenisSurat) {
                DB::rollBack();
                return back()->withInput()->withErrors(['error' => 'Jenis Surat untuk Mutasi Masuk KK tidak ditemukan.']);
            }

            DB::commit();

            // **PENGARAHAN KEMBALI SESUAI PERMINTAAN:** Kembali ke form Permohonan Surat
            return redirect()->route('permohonan.create', [
                // Pass the Jenis Surat ID AND the Anggota Keluarga ID (the new resident)
                'preselected_jenis_surat_id' => $jenisSurat->id, // <-- **NEW PARAMETER**
                'preselected_pemohon_id' => $anggotaKeluarga->id // Use the AnggotaKeluarga ID, not the NIK
            ])->with('success', 'Data Penduduk Baru berhasil disimpan. Silakan lengkapi Surat Keterangan Masuk Domisili.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->withErrors(['error' => 'Gagal menyimpan Data KK Baru. Silakan cek data NIK/No. KK.']);
        }
    }

    // ... Metode createExistingKKForm() dan storeExistingKK() harus ada di sini juga ...
    public function createExistingKK()
    {
        // 1. Data for KK Selection dropdown
        $dataKeluargas = DataKeluarga::all();

        // 2. Data for Anggota Keluarga fields (Master DDK Lists)
        $hubunganKeluarga = HubunganKeluarga::where('nama', '!=', 'Kepala Keluarga')->get();
        $agama = Agama::all();
        $golonganDarah = GolonganDarah::all();
        $kewarganegaraan = Kewarganegaraan::all();
        $pendidikan = Pendidikan::all();
        $mataPencaharians = MataPencaharian::all();
        $kb = KB::all();
        $cacat = Cacat::all();
        $kedudukanPajak = KedudukanPajak::all();
        $lembaga = Lembaga::all();

        return view('pages.layanan.permohonan.masuk_kk.create_existing_kk', compact(
            'dataKeluargas',
            'hubunganKeluarga',
            'agama',
            'golonganDarah',
            'kewarganegaraan',
            'pendidikan',
            'mataPencaharians',
            'kb',
            'cacat',
            'kedudukanPajak',
            'lembaga'
        ));
    }

    public function storeExistingKK(Request $request)
    {
        // 1. VALIDATION (Ensure these rules cover all fields in the join_existing_single.blade.php)
        $validatedData = $request->validate([
            'data_keluarga_id' => 'required|exists:data_keluargas,id',
            'no_urut' => 'nullable|integer',
            'nik' => 'required|string|unique:anggota_keluargas,nik|size:16', // Changed to size:16 based on AnggotaKeluarga standard
            'no_akta_kelahiran' => 'nullable|string|max:255',
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => ['required', Rule::in(['Laki-laki', 'Perempuan'])],
            'hubungan_keluarga_id' => 'required|exists:hubungan_keluarga,id', // Required for new member
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'tanggal_pencatatan' => 'nullable|date',
            'status_perkawinan' => 'required|string|max:255',
            'agama_id' => 'required|exists:agama,id',
            'golongan_darah_id' => 'nullable|exists:golongan_darahs,id',
            'kewarganegaraan_id' => 'required|exists:kewarganegaraans,id',
            'etnis' => 'nullable|string|max:255',
            'pendidikan_id' => 'required|exists:pendidikans,id',
            'mata_pencaharian_id' => 'required|exists:mata_pencaharians,id',
            'nama_orang_tua' => 'required|string|max:255',
            'kb_id' => 'nullable|exists:kb,id',
            'cacat_id' => 'nullable|exists:cacats,id',
            'nama_cacat' => 'nullable|string|max:255',
            'kedudukan_pajak_id' => 'nullable|exists:kedudukan_pajaks,id',
            'lembaga_id' => 'nullable|exists:lembagas,id',
            'nama_lembaga' => 'nullable|string|max:255',
            'kk_select' => 'required', // Added for validation reference only
        ]);

        // Set Mutasi Status
        $validatedData['status_penduduk'] = 'Aktif';
        $validatedData['status_data'] = 'Mutasi Masuk KK Existing';

        // 2. Handle Custom Logic (Cacat & Lembaga) using transactions for safety
        try {
            DB::beginTransaction();

            // Handle Cacat logic (reuse your existing Cacat logic)
            if ($request->filled('nama_cacat') && $request->filled('cacat_id')) {
                $selectedCacat = Cacat::find($validatedData['cacat_id']);
                if ($selectedCacat) {
                    // Find or create the specific named disability
                    $newCacat = Cacat::firstOrCreate(
                        ['tipe' => $selectedCacat->tipe, 'nama_cacat' => $validatedData['nama_cacat']]
                    );
                    $validatedData['cacat_id'] = $newCacat->id;
                }
            } elseif (!$request->filled('cacat_id')) {
                $validatedData['cacat_id'] = null; // Ensure Cacat ID is null if nothing is selected
            }

            // Handle Lembaga logic (reuse your existing Lembaga logic)
            if ($request->filled('nama_lembaga') && $request->filled('lembaga_id')) {
                $newLembaga = Lembaga::firstOrCreate(
                    ['nama_lembaga' => $validatedData['nama_lembaga']]
                );
                $validatedData['lembaga_id'] = $newLembaga->id;
            } elseif (!$request->filled('lembaga_id')) {
                $validatedData['lembaga_id'] = null; // Ensure Lembaga ID is null if nothing is selected
            }

            // Remove temporary fields used for dynamic creation
            unset($validatedData['nama_cacat']);
            unset($validatedData['nama_lembaga']);
            unset($validatedData['kk_select']); // Remove the temporary select field

            // 3. Create Anggota Keluarga
            $anggotaBaru = AnggotaKeluarga::create($validatedData);

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Gagal menyimpan Anggota Keluarga Baru (KK Existing): ' . $e->getMessage());
            return back()->withInput()->withErrors(['error' => 'Gagal menyimpan Anggota Keluarga Baru. Silakan coba lagi.']);
        }


        // 4. Find the corresponding JenisSurat for the redirect
        $jenisSurat = JenisSurat::where('mutasi_type', 'mutasi_masuk_kk')->first();

        // 5. Redirect back to Permohonan Create form
        return redirect()->route('permohonan.create', [
            'preselected_jenis_surat_id' => optional($jenisSurat)->id,
            'preselected_pemohon_id' => $anggotaBaru->id // Pass the new AnggotaKeluarga ID
        ])->with('success', 'Data Penduduk Baru berhasil disimpan ke KK existing. Silakan lengkapi Surat Keterangan Masuk Domisili.');
    }
}
