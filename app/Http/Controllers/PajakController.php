<?php

namespace App\Http\Controllers;

use App\Models\pajak;
use App\Models\Desa;
use Illuminate\Http\Request;

class PajakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = pajak::with(['desa'])->orderBy('tanggal', 'desc')->get();
        return view('pages.perkembangan.kedaulatanmasyarakat.pajak.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $desas = Desa::orderBy('nama_desa')->get();
        return view('pages.perkembangan.kedaulatanmasyarakat.pajak.create', compact('desas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_desa' => 'required|exists:desas,id',
            'tanggal' => 'required|date',

            // Data Pajak
            'jenis_pajak' => 'required|string|max:255',
            'jumlah_wajib_pajak' => 'required|integer|min:0',
            'target_pbb' => 'required|integer|min:0',
            'realisasi_pbb' => 'required|numeric|min:0',
            'jumlah_tindakan_penunggak_pbb' => 'required|integer|min:0',

            // Data Retribusi
            'jenis_retribusi' => 'required|string|max:255',
            'jumlah_wajib_retribusi' => 'required|integer|min:0',
            'target_retribusi' => 'required|integer|min:0',
            'realisasi_retribusi' => 'required|numeric|min:0',

            // Data pungutan resmi
            'jenis_pungutan_resmi' => 'required|string|max:255',
            'target_pungutan_resmi' => 'required|integer|min:0',
            'realisasi_pungutan_resmi' => 'required|numeric|min:0',

            // Kasus pungutan liar
            'jumlah_kasus_pungli' => 'required|integer|min:0',
            'jumlah_penyelesaian_pungli' => 'required|integer|min:0|lte:jumlah_kasus_pungli',
        ]);

        Pajak::create($request->all());
        return redirect()->route('perkembangan.kedaulatanmasyarakat.pajak.index')->with('success', 'Data pajak berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pajak = pajak::with(['desa'])->findOrFail($id);
        $pajak->load(['desa']);
        return view('pages.perkembangan.kedaulatanmasyarakat.pajak.show', compact('pajak'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pajak = pajak::findOrFail($id);
        $desas = Desa::orderBy('nama_desa')->get();
        return view('pages.perkembangan.kedaulatanmasyarakat.pajak.edit', compact('pajak', 'desas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_desa' => 'required|exists:desas,id',
            'tanggal' => 'required|date',

            // Data Pajak
            'jenis_pajak' => 'required|string|max:255',
            'jumlah_wajib_pajak' => 'required|integer|min:0',
            'target_pbb' => 'required|integer|min:0',
            'realisasi_pbb' => 'required|numeric|min:0',
            'jumlah_tindakan_penunggak_pbb' => 'required|integer|min:0',

            // Data Retribusi
            'jenis_retribusi' => 'required|string|max:255',
            'jumlah_wajib_retribusi' => 'required|integer|min:0',
            'target_retribusi' => 'required|integer|min:0',
            'realisasi_retribusi' => 'required|numeric|min:0',

            // Data pungutan resmi
            'jenis_pungutan_resmi' => 'required|string|max:255',
            'target_pungutan_resmi' => 'required|integer|min:0',
            'realisasi_pungutan_resmi' => 'required|numeric|min:0',

            // Kasus pungutan liar
            'jumlah_kasus_pungli' => 'required|integer|min:0',
            'jumlah_penyelesaian_pungli' => 'required|integer|min:0',
        ]);

        $pajak = pajak::findOrFail($id);
        $pajak->update($validated);
        return redirect()->route('perkembangan.kedaulatanmasyarakat.pajak.index')->with('success', 'Data pajak berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pajak = pajak::findOrFail($id);
        $pajak->delete();
        return redirect()->route('perkembangan.kedaulatanmasyarakat.pajak.index')->with('success', 'Data pajak berhasil dihapus.');
    }
    public function getDesasByKecamatan($id_kecamatan)
    {
        $desas = Desa::where('id_kecamatan', $id_kecamatan)->get();
        return response()->json($desas);
    }
}
