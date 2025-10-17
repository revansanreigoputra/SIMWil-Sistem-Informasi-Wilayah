<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\TransportasiDarat;
use Illuminate\Http\Request;

class TransportasiDaratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transportasiDarats = TransportasiDarat::with('desa')->orderBy('tanggal', 'desc')->paginate(10);
        return view('pages.potensi.potensi-prasarana-dan-sarana.transportasi-darat.index', compact('transportasiDarats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $desas = Desa::all();
        $kategoriOptions = TransportasiDarat::getKategoriOptions();
        $jenisSaranaPrasaranaOptions = TransportasiDarat::getJenisSaranaPrasaranaOptions();
        return view('pages.potensi.potensi-prasarana-dan-sarana.transportasi-darat.create', compact('desas', 'kategoriOptions', 'jenisSaranaPrasaranaOptions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'desa_id' => 'required|exists:desas,id',
            'tanggal' => 'required|date',
            'kategori' => 'required|in:jalan_desa,jalan_kabupaten',
            'jenis_sarana_prasarana' => 'required|in:panjang_jalan_tanah,panjang_jalan_aspal',
            'kondisi_baik' => 'required|integer|min:0',
            'kondisi_rusak' => 'required|integer|min:0',
            'jumlah' => 'required|integer|min:0',
        ]);

        TransportasiDarat::create($validated);

        return redirect()->route('potensi.potensi-prasarana-dan-sarana.transportasi-darat.index')->with('success', 'Data transportasi darat berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TransportasiDarat $transportasiDarat)
    {
        return view('pages.potensi.potensi-prasarana-dan-sarana.transportasi-darat.show', compact('transportasiDarat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TransportasiDarat $transportasiDarat)
    {
        $desas = Desa::all();
        $kategoriOptions = TransportasiDarat::getKategoriOptions();
        $jenisSaranaPrasaranaOptions = TransportasiDarat::getJenisSaranaPrasaranaOptions();
        return view('pages.potensi.potensi-prasarana-dan-sarana.transportasi-darat.edit', compact('transportasiDarat', 'desas', 'kategoriOptions', 'jenisSaranaPrasaranaOptions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TransportasiDarat $transportasiDarat)
    {
        $validated = $request->validate([
            'desa_id' => 'required|exists:desas,id',
            'tanggal' => 'required|date',
            'kategori' => 'required|in:jalan_desa,jalan_kabupaten',
            'jenis_sarana_prasarana' => 'required|in:panjang_jalan_tanah,panjang_jalan_aspal',
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