<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\SaranaTransportasi;
use App\Models\MasterPotensi\KategoriPrasaranaTransportasiLainnya;
use App\Models\MasterPotensi\JenisPrasaranaTransportasiLainnya;
use Illuminate\Http\Request;

class SaranaTransportasiController extends Controller
{
    public function index()
    {
        $desaId = session('desa_id');
        $saranaTransportasis = SaranaTransportasi::where('desa_id', $desaId)->with(['desa', 'kategori', 'jenis'])->get();
        return view('pages.potensi.potensi-prasarana-dan-sarana.angkutan.index', compact('saranaTransportasis'));
    }

    public function create()
    {
        $kategoriTransportasis = KategoriPrasaranaTransportasiLainnya::all();
        $jenisTransportasis = JenisPrasaranaTransportasiLainnya::all();
        return view('pages.potensi.potensi-prasarana-dan-sarana.angkutan.create', compact('kategoriTransportasis', 'jenisTransportasis'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'kategori_prasarana_transportasi_lainnya_id' => 'required|exists:kategori_prasarana_transportasi_lainnya,id',
            'jenis_prasarana_transportasi_lainnya_id' => 'required|exists:jenis_prasarana_transportasi_lainnya,id',
            'jumlah' => 'required|integer|min:0',
        ]);

        $validated['desa_id'] = session('desa_id');

        SaranaTransportasi::create($validated);

        return redirect()->route('potensi.potensi-prasarana-dan-sarana.angkutan.index')->with('success', 'Data sarana transportasi berhasil disimpan.');
    }

    public function show(SaranaTransportasi $saranaTransportasi)
    {
        $saranaTransportasi->load(['desa', 'kategori', 'jenis']);
        return view('pages.potensi.potensi-prasarana-dan-sarana.angkutan.show', compact('saranaTransportasi'));
    }

    public function edit(SaranaTransportasi $saranaTransportasi)
    {
        $kategoriTransportasis = KategoriPrasaranaTransportasiLainnya::all();
        $jenisTransportasis = JenisPrasaranaTransportasiLainnya::all();
        return view('pages.potensi.potensi-prasarana-dan-sarana.angkutan.edit', compact('saranaTransportasi', 'kategoriTransportasis', 'jenisTransportasis'));
    }

    public function update(Request $request, SaranaTransportasi $saranaTransportasi)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'kategori_prasarana_transportasi_lainnya_id' => 'required|exists:kategori_prasarana_transportasi_lainnya,id',
            'jenis_prasarana_transportasi_lainnya_id' => 'required|exists:jenis_prasarana_transportasi_lainnya,id',
            'jumlah' => 'required|integer|min:0',
        ]);

        $saranaTransportasi->update($validated);

        return redirect()->route('potensi.potensi-prasarana-dan-sarana.angkutan.index')->with('success', 'Data sarana transportasi berhasil diperbarui.');
    }

    public function destroy(SaranaTransportasi $saranaTransportasi)
    {
        $saranaTransportasi->delete();
        return redirect()->route('potensi.potensi-prasarana-dan-sarana.angkutan.index')->with('success', 'Data sarana transportasi berhasil dihapus.');
    }

    public function getJenisByKategori($kategoriId)
    {
        $jenis = JenisPrasaranaTransportasiLainnya::where('kategori_prasarana_transportasi_lainnya_id', $kategoriId)->get();
        return response()->json($jenis);
    }
}