<?php

namespace App\Http\Controllers;

use App\Models\APBDesa;
use App\Models\Desa;
use Illuminate\Http\Request;

class APBDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ApbDesa::with(['desa'])->orderBy('tanggal', 'desc')->paginate(10);
        return view('pages.perkembangan.pemerintahdesadankelurahan.apbdesa.index', compact('data'));

    }

    /**
     * tampilkan form tambah data APBDesa
     */
    public function create()
    {
        $desas = Desa::orderBy('nama_desa')->get();
        return view('pages.perkembangan.pemerintahdesadankelurahan.apbdesa.create', compact('desas'));

    }

    /**
     * Simpan data APBDesa baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'id_desa' => 'required|exists:desas,id',
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

        return redirect()->route('perkembangan.pemerintahdesadankelurahan.apbdesa.index')->with('success', 'Data APB Desa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $apb = ApbDesa::findOrFail($id);
        $apb->load(['desa']); // pastikan relasi terload
        return view('pages.perkembangan.pemerintahdesadankelurahan.apbdesa.show', compact('apb'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $apb = ApbDesa::findOrFail($id);
        $desas = Desa::orderBy('nama_desa')->get();
        return view('pages.perkembangan.pemerintahdesadankelurahan.apbdesa.edit', compact('apb', 'desas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'id_desa' => 'required|exists:desas,id',
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
        // Bersihkan format rupiah → hanya angka
            foreach ($validated as $key => $value) {
                if ($key !== 'tanggal' && is_string($value)) {
        $validated[$key] = preg_replace('/[^0-9]/', '', $value);
                }
            }
        $apb = ApbDesa::findOrFail($id);
        $apb->update($validated);

        return redirect()->route('perkembangan.pemerintahdesadankelurahan.apbdesa.index')
        ->with('success', 'Data APB Desa berhasil diperbaharui.');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $apb = ApbDesa::findOrFail($id);
        $apb->delete();

        return redirect()->route('perkembangan.pemerintahdesadankelurahan.apbdesa.index')->with('success', 'Data APB Desa berhasil dihapus.');
    }

    //Endpoint AJAX: Ambil desa 
    public function getDesasByKecamatan($id_kecamatan)
    {
        $desas = Desa::where('id_kecamatan', $id_kecamatan)->get();
        return response()->json($desas);
    }
}
