<?php

namespace App\Http\Controllers\PotensiKelembagaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PotensiKelembagaan\KelembagaanPartisipasiPolitik;
use App\Models\PotensiKelembagaan\PartisipasiPolitik;
use Barryvdh\DomPDF\Facade\Pdf;

class PolitikController extends Controller
{
    public function index()
    {
        $desaId = session('desa_id');

        $data = KelembagaanPartisipasiPolitik::with(['partisipasiPolitik', 'desa'])
            ->where('desa_id', $desaId)
            ->orderBy('tanggal', 'desc')
            ->paginate(10);

        return view('pages.potensi.potensi-kelembagaan.politik.index', compact('data'));
    }

    public function create()
    {
        $partisipasi = PartisipasiPolitik::all();
        return view('pages.potensi.potensi-kelembagaan.politik.create', compact('partisipasi'));
    }

    public function store(Request $request)
    {
        $request->validate([
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

        $data = $request->all();
        $data['desa_id'] = session('desa_id'); // ← DITAMBAHKAN

        KelembagaanPartisipasiPolitik::create($data);

        return redirect()->route('potensi.potensi-kelembagaan.politik.index')
            ->with('success', 'Data Partisipasi Politik berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = KelembagaanPartisipasiPolitik::findOrFail($id);
        $partisipasi = PartisipasiPolitik::all();

        return view('pages.potensi.potensi-kelembagaan.politik.edit', compact('data', 'partisipasi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
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

        $politik = KelembagaanPartisipasiPolitik::findOrFail($id);

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        $politik->update($data);

        return redirect()->route('potensi.potensi-kelembagaan.politik.index')
            ->with('success', 'Data Partisipasi Politik berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $data = KelembagaanPartisipasiPolitik::findOrFail($id);
        $data->delete();

        return redirect()->route('potensi.potensi-kelembagaan.politik.index')
            ->with('success', 'Data partisipasi politik berhasil dihapus.');
    }

    public function show($id)
    {
        $data = KelembagaanPartisipasiPolitik::with('partisipasiPolitik')->findOrFail($id);
        return view('pages.potensi.potensi-kelembagaan.politik.show', compact('data'));
    }

    public function print($id)
    {
        $data = KelembagaanPartisipasiPolitik::with('partisipasiPolitik')->findOrFail($id);
        $pdf = Pdf::loadView('pages.potensi.potensi-kelembagaan.politik.print', compact('data'))
                  ->setPaper('a4', 'portrait');

        return $pdf->stream('Data_Partisipasi_Politik_' . $data->id . '.pdf');
    }

    public function download($id)
    {
        $data = KelembagaanPartisipasiPolitik::with('partisipasiPolitik')->findOrFail($id);
        $pdf = Pdf::loadView('pages.potensi.potensi-kelembagaan.politik.print', compact('data'))
                  ->setPaper('a4', 'portrait');

        return $pdf->download('Data_Partisipasi_Politik_' . $data->id . '.pdf');
    }
}
