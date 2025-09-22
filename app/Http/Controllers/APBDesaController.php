<?php

namespace App\Http\Controllers;

use App\Models\APBDesa;
use Illuminate\Http\Request;

class APBDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ApbDesa::orderBy('tanggal', 'desc')->get();
        return view('apb_desa.index', compact('data'));
    }

    /**
     * tampilkan form tambah data APBDesa
     */
    public function create()
    {
        return view('apb_desa.create');
    }

    /**
     * Simpan data APBDesa baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'apbd_kabupaten' => 'nullable|numeric',
            'bantuan_pemerintah_kabupaten' => 'nullable|numeric',
            'bantuan_pemerintah_provinsi' => 'nullable|numeric',
            'bantuan_pemerintah_pusat' => 'nullable|numeric',
            'pendapatan_asli_desa' => 'nullable|numeric',
            'swadaya_masyarakat' => 'nullable|numeric',
            'alokasi_dana_desa' => 'nullable|numeric',
            'sumber_pendapatan_perusahaan' => 'nullable|numeric',
            'sumber_pendapatan_lain' => 'nullable|numeric',
            'jumlah_penerimaan' => 'nullable|numeric',
            'jumlah_belanja_publik' => 'nullable|numeric',
            'jumlah_belanja_aparatur' => 'nullable|numeric',
            'jumlah_belanja' => 'nullable|numeric',
            'saldo_anggaran' => 'nullable|numeric',
        ]);

        ApbDesa::create($validated);

        return redirect()->route('apb-desa.index')->with('success', 'Data APB Desa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(APBDesa $aPBDesa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $apb = ApbDesa::findOrFail($id);
        return view('apb_desa.edit', compact('apb'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'apbd_kabupaten' => 'nullable|numeric',
            'bantuan_pemerintah_kabupaten' => 'nullable|numeric',
            'bantuan_pemerintah_provinsi' => 'nullable|numeric',
            'bantuan_pemerintah_pusat' => 'nullable|numeric',
            'pendapatan_asli_desa' => 'nullable|numeric',
            'swadaya_masyarakat' => 'nullable|numeric',
            'alokasi_dana_desa' => 'nullable|numeric',
            'sumber_pendapatan_perusahaan' => 'nullable|numeric',
            'sumber_pendapatan_lain' => 'nullable|numeric',
            'jumlah_penerimaan' => 'nullable|numeric',
            'jumlah_belanja_publik' => 'nullable|numeric',
            'jumlah_belanja_aparatur' => 'nullable|numeric',
            'jumlah_belanja' => 'nullable|numeric',
            'saldo_anggaran' => 'nullable|numeric',
        ]);

        $apb = ApbDesa::findOrFail($id);
        $apb->update($validated);

        return redirect()->route('apb-desa.index')->with('success', 'Data APB Desa berhasil diperbarui.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $apb = ApbDesa::findOrFail($id);
        $apb->delete();

        return redirect()->route('apb-desa.index')->with('success', 'Data APB Desa berhasil dihapus.');
    }
}
