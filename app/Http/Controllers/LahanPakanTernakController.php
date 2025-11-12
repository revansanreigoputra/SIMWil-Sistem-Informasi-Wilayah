<?php

namespace App\Http\Controllers;

use App\Models\LahanPakanTernak;
use Illuminate\Http\Request;

class LahanPakanTernakController extends Controller
{
    public function index()
    {
        $desaId = session('desa_id');
        $lahanPakanTernaks = LahanPakanTernak::with('desa')->where('desa_id', $desaId)->latest()->get();
        return view('pages.potensi.sda.lahan-dan-pakan-ternak.index', compact('lahanPakanTernaks'));
    }

    public function create()
    {
        return view('pages.potensi.sda.lahan-dan-pakan-ternak.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'luas_tanaman_pakan_ternak' => 'required|numeric|min:0',
            'produksi_hijauan_makanan_ternak' => 'required|numeric|min:0',
            'dipasok_dari_luar_desa_kelurahan' => 'required|numeric|min:0',
            'disubsidi_dinas' => 'required|numeric|min:0',
            'lainnya_pakan_ternak' => 'required|numeric|min:0',
            'milik_masyarakat_umum' => 'required|numeric|min:0',
            'milik_perusahaan_peternakan_ranch' => 'required|numeric|min:0',
            'milik_perorangan' => 'required|numeric|min:0',
            'sewa_pakai' => 'required|numeric|min:0',
            'milik_pemerintah' => 'required|numeric|min:0',
            'milik_masyarakat_adat' => 'required|numeric|min:0',
            'lainnya_pemeliharaan_ternak' => 'required|numeric|min:0',
            'luas_lahan_gembalaan' => 'required|numeric|min:0',
        ]);

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        LahanPakanTernak::create($data);

        return redirect()->route('lahan-pakan-ternak.index')->with('success', 'Data lahan pakan ternak berhasil ditambahkan.');
    }

    public function show(LahanPakanTernak $lahanPakanTernak)
    {
        return view('pages.potensi.sda.lahan-dan-pakan-ternak.show', compact('lahanPakanTernak'));
    }

    public function edit(LahanPakanTernak $lahanPakanTernak)
    {
        return view('pages.potensi.sda.lahan-dan-pakan-ternak.edit', compact('lahanPakanTernak'));
    }

    public function update(Request $request, LahanPakanTernak $lahanPakanTernak)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'luas_tanaman_pakan_ternak' => 'required|numeric|min:0',
            'produksi_hijauan_makanan_ternak' => 'required|numeric|min:0',
            'dipasok_dari_luar_desa_kelurahan' => 'required|numeric|min:0',
            'disubsidi_dinas' => 'required|numeric|min:0',
            'lainnya_pakan_ternak' => 'required|numeric|min:0',
            'milik_masyarakat_umum' => 'required|numeric|min:0',
            'milik_perusahaan_peternakan_ranch' => 'required|numeric|min:0',
            'milik_perorangan' => 'required|numeric|min:0',
            'sewa_pakai' => 'required|numeric|min:0',
            'milik_pemerintah' => 'required|numeric|min:0',
            'milik_masyarakat_adat' => 'required|numeric|min:0',
            'lainnya_pemeliharaan_ternak' => 'required|numeric|min:0',
            'luas_lahan_gembalaan' => 'required|numeric|min:0',
        ]);

        $lahanPakanTernak->update($request->all());

        return redirect()->route('lahan-pakan-ternak.index')->with('success', 'Data lahan pakan ternak berhasil diubah.');
    }

    public function destroy(LahanPakanTernak $lahanPakanTernak)
    {
        $lahanPakanTernak->delete();
        return redirect()->route('lahan-pakan-ternak.index')->with('success', 'Data lahan pakan ternak berhasil dihapus.');
    }
}
