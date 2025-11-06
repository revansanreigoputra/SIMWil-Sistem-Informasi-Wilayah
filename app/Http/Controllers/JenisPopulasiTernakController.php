<?php

namespace App\Http\Controllers;

use App\Models\JenisPopulasiTernak;
use App\Models\MasterPotensi\JenisTernak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JenisPopulasiTernakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desaId = session('desa_id');

        if (is_null($desaId)) {
            return redirect()->back()->with('error', 'Desa ID tidak ditemukan untuk pengguna yang sedang login.');
        }

        $jenisPopulasiTernaks = JenisPopulasiTernak::with(['jenisTernak', 'desa'])
                                                    ->where('desa_id', $desaId)
                                                    ->get();
        return view('pages.potensi.sda.jenis-populasi-ternak.index', compact('jenisPopulasiTernaks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenisTernaks = JenisTernak::all();
        return view('pages.potensi.sda.jenis-populasi-ternak.create', compact('jenisTernaks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jenis_ternak_id' => 'required|exists:jenis_ternak,id',
            'jumlah_pemilik' => 'required|integer|min:0',
            'populasi' => 'required|integer|min:0',
            'dijual_langsung_ke_konsumen' => 'required|in:ya,tidak',
            'dijual_ke_pasar_hewan' => 'required|in:ya,tidak',
            'dijual_melalui_kud' => 'required|in:ya,tidak',
            'dijual_melalui_tengkulak' => 'required|in:ya,tidak',
            'dijual_melalui_pengecer' => 'required|in:ya,tidak',
            'dijual_ke_lumbung_desa_kelurahan' => 'required|in:ya,tidak',
            'tidak_dijual' => 'required|in:ya,tidak',
        ]);

        $desaId = session('desa_id');

        if (is_null($desaId)) {
            return redirect()->back()->with('error', 'Desa ID tidak ditemukan untuk pengguna yang sedang login.');
        }

        JenisPopulasiTernak::create([
            'tanggal' => $request->tanggal,
            'jenis_ternak_id' => $request->jenis_ternak_id,
            'jumlah_pemilik' => $request->jumlah_pemilik,
            'populasi' => $request->populasi,
            'dijual_langsung_ke_konsumen' => $request->dijual_langsung_ke_konsumen,
            'dijual_ke_pasar_hewan' => $request->dijual_ke_pasar_hewan,
            'dijual_melalui_kud' => $request->dijual_melalui_kud,
            'dijual_melalui_tengkulak' => $request->dijual_melalui_tengkulak,
            'dijual_melalui_pengecer' => $request->dijual_melalui_pengecer,
            'dijual_ke_lumbung_desa_kelurahan' => $request->dijual_ke_lumbung_desa_kelurahan,
            'tidak_dijual' => $request->tidak_dijual,
            'desa_id' => $desaId,
        ]);

        return redirect()->route('jenis-populasi-ternak.index')->with('success', 'Data Jenis Populasi Ternak berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(JenisPopulasiTernak $jenisPopulasiTernak)
    {        
        $desaId = session('desa_id');       

        return view('pages.potensi.sda.jenis-populasi-ternak.show', compact('jenisPopulasiTernak'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisPopulasiTernak $jenisPopulasiTernak)
    {
        $desaId = session('desa_id');        

        $jenisTernaks = JenisTernak::all();
        return view('pages.potensi.sda.jenis-populasi-ternak.edit', compact('jenisPopulasiTernak', 'jenisTernaks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisPopulasiTernak $jenisPopulasiTernak)
    {               

        $request->validate([
            'tanggal' => 'required|date',
            'jenis_ternak_id' => 'required|exists:jenis_ternak,id',
            'jumlah_pemilik' => 'required|integer|min:0',
            'populasi' => 'required|integer|min:0',
            'dijual_langsung_ke_konsumen' => 'required|in:ya,tidak',
            'dijual_ke_pasar_hewan' => 'required|in:ya,tidak',
            'dijual_melalui_kud' => 'required|in:ya,tidak',
            'dijual_melalui_tengkulak' => 'required|in:ya,tidak',
            'dijual_melalui_pengecer' => 'required|in:ya,tidak',
            'dijual_ke_lumbung_desa_kelurahan' => 'required|in:ya,tidak',
            'tidak_dijual' => 'required|in:ya,tidak',
        ]);

        $jenisPopulasiTernak->update([
            'tanggal' => $request->tanggal,
            'jenis_ternak_id' => $request->jenis_ternak_id,
            'jumlah_pemilik' => $request->jumlah_pemilik,
            'populasi' => $request->populasi,
            'dijual_langsung_ke_konsumen' => $request->dijual_langsung_ke_konsumen,
            'dijual_ke_pasar_hewan' => $request->dijual_ke_pasar_hewan,
            'dijual_melalui_kud' => $request->dijual_melalui_kud,
            'dijual_melalui_tengkulak' => $request->dijual_melalui_tengkulak,
            'dijual_melalui_pengecer' => $request->dijual_melalui_pengecer,
            'dijual_ke_lumbung_desa_kelurahan' => $request->dijual_ke_lumbung_desa_kelurahan,
            'tidak_dijual' => $request->tidak_dijual,
            // desa_id is not updated here as it's typically set on creation and not changed
        ]);

        return redirect()->route('jenis-populasi-ternak.index')->with('success', 'Data Jenis Populasi Ternak berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisPopulasiTernak $jenisPopulasiTernak)
    {    
        $jenisPopulasiTernak->delete();
        return redirect()->route('jenis-populasi-ternak.index')->with('success', 'Data Jenis Populasi Ternak berhasil dihapus.');
    }
}
