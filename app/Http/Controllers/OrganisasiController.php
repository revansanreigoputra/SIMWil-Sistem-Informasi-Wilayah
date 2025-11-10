<?php

namespace App\Http\Controllers;

use App\Models\organisasi;
use App\Models\Desa;
use Illuminate\Http\Request;

class OrganisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desaId = session('desa_id');
        $data = organisasi::where('desa_id',$desaId)->with(['desa'])->orderBy('tanggal', 'desc')->get();
        return view('pages.perkembangan.lembagakemasyarakatan.organisasi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $desas = Desa::orderBy('nama_desa')->get();
        return view('pages.perkembangan.lembagakemasyarakatan.organisasi.create', compact('desas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'jenis_organisasi' => 'required|string',
            'kepengurusan' => 'nullable|string',
            'buku_administrasi' => 'nullable|string',
            'jumlah_kegiatan' => 'nullable|integer',
            'dasar_hukum_pembentukan' => 'nullable|string',
        ]);

        $validated['desa_id'] = session('desa_id');
        organisasi::create($validated);

        return redirect()->route('perkembangan.lembagakemasyarakatan.organisasi.index')->with('success', 'Data organisasi berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $organisasi = organisasi::with(['desa'])->findOrFail($id);
        $organisasi->load(['desa']);
        return view('pages.perkembangan.lembagakemasyarakatan.organisasi.show', compact('organisasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $organisasi = organisasi::findOrFail($id);
        $desas = Desa::orderBy('nama_desa')->get();
        return view('pages.perkembangan.lembagakemasyarakatan.organisasi.edit', compact('organisasi', 'desas'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'jenis_organisasi' => 'required|string',
            'kepengurusan' => 'nullable|string',
            'buku_administrasi' => 'nullable|string',
            'jumlah_kegiatan' => 'nullable|integer',
            'dasar_hukum_pembentukan' => 'nullable|string',
        ]);
        $organisasi = organisasi::findOrFail($id);
        $organisasi->update($validated);
        return redirect()->route('perkembangan.lembagakemasyarakatan.organisasi.index')->with('success', 'Data organisasi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $organisasi = organisasi::findOrFail($id);
        $organisasi->delete();
        return redirect()->route('perkembangan.lembagakemasyarakatan.organisasi.index')
                         ->with('success', 'Data organisasi berhasil dihapus.');
    }
}
