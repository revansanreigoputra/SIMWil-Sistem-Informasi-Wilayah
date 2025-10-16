<?php

namespace App\Http\Controllers;

use App\Models\Bpd;
use App\Models\Desa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BpdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bpds = Bpd::with('desa')->orderBy('tanggal', 'desc')->paginate(10);
        return view('pages.potensi.potensi-prasarana-dan-sarana.bpd.index', compact('bpds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $desas = Desa::all();
        return view('pages.potensi.potensi-prasarana-dan-sarana.bpd.create', compact('desas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'desa_id' => 'required|exists:desas,id',
            'tanggal' => 'required|date',
            'gedung_kantor' => 'nullable|in:ada,tidak ada',
            'ruang_kerja' => 'nullable|integer|min:0',
            'balai_bpd' => 'nullable|in:ada,tidak ada',
            'kondisi' => 'nullable|in:baik,rusak',
            'listrik' => 'nullable|in:ada,tidak ada',
            'air_bersih' => 'nullable|in:ada dan kondisi baik,ada dan kondisi rusak,tidak ada air bersih',
            'telepon' => 'nullable|in:ada,tidak ada',
            'mesin_tik' => 'nullable|integer|min:0',
            'meja' => 'nullable|integer|min:0',
            'kursi' => 'nullable|integer|min:0',
            'lemari_arsip' => 'nullable|integer|min:0',
            'komputer' => 'nullable|integer|min:0',
            'mesin_fax' => 'nullable|integer|min:0',
            'inventaris_lainnya' => 'nullable|in:ada,tidak ada',
            'buku_administrasi_kegiatan' => 'nullable|integer|min:0',
            'buku_administrasi_keanggotaan' => 'nullable|integer|min:0',
            'buku_kegiatan' => 'nullable|integer|min:0',
            'buku_himpunan_peraturan_desa' => 'nullable|integer|min:0',
            'administrasi_lainnya' => 'nullable|in:ada,tidak ada',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Bpd::create($request->all());

        return redirect()->route('potensi.potensi-prasarana-dan-sarana.prasarana-bpd.index')
            ->with('success', 'Data BPD berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bpd $bpd)
    {
        return view('pages.potensi.potensi-prasarana-dan-sarana.bpd.show', compact('bpd'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bpd $bpd)
    {
        $desas = Desa::all();
        return view('pages.potensi.potensi-prasarana-dan-sarana.bpd.edit', compact('bpd', 'desas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bpd $bpd)
    {
        $validator = Validator::make($request->all(), [
            'desa_id' => 'required|exists:desas,id',
            'tanggal' => 'required|date',
            'gedung_kantor' => 'nullable|in:ada,tidak ada',
            'ruang_kerja' => 'nullable|integer|min:0',
            'balai_bpd' => 'nullable|in:ada,tidak ada',
            'kondisi' => 'nullable|in:baik,rusak',
            'listrik' => 'nullable|in:ada,tidak ada',
            'air_bersih' => 'nullable|in:ada dan kondisi baik,ada dan kondisi rusak,tidak ada air bersih',
            'telepon' => 'nullable|in:ada,tidak ada',
            'mesin_tik' => 'nullable|integer|min:0',
            'meja' => 'nullable|integer|min:0',
            'kursi' => 'nullable|integer|min:0',
            'lemari_arsip' => 'nullable|integer|min:0',
            'komputer' => 'nullable|integer|min:0',
            'mesin_fax' => 'nullable|integer|min:0',
            'inventaris_lainnya' => 'nullable|in:ada,tidak ada',
            'buku_administrasi_kegiatan' => 'nullable|integer|min:0',
            'buku_administrasi_keanggotaan' => 'nullable|integer|min:0',
            'buku_kegiatan' => 'nullable|integer|min:0',
            'buku_himpunan_peraturan_desa' => 'nullable|integer|min:0',
            'administrasi_lainnya' => 'nullable|in:ada,tidak ada',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $bpd->update($request->all());

        return redirect()->route('potensi.potensi-prasarana-dan-sarana.prasarana-bpd.index')
            ->with('success', 'Data BPD berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bpd $bpd)
    {
        $bpd->delete();

        return redirect()->route('potensi.potensi-prasarana-dan-sarana.prasarana-bpd.index')
            ->with('success', 'Data BPD berhasil dihapus.');
    }
}