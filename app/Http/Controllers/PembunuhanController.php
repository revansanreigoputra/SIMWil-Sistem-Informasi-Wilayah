<?php

namespace App\Http\Controllers;

use App\Models\pembunuhan;
use App\Models\Desa;
use Illuminate\Http\Request;

class PembunuhanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desaId = session('desa_id');
        $data = Pembunuhan::where('desa_id',$desaId)->with(['desa'])->orderBy('tanggal', 'desc')->get();
        return view('pages.perkembangan.keamanandanketertiban.pembunuhan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $desas = Desa::orderBy('nama_desa')->get();
        return view('pages.perkembangan.keamanandanketertiban.pembunuhan.create', compact('desas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'jumlah_kasus_tahun_ini' => 'nullable|integer|min:0',
            'jumlah_kasus_korban_penduduk' => 'nullable|integer|min:0',
            'jumlah_kasus_pelaku_penduduk' => 'nullable|integer|min:0',
            'jumlah_kasus_bunuh_diri' => 'nullable|integer|min:0',
            'jumlah_kasus_diproses_hukum' => 'nullable|integer|min:0',
        ]);
        $validated['desa_id'] = session('desa_id');
        Pembunuhan::create($validated);
        return redirect()->route('perkembangan.keamanandanketertiban.pembunuhan.index')->with('success', 'Data Pembunuhan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pembunuhan = pembunuhan::with(['desa'])->findOrFail($id);
        $pembunuhan->load(['desa']);
        return view('pages.perkembangan.keamanandanketertiban.pembunuhan.show', compact('pembunuhan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pembunuhan = pembunuhan::findOrFail($id);
        $desas = Desa::orderBy('nama_desa')->get();
        return view('pages.perkembangan.keamanandanketertiban.pembunuhan.edit', compact('pembunuhan', 'desas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'jumlah_kasus_tahun_ini' => 'nullable|integer|min:0',
            'jumlah_kasus_korban_penduduk' => 'nullable|integer|min:0',
            'jumlah_kasus_pelaku_penduduk' => 'nullable|integer|min:0',
            'jumlah_kasus_bunuh_diri' => 'nullable|integer|min:0',
            'jumlah_kasus_diproses_hukum' => 'nullable|integer|min:0',
        ]);
        $pembunuhan = pembunuhan::findOrFail($id);
        $pembunuhan->update($validated);
        return redirect()->route('perkembangan.keamanandanketertiban.pembunuhan.index')->with('success', 'Data Pembunuhan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pembunuhan = pembunuhan::findOrFail($id);
        $pembunuhan->delete();
        return redirect()->route('perkembangan.keamanandanketertiban.pembunuhan.index')->with('success', 'Data Pembunuhan berhasil dihapus.');
    }
}
