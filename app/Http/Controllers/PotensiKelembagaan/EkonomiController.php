<?php

namespace App\Http\Controllers\PotensiKelembagaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PotensiKelembagaan\LembagaEkonomi;
use App\Models\MasterPotensi\KategoriLembagaEkonomi;
use App\Models\MasterPotensi\JenisLembagaEkonomi;
use Barryvdh\DomPDF\Facade\Pdf;

class EkonomiController extends Controller
{
    /**
     * Tampilkan semua data lembaga ekonomi.
     */
    public function index()
    {
        $data = LembagaEkonomi::with(['kategori', 'jenis'])->latest()->get();
        return view('pages.potensi.potensi-kelembagaan.ekonomi.index', compact('data'));
    }

    /**
     * Tampilkan form tambah data baru.
     */
    public function create()
    {
        $kategori = KategoriLembagaEkonomi::all();
        $jenis = JenisLembagaEkonomi::all();
        $data = LembagaEkonomi::with(['kategori', 'jenis'])->latest()->get();

        return view('pages.potensi.potensi-kelembagaan.ekonomi.create', compact('kategori', 'jenis', 'data'));
    }


    /**
     * Simpan data baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'kategori_lembaga_ekonomi_id' => 'required|exists:kategori_lembaga_ekonomi,id',
            'jenis_lembaga_ekonomi_id' => 'nullable|exists:jenis_lembaga_ekonomi,id',
            'jumlah' => 'nullable|integer|min:0',
            'jumlah_kegiatan' => 'nullable|integer|min:0',
            'jumlah_pengurus' => 'nullable|integer|min:0',
        ]);

        LembagaEkonomi::create($validated);

        return redirect()->route('potensi.potensi-kelembagaan.ekonomi.index')
            ->with('success', 'Data Lembaga Ekonomi berhasil ditambahkan.');
    }

    /**
     * Detail data tertentu.
     */
    public function show($id)
    {
        $data = LembagaEkonomi::with(['kategori', 'jenis'])->findOrFail($id);
        return view('pages.potensi.potensi-kelembagaan.ekonomi.show', compact('data'));
    }

    /**
     * Form edit data.
     */
    public function edit($id)
    {
        $data = LembagaEkonomi::findOrFail($id);
        $kategori = KategoriLembagaEkonomi::all();
        $jenis = JenisLembagaEkonomi::where('kategori_lembaga_ekonomi_id', $data->kategori_lembaga_ekonomi_id)->get();
        return view('pages.potensi.potensi-kelembagaan.ekonomi.edit', compact('data', 'kategori', 'jenis'));
    }

    /**
     * Update data di database.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'kategori_lembaga_ekonomi_id' => 'required|exists:kategori_lembaga_ekonomi,id',
            'jenis_lembaga_ekonomi_id' => 'required|exists:jenis_lembaga_ekonomi,id',
            'jumlah' => 'nullable|integer|min:0',
            'jumlah_kegiatan' => 'nullable|integer|min:0',
            'jumlah_pengurus' => 'nullable|integer|min:0',
        ]);

        $data = LembagaEkonomi::findOrFail($id);
        $data->update($validated);

        return redirect()->route('potensi.potensi-kelembagaan.ekonomi.index')
            ->with('success', 'Data Lembaga Ekonomi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $data = LembagaEkonomi::findOrFail($id);
        $data->delete();

        return redirect()->route('potensi.potensi-kelembagaan.ekonomi.index')
            ->with('success', 'Data Lembaga Ekonomi berhasil dihapus.');
    }

   public function print($id)
    {
        $data = LembagaEkonomi::with(['kategori', 'jenis'])->findOrFail($id);
        $pdf = Pdf::loadView('pages.potensi.potensi-kelembagaan.ekonomi.print', compact('data'))
                  ->setPaper('a4', 'portrait');
        return $pdf->stream('Data_Lembaga_Ekonomi_' . $data->id . '.pdf');
    }

    public function download($id)
    {
        $data = LembagaEkonomi::with(['kategori', 'jenis'])->findOrFail($id);
        $pdf = Pdf::loadView('pages.potensi.potensi-kelembagaan.ekonomi.print', compact('data'))
                  ->setPaper('a4', 'portrait');
        return $pdf->download('Data_Lembaga_Ekonomi_' . $data->id . '.pdf');
    }

    public function getJenis($kategoriId)
    {
       
        $jenis = JenisLembagaEkonomi::where('kategori_lembaga_ekonomi_id', $kategoriId)
                                    ->orderBy('nama', 'asc')
                                    ->get(['id', 'nama']);

        return response()->json($jenis);
    }

}
