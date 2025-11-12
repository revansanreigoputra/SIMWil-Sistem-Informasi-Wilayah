<?php

namespace App\Http\Controllers\PotensiKelembagaan;

use App\Http\Controllers\Controller;
use App\Models\PotensiKelembagaan\LembagaAdat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;

class LembagaAdatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lembagaAdats = LembagaAdat::orderBy('tanggal', 'desc')->paginate(10);
        return view('pages.potensi.potensi-kelembagaan.lembagaAdat.index', compact('lembagaAdats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.potensi.potensi-kelembagaan.lembagaAdat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'pemangku_adat' => 'nullable|boolean',
            'kepengurusan_adat' => 'nullable|boolean',
            'rumah_adat' => 'nullable|boolean',
            'barang_pusaka' => 'nullable|boolean',
            'naskah_naskah' => 'nullable|boolean',
            'lainnya' => 'nullable|boolean',
            'musyawarah_adat' => 'nullable|boolean',
            'sanksi_adat' => 'nullable|boolean',
            'upacara_adat_perkawinan' => 'nullable|boolean',
            'upacara_adat_kematian' => 'nullable|boolean',
            'upacara_adat_kelahiran' => 'nullable|boolean',
            'upacara_adat_bercocok_tanam' => 'nullable|boolean',
            'upacara_adat_perikanan_laut' => 'nullable|boolean',
            'upacara_adat_bidang_kehutanan' => 'nullable|boolean',
            'upacara_adat_pengelolaan_sda' => 'nullable|boolean',
            'upacara_adat_pembangunan_rumah' => 'nullable|boolean',
            'upacara_adat_penyelesaian_masalah' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        LembagaAdat::create($request->all());

        return redirect()->route('potensi.potensi-kelembagaan.lembagaAdat.index')
            ->with('success', 'Data Lembaga Adat berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(LembagaAdat $adat)
    {
        return view('pages.potensi.potensi-kelembagaan.lembagaAdat.show', compact('adat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LembagaAdat $adat)
    {
        return view('pages.potensi.potensi-kelembagaan.lembagaAdat.edit', compact('adat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LembagaAdat $adat)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'pemangku_adat' => 'nullable|boolean',
            'kepengurusan_adat' => 'nullable|boolean',
            'rumah_adat' => 'nullable|boolean',
            'barang_pusaka' => 'nullable|boolean',
            'naskah_naskah' => 'nullable|boolean',
            'lainnya' => 'nullable|boolean',
            'musyawarah_adat' => 'nullable|boolean',
            'sanksi_adat' => 'nullable|boolean',
            'upacara_adat_perkawinan' => 'nullable|boolean',
            'upacara_adat_kematian' => 'nullable|boolean',
            'upacara_adat_kelahiran' => 'nullable|boolean',
            'upacara_adat_bercocok_tanam' => 'nullable|boolean',
            'upacara_adat_perikanan_laut' => 'nullable|boolean',
            'upacara_adat_bidang_kehutanan' => 'nullable|boolean',
            'upacara_adat_pengelolaan_sda' => 'nullable|boolean',
            'upacara_adat_pembangunan_rumah' => 'nullable|boolean',
            'upacara_adat_penyelesaian_masalah' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $adat->update($request->all());

        return redirect()->route('potensi.potensi-kelembagaan.lembagaAdat.index')
            ->with('success', 'Data Lembaga Adat berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LembagaAdat $adat)
    {
        $adat->delete();

        return redirect()->route('potensi.potensi-kelembagaan.lembagaAdat.index')
            ->with('success', 'Data Lembaga Adat berhasil dihapus.');
    }
    public function print($id)
    {
        $data = LembagaAdat::findOrFail($id);
        $pdf = Pdf::loadView('pages.potensi.potensi-kelembagaan.lembagaAdat.print', compact('data'))
                  ->setPaper('a4', 'portrait');
        return $pdf->stream('Data_Lembaga_Adat_' . $data->id . '.pdf');
    }

    public function download($id)
    {
        $data = LembagaAdat::findOrFail($id);
        $pdf = Pdf::loadView('pages.potensi.potensi-kelembagaan.lembagaAdat.print', compact('data'))
                  ->setPaper('a4', 'portrait');
        return $pdf->download('Data_Lembaga_Adat_' . $data->id . '.pdf');
    }
}