<?php

namespace App\Http\Controllers;

use App\Models\SumberDayaAir;
use App\Models\MasterPotensi\JenisPotensiAir;
use Illuminate\Http\Request;

class SumberDayaAirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desaId = session('desa_id');
        $sumberDayaAirs = SumberDayaAir::with(['desa', 'jenisPotensiAir'])
            ->where('desa_id', $desaId)
            ->latest()
            ->get();
        return view('pages.potensi.sda.sumber-daya-air.index', compact('sumberDayaAirs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenisPotensiAirs = JenisPotensiAir::all();
        return view('pages.potensi.sda.sumber-daya-air.create', compact('jenisPotensiAirs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jenis_potensi_air_id' => 'required|exists:jenis_potensi_air,id',
            'jumlah_luas' => 'required|numeric|min:0',
            'debit_volume' => 'required|in:kecil,sedang,besar',
        ]);

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        SumberDayaAir::create($data);

        return redirect()->route('sumber-daya-air.index')->with('success', 'Data sumber daya air berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(SumberDayaAir $sumberDayaAir)
    {
        return view('pages.potensi.sda.sumber-daya-air.show', compact('sumberDayaAir'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SumberDayaAir $sumberDayaAir)
    {
        $jenisPotensiAirs = JenisPotensiAir::all();
        return view('pages.potensi.sda.sumber-daya-air.edit', compact('sumberDayaAir', 'jenisPotensiAirs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SumberDayaAir $sumberDayaAir)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jenis_potensi_air_id' => 'required|exists:jenis_potensi_air,id',
            'jumlah_luas' => 'required|numeric|min:0',
            'debit_volume' => 'required|in:kecil,sedang,besar',
        ]);

        $sumberDayaAir->update($request->all());

        return redirect()->route('sumber-daya-air.index')->with('success', 'Data sumber daya air berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SumberDayaAir $sumberDayaAir)
    {
        $sumberDayaAir->delete();
        return redirect()->route('sumber-daya-air.index')->with('success', 'Data sumber daya air berhasil dihapus.');
    }
}
