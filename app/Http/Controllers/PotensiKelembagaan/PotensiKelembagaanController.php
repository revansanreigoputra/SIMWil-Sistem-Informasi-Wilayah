<?php

namespace App\Http\Controllers\PotensiKelembagaan;

use Illuminate\Http\Request;
use App\Models\PotensiKelembagaan\{
    PotensiKelembagaan,
    BPD,
    AnggotaOrganisasi
};
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use App\Models\{PerangkatDesa, Jabatan};

use App\Http\Controllers\Controller;

class PotensiKelembagaanController extends Controller
{
    // Tampilkan daftar lembaga pemerintah (frontend statis)
    public function index()
    {
        // 1. Fetch main organizational records
        $records = PotensiKelembagaan::latest()->get();

        // 2. Fetch ALL AnggotaOrganisasi records for status lookup
        // Only fetching status and linked data needed for display
        $anggotaOrganisasis = AnggotaOrganisasi::with(['perangkatDesa'])
            ->get();

        // 3. Map the AnggotaOrganisasi data for easy lookup by (Jabatan ID)
        // We'll create a map where the key is the jabatan_id and the value is the AnggotaOrganisasi record.
        $personnelMap = $anggotaOrganisasis->keyBy('jabatan_id');

        // NOTE: If you have multiple records for the same jabatan_id (e.g., Anggota BPD 1, 2, 3), 
        // this will only store the last one. For this specific display (Kepala Desa/Sekdes), it's fine.

        // Return the mapped data
        return view('pages.potensi.kelembagaan.pemerintah.index', compact('records', 'personnelMap'));
    }

    // Tampilkan form create (frontend statis)
    public function create()
    {
        // Load necessary master data for dropdowns
        $jabatans = Jabatan::all();
        $perangkatDesas = PerangkatDesa::select('id', 'nama')->orderBy('nama')->get();

        // Check if a current record already exists to pre-fill the form
        $currentRecord = PotensiKelembagaan::latest()->first();

        return view('pages.potensi.kelembagaan.pemerintah.create', compact('jabatans', 'perangkatDesas', 'currentRecord'));
    }

    public function store(Request $request)
    {
        // --- 1. Validation ---
        $validated = $request->validate([
            // PotensiKelembagaan fields
            'tanggal_data' => 'required|date',
            'jumlah_aparat_pemerintah' => 'required|integer|min:0',
            'jumlah_perangkat_desa' => 'required|integer|min:0',
            'jumlah_staf' => 'required|integer|min:0',
            'jumlah_dusun' => 'required|integer|min:0',
            'dasar_hukum_pembentukan' => 'nullable|string', // Added nullable fields
            'dasar_hukum_pembentukan_bpd' => 'nullable|string', // Added nullable fields

            // BPD fields
            'keberadaan_bpd' => ['required', Rule::in(['Ada dan Aktif', 'Ada dan Tidak Aktif', 'Tidak Ada'])],
            'jumlah_anggota' => 'required|integer|min:0',

            // AnggotaOrganisasi fields (Expecting an array of personnel submissions)
            'anggota_organisasi' => 'required|array', // Ensure it's an array
            'anggota_organisasi.*.perangkat_desa_id' => 'required|exists:perangkat_desas,id',
            'anggota_organisasi.*.jabatan_id' => 'required|exists:jabatans,id',
            'anggota_organisasi.*.status_jabatan' => ['required', Rule::in([
                'Ada dan Aktif',
                'Ada dan Tidak Aktif',
                'Tidak Ada',
                'Aktif',
                'Pasif',
                'Pasif (Dusun)',
                'Aktif (Dusun)'
            ])],
            'anggota_organisasi.*.keterangan_tambahan' => 'nullable|string',
        ]);

        // --- 2. Transaction ---
        DB::beginTransaction();

        try {
            // Instantiate models to safely retrieve fillable attributes
            $potensiModel = new PotensiKelembagaan();
            $bpdModel = new BPD();

            // A. Find or Create the main PotensiKelembagaan record
            // Use the instantiated model to get fillable fields
            $potensi = PotensiKelembagaan::updateOrCreate(
                [
                    // Add criteria here if needed, e.g., 'desa_id' => $request->user()->desa_id
                ],
                $request->only($potensiModel->getFillable())
            );

            // B. Find or Create the BPD record
            // Use the instantiated model to get fillable fields
            BPD::updateOrCreate(
                [
                    // Add criteria here if needed, e.g., 'potensi_kelembagaan_id' => $potensi->id
                ],
                $request->only($bpdModel->getFillable())
            );

            // C. Handle AnggotaOrganisasi (Personnel roles)
            $anggotaData = $validated['anggota_organisasi'];

            // Prepare data for upsert
            $upsertData = collect($anggotaData)->map(function ($item) {
                return [
                    'perangkat_desa_id' => $item['perangkat_desa_id'],
                    'jabatan_id' => $item['jabatan_id'],
                    'status_jabatan' => $item['status_jabatan'],
                    'keterangan_tambahan' => $item['keterangan_tambahan'] ?? null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            })->toArray();

            // Use upsert to insert or update the AnggotaOrganisasi records efficiently
            AnggotaOrganisasi::upsert(
                $upsertData,
                ['perangkat_desa_id', 'jabatan_id'], // Unique constraint keys for matching
                ['status_jabatan', 'keterangan_tambahan', 'updated_at'] // Columns to update if a match is found
            );

            DB::commit();

            return redirect()->route('potensi.kelembagaan.pemerintah.index')
                ->with('success', 'Data Potensi Kelembagaan berhasil disimpan. 🎉');
        } catch (\Exception $e) {
            DB::rollBack();

            // Log the error for debugging purposes
            Log::error('Potensi Kelembagaan save failed: ' . $e->getMessage(), [
                'input' => $request->all(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            return back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data kelembagaan. Silakan cek log atau hubungi administrator.'])
                ->withInput();
        }
    }

    // Tampilkan form edit (frontend statis)
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // 1. Fetch the main PotensiKelembagaan record or fail
        $potensi = PotensiKelembagaan::findOrFail($id);

        // 2. Fetch the single BPD record (assuming it's a singleton or linked by some ID)
        // If BPD records are not directly linked to PotensiKelembagaan, you might use first()
        $bpd = BPD::first();

        // 3. Load all master data for dropdowns
        $jabatans = Jabatan::all();
        $perangkatDesas = PerangkatDesa::select('id', 'nama')->orderBy('nama')->get();

        // 4. Load all existing personnel roles and key them by jabatan_id for easy lookup in the view.
        // This collection will pre-fill the person/status selectors.
        $anggotaOrganisasis = AnggotaOrganisasi::with(['perangkatDesa', 'jabatan'])
            ->get()
            ->keyBy('jabatan_id');

        return view('pages.potensi.kelembagaan.pemerintah.edit', compact(
            'potensi',
            'bpd',
            'jabatans',
            'perangkatDesas',
            'anggotaOrganisasis'
        ));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // You would perform the same validation as the store method here.
        $validated = $request->validate([
            // PotensiKelembagaan fields
            'tanggal_data' => 'required|date',
            'jumlah_aparat_pemerintah' => 'required|integer|min:0',
            'jumlah_perangkat_desa' => 'required|integer|min:0',
            'jumlah_staf' => 'required|integer|min:0',
            'jumlah_dusun' => 'required|integer|min:0',
            'dasar_hukum_pembentukan' => 'nullable|string', // Added nullable fields
            'dasar_hukum_pembentukan_bpd' => 'nullable|string', // Added nullable fields

            // BPD fields
            'keberadaan_bpd' => ['required', Rule::in(['Ada dan Aktif', 'Ada dan Tidak Aktif', 'Tidak Ada'])],
            'jumlah_anggota' => 'required|integer|min:0',

            // AnggotaOrganisasi fields (Expecting an array of personnel submissions)
            'anggota_organisasi' => 'required|array', // Ensure it's an array
            'anggota_organisasi.*.perangkat_desa_id' => 'required|exists:perangkat_desas,id',
            'anggota_organisasi.*.jabatan_id' => 'required|exists:jabatans,id',
            'anggota_organisasi.*.status_jabatan' => ['required', Rule::in([
                'Ada dan Aktif',
                'Ada dan Tidak Aktif',
                'Tidak Ada',
                'Aktif',
                'Pasif',
                'Pasif (Dusun)',
                'Aktif (Dusun)'
            ])],
            'anggota_organisasi.*.keterangan_tambahan' => 'nullable|string',
        ]);

        DB::beginTransaction();

        try {
            $potensi = PotensiKelembagaan::findOrFail($id);
            $potensiModel = new PotensiKelembagaan();
            $bpdModel = new BPD();

            // A. Update PotensiKelembagaan record
            $potensi->update($request->only($potensiModel->getFillable()));

            // B. Update BPD record (assuming singleton, fetch/update the existing one)
            BPD::first()->update($request->only($bpdModel->getFillable()));

            // C. Handle AnggotaOrganisasi using upsert (same as store)
            $anggotaData = $validated['anggota_organisasi'];

            $upsertData = collect($anggotaData)->map(function ($item) {
                // ... (Mapping logic remains the same) ...
                return [
                    'perangkat_desa_id' => $item['perangkat_desa_id'],
                    'jabatan_id' => $item['jabatan_id'],
                    'status_jabatan' => $item['status_jabatan'],
                    'keterangan_tambahan' => $item['keterangan_tambahan'] ?? null,
                    'updated_at' => now(),
                ];
            })->toArray();

            AnggotaOrganisasi::upsert(
                $upsertData,
                ['perangkat_desa_id', 'jabatan_id'],
                ['status_jabatan', 'keterangan_tambahan', 'updated_at']
            );

            DB::commit();

            return redirect()->route('potensi.kelembagaan.pemerintah.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Potensi Kelembagaan update failed: ' . $e->getMessage());

            return back()->withErrors(['error' => 'Gagal memperbarui data.'])->withInput();
        }
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // 1. Fetch the main PotensiKelembagaan record
        $potensi = PotensiKelembagaan::findOrFail($id);

        // 2. Fetch the BPD data
        $bpd = BPD::first();

        // 3. Fetch all current personnel roles and their associated person data
        $anggotaOrganisasis = AnggotaOrganisasi::with(['perangkatDesa', 'jabatan'])
            ->get();

        // Pass the data to the show view for display
        return view('pages.potensi.kelembagaan.pemerintah.show', compact('potensi', 'bpd', 'anggotaOrganisasis'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // 1. Find the main record
        $potensi = PotensiKelembagaan::findOrFail($id);

        // 2. DELETE the record. (If soft deletes are not used, this is immediate).
        // WARNING: You may need custom logic here to handle cascading deletes for BPD, 
        // AnggotaOrganisasi, etc., depending on your database constraints.
        $potensi->delete();

        return redirect()->route('potensi.kelembagaan.pemerintah.index');
    }
    // Di PotensiKelembagaanController

    public function print($id)
    {
        $potensi = PotensiKelembagaan::findOrFail($id);
        $bpd = BPD::first();
        $anggotaOrganisasis = AnggotaOrganisasi::with(['perangkatDesa.pendidikan', 'jabatan']) // Eager load Pendidikan juga
            ->get();

        return view('pages.potensi.kelembagaan.pemerintah.print', compact('potensi', 'bpd', 'anggotaOrganisasis'));
    }
}
