<?php

namespace App\Http\Controllers;

use App\Models\SektorIndustriPengolahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SektorIndustriPengolahanController extends Controller
{
    // ... (metode store, update, destroy tetap sama)

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Permission check
        if (!Gate::allows('sektor_industri.view')) {
            abort(403, 'Unauthorized action.');
        }

        $sektorIndustriPengolahans = SektorIndustriPengolahan::orderBy('tanggal', 'desc')->get();
        
        // PERUBAHAN PATH VIEW DI SINI
        return view('pages.perkembangan.produk-domestik.sektorindustripengolahan.index', compact('sektorIndustriPengolahans'));
    }

        public function store(Request $request)
    {
        // Pastikan pengguna memiliki permission 'create'
        if (!Gate::allows('sektor_industri.create')) {
            abort(403, 'Unauthorized action.');
        }

        $validatedData = $request->validate([
            'tanggal' => 'required|date',
            'jenis_industri' => 'required|string|max:255',
            'nilai_produksi_tahunan' => 'required|numeric|min:0',
            'nilai_bahan_baku' => 'required|numeric|min:0',
            'nilai_bahan_penolong' => 'required|numeric|min:0',
            'biaya_antara' => 'required|numeric|min:0',
            'jumlah_jenis_industri_tsb' => 'required|integer|min:0',
        ]);

        SektorIndustriPengolahan::create($validatedData);

        return redirect()->route('sektor-industri-pengolahan.index')->with('success', 'Data Industri Pengolahan berhasil ditambahkan!');
    }

     public function update(Request $request, SektorIndustriPengolahan $sektorIndustriPengolahan)
    {
        // Pastikan pengguna memiliki permission 'update'
        if (!Gate::allows('sektor_industri.update')) {
            abort(403, 'Unauthorized action.');
        }

        $validatedData = $request->validate([
            'tanggal' => 'required|date',
            'jenis_industri' => 'required|string|max:255',
            'nilai_produksi_tahunan' => 'required|numeric|min:0',
            'nilai_bahan_baku' => 'required|numeric|min:0',
            'nilai_bahan_penolong' => 'required|numeric|min:0',
            'biaya_antara' => 'required|numeric|min:0',
            'jumlah_jenis_industri_tsb' => 'required|integer|min:0',
        ]);

        $sektorIndustriPengolahan->update($validatedData);

        return redirect()->route('sektor-industri-pengolahan.index')->with('success', 'Data Industri Pengolahan berhasil diubah!');
    }
   public function destroy(SektorIndustriPengolahan $sektorIndustriPengolahan)
    {
        // Pastikan pengguna memiliki permission 'delete'
        if (!Gate::allows('sektor_industri.delete')) {
            abort(403, 'Unauthorized action.');
        }

        $sektorIndustriPengolahan->delete();

        return redirect()->route('sektor-industri-pengolahan.index')->with('success', 'Data Industri Pengolahan berhasil dihapus!');
    }
}

    