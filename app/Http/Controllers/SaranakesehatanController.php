<?php

namespace App\Http\Controllers;

use App\Models\MasterPotensi\JenisSaranaKesehatan;
use App\Models\Saranakesehatan;
use Illuminate\Http\Request;

class SaranakesehatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desaId = session('desa_id');
        $saranakesehatans = Saranakesehatan::with(['jenisSaranaKesehatan', 'desa'])->where('desa_id', $desaId)->latest()->get();
        return view('pages.potensi.potensi-prasarana-dan-sarana.skesehatan.index', compact('saranakesehatans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenisSaranaKesehatans = JenisSaranaKesehatan::all();
        return view('pages.potensi.potensi-prasarana-dan-sarana.skesehatan.create', compact('jenisSaranaKesehatans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jenis_sarana_kesehatan_id' => 'required|exists:jenis_sarana_kesehatan,id',
            'jumlah' => 'required|integer|min:0',
        ]);

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        Saranakesehatan::create($data);

        return redirect()->route('potensi.potensi-prasarana-dan-sarana.skesehatan.index')->with('success', 'Data Sarana Kesehatan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Saranakesehatan $saranakesehatan)
    {
        return view('pages.potensi.potensi-prasarana-dan-sarana.skesehatan.show', compact('saranakesehatan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Saranakesehatan $saranakesehatan)
    {
        $jenisSaranaKesehatans = JenisSaranaKesehatan::all();
        return view('pages.potensi.potensi-prasarana-dan-sarana.skesehatan.edit', compact('saranakesehatan', 'jenisSaranaKesehatans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Saranakesehatan $saranakesehatan)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jenis_sarana_kesehatan_id' => 'required|exists:jenis_sarana_kesehatan,id',
            'jumlah' => 'required|integer|min:0',
        ]);

        $saranakesehatan->update($request->all());

        return redirect()->route('potensi.potensi-prasarana-dan-sarana.skesehatan.index')->with('success', 'Data Sarana Kesehatan berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Saranakesehatan $saranakesehatan)
    {
        $saranakesehatan->delete();
        return redirect()->route('potensi.potensi-prasarana-dan-sarana.skesehatan.index')->with('success', 'Data Sarana Kesehatan berhasil dihapus.');
    }
}
