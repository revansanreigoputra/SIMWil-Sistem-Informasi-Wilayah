<?php

namespace App\Http\Controllers;

use App\Models\sikapdanmental;
use App\Models\Desa;
use Illuminate\Http\Request;

class SikapdanmentalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desaId = session('desa_id');
        $data = sikapdanmental::where('desa_id',$desaId)->with(['desa'])->orderBy('tanggal', 'desc')->get();
        return view('pages.perkembangan.peransertamasyarakat.sikapdanmental.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $desas = Desa::orderBy('nama_desa')->get();
        return view('pages.perkembangan.peransertamasyarakat.sikapdanmental.create', compact('desas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'jumlah_pungutan_gelandangan' => 'nullable|integer|min:0',
            'jumlah_pungutan_terminal_pelabuhan_pasar' => 'nullable|integer|min:0',
            'permintaan_sumbangan_perorangan' => 'nullable|in:Ada,Tidak Ada',
            'permintaan_sumbangan_terorganisir' => 'nullable|in:Ada,Tidak Ada',
            'praktik_jalan_pintas' => 'nullable|in:Ya,Tidak',
            'jenis_pungutan_rt_rw' => 'nullable|integer|min:0',
            'jenis_pungutan_desa_kelurahan' => 'nullable|integer|min:0',
            'kasus_aparat_rt_rw' => 'nullable|integer|min:0',
            'dipindah_karena_kasus' => 'nullable|integer|min:0',
            'diberhentikan_kasus' => 'nullable|integer|min:0',
            'dimutasi_kasus' => 'nullable|integer|min:0',
            'masyarakat_biaya_pelayanan' => 'nullable|in:Ya,Tidak',
            'pelayanan_gratis_aparat' => 'nullable|in:Ya,Tidak',
            'keluhan_pelayanan' => 'nullable|in:Ya,Tidak',
            'hiburan_inisiatif_masyarakat' => 'nullable|in:Ya,Tidak',
            'kurang_toleran' => 'nullable|in:Ya,Tidak',
            'wilayah_sangat_luas' => 'nullable|in:Ya,Tidak',
            'lahan_terlantar' => 'nullable|in:Ya,Tidak',
            'lahan_perkarangan_tidak_dimanfaatkan' => 'nullable|in:Ya,Tidak',
            'tidur_milir_tidak_dimanfaatkan' => 'nullable|in:Ya,Tidak',
            'petani_gagal_panen' => 'nullable|in:Tinggi,Sedang,Rendah',
            'nelayan_tidak_melayat' => 'nullable|in:Tinggi,Sedang,Rendah',
            'cari_pekerjaan_luar_desa' => 'nullable|in:Ya,Tidak',
            'cari_pekerjaan_kota_besar' => 'nullable|in:Ya,Tidak',
            'rayakan_pesta' => 'nullable|in:Tinggi,Sedang,Rendah',
            'menuntut_kebutuhan_pokok' => 'nullable|in:Tinggi,Sedang,Rendah',
            'mencari_bahan_pengganti_pangan' => 'nullable|in:Tinggi,Sedang,Rendah',
            'pemotongan_hewan_besar' => 'nullable|in:Tinggi,Sedang,Rendah',
            'berdemo' => 'nullable|in:Tinggi,Sedang,Rendah',
            'terprovokasi_isu' => 'nullable|in:Tinggi,Sedang,Rendah',
            'bermusyawarah' => 'nullable|in:Tinggi,Sedang,Rendah',
            'masyarakat_apatih' => 'nullable|in:Ya,Tidak',
            'aparat_kurang_menangani' => 'nullable|in:Tinggi,Sedang,Rendah',
        ]);
        $validated['desa_id'] = session('desa_id');
        sikapdanmental::create($validated);
        return redirect()->route('perkembangan.peransertamasyarakat.sikapdanmental.index')
            ->with('success', 'Data sikap dan mental masyarakat berhasil ditambahkan.');
    }
    public function show($id)
    {
        $sikapdanmental = sikapdanmental::with(['desa'])->findOrFail($id);
        $sikapdanmental->load('desa');
        return view('pages.perkembangan.peransertamasyarakat.sikapdanmental.show', compact('sikapdanmental'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sikapdanmental = sikapdanmental::findOrFail($id);
        $desas = Desa::orderBy('nama_desa')->get();
        return view('pages.perkembangan.peransertamasyarakat.sikapdanmental.edit', compact('sikapdanmental', 'desas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'jumlah_pungutan_gelandangan' => 'nullable|integer|min:0',
            'jumlah_pungutan_terminal_pelabuhan_pasar' => 'nullable|integer|min:0',
            'permintaan_sumbangan_perorangan' => 'nullable|in:Ada,Tidak Ada',
            'permintaan_sumbangan_terorganisir' => 'nullable|in:Ada,Tidak Ada',
            'praktik_jalan_pintas' => 'nullable|in:Ya,Tidak',
            'jenis_pungutan_rt_rw' => 'nullable|integer|min:0',
            'jenis_pungutan_desa_kelurahan' => 'nullable|integer|min:0',
            'kasus_aparat_rt_rw' => 'nullable|integer|min:0',
            'dipindah_karena_kasus' => 'nullable|integer|min:0',
            'diberhentikan_kasus' => 'nullable|integer|min:0',
            'dimutasi_kasus' => 'nullable|integer|min:0',
            'masyarakat_biaya_pelayanan' => 'nullable|in:Ya,Tidak',
            'pelayanan_gratis_aparat' => 'nullable|in:Ya,Tidak',
            'keluhan_pelayanan' => 'nullable|in:Ya,Tidak',
            'hiburan_inisiatif_masyarakat' => 'nullable|in:Ya,Tidak',
            'kurang_toleran' => 'nullable|in:Ya,Tidak',
            'wilayah_sangat_luas' => 'nullable|in:Ya,Tidak',
            'lahan_terlantar' => 'nullable|in:Ya,Tidak',
            'lahan_perkarangan_tidak_dimanfaatkan' => 'nullable|in:Ya,Tidak',
            'tidur_milir_tidak_dimanfaatkan' => 'nullable|in:Ya,Tidak',
            'petani_gagal_panen' => 'nullable|in:Tinggi,Sedang,Rendah',
            'nelayan_tidak_melayat' => 'nullable|in:Tinggi,Sedang,Rendah',
            'cari_pekerjaan_luar_desa' => 'nullable|in:Ya,Tidak',
            'cari_pekerjaan_kota_besar' => 'nullable|in:Ya,Tidak',
            'rayakan_pesta' => 'nullable|in:Tinggi,Sedang,Rendah',
            'menuntut_kebutuhan_pokok' => 'nullable|in:Tinggi,Sedang,Rendah',
            'mencari_bahan_pengganti_pangan' => 'nullable|in:Tinggi,Sedang,Rendah',
            'pemotongan_hewan_besar' => 'nullable|in:Tinggi,Sedang,Rendah',
            'berdemo' => 'nullable|in:Tinggi,Sedang,Rendah',
            'terprovokasi_isu' => 'nullable|in:Tinggi,Sedang,Rendah',
            'bermusyawarah' => 'nullable|in:Tinggi,Sedang,Rendah',
            'masyarakat_apatih' => 'nullable|in:Ya,Tidak',
            'aparat_kurang_menangani' => 'nullable|in:Tinggi,Sedang,Rendah',
        ]); 
        $sikapdanmental = sikapdanmental::findOrFail($id);
        $sikapdanmental->update($validated);
        return redirect()->route('perkembangan.peransertamasyarakat.sikapdanmental.index')->with('success', 'Data sikap dan mental masyarakat berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $sikapdanmental = sikapdanmental::findOrFail($id);
        $sikapdanmental->delete();
        return redirect()->route('perkembangan.peransertamasyarakat.sikapdanmental.index')->with('success', 'Data sikap dan mental masyarakat berhasil dihapus.');
    }
}
