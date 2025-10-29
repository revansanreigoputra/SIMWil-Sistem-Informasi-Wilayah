<?php

namespace App\Http\Controllers;

use App\Models\SektorBangunan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SektorBangunanController extends Controller
{
    public function index()
    {
        $desaId = session('desa_id');
        $bangunans = SektorBangunan::where('desa_id', $desaId)->latest()->paginate(10);

        return view('pages.perkembangan.produk-domestik.sektor-bangunan.index', compact('bangunans'));
    }

    public function create()
    {
        return view('pages.perkembangan.produk-domestik.sektor-bangunan.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'jumlah_bangunan_tahun_ini' => 'nullable|integer|min:0',
            'biaya_pemeliharaan' => 'nullable|integer|min:0',
            'total_nilai_bangunan' => 'nullable|integer|min:0',
            'biaya_antara_lainnya' => 'nullable|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal menambahkan data sektor bangunan.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        SektorBangunan::create($data);

        return redirect()
            ->route('perkembangan.produk-domestik.sektor-bangunan.index')
            ->with('success', 'Data sektor bangunan berhasil ditambahkan.');
    }

    public function show(SektorBangunan $sektorBangunan)
    {
        return view('pages.perkembangan.produk-domestik.sektor-bangunan.show', compact('sektorBangunan'));
    }

    public function edit(SektorBangunan $sektorBangunan)
    {
        return view('pages.perkembangan.produk-domestik.sektor-bangunan.edit', compact('sektorBangunan'));
    }

    public function update(Request $request, SektorBangunan $sektorBangunan)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'jumlah_bangunan_tahun_ini' => 'nullable|integer|min:0',
            'biaya_pemeliharaan' => 'nullable|integer|min:0',
            'total_nilai_bangunan' => 'nullable|integer|min:0',
            'biaya_antara_lainnya' => 'nullable|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal memperbarui data sektor bangunan.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        $sektorBangunan->update($data);

        return redirect()
            ->route('perkembangan.produk-domestik.sektor-bangunan.index')
            ->with('success', 'Data sektor bangunan berhasil diperbarui.');
    }

    public function destroy(SektorBangunan $sektorBangunan)
    {
        $sektorBangunan->delete();

        return redirect()
            ->route('perkembangan.produk-domestik.sektor-bangunan.index')
            ->with('success', 'Data sektor bangunan berhasil dihapus.');
    }
}
