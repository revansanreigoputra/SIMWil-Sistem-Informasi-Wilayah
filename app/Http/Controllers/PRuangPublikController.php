<?php

namespace App\Http\Controllers;

use App\Models\PRuangPublik;
use App\Models\MasterPotensi\RuangPublik;
use Illuminate\Http\Request;

class PRuangPublikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desaId = session('desa_id');
        $items = PRuangPublik::with(['desa', 'ruangPublik'])
            ->where('desa_id', $desaId)
            ->latest()
            ->get();

        return view('pages.potensi.sda.ruang-publik.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ruangOptions = RuangPublik::orderBy('nama')->get();
        return view('pages.potensi.sda.ruang-publik.create', compact('ruangOptions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'ruang_publik_id' => 'required|exists:ruang_publik,id',
            'keberadaan' => 'required|in:ada,tidak',
            'luas_m2' => 'required|numeric|min:0',
            'tingkat_pemanfaatan' => 'required|in:aktif,pasif',
        ]);

        $data = $request->only(['tanggal','ruang_publik_id','keberadaan','luas_m2','tingkat_pemanfaatan']);
        $data['desa_id'] = session('desa_id');

        PRuangPublik::create($data);

        return redirect()->route('ruang_publik.index')->with('success', 'Data ruang publik berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PRuangPublik $pRuangPublik)
    {
        $pRuangPublik->load(['desa', 'ruangPublik']);
        return view('pages.potensi.sda.ruang-publik.show', compact('pRuangPublik'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PRuangPublik $pRuangPublik)
    {
        $ruangOptions = RuangPublik::orderBy('nama')->get();
        return view('pages.potensi.sda.ruang-publik.edit', compact('pRuangPublik', 'ruangOptions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PRuangPublik $pRuangPublik)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'ruang_publik_id' => 'required|exists:ruang_publik,id',
            'keberadaan' => 'required|in:ada,tidak',
            'luas_m2' => 'required|numeric|min:0',
            'tingkat_pemanfaatan' => 'required|in:aktif,pasif',
        ]);

        $pRuangPublik->update($request->only(['tanggal','ruang_publik_id','keberadaan','luas_m2','tingkat_pemanfaatan']));

        return redirect()->route('ruang_publik.index')->with('success', 'Data ruang publik berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PRuangPublik $pRuangPublik)
    {
        $pRuangPublik->delete();
        return redirect()->route('ruang_publik.index')->with('success', 'Data ruang publik berhasil dihapus.');
    }
}
