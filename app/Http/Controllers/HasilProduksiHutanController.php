<?php

namespace App\Http\Controllers;

use App\Models\HasilProduksiHutan;
use App\Models\MasterPerkembangan\KomoditasHutan;
use App\Models\SatuanProduksiKehutanan;
use Illuminate\Http\Request;

class HasilProduksiHutanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desaId = session('desa_id');
        $hasilProduksiHutans = HasilProduksiHutan::with('desa', 'komoditas', 'satuan')
            ->where('desa_id', $desaId)
            ->latest()
            ->get();

        return view('pages.potensi.sda.hasilhutan.index', compact('hasilProduksiHutans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $komoditasHutans = KomoditasHutan::all();
        $satuans = SatuanProduksiKehutanan::all();
        return view('pages.potensi.sda.hasilhutan.create', compact('komoditasHutans', 'satuans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'komoditas_hutan_id' => 'required|exists:komoditas_hutan,id',
            'hasil_produksi' => 'required|numeric|min:0',
            'satuan_produksi_kehutanan_id' => 'required|exists:satuan_produksi_kehutanan,id',
            'dijual_langsung_ke_konsumen' => 'required|in:Ya,Tidak',
            'dijual_ke_pasar' => 'required|in:Ya,Tidak',
            'dijual_melalui_kud' => 'required|in:Ya,Tidak',
            'dijual_melalui_tengkulak' => 'required|in:Ya,Tidak',
            'dijual_melalui_pengecer' => 'required|in:Ya,Tidak',
            'dijual_ke_lumbung_desa_kelurahan' => 'required|in:Ya,Tidak',
            'tidak_dijual' => 'required|in:Ya,Tidak',
        ]);

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        HasilProduksiHutan::create($data);

        return redirect()->route('hasilhutan.index')->with('success', 'Data Hasil Produksi Hutan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(HasilProduksiHutan $hasilhutan)
    {
        return view('pages.potensi.sda.hasilhutan.show', compact('hasilhutan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HasilProduksiHutan $hasilhutan)
    {
        $komoditasHutans = KomoditasHutan::all();
        $satuans = SatuanProduksiKehutanan::all();
        return view('pages.potensi.sda.hasilhutan.edit', compact('hasilhutan', 'komoditasHutans', 'satuans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HasilProduksiHutan $hasilhutan)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'komoditas_hutan_id' => 'required|exists:komoditas_hutan,id',
            'hasil_produksi' => 'required|numeric|min:0',
            'satuan_produksi_kehutanan_id' => 'required|exists:satuan_produksi_kehutanan,id',
            'dijual_langsung_ke_konsumen' => 'required|in:Ya,Tidak',
            'dijual_ke_pasar' => 'required|in:Ya,Tidak',
            'dijual_melalui_kud' => 'required|in:Ya,Tidak',
            'dijual_melalui_tengkulak' => 'required|in:Ya,Tidak',
            'dijual_melalui_pengecer' => 'required|in:Ya,Tidak',
            'dijual_ke_lumbung_desa_kelurahan' => 'required|in:Ya,Tidak',
            'tidak_dijual' => 'required|in:Ya,Tidak',
        ]);

        $hasilhutan->update($request->all());

        return redirect()->route('hasilhutan.index')->with('success', 'Data Hasil Produksi Hutan berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HasilProduksiHutan $hasilhutan)
    {
        $hasilhutan->delete();
        return redirect()->route('hasilhutan.index')->with('success', 'Data Hasil Produksi Hutan berhasil dihapus.');
    }
}