<?php

namespace App\Http\Controllers;

use App\Models\SubsektorKehutanan;
use App\Models\Desa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubsektorKehutananController extends Controller
{
    public function index()
    {
        $desaId = session('desa_id');

        $kehutanan = SubsektorKehutanan::with('desa')
                        ->where('desa_id', $desaId)
                        ->latest()
                        ->paginate(10);

        return view('pages.perkembangan.produk-domestik.subsektor-kehutanan.index', compact('kehutanan'));
    }

    public function create()
    {
        // Tidak perlu kirim $desas karena dropdown desa tidak ditampilkan
        return view('pages.perkembangan.produk-domestik.subsektor-kehutanan.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'total_nilai_produksi_tahun_ini' => 'nullable|integer|min:0',
            'total_nilai_bahan_baku_digunakan' => 'nullable|integer|min:0',
            'total_nilai_bahan_penolong_digunakan' => 'nullable|integer|min:0',
            'total_biaya_antara_dihabiskan' => 'nullable|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal menambahkan data subsektor kehutanan.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        SubsektorKehutanan::create($data);

        return redirect()
            ->route('perkembangan.produk-domestik.subsektor-kehutanan.index')
            ->with('success', 'Data subsektor kehutanan berhasil ditambahkan.');
    }

    public function edit(SubsektorKehutanan $subsektorKehutanan)
    {
        return view('pages.perkembangan.produk-domestik.subsektor-kehutanan.edit', compact('subsektorKehutanan'));
    }

    public function update(Request $request, SubsektorKehutanan $subsektorKehutanan)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'total_nilai_produksi_tahun_ini' => 'nullable|integer|min:0',
            'total_nilai_bahan_baku_digunakan' => 'nullable|integer|min:0',
            'total_nilai_bahan_penolong_digunakan' => 'nullable|integer|min:0',
            'total_biaya_antara_dihabiskan' => 'nullable|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal memperbarui data subsektor kehutanan.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        $subsektorKehutanan->update($data);

        return redirect()
            ->route('perkembangan.produk-domestik.subsektor-kehutanan.index')
            ->with('success', 'Data subsektor kehutanan berhasil diperbarui.');
    }

    public function show($id)
{
    $kehutanan = \App\Models\SubsektorKehutanan::with('desa')->findOrFail($id);
    return view('pages.perkembangan.produk-domestik.subsektor-kehutanan.show', compact('kehutanan'));
}

    public function destroy(SubsektorKehutanan $subsektorKehutanan)
    {
        $subsektorKehutanan->delete();

        return redirect()
            ->route('perkembangan.produk-domestik.subsektor-kehutanan.index')
            ->with('success', 'Data subsektor kehutanan berhasil dihapus.');
    }
}
