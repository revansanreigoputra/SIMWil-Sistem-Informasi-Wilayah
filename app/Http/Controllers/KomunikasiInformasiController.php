<?php

namespace App\Http\Controllers;

use App\Models\KomunikasiInformasi;
use App\Models\KategoriKomunikasi;
use App\Models\JenisKomunikasi;
use Illuminate\Http\Request;

class KomunikasiInformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $komunikasiInformasis = KomunikasiInformasi::with(['kategori', 'jenis'])->orderBy('tanggal', 'desc')->paginate(10);
        return view('pages.potensi.potensi-prasarana-dan-sarana.komunikasiinformasi.index', compact('komunikasiInformasis'));
    }

    /**
     * Show the form for creating a new resource.
     */    public function create()
    {
        $kategoris = KategoriKomunikasi::all();
        return view('pages.potensi.potensi-prasarana-dan-sarana.komunikasiinformasi.create', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'kategori_id' => 'required|exists:kategori_komunikasis,id',
            'jenis_id' => 'required|exists:jenis_komunikasis,id',
            'jumlah' => 'required|integer|min:0',
            'satuan' => 'required|string|max:255',
        ]);

        KomunikasiInformasi::create($validated);

        return redirect()->route('potensi.potensi-prasarana-dan-sarana.komunikasiinformasi.index')->with('success', 'Data komunikasi informasi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(KomunikasiInformasi $komunikasiInformasi)
    {
        $komunikasiInformasi->load(['kategori', 'jenis']);
        return view('pages.potensi.potensi-prasarana-dan-sarana.komunikasiinformasi.show', compact('komunikasiInformasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KomunikasiInformasi $komunikasiInformasi)
    {
        $komunikasiInformasi->load(['kategori', 'jenis']);
        $kategoris = KategoriKomunikasi::all();
        $jenises = JenisKomunikasi::where('kategori_id', $komunikasiInformasi->kategori_id)->get();
        return view('pages.potensi.potensi-prasarana-dan-sarana.komunikasiinformasi.edit', compact('komunikasiInformasi', 'kategoris', 'jenises'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KomunikasiInformasi $komunikasiInformasi)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'kategori_id' => 'required|exists:kategori_komunikasis,id',
            'jenis_id' => 'required|exists:jenis_komunikasis,id',
            'jumlah' => 'required|integer|min:0',
            'satuan' => 'required|string|max:255',
        ]);

        $komunikasiInformasi->update($validated);

        return redirect()->route('potensi.potensi-prasarana-dan-sarana.komunikasiinformasi.index')->with('success', 'Data komunikasi informasi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KomunikasiInformasi $komunikasiInformasi)
    {
        $komunikasiInformasi->delete();

        return redirect()->route('potensi.potensi-prasarana-dan-sarana.komunikasiinformasi.index')->with('success', 'Data komunikasi informasi berhasil dihapus.');
    }

    /**
     * Get jenis komunikasi by kategori
     */
    public function getJenisByKategori($kategori_id)
    {
        $jenises = JenisKomunikasi::where('kategori_id', $kategori_id)->get();
        return response()->json($jenises);
    }
}