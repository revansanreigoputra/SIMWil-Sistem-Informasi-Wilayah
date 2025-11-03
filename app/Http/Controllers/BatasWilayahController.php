<?php

namespace App\Http\Controllers;

use App\Models\BatasWilayah;
use Illuminate\Http\Request;

class BatasWilayahController extends Controller
{
    public function index()
    {
        $desaId = session('desa_id');
        $data = BatasWilayah::with('desa')->where('desa_id', $desaId)->orderBy('created_at', 'desc')->get();
        return view('pages.potensi.umum.batas.index', compact('data'));
    }

    public function create()
    {
        return view('pages.potensi.umum.batas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun_pembentukan' => 'nullable|string|max:255',
            'luas_desa' => 'nullable|string|max:255',
            'kepala_desa' => 'nullable|string|max:255',
            'nama_pengisi' => 'nullable|string|max:255',
            'pekerjaan' => 'nullable|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'tanggal' => 'nullable|date',
            'desa_utara' => 'nullable|string|max:255',
            'desa_selatan' => 'nullable|string|max:255',
            'desa_timur' => 'nullable|string|max:255',
            'desa_barat' => 'nullable|string|max:255',
            'kec_utara' => 'nullable|string|max:255',
            'kec_selatan' => 'nullable|string|max:255',
            'kec_timur' => 'nullable|string|max:255',
            'kec_barat' => 'nullable|string|max:255',
            'penetapan_batas' => 'nullable|in:ada,tidak ada',
            'dasar_hukum_perdes' => 'nullable|string|max:255',
            'dasar_hukum_perda' => 'nullable|string|max:255',
            'peta_wilayah' => 'nullable|in:ada,tidak ada',
            'referensi_1' => 'nullable|string|max:255',
            'referensi_2' => 'nullable|string|max:255',
            'referensi_3' => 'nullable|string|max:255',
            'referensi_4' => 'nullable|string|max:255',
        ]);

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        BatasWilayah::create($data);
        return redirect()->route('batas-wilayah.index')->with('success', 'Data berhasil disimpan!');
    }

    public function show(BatasWilayah $batas_wilayah)
    {
        return view('pages.potensi.umum.batas.show', compact('batas_wilayah'));
    }

    public function edit(BatasWilayah $batas_wilayah)
    {
        return view('pages.potensi.umum.batas.edit', compact('batas_wilayah'));
    }

    public function update(Request $request, BatasWilayah $batas_wilayah)
    {
        $request->validate([
            'tahun_pembentukan' => 'nullable|string|max:255',
            'luas_desa' => 'nullable|string|max:255',
            'kepala_desa' => 'nullable|string|max:255',
            'nama_pengisi' => 'nullable|string|max:255',
            'pekerjaan' => 'nullable|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'tanggal' => 'nullable|date',
            'desa_utara' => 'nullable|string|max:255',
            'desa_selatan' => 'nullable|string|max:255',
            'desa_timur' => 'nullable|string|max:255',
            'desa_barat' => 'nullable|string|max:255',
            'kec_utara' => 'nullable|string|max:255',
            'kec_selatan' => 'nullable|string|max:255',
            'kec_timur' => 'nullable|string|max:255',
            'kec_barat' => 'nullable|string|max:255',
            'penetapan_batas' => 'nullable|in:ada,tidak ada',
            'dasar_hukum_perdes' => 'nullable|string|max:255',
            'dasar_hukum_perda' => 'nullable|string|max:255',
            'peta_wilayah' => 'nullable|in:ada,tidak ada',
            'referensi_1' => 'nullable|string|max:255',
            'referensi_2' => 'nullable|string|max:255',
            'referensi_3' => 'nullable|string|max:255',
            'referensi_4' => 'nullable|string|max:255',
        ]);

        $batas_wilayah->update($request->all());
        return redirect()->route('batas-wilayah.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(BatasWilayah $batas_wilayah)
    {
        $batas_wilayah->delete();
        return redirect()->route('batas-wilayah.index')->with('success', 'Data berhasil dihapus!');
    }
}