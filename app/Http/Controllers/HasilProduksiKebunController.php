<?php

namespace App\Http\Controllers;

use App\Models\HasilProduksiKebun;
use App\Models\MasterPerkembangan\KomoditasPerkebunan;
use Illuminate\Http\Request;

class HasilProduksiKebunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desaId = session('desa_id');
        $hasilProduksiKebuns = HasilProduksiKebun::with('desa', 'komoditas')->where('desa_id', $desaId)->latest()->get();
        return view('pages.potensi.sda.hasilkebun.index', compact('hasilProduksiKebuns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $komoditas = KomoditasPerkebunan::all();
        return view('pages.potensi.sda.hasilkebun.create', compact('komoditas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'komoditas_perkebunan_id' => 'required|exists:komoditas_perkebunan,id',
            'luas_perkebunan_swasta_negara' => 'nullable|numeric|min:0',
            'hasil_perkebunan_swasta_negara' => 'nullable|numeric|min:0',
            'luas_perkebunan_rakyat' => 'nullable|numeric|min:0',
            'hasil_perkebunan_rakyat' => 'nullable|numeric|min:0',
            'harga_lokal' => 'nullable|numeric|min:0',
            'nilai_produksi_tahun_ini' => 'nullable|numeric|min:0',
            'biaya_pemupukan' => 'nullable|numeric|min:0',
            'biaya_bibit' => 'nullable|numeric|min:0',
            'biaya_obat' => 'nullable|numeric|min:0',
            'biaya_lainnya' => 'nullable|numeric|min:0',
            'saldo_produksi' => 'nullable|numeric|min:0',
            'dijual_langsung_ke_konsumen' => 'required|in:Ya,Tidak',
            'dijual_melalui_kud' => 'required|in:Ya,Tidak',
            'dijual_melalui_tengkulak' => 'required|in:Ya,Tidak',
            'dijual_melalui_pengecer' => 'required|in:Ya,Tidak',
            'dijual_ke_lumbung_desa' => 'required|in:Ya,Tidak',
            'tidak_dijual' => 'required|in:Ya,Tidak',
        ]);

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        HasilProduksiKebun::create($data);

        return redirect()->route('hasilkebun.index')->with('success', 'Data Hasil Produksi Kebun berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(HasilProduksiKebun $hasilkebun)
    {
        return view('pages.potensi.sda.hasilkebun.show', compact('hasilkebun'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HasilProduksiKebun $hasilkebun)
    {
        $komoditas = KomoditasPerkebunan::all();
        return view('pages.potensi.sda.hasilkebun.edit', compact('hasilkebun', 'komoditas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HasilProduksiKebun $hasilkebun)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'komoditas_perkebunan_id' => 'required|exists:komoditas_perkebunan,id',
            'luas_perkebunan_swasta_negara' => 'nullable|numeric|min:0',
            'hasil_perkebunan_swasta_negara' => 'nullable|numeric|min:0',
            'luas_perkebunan_rakyat' => 'nullable|numeric|min:0',
            'hasil_perkebunan_rakyat' => 'nullable|numeric|min:0',
            'harga_lokal' => 'nullable|numeric|min:0',
            'nilai_produksi_tahun_ini' => 'nullable|numeric|min:0',
            'biaya_pemupukan' => 'nullable|numeric|min:0',
            'biaya_bibit' => 'nullable|numeric|min:0',
            'biaya_obat' => 'nullable|numeric|min:0',
            'biaya_lainnya' => 'nullable|numeric|min:0',
            'saldo_produksi' => 'nullable|numeric|min:0',
            'dijual_langsung_ke_konsumen' => 'required|in:Ya,Tidak',
            'dijual_melalui_kud' => 'required|in:Ya,Tidak',
            'dijual_melalui_tengkulak' => 'required|in:Ya,Tidak',
            'dijual_melalui_pengecer' => 'required|in:Ya,Tidak',
            'dijual_ke_lumbung_desa' => 'required|in:Ya,Tidak',
            'tidak_dijual' => 'required|in:Ya,Tidak',
        ]);

        $hasilkebun->update($request->all());

        return redirect()->route('hasilkebun.index')->with('success', 'Data Hasil Produksi Kebun berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HasilProduksiKebun $hasilkebun)
    {
        $hasilkebun->delete();
        return redirect()->route('hasilkebun.index')->with('success', 'Data Hasil Produksi Kebun berhasil dihapus.');
    }
}