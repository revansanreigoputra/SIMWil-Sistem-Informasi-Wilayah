<?php

namespace App\Http\Controllers;

use App\Models\SubsektorKerajinan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubsektorKerajinanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desaId = session('desa_id');

        // Ambil data berdasarkan desa_id dari session
        $kerajinans = SubsektorKerajinan::with('desa')
            ->where('desa_id', $desaId)
            ->orderBy('tanggal', 'desc')
            ->paginate(10);

        return view('pages.perkembangan.produk-domestik.subsektor-kerajinan.index', compact('kerajinans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Tidak perlu kirim daftar desa, karena desa_id diambil dari session
        return view('pages.perkembangan.produk-domestik.subsektor-kerajinan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date|unique:subsektor_kerajinans,tanggal,NULL,id,desa_id,' . session('desa_id'),
            'total_nilai_produksi_tahun_ini' => 'required|numeric|min:0',
            'total_nilai_bahan_baku_digunakan' => 'required|numeric|min:0',
            'total_nilai_bahan_penolong_digunakan' => 'required|numeric|min:0',
            'total_biaya_antara_dihabiskan' => 'required|numeric|min:0',
            'total_jenis_kerajinan_rumah_tangga' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal menambahkan data subsektor kerajinan.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        SubsektorKerajinan::create($data);

        return redirect()
            ->route('perkembangan.produk-domestik.subsektor-kerajinan.index')
            ->with('success', 'Data subsektor kerajinan berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubsektorKerajinan $subsektor_kerajinan)
    {
        return view('pages.perkembangan.produk-domestik.subsektor-kerajinan.edit', [
            'kerajinan' => $subsektor_kerajinan
        ]);
    }

    public function show(SubsektorKerajinan $subsektor_kerajinan)
{
    return view('pages.perkembangan.produk-domestik.subsektor-kerajinan.show', [
        'kerajinan' => $subsektor_kerajinan
    ]);
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubsektorKerajinan $subsektor_kerajinan)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date|unique:subsektor_kerajinans,tanggal,' . $subsektor_kerajinan->id . ',id,desa_id,' . session('desa_id'),
            'total_nilai_produksi_tahun_ini' => 'required|numeric|min:0',
            'total_nilai_bahan_baku_digunakan' => 'required|numeric|min:0',
            'total_nilai_bahan_penolong_digunakan' => 'required|numeric|min:0',
            'total_biaya_antara_dihabiskan' => 'required|numeric|min:0',
            'total_jenis_kerajinan_rumah_tangga' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal memperbarui data subsektor kerajinan.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        $subsektor_kerajinan->update($data);

        return redirect()
            ->route('perkembangan.produk-domestik.subsektor-kerajinan.index')
            ->with('success', 'Data subsektor kerajinan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubsektorKerajinan $subsektor_kerajinan)
    {
        $subsektor_kerajinan->delete();

        return redirect()
            ->route('perkembangan.produk-domestik.subsektor-kerajinan.index')
            ->with('success', 'Data subsektor kerajinan berhasil dihapus.');
    }
}
