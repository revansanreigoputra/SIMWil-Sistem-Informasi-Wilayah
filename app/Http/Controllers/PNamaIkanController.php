<?php

namespace App\Http\Controllers;

use App\Models\PNamaIkan;
use App\Models\MasterPotensi\NamaIkan;
use Illuminate\Http\Request;

class PNamaIkanController extends Controller
{
    public function index()
    {
        $desaId = session('desa_id');
        $pNamaIkans = PNamaIkan::with(['desa', 'namaIkan'])
            ->where('desa_id', $desaId)
            ->latest()
            ->get();
        return view('pages.potensi.sda.jenis-dan-produksi-ikan.index', compact('pNamaIkans'));
    }

    public function create()
    {
        $namaIkans = NamaIkan::all();
        return view('pages.potensi.sda.jenis-dan-produksi-ikan.create', compact('namaIkans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'nama_ikan_id' => 'required|exists:nama_ikan,id',
            'hasil_produksi' => 'required|numeric|min:0',
            'harga_jual' => 'required|numeric|min:0',
            'nilai_produksi' => 'required|numeric|min:0',
            'nilai_bahan_baku' => 'required|numeric|min:0',
            'nilai_bahan_penolong' => 'required|numeric|min:0',
            'biaya_antara_yang_dihabiskan' => 'required|numeric|min:0',
            'saldo_produksi' => 'required|numeric|min:0',
            'jumlah_jenis_usaha_perikanan' => 'required|numeric|min:0',
            'dijual_langsung_ke_konsumen' => 'required|in:ya,tidak',
            'dijual_langsung_ke_pasar' => 'required|in:ya,tidak',
            'dijual_melalui_kud' => 'required|in:ya,tidak',
            'dijual_melalui_tengkulak' => 'required|in:ya,tidak',
            'dijual_melalui_pengecer' => 'required|in:ya,tidak',
            'dijual_ke_lumbung_desa_kelurahan' => 'required|in:ya,tidak',
            'tidak_dijual' => 'required|in:ya,tidak',
        ]);

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        PNamaIkan::create($data);

        return redirect()->route('p-nama-ikan.index')->with('success', 'Data jenis dan produksi ikan berhasil ditambahkan.');
    }

    public function show(PNamaIkan $pNamaIkan)
    {
        return view('pages.potensi.sda.jenis-dan-produksi-ikan.show', compact('pNamaIkan'));
    }

    public function edit(PNamaIkan $pNamaIkan)
    {
        $namaIkans = NamaIkan::all();
        return view('pages.potensi.sda.jenis-dan-produksi-ikan.edit', compact('pNamaIkan', 'namaIkans'));
    }

    public function update(Request $request, PNamaIkan $pNamaIkan)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'nama_ikan_id' => 'required|exists:nama_ikan,id',
            'hasil_produksi' => 'required|numeric|min:0',
            'harga_jual' => 'required|numeric|min:0',
            'nilai_produksi' => 'required|numeric|min:0',
            'nilai_bahan_baku' => 'required|numeric|min:0',
            'nilai_bahan_penolong' => 'required|numeric|min:0',
            'biaya_antara_yang_dihabiskan' => 'required|numeric|min:0',
            'saldo_produksi' => 'required|numeric|min:0',
            'jumlah_jenis_usaha_perikanan' => 'required|numeric|min:0',
            'dijual_langsung_ke_konsumen' => 'required|in:ya,tidak',
            'dijual_langsung_ke_pasar' => 'required|in:ya,tidak',
            'dijual_melalui_kud' => 'required|in:ya,tidak',
            'dijual_melalui_tengkulak' => 'required|in:ya,tidak',
            'dijual_melalui_pengecer' => 'required|in:ya,tidak',
            'dijual_ke_lumbung_desa_kelurahan' => 'required|in:ya,tidak',
            'tidak_dijual' => 'required|in:ya,tidak',
        ]);

        $pNamaIkan->update($request->all());

        return redirect()->route('p-nama-ikan.index')->with('success', 'Data jenis dan produksi ikan berhasil diubah.');
    }

    public function destroy(PNamaIkan $pNamaIkan)
    {
        $pNamaIkan->delete();
        return redirect()->route('p-nama-ikan.index')->with('success', 'Data jenis dan produksi ikan berhasil dihapus.');
    }
}
