<?php

namespace App\Http\Controllers;

use App\Models\TransportasiDarat;
use App\Models\MasterPotensi\KategoriPrasaranaTransportasiDarat;
use App\Models\MasterPotensi\JenisPrasaranaTransportasiDarat;
use Illuminate\Http\Request;

class TransportasiDaratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desaId = session('desa_id');
        $transportasiDarats = TransportasiDarat::where('desa_id', $desaId)
            ->with(['desa', 'kategori', 'jenis'])
            ->orderBy('tanggal', 'desc')
            ->paginate(10);
        return view('pages.potensi.potensi-prasarana-dan-sarana.transportasi-darat.index', compact('transportasiDarats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = KategoriPrasaranaTransportasiDarat::all();
        $jenises = JenisPrasaranaTransportasiDarat::all();
        return view('pages.potensi.potensi-prasarana-dan-sarana.transportasi-darat.create', compact('kategoris', 'jenises'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'kategori_prasarana_transportasi_darat_id' => 'required|exists:kategori_prasarana_transportasi_darat,id',
            'jenis_prasarana_transportasi_darat_id' => 'required|exists:jenis_prasarana_transportasi_darat,id',
            'kondisi_baik' => 'required|integer|min:0',
            'kondisi_rusak' => 'required|integer|min:0',
            'jumlah' => 'required|integer|min:0',
        ]);

        $validated['desa_id'] = session('desa_id');

        TransportasiDarat::create($validated);

        return redirect()->route('potensi.potensi-prasarana-dan-sarana.transportasi-darat.index')->with('success', 'Data transportasi darat berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TransportasiDarat $transportasiDarat)
    {
        $transportasiDarat->load(['desa', 'kategori', 'jenis']);
        return view('pages.potensi.potensi-prasarana-dan-sarana.transportasi-darat.show', compact('transportasiDarat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TransportasiDarat $transportasiDarat)
    {
        $kategoris = KategoriPrasaranaTransportasiDarat::all();
        $jenises = JenisPrasaranaTransportasiDarat::all();
        return view('pages.potensi.potensi-prasarana-dan-sarana.transportasi-darat.edit', compact('transportasiDarat', 'kategoris', 'jenises'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TransportasiDarat $transportasiDarat)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'kategori_prasarana_transportasi_darat_id' => 'required|exists:kategori_prasarana_transportasi_darat,id',
            'jenis_prasarana_transportasi_darat_id' => 'required|exists:jenis_prasarana_transportasi_darat,id',
            'kondisi_baik' => 'required|integer|min:0',
            'kondisi_rusak' => 'required|integer|min:0',
            'jumlah' => 'required|integer|min:0',
        ]);

        $transportasiDarat->update($validated);

        return redirect()->route('potensi.potensi-prasarana-dan-sarana.transportasi-darat.index')->with('success', 'Data transportasi darat berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TransportasiDarat $transportasiDarat)
    {
        $transportasiDarat->delete();

        return redirect()->route('potensi.potensi-prasarana-dan-sarana.transportasi-darat.index')->with('success', 'Data transportasi darat berhasil dihapus.');
    }
}