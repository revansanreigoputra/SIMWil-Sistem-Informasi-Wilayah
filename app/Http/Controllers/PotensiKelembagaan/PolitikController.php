<?php

namespace App\Http\Controllers\PotensiKelembagaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PotensiKelembagaan\KelembagaanPartisipasiPolitik;
use App\Models\PotensiKelembagaan\PartisipasiPolitik;
use Barryvdh\DomPDF\Facade\Pdf;

class PolitikController extends Controller
{
    /**
     * Tampilkan daftar data partisipasi politik.
     */
    public function index()
    {
        $data = KelembagaanPartisipasiPolitik::with('partisipasiPolitik')->latest()->get();
        return view('pages.potensi.potensi-kelembagaan.politik.index', compact('data'));
    }

    /**
     * Tampilkan form tambah data.
     */
    public function create()
    {
        $partisipasi = PartisipasiPolitik::all();
        return view('pages.potensi.potensi-kelembagaan.politik.create', compact('partisipasi'));
    }

    /**
     * Simpan data baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'partisipasi_politik_id' => 'required|exists:partisipasi_politik,id',
            'tanggal' => 'required|date',
            'jumlah_wanita_hak_pilih' => 'required|integer|min:0',
            'jumlah_pria_hak_pilih' => 'required|integer|min:0',
            'jumlah_pemilih' => 'required|integer|min:0',
            'jumlah_wanita_memilih' => 'required|integer|min:0',
            'jumlah_pria_memilih' => 'required|integer|min:0',
            'jumlah_penggunaan_hak_pilih' => 'required|integer|min:0',
            'persentase' => 'required|numeric|min:0',
        ]);

        KelembagaanPartisipasiPolitik::create($validated);

        return redirect()->route('potensi.potensi-kelembagaan.politik.index')
            ->with('success', 'Data partisipasi politik berhasil ditambahkan.');
    }

    /**
     * Tampilkan form edit data.
     */
    public function edit($id)
    {
        $data = KelembagaanPartisipasiPolitik::findOrFail($id);
        $partisipasi = PartisipasiPolitik::all();
        return view('pages.potensi.potensi-kelembagaan.politik.edit', compact('data', 'partisipasi'));
    }

    /**
     * Update data yang ada.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'partisipasi_politik_id' => 'required|exists:partisipasi_politik,id',
            'tanggal' => 'required|date',
            'jumlah_wanita_hak_pilih' => 'required|integer|min:0',
            'jumlah_pria_hak_pilih' => 'required|integer|min:0',
            'jumlah_pemilih' => 'required|integer|min:0',
            'jumlah_wanita_memilih' => 'required|integer|min:0',
            'jumlah_pria_memilih' => 'required|integer|min:0',
            'jumlah_penggunaan_hak_pilih' => 'required|integer|min:0',
            'persentase' => 'required|numeric|min:0',
        ]);

        $data = KelembagaanPartisipasiPolitik::findOrFail($id);
        $data->update($validated);

        return redirect()->route('potensi.potensi-kelembagaan.politik.index')
            ->with('success', 'Data partisipasi politik berhasil diperbarui.');
    }

    /**
     * Hapus data.
     */
    public function destroy($id)
    {
        $data = KelembagaanPartisipasiPolitik::findOrFail($id);
        $data->delete();

        return redirect()->route('potensi.potensi-kelembagaan.politik.index')
            ->with('success', 'Data partisipasi politik berhasil dihapus.');
    }

    /**
     * Tampilkan detail data partisipasi politik.
     */
    public function show($id)
    {
        $data = KelembagaanPartisipasiPolitik::with('partisipasiPolitik')->findOrFail($id);
        return view('pages.potensi.potensi-kelembagaan.politik.show', compact('data'));
    }

    /**
     * Cetak data ke PDF (tampilan langsung di browser).
     */
    public function print($id)
    {
        $data = KelembagaanPartisipasiPolitik::with('partisipasiPolitik')->findOrFail($id);
        $pdf = Pdf::loadView('pages.potensi.potensi-kelembagaan.politik.print', compact('data'))
                  ->setPaper('a4', 'portrait');
        return $pdf->stream('Data_Partisipasi_Politik_' . $data->id . '.pdf');
    }

    /**
     * Unduh file PDF.
     */
    public function download($id)
    {
        $data = KelembagaanPartisipasiPolitik::with('partisipasiPolitik')->findOrFail($id);
        $pdf = Pdf::loadView('pages.potensi.potensi-kelembagaan.politik.print', compact('data'))
                  ->setPaper('a4', 'portrait');
        return $pdf->download('Data_Partisipasi_Politik_' . $data->id . '.pdf');
    }
}
