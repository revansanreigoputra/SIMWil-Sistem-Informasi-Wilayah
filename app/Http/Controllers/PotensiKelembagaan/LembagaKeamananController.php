<?php

namespace App\Http\Controllers\PotensiKelembagaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PotensiKelembagaan\LembagaKeamanan;
use App\Models\PotensiKelembagaan\PemilikOrganisasi;
use Barryvdh\DomPDF\Facade\Pdf;

class LembagaKeamananController extends Controller
{
    public function index()
    {
        $data = LembagaKeamanan::with('pemilikOrganisasi')->latest()->get();
        return view('pages.potensi.potensi-kelembagaan.keamanan.index', compact('data'));
    }

    public function create()
    {
        $pemilik = PemilikOrganisasi::all();
        return view('pages.potensi.potensi-kelembagaan.keamanan.create', compact('pemilik'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'keberadaan_hansip_linmas' => 'nullable|in:Ada,Tidak Ada',
            'jumlah_hansip' => 'nullable|integer|min:0',
            'jumlah_satgas_linmas' => 'nullable|integer|min:0',
            'pelaksanaan_siskamling' => 'nullable|in:Ada,Tidak Ada',
            'jumlah_pos_kamling' => 'nullable|integer|min:0',
            'keberadaan_satpam_swakarsa' => 'nullable|in:Ada,Tidak Ada',
            'jumlah_anggota_satpam' => 'nullable|integer|min:0',
            'nama_organisasi_induk' => 'nullable|string|max:255',
            'pemilik_organisasi_id' => 'nullable|exists:pemilik_organisasi,id',
            'keberadaan_organisasi_lain' => 'nullable|in:Ada,Tidak Ada',
            'mitra_koramil_tni' => 'nullable|in:Ada,Tidak Ada',
            'jumlah_anggota_koramil_tni' => 'nullable|integer|min:0',
            'jumlah_kegiatan_koramil_tni' => 'nullable|integer|min:0',
            'babinkantibmas_polri' => 'nullable|in:Ada,Tidak Ada',
            'jumlah_anggota_babinkantibmas' => 'nullable|integer|min:0',
            'jumlah_kegiatan_babinkantibmas' => 'nullable|integer|min:0',
        ]);

        LembagaKeamanan::create($request->all());

        return redirect()->route('potensi.potensi-kelembagaan.keamanan.index')
            ->with('success', 'Data lembaga keamanan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = LembagaKeamanan::findOrFail($id);
        $pemilik = PemilikOrganisasi::all();
        return view('pages.potensi.potensi-kelembagaan.keamanan.edit', compact('data', 'pemilik'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'keberadaan_hansip_linmas' => 'nullable|in:Ada,Tidak Ada',
            'jumlah_hansip' => 'nullable|integer|min:0',
            'jumlah_satgas_linmas' => 'nullable|integer|min:0',
            'pelaksanaan_siskamling' => 'nullable|in:Ada,Tidak Ada',
            'jumlah_pos_kamling' => 'nullable|integer|min:0',
            'keberadaan_satpam_swakarsa' => 'nullable|in:Ada,Tidak Ada',
            'jumlah_anggota_satpam' => 'nullable|integer|min:0',
            'nama_organisasi_induk' => 'nullable|string|max:255',
            'pemilik_organisasi_id' => 'nullable|exists:pemilik_organisasi,id',
            'keberadaan_organisasi_lain' => 'nullable|in:Ada,Tidak Ada',
            'mitra_koramil_tni' => 'nullable|in:Ada,Tidak Ada',
            'jumlah_anggota_koramil_tni' => 'nullable|integer|min:0',
            'jumlah_kegiatan_koramil_tni' => 'nullable|integer|min:0',
            'babinkantibmas_polri' => 'nullable|in:Ada,Tidak Ada',
            'jumlah_anggota_babinkantibmas' => 'nullable|integer|min:0',
            'jumlah_kegiatan_babinkantibmas' => 'nullable|integer|min:0',
        ]);

        $data = LembagaKeamanan::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('potensi.potensi-kelembagaan.keamanan.index')
            ->with('success', 'Data lembaga keamanan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $data = LembagaKeamanan::findOrFail($id);
        $data->delete();

        return redirect()->route('potensi.potensi-kelembagaan.keamanan.index')
            ->with('success', 'Data lembaga keamanan berhasil dihapus.');
    }

    public function show($id)
    {
        $data = LembagaKeamanan::with('pemilikOrganisasi')->findOrFail($id);
        return view('pages.potensi.potensi-kelembagaan.keamanan.show', compact('data'));
    }

    public function print($id)
    {
        $data = LembagaKeamanan::with('pemilikOrganisasi')->findOrFail($id);
        $pdf = Pdf::loadView('pages.potensi.potensi-kelembagaan.keamanan.print', compact('data'))
                  ->setPaper('a4', 'portrait');
        return $pdf->stream('Data_Lembaga_Keamanan_' . $data->id . '.pdf');
    }

    public function download($id)
    {
        $data = LembagaKeamanan::with('pemilikOrganisasi')->findOrFail($id);
        $pdf = Pdf::loadView('pages.potensi.potensi-kelembagaan.keamanan.print', compact('data'))
                  ->setPaper('a4', 'portrait');
        return $pdf->download('Data_Lembaga_Keamanan_' . $data->id . '.pdf');
    }
}
