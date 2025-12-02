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
use App\Models\{PerangkatDesa, Jabatan, Desa}; 

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;

class PotensiKelembagaanController extends Controller
{
    public function index(Request $request)
    {
        $desaId = session('desa_id');

        $records = PotensiKelembagaan::with('desa')
            ->where('desa_id', $desaId)
            ->latest()
            ->get();

        $anggotaOrganisasis = AnggotaOrganisasi::with(['perangkatDesa'])->get();
        $personnelMap = $anggotaOrganisasis->keyBy('jabatan_id');

        return view('pages.potensi.potensi-kelembagaan.pemerintah.index', compact(
            'records', 
            'personnelMap'
        ));
    }

    public function create()
    {
        $jabatans = Jabatan::all();
        $perangkatDesas = PerangkatDesa::select('id', 'nama')->orderBy('nama')->get();
        $currentRecord = PotensiKelembagaan::latest()->first();

        return view('pages.potensi.potensi-kelembagaan.pemerintah.create', compact(
            'jabatans', 
            'perangkatDesas', 
            'currentRecord'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal_data' => 'required|date',
            'jumlah_aparat_pemerintah' => 'required|integer|min:0',
            'jumlah_perangkat_desa' => 'required|integer|min:0',
            'jumlah_staf' => 'required|integer|min:0',
            'jumlah_dusun' => 'required|integer|min:0',
            'dasar_hukum_pembentukan' => 'nullable|string',
            'dasar_hukum_pembentukan_bpd' => 'nullable|string',
            'keberadaan_bpd' => ['required', Rule::in(['Ada dan Aktif', 'Ada dan Tidak Aktif', 'Tidak Ada'])],
            'jumlah_anggota' => 'required|integer|min:0',
            'anggota_organisasi' => 'required|array',
            'anggota_organisasi.*.perangkat_desa_id' => 'required|exists:perangkat_desas,id',
            'anggota_organisasi.*.jabatan_id' => 'required|exists:jabatans,id',
            'anggota_organisasi.*.status_jabatan' => ['required', Rule::in([
                'Ada dan Aktif', 'Ada dan Tidak Aktif', 'Tidak Ada', 'Aktif', 'Pasif', 'Pasif (Dusun)', 'Aktif (Dusun)'
            ])],
            'anggota_organisasi.*.keterangan_tambahan' => 'nullable|string',
        ]);

        DB::beginTransaction();

        try {
            $potensiModel = new PotensiKelembagaan();
            $bpdModel = new BPD();
            $dataToSave = $request->only($potensiModel->getFillable());
            $dataToSave['desa_id'] = session('desa_id');

           $potensi = PotensiKelembagaan::create($dataToSave);

            BPD::updateOrCreate(
                [], 
                $request->only($bpdModel->getFillable())
            );

            $anggotaData = $validated['anggota_organisasi'];
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
                ->with('success', 'Data Potensi Kelembagaan baru berhasil dibuat. 🎉');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Potensi Kelembagaan save failed: ' . $e->getMessage(), [
                'input' => $request->all(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);
            return back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data.'])->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $potensi = PotensiKelembagaan::findOrFail($id);
        $bpd = BPD::first();
        $jabatans = Jabatan::all();
        $perangkatDesas = PerangkatDesa::select('id', 'nama')->orderBy('nama')->get();
        $anggotaOrganisasis = AnggotaOrganisasi::with(['perangkatDesa', 'jabatan'])->get()->keyBy('jabatan_id');

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
            'tanggal_data' => 'required|date',
            'jumlah_aparat_pemerintah' => 'required|integer|min:0',
            'jumlah_perangkat_desa' => 'required|integer|min:0',
            'jumlah_staf' => 'required|integer|min:0',
            'jumlah_dusun' => 'required|integer|min:0',
            'dasar_hukum_pembentukan' => 'nullable|string',
            'dasar_hukum_pembentukan_bpd' => 'nullable|string',
            'keberadaan_bpd' => ['required', Rule::in(['Ada dan Aktif', 'Ada dan Tidak Aktif', 'Tidak Ada'])],
            'jumlah_anggota' => 'required|integer|min:0',
            'anggota_organisasi' => 'required|array',
            'anggota_organisasi.*.perangkat_desa_id' => 'required|exists:perangkat_desas,id',
            'anggota_organisasi.*.jabatan_id' => 'required|exists:jabatans,id',
            'anggota_organisasi.*.status_jabatan' => ['required', Rule::in([
                'Ada dan Aktif', 'Ada dan Tidak Aktif', 'Tidak Ada', 'Aktif', 'Pasif', 'Pasif (Dusun)', 'Aktif (Dusun)'
            ])],
            'anggota_organisasi.*.keterangan_tambahan' => 'nullable|string',
        ]);

        DB::beginTransaction();

        try {
            $potensi = PotensiKelembagaan::findOrFail($id);
            $potensiModel = new PotensiKelembagaan();
            $bpdModel = new BPD();
            $dataToUpdate = $request->only($potensiModel->getFillable());
            $dataToUpdate['desa_id'] = session('desa_id');

            $potensi->update($dataToUpdate);

            $bpd = BPD::first();
            if ($bpd) {
                $bpd->update($request->only($bpdModel->getFillable()));
            } else {
                BPD::create($request->only($bpdModel->getFillable()));
            }
            $anggotaData = $validated['anggota_organisasi'];
            $upsertData = collect($anggotaData)->map(function ($item) {
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

            return redirect()->route('potensi.potensi-kelembagaan.pemerintah.index')
                   ->with('success', 'Data Potensi Kelembagaan berhasil diperbarui. 🎉');
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
        DB::beginTransaction();
        try {
            $potensi = PotensiKelembagaan::findOrFail($id);
            $potensi->delete();
            DB::commit();
            return redirect()->route('potensi.potensi-kelembagaan.pemerintah.index')
                   ->with('success', 'Data Potensi Kelembagaan berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Potensi Kelembagaan delete failed: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Gagal menghapus data.']);
        }
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
        // === PERBAIKAN 8: Kembalikan ke BPD::first() ===
        $bpd = BPD::first();
        $anggotaOrganisasis = AnggotaOrganisasi::with(['perangkatDesa.pendidikan', 'jabatan'])->get();

        $pdf = Pdf::loadView(
            'pages.potensi.potensi-kelembagaan.pemerintah.print',
            compact('potensi', 'bpd', 'anggotaOrganisasis')
        )->setPaper('a4', 'portrait');

        return $pdf->download('Detail_Potensi_Kelembagaan_' . $potensi->id . '.pdf');
    }
}