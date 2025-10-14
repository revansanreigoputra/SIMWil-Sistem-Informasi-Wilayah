<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\SaranaTransportasi;
use App\Models\KategoriTransportasi;
use App\Models\JenisTransportasi;
use Illuminate\Http\Request;

class SaranaTransportasiController extends Controller
{
    public function index()
    {
        $saranaTransportasis = SaranaTransportasi::with(['desa', 'kategori', 'jenis'])->get();
        return view('pages.potensi.potensi-prasarana-dan-sarana.angkutan.index', compact('saranaTransportasis'));
    }

    public function create()
    {
        $desas = Desa::all();
        $kategoriTransportasis = KategoriTransportasi::all();
        $jenisTransportasis = JenisTransportasi::all();
        return view('pages.potensi.potensi-prasarana-dan-sarana.angkutan.create', compact('desas', 'kategoriTransportasis', 'jenisTransportasis'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'desa_id' => 'required|exists:desas,id',
            'tanggal' => 'required|date',
            'kategori_id' => 'required|exists:kategori_transportasis,id',
            'jenis_id' => 'required|exists:jenis_transportasis,id',
            'jumlah' => 'required|integer|min:0',
        ]);

        SaranaTransportasi::create($validated);

        return redirect()->route('potensi.potensi-prasarana-dan-sarana.angkutan.index')->with('success', 'Data sarana transportasi berhasil disimpan.');
    }

    public function show(SaranaTransportasi $saranaTransportasi)
    {
        $saranaTransportasi->load(['desa', 'kategori', 'jenis']);
        return view('pages.potensi.potensi-prasarana-dan-sarana.angkutan.show', compact('saranaTransportasi'));
    }

    public function edit(SaranaTransportasi $saranaTransportasi)
    {
        $desas = Desa::all();
        $kategoriTransportasis = KategoriTransportasi::all();
        $jenisTransportasis = JenisTransportasi::all();
        return view('pages.potensi.potensi-prasarana-dan-sarana.angkutan.edit', compact('saranaTransportasi', 'desas', 'kategoriTransportasis', 'jenisTransportasis'));
    }

    public function update(Request $request, SaranaTransportasi $saranaTransportasi)
    {
        $validated = $request->validate([
            'desa_id' => 'required|exists:desas,id',
            'tanggal' => 'required|date',
            'kategori_id' => 'required|exists:kategori_transportasis,id',
            'jenis_id' => 'required|exists:jenis_transportasis,id',
            'jumlah' => 'required|integer|min:0',
        ]);

        $saranaTransportasi->update($validated);

        return redirect()->route('potensi.potensi-prasarana-dan-sarana.angkutan.index')->with('success', 'Data sarana transportasi berhasil diperbarui.');
    }

    public function destroy(SaranaTransportasi $saranaTransportasi)
    {
        $saranaTransportasi->delete();
        return redirect()->route('potensi.potensi-prasarana-dan-sarana.angkutan.index')->with('success', 'Data sarana transportasi berhasil dihapus.');
    }
}