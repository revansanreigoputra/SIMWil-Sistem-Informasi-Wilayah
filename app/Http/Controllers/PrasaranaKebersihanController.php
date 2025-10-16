<?php

namespace App\Http\Controllers;

use App\Models\PrasaranaKebersihan;
use Illuminate\Http\Request;

class PrasaranaKebersihanController extends Controller
{
    public function index()
    {
        $prasaranakebersihan = PrasaranaKebersihan::all();
        return view('pages.potensi.potensi-prasarana-dan-sarana.kebersihan.index', compact('prasaranakebersihan'));
    }

    public function create()
    {
        return view('pages.potensi.potensi-prasarana-dan-sarana.kebersihan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'tps_lokasi' => 'nullable|string|max:255',
            'tpa_lokasi' => 'nullable|string|max:255',
            'alat_penghancur' => 'nullable|string|max:255',
            'gerobak_sampah' => 'required|integer|min:0',
            'tong_sampah' => 'required|integer|min:0',
            'truk_pengangkut' => 'required|integer|min:0',
            'satgas_kebersihan' => 'required|integer|min:0',
            'anggota_satgas' => 'required|integer|min:0',
            'pemulung' => 'required|integer|min:0',
            'tempat_pengelolaan_sampah' => 'nullable|string|max:255',
            'pengelolaan_sampah_rt' => 'nullable|in:pemerintah,perorangan,swadaya',
            'pengelolaan_sampah_lainnya' => 'nullable|string|max:255',
        ]);

        PrasaranaKebersihan::create($request->all());

        return redirect()->route('potensi.potensi-prasarana-dan-sarana.kebersihan.index')->with('success', 'Data Prasarana Kebersihan berhasil ditambahkan.');
    }

    public function show(PrasaranaKebersihan $prasaranakebersihan)
    {
        return view('pages.potensi.potensi-prasarana-dan-sarana.kebersihan.show', compact('prasaranakebersihan'));
    }

    public function edit(PrasaranaKebersihan $prasaranakebersihan)
    {
        return view('pages.potensi.potensi-prasarana-dan-sarana.kebersihan.edit', compact('prasaranakebersihan'));
    }

    public function update(Request $request, PrasaranaKebersihan $prasaranakebersihan)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'tps_lokasi' => 'nullable|string|max:255',
            'tpa_lokasi' => 'nullable|string|max:255',
            'alat_penghancur' => 'nullable|string|max:255',
            'gerobak_sampah' => 'required|integer|min:0',
            'tong_sampah' => 'required|integer|min:0',
            'truk_pengangkut' => 'required|integer|min:0',
            'satgas_kebersihan' => 'required|integer|min:0',
            'anggota_satgas' => 'required|integer|min:0',
            'pemulung' => 'required|integer|min:0',
            'tempat_pengelolaan_sampah' => 'nullable|string|max:255',
            'pengelolaan_sampah_rt' => 'nullable|in:pemerintah,perorangan,swadaya',
            'pengelolaan_sampah_lainnya' => 'nullable|string|max:255',
        ]);

        $prasaranakebersihan->update($request->all());

        return redirect()->route('potensi.potensi-prasarana-dan-sarana.kebersihan.index')->with('success', 'Data Prasarana Kebersihan berhasil diubah.');
    }

    public function destroy(PrasaranaKebersihan $prasaranakebersihan)
    {
        $prasaranakebersihan->delete();
        return redirect()->route('potensi.potensi-prasarana-dan-sarana.kebersihan.index')->with('success', 'Data Prasarana Kebersihan berhasil dihapus.');
    }
}