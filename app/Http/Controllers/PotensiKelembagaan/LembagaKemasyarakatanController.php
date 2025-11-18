<?php

namespace App\Http\Controllers\PotensiKelembagaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PotensiKelembagaan\LembagaKemasyarakatan;
use App\Models\MasterPotensi\JenisLembaga;
use App\Models\MasterPotensi\DasarHukum;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LembagaKemasyarakatanController extends Controller
{
    public function index()
    {
        $desaId = session('desa_id');

        $data = LembagaKemasyarakatan::with(['jenisLembaga', 'dasarHukum', 'desa'])
            ->where('desa_id', $desaId)
            ->latest()
            ->get();

        return view('pages.potensi.potensi-kelembagaan.lembaga-kemasyarakatan.index', compact('data'));
    }

    public function create()
    {
        $jenisLembaga = JenisLembaga::all();
        $dasarHukum = DasarHukum::all();

        return view('pages.potensi.potensi-kelembagaan.lembaga-kemasyarakatan.create', compact('jenisLembaga', 'dasarHukum'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jenis_lembaga_id' => 'required|exists:jenis_lembaga,id',
            'dasar_hukum_id' => 'required|exists:dasar_hukum,id',
            'jumlah' => 'required|integer|min:0',
            'jumlah_pengurus' => 'required|integer|min:0',
            'alamat_kantor' => 'nullable|string',
            'jumlah_jenis_kegiatan' => 'nullable|integer|min:0',
            'ruang_lingkup_kegiatan' => 'nullable|string',
        ]);

        DB::beginTransaction();
        try {
            $model = new LembagaKemasyarakatan();
            $dataToSave = $request->only($model->getFillable());

            $dataToSave['desa_id'] = session('desa_id');

            LembagaKemasyarakatan::create($dataToSave);

            DB::commit();

            return redirect()->route('potensi.potensi-kelembagaan.lembaga-kemasyarakatan.index')
                ->with('success', 'Data Lembaga Kemasyarakatan berhasil disimpan.');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Gagal menyimpan Lembaga Kemasyarakatan: ' . $e->getMessage(), [
                'input' => $request->all(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);

            return back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data.'])->withInput();
        }
    }

    public function show($id)
    {
        $desaId = session('desa_id');

        $data = LembagaKemasyarakatan::with(['jenisLembaga', 'dasarHukum'])
            ->where('desa_id', $desaId)
            ->findOrFail($id);

        return view('pages.potensi.potensi-kelembagaan.lembaga-kemasyarakatan.show', compact('data'));
    }

    public function edit($id)
    {
        $desaId = session('desa_id');

        $data = LembagaKemasyarakatan::where('desa_id', $desaId)->findOrFail($id);

        $jenisLembaga = JenisLembaga::all();
        $dasarHukum = DasarHukum::all();

        return view('pages.potensi.potensi-kelembagaan.lembaga-kemasyarakatan.edit',
            compact('data', 'jenisLembaga', 'dasarHukum'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jenis_lembaga_id' => 'required|exists:jenis_lembaga,id',
            'dasar_hukum_id' => 'required|exists:dasar_hukum,id',
            'jumlah' => 'required|integer|min:0',
            'jumlah_pengurus' => 'required|integer|min:0',
            'alamat_kantor' => 'nullable|string',
            'jumlah_jenis_kegiatan' => 'nullable|integer|min:0',
            'ruang_lingkup_kegiatan' => 'nullable|string',
        ]);

        DB::beginTransaction();
        try {
            $desaId = session('desa_id');

            $data = LembagaKemasyarakatan::where('desa_id', $desaId)->findOrFail($id);

            $model = new LembagaKemasyarakatan();
            $dataToUpdate = $request->only($model->getFillable());

            $dataToUpdate['desa_id'] = $desaId;

            $data->update($dataToUpdate);

            DB::commit();

            return redirect()->route('potensi.potensi-kelembagaan.lembaga-kemasyarakatan.index')
                ->with('success', 'Data berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Gagal update Lembaga Kemasyarakatan: ' . $e->getMessage(), [
                'id' => $id,
                'input' => $request->all(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);

            return back()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui data.'])->withInput();
        }
    }

    public function destroy($id)
    {
        $desaId = session('desa_id');

        $data = LembagaKemasyarakatan::where('desa_id', $desaId)->findOrFail($id);

        $data->delete();

        return redirect()->route('potensi.potensi-kelembagaan.lembaga-kemasyarakatan.index')
            ->with('success', 'Data berhasil dihapus.');
    }

    public function print($id)
    {
        $desaId = session('desa_id');

        $data = LembagaKemasyarakatan::with(['jenisLembaga', 'dasarHukum'])
            ->where('desa_id', $desaId)
            ->findOrFail($id);

        $pdf = Pdf::loadView('pages.potensi.potensi-kelembagaan.lembaga-kemasyarakatan.print', compact('data'))
                  ->setPaper('a4', 'portrait');

        return $pdf->stream('Data_Lembaga_Kemasyarakatan_' . $data->id . '.pdf');
    }

    public function download($id)
    {
        $desaId = session('desa_id');

        $data = LembagaKemasyarakatan::with(['jenisLembaga', 'dasarHukum'])
            ->where('desa_id', $desaId)
            ->findOrFail($id);

        $pdf = Pdf::loadView('pages.potensi.potensi-kelembagaan.lembaga-kemasyarakatan.print', compact('data'))
                  ->setPaper('a4', 'portrait');

        return $pdf->download('Data_Lembaga_Kemasyarakatan_' . $data->id . '.pdf');
    }
}
