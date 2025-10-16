<?php

namespace App\Http\Controllers;

use App\Models\organisasi;
use Illuminate\Http\Request;

class OrganisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = organisasi::orderBy('tanggal', 'desc')->get();
        return view('pages.perkembangan.lembagakemasyarakatan.organisasi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.perkembangan.lembagakemasyarakatan.organisasi.create');
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

        organisasi::create($validated);

        return redirect()->route('perkembangan.lembagakemasyarakatan.organisasi.index')->with('success', 'Data organisasi berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $organisasi = organisasi::findOrFail($id);
        return view('pages.perkembangan.lembagakemasyarakatan.organisasi.edit', compact('organisasi'));

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
