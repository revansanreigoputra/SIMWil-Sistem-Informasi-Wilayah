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
use Barryvdh\DomPDF\Facade\Pdf;

class PotensiKelembagaanController extends Controller
{
    // Tampilkan daftar lembaga pemerintah (frontend statis)
    public function index()
    {
        $records = PotensiKelembagaan::latest()->get();

        $anggotaOrganisasis = AnggotaOrganisasi::with(['perangkatDesa'])
            ->get();

        $personnelMap = $anggotaOrganisasis->keyBy('jabatan_id');

        return view('pages.potensi.potensi-kelembagaan.pemerintah.index', compact('records', 'personnelMap'));
    }

    public function create()
    {
        // Load necessary master data for dropdowns
        $jabatans = Jabatan::all();
        $perangkatDesas = PerangkatDesa::select('id', 'nama')->orderBy('nama')->get();

        // Check if a current record already exists to pre-fill the form
        $currentRecord = PotensiKelembagaan::latest()->first();

        return view('pages.potensi.potensi-kelembagaan.pemerintah.create', compact('jabatans', 'perangkatDesas', 'currentRecord'));
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
            'dasar_hukum_pembentukan' => 'nullable|string', 
            'dasar_hukum_pembentukan_bpd' => 'nullable|string', 

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
            $potensiModel = new PotensiKelembagaan();
            $bpdModel = new BPD();

            $potensi = PotensiKelembagaan::updateOrCreate(
                [
                    // Add criteria here if needed, e.g., 'desa_id' => $request->user()->desa_id
                ],
                $request->only($potensiModel->getFillable())
            );

            BPD::updateOrCreate(
                [
                    // Add criteria here if needed, e.g., 'potensi_kelembagaan_id' => $potensi->id
                ],
                $request->only($bpdModel->getFillable())
            );

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

 
            AnggotaOrganisasi::upsert(
                $upsertData,
                ['perangkat_desa_id', 'jabatan_id'], 
                ['status_jabatan', 'keterangan_tambahan', 'updated_at'] 
            );

            DB::commit();

            return redirect()->route('potensi.potensi-kelembagaan.pemerintah.index')
                ->with('success', 'Data Potensi Kelembagaan berhasil disimpan. 🎉');
        } catch (\Exception $e) {
            DB::rollBack();

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
        $potensi = PotensiKelembagaan::findOrFail($id);

        $bpd = BPD::first();

        $jabatans = Jabatan::all();
        $perangkatDesas = PerangkatDesa::select('id', 'nama')->orderBy('nama')->get();

        $anggotaOrganisasis = AnggotaOrganisasi::with(['perangkatDesa', 'jabatan'])
            ->get()
            ->keyBy('jabatan_id');

        return view('pages.potensi.potensi-kelembagaan.pemerintah.edit', compact(
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
        $validated = $request->validate([
            // PotensiKelembagaan fields
            'tanggal_data' => 'required|date',
            'jumlah_aparat_pemerintah' => 'required|integer|min:0',
            'jumlah_perangkat_desa' => 'required|integer|min:0',
            'jumlah_staf' => 'required|integer|min:0',
            'jumlah_dusun' => 'required|integer|min:0',
            'dasar_hukum_pembentukan' => 'nullable|string',
            'dasar_hukum_pembentukan_bpd' => 'nullable|string',

            // BPD fields
            'keberadaan_bpd' => ['required', Rule::in(['Ada dan Aktif', 'Ada dan Tidak Aktif', 'Tidak Ada'])],
            'jumlah_anggota' => 'required|integer|min:0',

            'anggota_organisasi' => 'required|array', 
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

            $potensi->update($request->only($potensiModel->getFillable()));

            BPD::first()->update($request->only($bpdModel->getFillable()));

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

            return redirect()->route('potensi.potensi-kelembagaan.pemerintah.index');
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
        $potensi = PotensiKelembagaan::findOrFail($id);

        $bpd = BPD::first();

        $anggotaOrganisasis = AnggotaOrganisasi::with(['perangkatDesa', 'jabatan'])
            ->get();

        return view('pages.potensi.potensi-kelembagaan.pemerintah.show', compact('potensi', 'bpd', 'anggotaOrganisasis'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $potensi = PotensiKelembagaan::findOrFail($id);

        $potensi->delete();

        return redirect()->route('potensi.potensi-kelembagaan.pemerintah.index');
    }

    public function print($id)
    {
        $potensi = PotensiKelembagaan::findOrFail($id);
        $bpd = BPD::first();
        $anggotaOrganisasis = AnggotaOrganisasi::with(['perangkatDesa.pendidikan', 'jabatan'])->get();

        $pdf = Pdf::loadView(
            'pages.potensi.potensi-kelembagaan.pemerintah.print',
            compact('potensi', 'bpd', 'anggotaOrganisasis')
        )->setPaper('a4', 'portrait');

        return $pdf->stream('Detail_Potensi_Kelembagaan_' . $potensi->id . '.pdf');
    }
    public function download($id)
    {
        $potensi = PotensiKelembagaan::findOrFail($id);
        $bpd = BPD::first();
        $anggotaOrganisasis = AnggotaOrganisasi::with(['perangkatDesa.pendidikan', 'jabatan'])->get();

        $pdf = Pdf::loadView(
            'pages.potensi.potensi-kelembagaan.pemerintah.print',
            compact('potensi', 'bpd', 'anggotaOrganisasis')
        )->setPaper('a4', 'portrait');

        return $pdf->download('Detail_Potensi_Kelembagaan_' . $potensi->id . '.pdf');
    }
}
