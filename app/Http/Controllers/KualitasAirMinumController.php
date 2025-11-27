<?php

namespace App\Http\Controllers;

use App\Models\KualitasAirMinum;
use App\Models\MasterPotensi\JenisAirMinum;
use Illuminate\Http\Request;

class KualitasAirMinumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desaId = session('desa_id');
        $kualitasAirMinums = KualitasAirMinum::with(['desa', 'jenisAirMinum'])
            ->where('desa_id', $desaId)
            ->latest()
            ->get();
        return view('pages.potensi.sda.kualitas-air-minum.index', compact('kualitasAirMinums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenisAirMinums = JenisAirMinum::all();
        return view('pages.potensi.sda.kualitas-air-minum.create', compact('jenisAirMinums'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jenis_air_minum_id' => 'required|exists:jenis_air_minum,id',
            'baik' => 'required|in:ya,tidak',
            'berbau' => 'required|in:ya,tidak',
            'berwarna' => 'required|in:ya,tidak',
            'berasa' => 'required|in:ya,tidak',
        ]);

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        KualitasAirMinum::create($data);

        return redirect()->route('kualitas-air-minum.index')->with('success', 'Data kualitas air minum berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(KualitasAirMinum $kualitasAirMinum)
    {
        return view('pages.potensi.sda.kualitas-air-minum.show', compact('kualitasAirMinum'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KualitasAirMinum $kualitasAirMinum)
    {
        $jenisAirMinums = JenisAirMinum::all();
        return view('pages.potensi.sda.kualitas-air-minum.edit', compact('kualitasAirMinum', 'jenisAirMinums'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KualitasAirMinum $kualitasAirMinum)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jenis_air_minum_id' => 'required|exists:jenis_air_minum,id',
            'baik' => 'required|in:ya,tidak',
            'berbau' => 'required|in:ya,tidak',
            'berwarna' => 'required|in:ya,tidak',
            'berasa' => 'required|in:ya,tidak',
        ]);

        $kualitasAirMinum->update($request->all());

        return redirect()->route('kualitas-air-minum.index')->with('success', 'Data kualitas air minum berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KualitasAirMinum $kualitasAirMinum)
    {
        $kualitasAirMinum->delete();
        return redirect()->route('kualitas-air-minum.index')->with('success', 'Data kualitas air minum berhasil dihapus.');
    }
}
