<?php

namespace App\Http\Controllers;

use App\Models\PKewarganegaraan;
use App\Models\MasterDDK\Kewarganegaraan;
use App\Models\Desa; // Import Desa model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PKewarganegaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desaId = session('desa_id');
        $pKewarganegaraans = PKewarganegaraan::with('kewarganegaraan')->where('desa_id', $desaId)->latest()->get();
        return view('pages.potensi.potensi-sdm.kewarganegaraan.index', compact('pKewarganegaraans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kewarganegaraans = Kewarganegaraan::all();
        return view('pages.potensi.potensi-sdm.kewarganegaraan.create', compact('kewarganegaraans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'kewarganegaraan_id' => 'required|exists:kewarganegaraans,id',
            'jumlah_laki_laki' => 'required|integer|min:0',
            'jumlah_perempuan' => 'required|integer|min:0',
        ]);

        $jumlah_total = $request->jumlah_laki_laki + $request->jumlah_perempuan;

        PKewarganegaraan::create([
            'tanggal' => $request->tanggal,
            'kewarganegaraan_id' => $request->kewarganegaraan_id,
            'jumlah_laki_laki' => $request->jumlah_laki_laki,
            'jumlah_perempuan' => $request->jumlah_perempuan,
            'jumlah_total' => $jumlah_total,
            'desa_id' => session('desa_id'),
        ]);

        Session::flash('success', 'Data Potensi Kewarganegaraan berhasil ditambahkan!');
        return redirect()->route('potensi.potensi-sdm.kewarganegaraan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(PKewarganegaraan $pKewarganegaraan)
    {
        return view('pages.potensi.potensi-sdm.kewarganegaraan.show', compact('pKewarganegaraan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PKewarganegaraan $pKewarganegaraan)
    {
        $kewarganegaraans = Kewarganegaraan::all();
        return view('pages.potensi.potensi-sdm.kewarganegaraan.edit', compact('pKewarganegaraan', 'kewarganegaraans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PKewarganegaraan $pKewarganegaraan)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'kewarganegaraan_id' => 'required|exists:kewarganegaraans,id',
            'jumlah_laki_laki' => 'required|integer|min:0',
            'jumlah_perempuan' => 'required|integer|min:0',
        ]);

        $jumlah_total = $request->jumlah_laki_laki + $request->jumlah_perempuan;

        $pKewarganegaraan->update([
            'tanggal' => $request->tanggal,
            'kewarganegaraan_id' => $request->kewarganegaraan_id,
            'jumlah_laki_laki' => $request->jumlah_laki_laki,
            'jumlah_perempuan' => $request->jumlah_perempuan,
            'jumlah_total' => $jumlah_total,
            'desa_id' => session('desa_id'),
        ]);

        Session::flash('success', 'Data Potensi Kewarganegaraan berhasil diperbarui!');
        return redirect()->route('potensi.potensi-sdm.kewarganegaraan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PKewarganegaraan $pKewarganegaraan)
    {
        $pKewarganegaraan->delete();
        Session::flash('success', 'Data Potensi Kewarganegaraan berhasil dihapus!');
        return redirect()->route('potensi.potensi-sdm.kewarganegaraan.index');
    }
}
