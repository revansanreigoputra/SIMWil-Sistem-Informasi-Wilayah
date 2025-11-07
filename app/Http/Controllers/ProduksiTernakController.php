<?php

namespace App\Http\Controllers;

use App\Models\ProduksiTernak;
use App\Models\JenisProduksiTernak;
use App\Models\MasterPotensi\SatuanProduksiTernak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProduksiTernakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desaId = session('desa_id');
        $produksiTernaks = ProduksiTernak::with(['jenisProduksiTernak', 'satuanProduksiTernak', 'desa'])
                                        ->where('desa_id', $desaId)
                                        ->latest()
                                        ->get();
        return view('pages.potensi.sda.produksi-ternak.index', compact('produksiTernaks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenisProduksiTernaks = JenisProduksiTernak::all();
        $satuanProduksiTernaks = SatuanProduksiTernak::all();
        return view('pages.potensi.sda.produksi-ternak.create', compact('jenisProduksiTernaks', 'satuanProduksiTernaks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jenis_produksi_ternak_id' => 'required|exists:jenis_produksi_ternaks,id',
            'hasil_produksi' => 'required|numeric|min:0',
            'satuan_produksi_ternak_id' => 'required|exists:satuan_produksi_ternak,id',
            'nilai_produksi_tahun_ini' => 'nullable|numeric|min:0',
            'nilai_bahan_baku_yang_digunakan' => 'nullable|numeric|min:0',
            'nilai_bahan_penolong_yang_digunakan' => 'nullable|numeric|min:0',
            'jumlah_ternak_tahun_ini' => 'nullable|integer|min:0',
        ]);

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        ProduksiTernak::create($data);

        return redirect()->route('produksi-ternak.index')->with('success', 'Data produksi ternak berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProduksiTernak $produksiTernak)
    {
        return view('pages.potensi.sda.produksi-ternak.show', compact('produksiTernak'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProduksiTernak $produksiTernak)
    {
        $jenisProduksiTernaks = JenisProduksiTernak::all();
        $satuanProduksiTernaks = SatuanProduksiTernak::all();
        return view('pages.potensi.sda.produksi-ternak.edit', compact('produksiTernak', 'jenisProduksiTernaks', 'satuanProduksiTernaks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProduksiTernak $produksiTernak)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jenis_produksi_ternak_id' => 'required|exists:jenis_produksi_ternaks,id',
            'hasil_produksi' => 'required|numeric|min:0',
            'satuan_produksi_ternak_id' => 'required|exists:satuan_produksi_ternak,id',
            'nilai_produksi_tahun_ini' => 'nullable|numeric|min:0',
            'nilai_bahan_baku_yang_digunakan' => 'nullable|numeric|min:0',
            'nilai_bahan_penolong_yang_digunakan' => 'nullable|numeric|min:0',
            'jumlah_ternak_tahun_ini' => 'nullable|integer|min:0',
        ]);

        $produksiTernak->update($request->all());

        return redirect()->route('produksi-ternak.index')->with('success', 'Data produksi ternak berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProduksiTernak $produksiTernak)
    {
        $produksiTernak->delete();
        return redirect()->route('produksi-ternak.index')->with('success', 'Data produksi ternak berhasil dihapus.');
    }
}
