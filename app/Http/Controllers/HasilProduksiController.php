<?php

namespace App\Http\Controllers;

use App\Models\HasilProduksi;
use App\Models\MasterPerkembangan\KomoditasPangan;
use Illuminate\Http\Request;

class HasilProduksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desaId = session('desa_id');
        $hasilProduksis = HasilProduksi::with('desa', 'komoditas')->where('desa_id', $desaId)->latest()->get();
        return view('pages.potensi.sda.hasil.index', compact('hasilProduksis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $komoditasPangans = KomoditasPangan::all();
        return view('pages.potensi.sda.hasil.create', compact('komoditasPangans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'komoditas_pangan_id' => 'required|exists:komoditas_pangan,id',
            'luas_produksi' => 'required|numeric|min:0',
            'hasil_produksi' => 'required|numeric|min:0',
            'harga_lokal' => 'required|numeric|min:0',
            'nilai_produksi_tahun_ini' => 'required|numeric|min:0',
            'biaya_pemupukan' => 'required|numeric|min:0',
            'biaya_bibit' => 'required|numeric|min:0',
            'biaya_obat' => 'required|numeric|min:0',
            'biaya_lainnya' => 'required|numeric|min:0',
            'saldo_produksi' => 'required|numeric|min:0',
        ]);

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        HasilProduksi::create($data);

        return redirect()->route('hasil.index')->with('success', 'Data hasil produksi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(HasilProduksi $hasil)
    {
        return view('pages.potensi.sda.hasil.show', compact('hasil'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HasilProduksi $hasil)
    {
        $komoditasPangans = KomoditasPangan::all();
        return view('pages.potensi.sda.hasil.edit', compact('hasil', 'komoditasPangans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HasilProduksi $hasil)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'komoditas_pangan_id' => 'required|exists:komoditas_pangan,id',
            'luas_produksi' => 'required|numeric|min:0',
            'hasil_produksi' => 'required|numeric|min:0',
            'harga_lokal' => 'required|numeric|min:0',
            'nilai_produksi_tahun_ini' => 'required|numeric|min:0',
            'biaya_pemupukan' => 'required|numeric|min:0',
            'biaya_bibit' => 'required|numeric|min:0',
            'biaya_obat' => 'required|numeric|min:0',
            'biaya_lainnya' => 'required|numeric|min:0',
            'saldo_produksi' => 'required|numeric|min:0',
        ]);

        $hasil->update($request->all());

        return redirect()->route('hasil.index')->with('success', 'Data hasil produksi berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HasilProduksi $hasil)
    {
        $hasil->delete();
        return redirect()->route('hasil.index')->with('success', 'Data hasil produksi berhasil dihapus.');
    }
}