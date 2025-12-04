<?php

namespace App\Http\Controllers;

use App\Models\KualitasUdara;
use App\Models\MasterPotensi\Pencemaran;
use Illuminate\Http\Request;

class KualitasUdaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desaId = session('desa_id');
        $kualitasUdaras = KualitasUdara::with(['desa', 'sumberPencemaran'])
                                ->where('desa_id', $desaId)
                                ->latest()
                                ->get();
        return view('pages.potensi.sda.kualitas-udara.index', compact('kualitasUdaras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pencemaranSources = Pencemaran::all();
        return view('pages.potensi.sda.kualitas-udara.create', compact('pencemaranSources'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'sumber_pencemaran_id' => 'required|exists:pencemaran,id',
            'jumlah_lokasi_sumber_pencemaran' => 'required|integer|min:0',
            'jenis_polutan' => 'required|string|max:255',
            'efek_terhadap_kesehatan' => 'required|in:gangguan penglihatan,gangguan pendengaran',
            'kepemilikan_pemda' => 'required|in:ya,tidak',
            'kepemilikan_swasta' => 'required|in:ya,tidak',
            'kepemilikan_perorangan' => 'required|in:ya,tidak',
        ]);

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        KualitasUdara::create($data);

        return redirect()->route('kualitas-udara.index')->with('success', 'Data kualitas udara berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(KualitasUdara $kualitasUdara)
    {
        $kualitasUdara->load(['desa', 'sumberPencemaran']);
        return view('pages.potensi.sda.kualitas-udara.show', compact('kualitasUdara'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KualitasUdara $kualitasUdara)
    {
        $pencemaranSources = Pencemaran::all();
        return view('pages.potensi.sda.kualitas-udara.edit', compact('kualitasUdara', 'pencemaranSources'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KualitasUdara $kualitasUdara)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'sumber_pencemaran_id' => 'required|exists:pencemaran,id',
            'jumlah_lokasi_sumber_pencemaran' => 'required|integer|min:0',
            'jenis_polutan' => 'required|string|max:255',
            'efek_terhadap_kesehatan' => 'required|in:gangguan penglihatan,gangguan pendengaran',
            'kepemilikan_pemda' => 'required|in:ya,tidak',
            'kepemilikan_swasta' => 'required|in:ya,tidak',
            'kepemilikan_perorangan' => 'required|in:ya,tidak',
        ]);

        $kualitasUdara->update($request->all());

        return redirect()->route('kualitas-udara.index')->with('success', 'Data kualitas udara berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KualitasUdara $kualitasUdara)
    {
        $kualitasUdara->delete();
        return redirect()->route('kualitas-udara.index')->with('success', 'Data kualitas udara berhasil dihapus.');
    }
}
